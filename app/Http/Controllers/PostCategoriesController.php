<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategory;
use Session;


class PostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_categories = PostCategory::All();

        return view('backend_views.modules.post_categories.index_page', compact('post_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row = new PostCategory();
        return view('backend_views.modules.post_categories.create_page', compact('row'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST') && !empty($request)){

            $request->validate([
                'pc_title'       => 'required|string|max:191',
                'pc_description' => 'required|string|max:255'
            ]);


            // if status is empty, value = 0. Else, value = 1
            if(empty($request['pc_status']))
            {
                $pc_status = 0;
            }
            else
            {
                $pc_status = 1;
            }


            // store data
            /*PostCategory::create($request->all());*/
            PostCategory::create([
                'pc_title'       => $request->pc_title,
                'pc_description' => $request->pc_description,
                'pc_status'      => $pc_status
            ]);

            // session message
            Session::flash('flash_message_success', 'Post Category created successfully.');

            // redirect
            return redirect(route('post-categories.create'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = PostCategory::findOrFail($id);

        return view('backend_views.modules.post_categories.edit_page', compact('row'));
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
        if($request->isMethod('PUT') && !empty($id) && !empty($request)){

            $request->validate([
                'pc_title'       => 'required|string|max:255',
                'pc_description' => 'required|string|max:255'
            ]);


            // if status is empty, value = 0. Else, value = 1
            if(empty($request['pc_status']))
            {
                $pc_status = 0;
            }
            else
            {
                $pc_status = 1;
            }


            // update data
            /*PostCategory::whereId($id)->update($request->all());*/
            /*PostCategory::where([ 'id' => $id ])*/
            PostCategory::whereId($id)
            ->update([
                'pc_title'       => $request->pc_title,
                'pc_description' => $request->pc_description,
                'pc_status'      => $pc_status
            ]);

            // session message
            Session::flash('flash_message_success', 'Post Category updated successfully.');

            // redirect
            return redirect(route('post-categories.index'));

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
        if(!empty($id)){

            // Delete the record in database
            PostCategory::destroy($id);

            //session message
            /*session()->flash('flash_message_success', 'Product has been deleted');*/
            Session::flash('flash_message_success', 'Post Category has been deleted');

            //redirect page
            return redirect(route('post-categories.index'));
            /*return redirect('admin/products/create');*/
        
        }
    }












}
