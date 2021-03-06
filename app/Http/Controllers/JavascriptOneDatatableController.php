<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Sex;
/* use Illuminate\Support\Facades\Validator; */
use Validator;

class JavascriptOneDatatableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $students = Student::all(); */
        $students = Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
            ->selectRaw('students.id,
                        students.firstname,
                        students.middlename,
                        students.lastname,
                        sexes.sex,
                        CONCAT(students.firstname, " ", students.middlename, " ", students.lastname)
                        AS fullname')
            ->get();

        $sexes = Sex::pluck('sex', 'id');

        return view('frontend_views.modules.javascriptPractices1.datatable', compact('students', 'sexes'));
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

            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'sex_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
            }

            if ($validator->passes()) {
                $student = Student::create($request->all());

                return response($this->find($student->id));

                return response()->json(['success' => ''.$student->firstname.' '.$student->lastname.', Stored Successfully.']);
            }
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
