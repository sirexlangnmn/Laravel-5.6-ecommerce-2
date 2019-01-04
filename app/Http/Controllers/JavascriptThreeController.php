<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class JavascriptThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::pluck('role_title', 'id')->All();

        return view('frontend_views.modules.javascriptPractices3.index', compact('roles'));
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
        if ($request->ajax() && !empty($request->_token) && $request->isMethod('POST') && !empty($request)) {
            if ($request->ajax()) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request['password']);
                $user->role_id = $request->role_id;
                $user->status = 0;

                if ($user->save()) {
                    return response(['success' => ''.$user->name.', Stored Successfully.']);
                }
            }
        }
    }

    public function readByAjax()
    {
        $users = User::orderBy('id', 'DESC')->get();

        return view('frontend_views.modules.javascriptPractices3._indexList', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return User::where('id', $id)->first();
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
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(User::findOrFail($request->id));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /* return response($request); */
        /* if ($request->ajax()) {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->status = 0;
            if ($user->save()) {
                return response(['success' => ''.$user->name.', Updated Successfully.']);
            }
        } */

        if ($request->ajax() && !empty($request->_token) && $request->isMethod('POST') && !empty($request)) {
            $user = User::findOrFail($request->id);
            $user->update($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax() && $request->isMethod('POST') && !empty($request)) {
            /* if ($request->ajax() && $request->isMethod('POST') && !empty($request)) { */
            User::destroy($request->id);

            return response(['id' => $request->id]);
        }
    }
}
