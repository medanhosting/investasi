<?php

namespace App\Http\Controllers\Admin;

use App\libs\RajaOngkir;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreDatum;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OptionController extends Controller
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
        $option = StoreDatum::all()->first();

        $cities = City::all();
        $provinces = Province::all();

        $collect = RajaOngkir::getSubdistrict($option->city_id);
        $subdistricts = $collect->rajaongkir->results;

        $data = [
            'option'        => $option,
            'cities'        => $cities,
            'provinces'     => $provinces,
            'subdistricts'  => $subdistricts
        ];

        return View('admin.options')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'province'          => 'required|option_not_default',
            'city'              => 'required|option_not_default',
            'subdistrict'       => 'required|option_not_default',
            'postal-code'       => 'required',
            'detail'            => 'required'
        ],[
            'option_not_default'    => 'Invalid input'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $storedata = StoreDatum::all();
        $data = $storedata->first();

        $data->address = Input::get('detail');
        $data->province_id = Input::get('province');
        $data->city_id = Input::get('city');
        $data->subdistrict_id = Input::get('subdistrict');
        $data->postal_code = Input::get('postal-code');

        $data->save();

        Session::flash('message', 'Update Success!');

        return redirect('admin/option/address');
    }

    public function getCities(){
        $provinceId = request()->province;

        $cities = City::where('province_id', $provinceId)->get();

        $returnHtml = View('admin.partials._city-option',['cities' => $cities])->render();

        return response()->json( array('success' => true, 'html' => $returnHtml) );
    }

    public function getSubdistricts(){
        $cityId = request()->city;

        $collect = RajaOngkir::getSubdistrict($cityId);

        $returnHtml = View('admin.partials._subdistrict-option',['collect' => $collect])->render();

        return response()->json( array('success' => true, 'html' => $returnHtml) );
    }
}
