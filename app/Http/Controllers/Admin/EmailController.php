<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Str;

// use Illuminate\Support\Facades\Input;
use Session;
use Helper;
use DB;
use Auth;
use Storage;

class EmailController extends Controller
{

    public function send()
    {
        return view('emails.index');
    }
    public function mailbox()
    {
        return view('emails.mailbox');
    }
    public function emailEdit($id)
    {
        $email = DB::table('mailboxs')->find($id);
        $user = Helper::findById('users',$email->user_id);
        // dd($user);
        return view('emails.single',compact('email','user'));
    }
    public function sendGroupMail(Request $request)
    {
        $this->validate($request, [
			'email' => 'required',
			'content' => 'required',
			// 'cc' => 'required',
			// 'bcc' => 'required',
		]);
        $email = $request->email;
        $content = $request->content;
        $cc = $request->cc;
        $bcc = $request->bcc;

        // DB::table('emails')->insert([
        //     'email'=>$email,
        //     'content'=>$content,
        //     'cc'=>$cc,
        //     'bcc'=>$bcc,
        //     'created_at' => date("Y-m-d H:i:s"),
        // ]);
        foreach ($email as $key => $value) {
            Mail::to($email)
                    ->cc($cc)
                    ->bcc($bcc)
                    ->queue(new EmailSend($content));
        }
        Session::flash('success','Successfully Send!');
        return redirect()->back();
    }
    public function sendSingleMail(Request $request)
    {
        $this->validate($request, [
			'email' => 'required',
			// 'content' => 'required',
			// 'cc' => 'required',
			// 'bcc' => 'required',
        ]);
        
        $attachPath = '';
        $user = Auth::user();

        if ($request->hasFile('attach')) {
            $attachPath = $request->attach->storeAs('attachs', $user->fname.' '.$user->lname.'-'.Str::random(4).'-'.$request->file('attach')->getClientOriginalName());
        }
        $email = $request->email;
        $subject = $request->subject;
        $content = $request->content;
        $attach = $attachPath;
        
        DB::table('mailboxs')->insert([
            'to'=>$email,
            'from'=>$user->email,
            'content'=>$content,
            'subject'=>$subject,
            'attach' =>$attach,
            'status' =>'send',
            'user_id' => $user->id,
            // 'created_at' => date("Y-m-d H:i:s"),
        ]);
        
        $attach = 'storage/'.$attach;        
        $data = ['content' => $content];
    

        Mail::send('maileclipse::templates.new', $data, function ($message) use ($attach,$subject,$email,$request,$user) {
            $message->from($user->email, $user->fname.' '.$user->lname);
            $message->sender($user->email, $user->fname.' '.$user->lname);
            $message->to($email);
            $message->subject($subject);
            $message->priority(3);
            if ($request->hasFile('attach')) {
                $message->attach(public_path($attach));
            }
        });
        return 'ok';
    }

    public function destroyEmail(Request $request)
    {   
        $deleteEmail = $request->get('select_email');
        if ($deleteEmail == null) {
            Session::flash('warning','Select The Check Box!'); 
        }else{
            foreach ($deleteEmail as $key => $value) {
                DB::table('mailboxs')->delete($value);
            }
            Session::flash('success','Successfully Deleted!');
        }
        return redirect('/admin/email/mailbox');
    }

}