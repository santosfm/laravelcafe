<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
//use App\Models\contact;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;

class ContactControllerTwo extends Controller {
    
    public function contactTwo() {
        return view('sendTestEmail');
     }
     
    public function sendEmail(Request $request) {
       
        $request->validate([
            'name'=>'required | min:2 | max:60 | string',
            'email'=>'required | min:5 | max:80 | string | email',
            'msg'=>'required | min:5 | max:800 | string'
            //'captcha' => 'required|captcha'
         ]);
       
        $details = [
           'name' => $request->name,
           'email' => $request->email,
           'msg' => $request->msg
        ];       
        
        //insert data into the DB
        DB::insert('insert into contacts (name, email, msg) values (?, ?, ?)', [$request->name, $request->email, $request->msg]);

       Mail::to('santosfm22@hotmail.com')->send(new ContactMail($details));
       return back()->with('message_sent', 'Your message has been sent successfully!');
    }

  }
