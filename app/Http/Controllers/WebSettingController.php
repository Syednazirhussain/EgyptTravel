<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWebSettingRequest;
use App\Http\Requests\UpdateWebSettingRequest;
use App\Repositories\WebSettingRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\WebSetting;

class WebSettingController extends Controller
{

    private $webSettingRepository;

    public function __construct(WebSettingRepository $webSettingRepo)
    {
        $this->webSettingRepository = $webSettingRepo;
    }

    public function edit($code)
    {

        $webSetting = WebSetting::where('code',$code)->first();

        if (empty($webSetting)) 
        {
            session()->flash('msg.error','Setting not found');
            return redirect(route('admin.webSettings.index'));
        }

        return view('web_settings.edit')->with('webSetting', $webSetting);
    }


    public function update($id, UpdateWebSettingRequest $request)
    {
        $input = $request->all();

        $webSetting = WebSetting::find($id);

        if (empty($webSetting)) 
        {
            session()->flash('msg.error','Setting not found');
            return redirect(route('admin.webSettings.index'));
        }

        $webSetting->title = $input['title'];
        $webSetting->sub_title = $input['sub_title'];
        $webSetting->footer_text = $input['footer_text'];
        $webSetting->facebook_link = $input['facebook_link'];
        $webSetting->twitter_link = $input['twitter_link'];
        $webSetting->instagram_link = $input['instagram_link'];
        $webSetting->google_plus_link = $input['google_plus_link'];
        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('public/setting');
            $path = explode("/", $path);
            $count = count($path)-1;
            $webSetting->logo = $path[$count];
        }
        if($webSetting->save())
        {
            $request->session()->flash('msg.success','Setting update successfully');
            return redirect()->back();
        }
        else
        {
            $request->session()->flash('msg.error','There is some problem while setting update');
            return redirect()->back();
        }
    }
}
