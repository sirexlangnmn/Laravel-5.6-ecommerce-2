<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientUser;

class AuthFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend_views.modules.auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*var_dump($request); die;*/
        if ($request->isMethod('POST') && !empty($request)) {
            echo 'Gumagana ka ba URL?';
            die;
            exit();
            // check if data can receive. dd means die and dump.
            /* dd($request->All()); */

            // validate the user
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            // store data
            /* User::create($request->all()); */
            ClientUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
            ]);

            // session message
            /*$request->session()->flash('flash_message_success', 'User created successfully.');*/
            Session::flash('flash_message_success', 'User created successfully.');

            // redirect
            return redirect(route('auth-customers.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
