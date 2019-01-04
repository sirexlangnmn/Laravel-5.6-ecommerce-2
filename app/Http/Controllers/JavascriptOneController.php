<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sex;

class JavascriptOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $sexes = Sex::pluck('sex', 'id');

        return view('frontend_views.modules.javascriptPractices1.index', compact('students', 'sexes'));
    }

    public function read()
    {
        $students = Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
                    ->selectRaw('students.id,
                                 students.firstname,
                                 students.middlename,
                                 students.lastname,
                                 sexes.sex,
                                 CONCAT(students.firstname, " ", students.middlename, " ", students.lastname)
                                 AS fullname')
                    ->get();

        /* return response($students); */

        return view('frontend_views.modules.javascriptPractices1._indexList', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // I skip using this create function because I use a modal form for inserting data using modal in index view via index function.
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
            /* return response($request->all()); */

            /* $request->validate([
                'firstname' => 'required|string|max:60',
                'middlename' => 'required|string|max:60',
                'lastname' => 'required|string|max:60',
                'sex_id' => 'integer',
            ]);

            $student = Student::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'sex_id' => $request->sex_id,
            ]); */

            $student = Student::create($request->all());

            return response($this->find($student->id));
        }
    }

    public function find($id)
    {
        return Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
                 ->selectRaw('students.id,
                              students.firstname,
                              students.middlename,
                              students.lastname,
                              students.sex_id,
                              sexes.sex,
                              CONCAT(students.firstname, " ", students.middlename, " ", students.lastname) 
                              AS fullname')
                 ->where('students.id', $id)
                 ->first();
    }

    public function paginate()
    {
        return Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
            ->selectRaw('students.id,
                         students.firstname,
                         students.middlename,
                         students.lastname,
                         students.sex_id,
                         sexes.sex,
                         CONCAT(students.firstname, " ", students.middlename, " ", students.lastname) 
                         AS fullname')
            ->orderBy('students.id', 'DESC')
            ->paginate(3);
    }

    public function pagination()
    {
        $students = $this->paginate();
        $sexes = Sex::pluck('sex', 'id');

        return view('frontend_views.modules.javascriptPractices1.pagination', compact('students', 'sexes'));
    }

    public function paginationAjax()
    {
        $students = $this->paginate();
        $sexes = Sex::pluck('sex', 'id');

        return view('frontend_views.modules.javascriptPractices1._paginationList', compact('students', 'sexes'))->render();
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
        if ($request->ajax() && $request->isMethod('GET') && !empty($request)) {
            /* if ($request->ajax()) { */
            /* return response($request->all()); */

            $student = Student::findOrFail($request->id);

            return response($student);
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
        if ($request->ajax() && !empty($request->_token) && $request->isMethod('POST') && !empty($request)) {
            /* return response($request->all()); */

            $student = Student::findOrFail($request->id);
            $student->update($request->all());

            return response($this->find($student->id));
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
            Student::destroy($request->id);

            return response(['message' => 'Student record deleted successfully']);
        }
    }
}
