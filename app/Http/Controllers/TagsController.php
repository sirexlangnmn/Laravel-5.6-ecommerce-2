<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use Illuminate\Support\Facades\Validator; */
use Validator;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->get();

        return view('backend_views.modules.tags.index', compact('tags'));
    }

    public function read()
    {
        $tags = Tag::orderBy('id', 'DESC')->get();

        return view('backend_views.modules.tags._indexList', compact('tags'));
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
            $validator = Validator::make($request->all(), [
                'tag' => 'required|string|max:191',
                ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
            }

            if ($validator->passes()) {
                $tag = Tag::create($request->all());

                return response($this->find($tag->id));
                /* return response()->json(['success' => ''.$tag->tag.', Stored Successfully.']); */
            }
        }
    }

    public function find($id)
    {
        return Tag::where('id', $id)->first();
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

            $tag = Tag::findOrFail($request->id);

            return response($tag);
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
            $validator = Validator::make($request->all(), [
              'tag' => 'required|string|max:191',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
            }

            if ($validator->passes()) {
                $tag = Tag::findOrFail($request->id);
                $tag->update($request->all());

                return response($this->find($tag->id));
                /* return response()->json(['success' => ''.$tag->tag.', Stored Successfully.']); */
            }
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
        if ($request->ajax() && !empty($request->_token) && $request->isMethod('POST') && !empty($request)) {
            Tag::destroy($request->id);

            /* return response($this->find($request->id)); */

            return response()->json(['success' => 'Deleted Successfully.']);
        }
    }
}
