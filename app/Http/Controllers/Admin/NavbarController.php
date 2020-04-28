<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Image;
use Storage;
use Helper;

class NavbarController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.index',compact('user'));
    }
    public function profileStore(Request $request)
    {
        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            "email" => $request->email,
            "phone" => $request->phone,
            "facebook_userName" => $request->facebook_userName,
            "facebook_link" => $request->facebook_link,
            "twitter_userName" => $request->twitter_userName,
            "twitter_link" => $request->twitter_link,
            "bio" => $request->bio,
            "birthday" => $request->birthday
        ];

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('uploads', 'public');
                $setImage = 'storage/'.$data['image'];
                $img = Image::make($setImage)->resize(500, 500)->save($setImage);
                Storage::delete(Auth::user()->image);
            }

        
        
        // dd($data);
        $user = DB::table('users')->where('id',Auth::user()->id)->update($data);
        Helper::activityStore('App\Profile','profile update');
        return redirect('/admin/profile');
    }
    public function layoutStting($layout)
    {
        // DB::table('themes')->where('name','select_layout')->where('status','1')->update(['status','0']);
        // DB::table('themes')->where('name','select_layout')->where('status','0')->update(['status','1']);
        $isLayout = DB::table('layouts_setting')->where('user_id',Auth::user()->id)->first();

        if($isLayout!=null){
            if ($layout == 1) {
            DB::table('layouts_setting')->where('user_id',Auth::user()->id)->update([
            'layout'=>'light light-sidebar theme-white',
            ]);
            }else{
            DB::table('layouts_setting')->where('user_id',Auth::user()->id)->update([
            'layout'=>'dark dark-sidebar theme-black',
            ]);
            }
            }else{
            if ($layout == 1) {
                DB::table('layouts_setting')->insert([
                'user_id'=>Auth::user()->id,
                'layout'=>'light light-sidebar theme-white',
            ]);
        }else{
            DB::table('layouts_setting')->insert([
                'user_id'=>Auth::user()->id,
                'layout'=>'dark dark-sidebar theme-black',
            ]);
        }
        }

        return 'ok';
    }
}
