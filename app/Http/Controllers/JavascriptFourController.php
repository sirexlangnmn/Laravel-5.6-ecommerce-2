<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class JavascriptFourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('frontend_views.modules.javascriptPractices4.index', compact('roles'));
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
        $role = new Role();
        $role->role_title = $request->role_title;
        $role->role_description = $request->role_description;
        $role->save();

        return redirect(url('/js-four/index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            return Role::get();
        } catch (Exception $e) {
            return 'false';
        }
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
        $role = Role::findOrFail($id);

        return view('');
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
        $role = Role::finOrFail();
        $role->role_title = $request->role_title;
        $role->role_description = $request->role_description;
        $role->save();

        return redirect('/js-four/index');
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
        try {
            return Role::destroy($id);

            return 'true';
        } catch (Exception $e) {
            return 'false';
        }
    }
}
