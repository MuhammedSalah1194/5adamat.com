<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Contact\Store\ReplyStore;
use App\Mail\Replymessage;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactsController extends backendController{
        public function __construct(Contact $model)
        {   
            parent::__construct($model);
        }

        public function ReplyContact( $id, ReplyStore $request){
            $message = Contact::findOrFail($id);
            Mail::send(new Replymessage ($message, $request->message));   
            return redirect()->route('contacts.edit', ['id'=>$message->id]);
        }
}