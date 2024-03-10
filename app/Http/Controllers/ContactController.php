<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\AdministratorQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }
    public function store(StoreContactRequest $request)
    {
        try{

           Mail::to('djordje.tesa@gmail.com')->send(new AdministratorQuestion($request->all()));
            return redirect('/contact')->with('success-msg', "Successfully sent message to administrator. Administrator will ansver you in a few hours!");
        }
        catch (\Exception $e){
            dd($e->getMessage()."".$e->getLine());
        }
    }

}
