<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
//use App\Models\contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Mail;
//use App\Mail\ContactMail;
use App\Mail\sendGridEmail;

class ContactController extends Controller {
  
    public function contact() {
        return view("contact-us"); 
    }
   
    public function sendEmail(Request $request) {
       
        $request->validate([
            'name'=>'required | min:2 | max:60 | string',
            'email'=>'required | min:5 | max:80 | string | email',
            'msg'=>'required | min:5 | max:350 | string',
            'captcha' => 'required|captcha'
         ]);
       
        // $details = [
        //    'name' => $request->name,
        //    'email' => $request->email,
        //    'msg' => $request->msg
        // ];       
        
        //insert data into the DB
        DB::insert('insert into contacts (name, email, msg) values (?, ?, ?)', [$request->name, $request->email, $request->msg]);

       // $data = ['message' => 'You have received a message from Klassy.']; //sendGrid
         $data = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg
         ];
        //Mail::to('santosfm22@hotmail.com')->send(new ContactMail($details)); //WORKING
        Mail::to('santosfm22@hotmail.com')->send(new sendGridEmail($data));
        //return back()->with('message_sent', 'Your message has been sent successfully! I will reply as soon as possible.');  CURRENT
        return redirect()->route('home')->with('message_sent', 'Your message has been sent successfully! I will reply as soon as possible.');
        //return new ContactMail(); //WORKING BEFORE
        //return redirect()->back()->with('message_sent', 'Your message has been successfully sent!'); WORKING
    }

    public function reloadCaptcha() {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
