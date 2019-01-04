<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Validator;

class JavascriptTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && !empty($request)) {
            $request->session()->put('search', $request
                    ->has('search') ? $request->get('search') : ($request->session()
                    ->has('search') ? $request->session()->get('search') : ''));

            $request->session()->put('field', $request
                    ->has('field') ? $request->get('field') : ($request->session()
                    ->has('field') ? $request->session()->get('field') : 'role_title'));

            $request->session()->put('field', $request
                    ->has('field') ? $request->get('field') : ($request->session()
                    ->has('field') ? $request->session()->get('field') : 'role_description'));

            $request->session()->put('sort', $request
                    ->has('sort') ? $request->get('sort') : ($request->session()
                    ->has('sort') ? $request->session()->get('sort') : 'asc'));

            $roles = new Role();
            $roles = $roles->where('role_title', 'LIKE', '%'.$request->session()->get('search').'%')
                           ->orWhere('role_description', 'LIKE', '%'.$request->session()->get('search').'%')
                           ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                           ->paginate(2);

            return view('frontend_views.modules.javascriptPractices2.index', compact('roles'));
        }
        $roles = Role::paginate(2);

        return view('frontend_views.modules.javascriptPractices2.ajax', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend_views.modules.javascriptPractices2.form');
        }

        $rules = [
            'role_title' => 'required',
            'role_description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $role = new Role();
        $role->role_title = $request->role_title;
        $role->role_description = $request->role_description;
        $role->save();

        if ($validator->passes()) {
            return response()->json([
                'fail' => false,
                'redirect_url' => url('js-two/create'),
            ]);
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $role = Role::findOrFail($id);

            return view('frontend_views.modules.javascriptPractices2.show', compact('role'));
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
        if ($request->isMethod('get')) {
            $role = Role::findOrFail($id);

            return view('frontend_views.modules.javascriptPractices2.form', compact('role'));
        }

        $rules = [
            'role_title' => 'required',
            'role_description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $role = Role::findOrFail($id);
        $role->role_title = $request->role_title;
        $role->role_description = $request->role_description;
        $role->save();

        if ($validator->passes()) {
            return response()->json([
                'fail' => false,
                'redirect_url' => url('js-two/create'),
            ]);
        }
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
        if (!empty($id)) {
            Role::destroy($id);

            return redirect('js-two/index');
        }
    }
}
