<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 14-Sep-17
 * Time: 3:41 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.show-report-form');
    }
    public function request(Request $request)
    {
        $startDate = $request['start_date'];
        $finishDate   = $request['finish_date'];
        $statusId   = $request['options'];
        $statusString = $statusId == 9? "Finish Transactions" : "Failed Transactions";

        $start = Carbon::createFromFormat('d/m/Y', $startDate, 'Asia/Jakarta');
        $end = Carbon::createFromFormat('d/m/Y', $finishDate, 'Asia/Jakarta');


        $transactions = Transaction::where('status_id', '=', 3)
            ->whereBetween('created_on', [$start->toDateString(),$end->toDateString()])
            ->orderByDesc('created_on')->get();
        return View('admin.show-report-print', compact('transactions', 'start', 'end', 'statusString'));
    }
//    public function show()
//    {
//        //
//        $transactions = Transaction::all()->sortByDesc('created_on');
//
//        return View('admin.show-report-print', compact('transactions'));
//    }
}