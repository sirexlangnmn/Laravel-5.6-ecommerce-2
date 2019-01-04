<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all(); 

        return view('backend_views.modules.comments.index', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where(['post_id'=>$id])->get();

        return view('backend_views.modules.comments.index', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('PUT') && !empty($id) && !empty($request))
        {
            // update the data in the database
            Comment::whereId($id)
            ->update([ 'status' => $request->status ]);

            $getStatus = Comment::findOrfail($id);

            if($getStatus->status == 1){
                $status = 'Enabled';
            }
            else{
                $status = 'Disabled';
            }

            // session flash
            Session::flash('flash_message_success', ''. $status .' successfully.');

            // redirect
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id))
        {
            // Delete the product record in database
            Comment::destroy($id);

            // session flash
            Session::flash('flash_message_success', 'Comment deleted successfully.');

            // redirect
            return redirect()->back();
        }
    }












}
