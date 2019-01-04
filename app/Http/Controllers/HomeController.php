<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /*
    public function index()
    {
        // get the admin user who login
        $adminLoggedIn = Auth::user();

        // get the required user to present in the list view
        $users = Auth::user()->where(['role_id' => 1, 'status' => 1])->get();

        // get all admin users
        /*  $users = Auth::user()->All();  */

        // another way to check if the user was logged in.
        // and I include the variable contained with data of logged user/admin
        
        /*if (Auth::check()) {
            $loginCheck = 'Admin '.$adminLoggedIn->name.' was logged in';
            Session::put('loginCheck', $loginCheck);
        }*/


        // technically mali ito. Dapat sa store ito na may $request
        // if multiple login failed attempts
        /*if (Auth::attempt(['email'=>$email, 'password'=>$password]))
        {
            return redirect()->intended('/login');
        }*/


        /* return view('home')->with(compact('users', 'adminLoggedIn')); */
        // same to the codes above. But I preferred the first one
        /*return view('home', compact('users', 'adminLoggedIn'));
    }
    */


}
