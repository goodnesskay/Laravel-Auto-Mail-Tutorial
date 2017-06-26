<?php

namespace App\Http\Controllers;
use App\Mail\Success;
use Illuminate\Http\Request;
use App\NewsLetter;
use Illuminate\Support\Facades\Mail;
use Validator;

class NewsLetterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news-letter-view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|distinct'
        ]);

        $newsletter = new NewsLetter();
        $newsletter->email = $request->input('email');

        if ($newsletter->save())
        {
            Mail::send('emails.success', ['email' => $newsletter->email], function ($message)
            {
                $message->from('gtkbrain@gmail.com', 'Goodness Kayode');
                $message->to('gtkbrain@yahoo.com');
            });
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

    public function autoMail(Request $request)
    {
        $this->validate($request, [
            'email'=>'required'
        ]);

        $newsletter = new NewsLetter();
        $newsletter->email = $request->input('email');

        if ($newsletter->save())
        {
            Mail::to($newsletter->email)->send(new Success($newsletter));
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

}
