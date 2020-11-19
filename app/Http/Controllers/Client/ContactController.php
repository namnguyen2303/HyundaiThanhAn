<?php

namespace App\Http\Controllers\Client;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:191',
                'email' => 'required|string|email|max:191',
                'phone' => 'required|max:20',
                'message' => 'required|string|max:191',
            ]);

            if ($validator->fails()) {
                abort(400);
                exit;
            }

            try {
                $info = Contact::create($request->all());

                Mail::send('emails.contact', [
                    'info' => $info,
                ], function ($message) use ($info) {

                    $message->to(env('MAIL_ME'), 'DentalHub')
                        ->subject('[Liên hệ] Có khách hàng liên hệ');
                });
            } catch (\Exception $exception) {
            }

            return back()->with('success', 'Xin cảm ơn! Chúng tôi sẽ sớm liên hệ với bạn!');
        }
        return view('client.contact');
    }
}