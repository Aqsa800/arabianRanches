<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerApplicant;
use App\Models\Lead;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Redirect;
use PDF;
use Mail;

class ContactController extends Controller
{

    public function contactForm(Request $request){

        $messages = [
            'name' => 'Name is Required ',
            'email' => 'Email is Required ',
            'phone' => 'Mobile No. is Required ',
            'formName' => 'Form Name is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'formName' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        $contact = new Lead;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->fullNumber;
        $contact->form_name = $request->formName;
        $contact->message = $request->message;
        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();
        try{
            $postData = [
                'to'=>'aqsahussainphp@gmail.com',
                'name'=> $contact->name,
                'email'=> $contact->email,
                'phone' => $contact->phone,
                'messsage'  =>$request->message,
                'ip'=>$request->ip(),
                'formName'=> $contact->form_name,
                'submitDate' => date('Y-m-d H:i:s'),
            ];

            $url = 'https://hooks.zapier.com/hooks/catch/3658724/31qmhqj/';
            $headers_curl  = ['Content-Type: application/json'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_curl);
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result);

            return response()->json([
                'success' => true,
                'data'   => [],
                'message'   =>'Thank you for Contacting Us. A member from our team will ring you shortly.',
                'reload' => true

            ]);

        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()], 401);
        }
    }

    public function subscribeForm(Request $request){
        $messages = [
            'email' => 'Email is Required ',
            'formName' => 'Form Name is required',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'formName' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $contact = new Lead;
        $contact->email = $request->email;
        $contact->form_name = $request->formName;
        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();

        try{
            $postData = [
                'to'=>'aqsahussainphp@gmail.com',
                'name'=> $contact->name,
                'email'=> $contact->email,
                'phone' => $contact->phone,
                'messsage'  =>$request->message,
                'ip'=>$request->ip(),
                'formName'=> $contact->form_name,
                'submitDate' => date('Y-m-d H:i:s'),
            ];

            $url = 'https://hooks.zapier.com/hooks/catch/3658724/31qmhqj/';
            $headers_curl  = ['Content-Type: application/json'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_curl);
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result);

            return response()->json([
                'success' => true,
                'data'   => [],
                'message'   =>'Thank you for Subscribing with Us.',
                'reload' => true

            ]);

        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()], 401);
        }

    }

}
