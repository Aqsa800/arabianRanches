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
    public function bookViewing(Request $request){

        $messages = [
            'nameCon2' => 'Name is Required ',
            'emailCon2' => 'Email is Required ',
            'phone' => 'Mobile No. is Required ',
            'ths_time' => 'Please Choose a time',
            'ths_date' => 'Please Choose a date',
            'formFrom' => 'Form Name is required',
        ];
        $validator = Validator::make($request->all(), [
            'formFrom' => 'required',
            'ths_date' => 'required',
            'ths_time' => 'required',
            'nameCon2' => 'required',
            'emailCon2' => 'required',
            'phone' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        $contact = new Lead;
        $contact->name = $request->nameCon2;
        $contact->email = $request->emailCon2;
        $contact->phone = $request->full_number3;
        if($request->has('messageCon2')){
        $contact->message = $request->messageCon2;
        }
        if($request->has('propName')){
            $contact->property_url = $request->propName;
            }
        $contact->form_name = $request->formFrom;
        $contact->booking_time = $request->ths_time;
        $contact->booking_date = $request->ths_date;
        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();

         if($contact->save()){
            $msg = 'Thank you for Booking With Us. A member from our team will ring you shortly.';
        }else{
            $msg = "Something Went Wrong, Please Try Again";
        }
        return redirect()->route('thank-you')->with( ['message' => $msg] );
        die;

    }

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
        $contact->phone = $request->full_number;
        $contact->form_name = $request->formName;
        $contact->detail = $request->subject;
        $contact->message = $request->message;
        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();

         if($contact->save()){
            $msg = 'Thank you for Contacting Us. A member from our team will ring you shortly.';
        }else{
            $msg = "Something Went Wrong, Please Try Again";
        }
        return redirect()->route('thank-you')->with( ['message' => $msg] );
        die;

    }
    public function careerForm(Request $request){
        $messages = [
            'name' => 'Name is Required ',
            'email' => 'Email is Required ',
            'phone' => 'Mobile No. is Required ',
            'cvFile' => 'Please upload CV',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'cvFile' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        $career = new CareerApplicant;
        if ($request->has('career_id')) {
            $career->career_id = $request->career_id;
        }

        $career->name = $request->name;
        $career->email = $request->email;
        $career->contact_number = $request->full_number;
        $career->cover_letter = $request->cover_letter;
        if ($request->hasFile('cvFile')) {
            $img =  $request->file('cvFile');
            $imgExt = $img->getClientOriginalExtension();
            $imageName =  Str::slug($request->name).'.'.$imgExt;
            $career->addMedia($img)->usingFileName($imageName)->toMediaCollection('CVS', 'careerFiles');
        }

        $career->submit_date = date('Y-m-d H:i:s');
        $career->page_url = url()->previous();

        $career->save();

         if($career->save()){
            $msg = 'Thank you for Contacting Us. A member from our team will ring you shortly.';
        }else{
            $msg = "Something Went Wrong, Please Try Again";
        }
        return redirect()->route('thank-you')->with( ['message' => $msg] );
        die;

    }
    public function floorPlanForm(Request $request){
        $messages = [
            'name' => 'Name is Required ',
            'email' => 'Email is Required ',
            'phone' => 'Mobile No. is Required ',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $contact = new Lead;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->full_number;
        $contact->form_name = $request->formName;
        $contact->message = $request->message;
        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();

         if($contact->save()){
            
            session()->put('downloadingFile',$request->floorPlanFile);

            return redirect()->route('floorplans')->with('success','Thank you for Contacting Us. A member from our team will ring you shortly.');
        }else{
            return redirect()->route('floorplans')->with('error','Something Went Wrong, Please Try Again');
        }
    }
    public function valuationForm(Request $request){
        $messages = [
            'name' => 'Name is Required ',
            'email' => 'Email is Required ',
            'phone' => 'Mobile No. is Required ',
            'formName' => 'Form Name is required',
            'location' => 'Location is required',
            'property_type' => 'Property Type is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'formName' => 'required',
            'location' => 'required',
            'property_type' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        $contact = new Lead;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->full_number;
        $contact->form_name = $request->formName;
        $contact->message = $request->location;
        $contact->detail = $request->property_type;

        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();

         if($contact->save()){
            $msg = 'Thank you for Contacting Us. A member from our team will ring you shortly.';
        }else{
            $msg = "Something Went Wrong, Please Try Again";
        }
        return redirect()->route('thank-you')->with( ['message' => $msg] );
        die;

    }
    public function enquireForm(Request $request){
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


        $contact->form_name = $request->formName;

        if($request->has('full_number')){
        $contact->phone = $request->full_number;
        }else if($request->has('full_number2')){
        $contact->phone = $request->full_number2;
        }else if($request->has('full_number3')){
        $contact->phone = $request->full_number3;
        }else{
            $contact->phone = $request->phone;
        }
        if($request->has('propName')){
        $contact->property_url = $request->propName;
        }
        if($request->has('fileUrl')){
            $contact->file_url = $request->fileUrl;
        }
        if($request->has('message')){
            $contact->message = $request->message;
        }
        $contact->submit_date = date('Y-m-d H:i:s');
        $contact->page_url = url()->previous();

        $contact->save();

         if($contact->save()){
            $msg = 'Thank you for Contacting Us. A member from our team will ring you shortly.';

        }else{
            $msg = "Something Went Wrong, Please Try Again";
        }
        if($request->has('fileUrl')){
            $file = $request->fileUrl;
        }else{
            $file = '';
        }
        return redirect()->route('thank-you')->with( ['message' => $msg, 'file' => $file] );
        die;

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

         if($contact->save()){
            $msg = 'Thank you for Subscribing with Us.';
        }else{
            $msg = "Something Went Wrong, Please Try Again";
        }
        return redirect()->route('thank-you')->with( ['message' => $msg] );
        die;

    }

}
