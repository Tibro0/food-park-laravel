<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsLetterMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $subscribers
        ], 200);
    }

    public function sendNewsLetter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $subscribers = Subscriber::pluck('email')->toArray();

        Mail::to($subscribers)->send(new NewsLetterMail($request->subject, $request->message));

        return response()->json([
            'status' => 200,
            'message' => 'News letter Sent Successfully!'
        ], 200);
    }
}
