<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\User;

class RegistrationController extends Controller
{
    //
    public function index(){

    }
    public function show(){

    }
    public function create(){
        return view('registration.index');
    }
    public function store(){
        //dd(request()->all());
        //echo (request()->all());
        //dd(request('phoneNo'));

        //------Form Validation
        $this->validate(Request(),[
           'name' => 'required',
            'phoneNo' => 'required|min:11',
            'idNo' => 'required|min:4',
            'email' => 'required|email',
            'registrationType' => 'required',
            'password' => 'required|confirmed'
        ]);
        //return redirect()->back()->withInput();
        //------Save the registration data to database
        /*
        $reg=new Registration;
        $reg->name=request('name');
        $reg->phoneNo=request('phoneNo');
        $reg->address=request('address');
        $reg->idNo=request('idNo');
        $reg->email=request('email');
        $reg->registrationType=request('registrationType');
        $reg->save();
        */
        //----Registration::create(Request(['name','phoneNo','address','idNo','email','registrationType']));
        $user=User::create([
            'name'=>Request('name'),
            'email'=>Request('email'),
            'password'=>bcrypt(Request('password'))
        ]);

        //-------Login User
        auth()->login($user);
        //Then show results of registration

        //Redirect to login page or email varification
        return redirect('/fileView');


    }
}
