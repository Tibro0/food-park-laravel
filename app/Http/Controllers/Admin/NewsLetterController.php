<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Mail\NewsLetterMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function index(SubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.news-letter.index');
    }

    public function sendNewsLetter(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        $subscribers = Subscriber::pluck('email')->toArray();

        Mail::to($subscribers)->send(new NewsLetterMail($request->subject, $request->message));

        toastr()->success('News letter Sent Successfully!');
        return redirect()->back();
    }
}
