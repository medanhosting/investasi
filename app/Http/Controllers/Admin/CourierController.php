<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class CourierController extends Controller
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
        //
        $couriers = Courier::all();

        return View('admin.show-couriers', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.create-courier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'code'          => 'required|max:20',
            'description'   => 'required|max:100'
        ]);

        Courier::create([
            'code'          => Input::get('code'),
            'description'   => Input::get('description'),
            'status_id'     => 1
        ]);

        Session::flash('message', 'Success Creating Courier!!!');

        return redirect('/admin/courier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courier = Courier::find($id);
        return View('admin.edit-courier', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(request(), [
            'code'          => 'required',
            'description'   => 'required'
        ]);


        Courier::where('id', $id)->update([
            'code'          => Input::get('code'),
            'description'   => Input::get('description'),
            'status_id'     => Input::get('status')
        ]);

        Session::flash('message', 'Success Updating Courier!!!');

        return redirect('admin/courier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Courier::destroy($id);
        Session::flash('message', 'Success Deleting Courier!!!');

        return redirect('admin/courier');
    }
}
