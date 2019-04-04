<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\HeaderRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\SocialRequest;
use App\Setting;
use function Couchbase\defaultDecoder;

//use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.general', compact('settings'));
    }
    public  function about(){
        $settings = Setting::all();
        return view('admin.settings.about', compact('settings'));
    }

    public function social()
    {
        $settings = Setting::all();
        return view('admin.settings.social', compact('settings'));
    }

    public function header()
    {
        $settings = Setting::all();
        return view('admin.settings.header', compact('settings'));
    }
    public function slider()
    {
        $settings = Setting::all();
        return view('admin.settings.slider', compact('settings'));
    }

    public function project()
    {
        $settings = Setting::all();
        $img = Setting::where('name', 'imgpro')->get()[0]->value;
        $path = storage_path() . '/app/images/settings/' . $img;
        if (is_file($path)) {
            $path = asset('storage/app/images/settings/' . $img);
        } else {
            $path = asset('public/img/image.png');
        }
        return view('admin.settings.project', compact('settings', 'path'));
    }

    public function projectUpdate(ProjectRequest $request)
    {


        Setting::where('name', 'imgpro')->update([
            'value' => $this->DestroyImg($request, 'imgpro')
        ]);
        Setting::where('name', 'project1')->update([
            'value' => $request->project1.';'.$request->num1
        ]);
        Setting::where('name', 'project2')->update([
            'value' => $request->project2.';'.$request->num2
        ]);
        Setting::where('name', 'project3')->update([
            'value' => $request->project3.';'.$request->num3
        ]);
        Setting::where('name', 'project4')->update([
            'value' => $request->project4.';'.$request->num4
        ]);


        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function headerUpdate(HeaderRequest $request)
    {

        $img = $this->DestroyImg($request);

        foreach ($request->all() as $key => $val) {

            Setting::where('name', $key)->update([
                'value' => ($key == 'img') ? $img : $val
            ]);

        }

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    public function aboutUpdate(AboutRequest $request)
    {

        $img = $this->DestroyImg($request,'about');

        foreach ($request->all() as $key => $val) {

            Setting::where('name', $key)->update([
                'value' => ($key == 'about') ? $img : $val
            ]);

        }

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function generalUpdate(GeneralRequest $request)
    {

        foreach ($request->all() as $key => $val) {
            if ($key == 'logo') {
                $logo = $this->DestroyImg($request, 'logo');
                Setting::where('name', $key)->update([
                    'value' => $logo
                ]);
            } elseif($key == 'contact') {
                Setting::where('name', $key)->update([
                    'value' => str_replace('/watch?v=','/embed/',$val)
                ]);
            }else{
                Setting::where('name', $key)->update([
                    'value' => $val
                ]);
            }

        }

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    public function sliderUpdate(SliderRequest $request)
    {

        foreach ($request->all() as $key => $val) {
            if($key=='slide1'|| $key=='slide2'||$key=='slide3'){
                $logo = $this->DestroyImg($request, $key);
                Setting::where('name', $key)->update([
                    'value' => $logo
                ]);
            }

//            echo $key;
        }
//        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function socialUpdate(SocialRequest $request)
    {

        foreach ($request->all() as $key => $val) {
            Setting::where('name', $key)->update([
                'value' => $val
            ]);

        }

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /*
     * Uplaod && Delete img
     * */

    public function UploadImg($req, $field = 'img', $folder = 'settings')
    {
        $name = null;
        if ($req->hasFile($field)) {
            $path = storage_path('app/images/' . $folder);
            $ex = $req->file($field)->getClientOriginalExtension();
            $name = '_settings' . uniqid() . '.' . $ex;
            $req->file($field)->move($path, $name);

        }
        return $name;
    }

    public function DestroyImg($req, $feald = 'img')
    {
        $old = Setting::where('name', $feald)->limit(1)->get()[0]->value;
        //dd($old);

        $name = $this->UploadImg($req, $feald, 'settings');
        if ($name != null) {
            $path = storage_path() . '/app/images/settings/' . $old;
            if (is_file($path) && file_exists($path)) {
                unlink($path);
            }
            return $name;
        }
        return $old;
    }


}
