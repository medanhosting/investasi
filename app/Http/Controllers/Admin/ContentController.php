<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 30/08/2017
 * Time: 15:31
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    public function edit()
    {
        //
        $data = [
            'content_1'=> Content::where('section', 'home_1')->first(),
            'content_2'=> Content::where('section', 'home_2')->first(),
            'content_3'=> Content::where('section', 'home_3')->first(),
            'content_4_1'=> Content::where('section', 'home_4_title')->first(),
            'content_4_2'=> Content::where('section', 'home_4_row_1')->first(),
            'content_4_3'=> Content::where('section', 'home_4_row_2')->first(),
            'content_popup'=> Content::where('section', 'home_popup')->first(),
        ];
        return View('admin.edit-content')->with($data);
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
        //home section 1
        if($id == "home_1"){
            $validator = Validator::make($request->all(),[
                'content_1'         => 'required',
                'content_2'         => 'required',
                'content_3'         => 'required',
                'link'         => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $contentDB = Content::where('section', $id)->first();
            $contentDB->content_1 = $request->input('content_1');
            $contentDB->content_2 = $request->input('content_2');
            $contentDB->content_3 = $request->input('content_3');
            $contentDB->link = $request->input('link');
            $contentDB->save();

            if ($request->hasFile('background_image')) {
                $img = Image::make($request->file('background_image'));
                $img->save(public_path('frontend_images/homepage/bg.jpg'));
            }
        }
        //home section 2
        else if($id == "home_2"){
            $validator = Validator::make($request->all(),[
                'content_1'         => 'required',
                'content_2'         => 'required',
                'content_3'         => 'required',
                'content_4'         => 'required',
                'link'         => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $contentDB = Content::where('section', $id)->first();
            $contentDB->content_1 = $request->input('content_1');
            $contentDB->content_2 = $request->input('content_2');
            $contentDB->content_3 = $request->input('content_3');
            $contentDB->content_4 = $request->input('content_4');
            $contentDB->link = $request->input('link');
            $contentDB->save();

            if ($request->hasFile('background_image')) {
                $img = Image::make($request->file('background_image'));
                $img->save(public_path('frontend_images/homepage/bg2-light.jpg'));
            }
        }
        //home section 3
        else if($id == "home_3"){
            $validator = Validator::make($request->all(),[
                'content_1'         => 'required',
                'content_2'         => 'required',
                'content_3'         => 'required',
                'content_4'         => 'required',
                'content_5'         => 'required',
                'link'         => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $contentDB = Content::where('section', $id)->first();
            $contentDB->content_1 = $request->input('content_1');
            $contentDB->content_2 = $request->input('content_2');
            $contentDB->content_3 = $request->input('content_3');
            $contentDB->content_4 = $request->input('content_4');
            $contentDB->content_5 = $request->input('content_5');
            $contentDB->link = $request->input('link');
            $contentDB->save();

            if ($request->hasFile('background_image')) {
                $img = Image::make($request->file('background_image'));
                $img->save(public_path('frontend_images/homepage/bg3.jpg'));
            }
        }
        //home popup
        else if($id == "home_popup"){
            $validator = Validator::make($request->all(),[
                'content_1'         => 'required',
                'content_2'         => 'required',
                'content_3'         => 'required',
                'link'         => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $contentDB = Content::where('section', $id)->first();
            $contentDB->content_1 = $request->input('content_1');
            $contentDB->content_2 = $request->input('content_2');
            $contentDB->content_3 = $request->input('content_3');
            $contentDB->link = $request->input('link');
            $contentDB->save();
        }
        //home section 4
        else {
            $validator = Validator::make($request->all(),[
                'content_1'         => 'required',
                'content_2'         => 'required',
                'content_3'         => 'required',
                'content_4'         => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $contentDB = Content::where('section', 'home_4_title')->first();
            $contentDB->content_1 = $request->input('content_1');
            $contentDB->content_2 = $request->input('content_2');
            $contentDB->save();
            $contentDB2 = Content::where('section', 'home_4_row_1')->first();
            $contentDB2->content_1 = $request->input('content_3');
            $contentDB2->save();
            $contentDB3 = Content::where('section', 'home_4_row_2')->first();
            $contentDB3->content_1 = $request->input('content_4');
            $contentDB3->save();

            if ($request->hasFile('background_image')) {
                $img = Image::make($request->file('background_image'));
                $img->save(public_path('frontend_images/homepage/bg4.jpg'));
            }
            if ($request->hasFile('home_4_image_1')) {
                $img = Image::make($request->file('home_4_image_1'));
                $img->save(public_path('frontend_images/homepage/bantuan-1.png'));
            }
            if ($request->hasFile('home_4_image_2')) {
                $img = Image::make($request->file('home_4_image_2'));
                $img->save(public_path('frontend_images/homepage/bantuan-2.png'));
            }
            if ($request->hasFile('home_4_image_3')) {
                $img = Image::make($request->file('home_4_image_3'));
                $img->save(public_path('frontend_images/homepage/bantuan-3.png'));
            }
            if ($request->hasFile('home_4_image_4')) {
                $img = Image::make($request->file('home_4_image_4'));
                $img->save(public_path('frontend_images/homepage/meminjam-1.png'));
            }
            if ($request->hasFile('home_4_image_5')) {
                $img = Image::make($request->file('home_4_image_5'));
                $img->save(public_path('frontend_images/homepage/meminjam-2.png'));
            }
            if ($request->hasFile('home_4_image_6')) {
                $img = Image::make($request->file('home_4_image_6'));
                $img->save(public_path('frontend_images/homepage/meminjam-3.png'));
            }
        }

        Session::flash('message', 'Update Success!');

        return redirect('admin/content/edit');
    }

}