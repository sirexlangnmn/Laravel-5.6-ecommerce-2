<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use App\Post;
use App\Tag;
use App\PostCategory;
use App\Photo;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('backend_views.modules.posts.index_page', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row = new Post();
        $post_categories = PostCategory::where('pc_status', '1')->pluck('pc_title', 'id')->all();
        $tags = Tag::where('status', '1')->get();

        return view('backend_views.modules.posts.create_page', compact('row', 'post_categories', 'tags'));
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
        if ($request->isMethod('POST') && !empty($request)) {
            //  check if data can receive. dd meand die and dump.
            //  dd($request->All());

            // validate the incoming data
            $request->validate([
                'post_title' => 'required|string|max:191',
                'post_body' => 'required|string',
                'post_image' => 'image|dimensions:min_width=900, max_width=1100, min_height=400, max_height=650',
                'post_category_id' => 'required|integer',
                'tags' => 'required',
                'second_image' => 'image',
            ]);

            // if post status is empty, value = 0. Else, value = 1
            if (empty($request['post_status'])) {
                $post_status = 0;
            } else {
                $post_status = 1;
            }

            // if empty files/image
            if (empty($request['post_image'])) {
                $fileName = '';
            }

            // upload the image if has file
            if ($request->hasFile('post_image')) {
                $image_tmp = Input::file('post_image');

                // if valid image. Go to upload
                if ($image_tmp->isValid()) {
                    // date of picture when it is upload
                    $date = date('Y-m-d H-i-s');

                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileNameRand = rand(111, 99999).'.'.$extension;
                    $fileName = $date.'_'.$fileNameRand;

                    $large_image_path = 'uploads/posts/large/'.$fileName;
                    $medium_image_path = 'uploads/posts/medium/'.$fileName;
                    $small_image_path = 'uploads/posts/small/'.$fileName;
                    $thumbnail_image_path = 'uploads/posts/thumbnail/'.$fileName;

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($medium_image_path);

                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($small_image_path);

                    Image::make($image_tmp)->resize(40, 40, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbnail_image_path);

                    /*
                     *   This method stretch the image to be fit to your declared dimension
                     *
                     *   Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                     *   Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                     *   Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                     *
                     */
                }
            }

            /*
            *
            *   upload the second image.
            *   this time I upload it on separate table
            *   connecting the post table and photo table by photo id
            *
            */

            // upload the image if has file
            if ($request->hasFile('second_image')) {
                $image_tmp2 = Input::file('second_image');

                // if valid image. Go to upload
                if ($image_tmp2->isValid()) {
                    // date of picture when it is upload
                    $date = date('Y-m-d H-i-s');

                    $extension2 = $image_tmp2->getClientOriginalExtension();
                    $fileNameRand2 = rand(111, 99999).'.'.$extension2;
                    $fileName2 = $date.'_'.$fileNameRand2;

                    $medium_image_path2 = 'uploads/media/medium/'.$fileName2;

                    // Resize Images
                    Image::make($image_tmp2)->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($medium_image_path2);
                }
            }

            // checking
            /* echo $fileName2; die; */

            /**
             *   Explanation:
             *   si second_photo ay may dalang image/files
             *   papasok sa upload process, validation, and moving image to the designated folder.
             *   after that process mag output ng $fileName2
             *   insert $fileName2 as photo_title to the photo table.
             *   after successful storing process, sabay na kukunin yun ID
             *   si ID ay iko-convert as $request['photo_id'] para ilagay sa post table.
             */
            $getPhotoRecord = Photo::create(['photo_title' => $fileName2]);
            $photo_id = $getPhotoRecord->id;

            // get the logged in user. This is the author of the created post.
            $user = Auth::user();

            /**
             *   store the data in the database
             *   User Model hasMany relationship with Post Model.
             *   Kaya inalis ko na din ang user_id.
             *   Pero pwede rin yun old storing method tapos kunin na lang yung user_id.
             */

            /*
            $user->post()->create([
                'post_title'       => $request->post_title,
                'post_body'        => $request->post_body,
                'post_category_id' => $request->post_category_id,
                'post_status'      => $post_status,
                'post_image'       => $fileName
            ]);
            */

            $post = Post::create([
                'post_title' => $request->post_title,
                'post_body' => $request->post_body,
                'post_status' => $post_status,
                'post_image' => $fileName,
                'post_category_id' => $request->post_category_id,
                'user_id' => $user->id,
                'photo_id' => $photo_id,
            ]);

            /*
            *   Note:
            *   remember about Pivot Table
            *   remember that our Post Model belongsToMany PostTag Model
            */

            $post->tags()->attach($request->tags);

            //session message
            /*$request->session()->flash('flash_message_success', 'post insert successfully');*/
            Session::flash('flash_message_success', 'Post insert successfully');

            //redirect page
            /*return redirect('admin/posts/create');*/
            return redirect(route('posts.create'));
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
        $row = Post::findOrFail($id);
        $post_categories = PostCategory::pluck('pc_title', 'id')->all();
        $tags = Tag::where('status', '1')->get();

        return view('backend_views.modules.posts.edit_page', compact('row', 'post_categories', 'tags'));
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
        // get the row record of current user.
        $userRow = Auth::user();
        // get the row record of post table by ID parametes.
        $postRow = Post::findOrFail($id);

        // check if I get the right data.
        /* dd('User ID '.$userRow->id .' AND '. ' Author ID '. $postRow->user->id); */

        // if current user id == to user id of post table. Proceed to updating post record and image.
        if ($userRow->id == $postRow->user->id) {
            if ($request->isMethod('PUT') && !empty($id) && !empty($request)) {
                // check if data can receive. dd meand die and dump.
                /* dd($request->All()); */

                $request->validate([
                    'post_title' => 'required|string|max:191',
                    'post_body' => 'required|string',
                    'post_image' => 'image|dimensions:min_width=900, max_width=1100, min_height=400, max_height=650',
                    'post_category_id' => 'required|integer',
                ]);

                // if post status is empty, value = 0. Else, value = 1
                if (empty($request['post_status'])) {
                    $post_status = 0;
                } else {
                    $post_status = 1;
                }

                // if empty files/image. Let it empty.
                if (empty($request['post_image'])) {
                    $fileName = '';
                } else {
                    $fileName = $request['post_image'];
                }

                // upload the image if has file
                if ($request->hasFile('post_image')) {
                    $image_tmp = Input::file('post_image');

                    // if valid image. Go to upload
                    if ($image_tmp->isValid()) {
                        // date of picture when it is upload
                        $date = date('Y-m-d H-i-s');

                        $extension = $image_tmp->getClientOriginalExtension();
                        $fileNameRand = rand(111, 99999).'.'.$extension;
                        $fileName = $date.'_'.$fileNameRand;

                        $large_image_path = 'uploads/posts/large/'.$fileName;
                        $medium_image_path = 'uploads/posts/medium/'.$fileName;
                        $small_image_path = 'uploads/posts/small/'.$fileName;
                        $thumbnail_image_path = 'uploads/posts/thumbnail/'.$fileName;

                        // Stretch the image but still maintain the ratio.
                        // Resize Images
                        Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($large_image_path);

                        Image::make($image_tmp)->resize(600, 600, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($medium_image_path);

                        Image::make($image_tmp)->resize(300, 300, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($small_image_path);

                        Image::make($image_tmp)->resize(40, 40, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($thumbnail_image_path);

                        /*
                         *   This method stretch the image to be fit to your declared dimension
                         *
                         *   Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                         *   Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                         *   Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                         *
                         */
                    }
                } else {
                    $fileName = $request['current_image'];
                }

                // get the logged in user. This is the author of the created post.
                $user = Auth::user();

                // this kind of method in updating the data is not applicable to Pivot table

                /*Auth::user()->post()->whereId($id)->first()->update();*/
                /*Auth::user()->post()->where([ 'id' => $id ])*/

                /*  $post = Post::findOrFail($id)
                    ->update([
                        'post_title'       => $request->post_title,
                        'post_body'        => $request->post_body,
                        'post_category_id' => $request->post_category_id,
                        'user_id'          => $user->id,
                        'post_status'      => $post_status,
                        'post_image'       => $fileName
                    ]);  */

                $post = Post::findOrFail($id);
                $post->post_title = $request->post_title;
                $post->post_body = $request->post_body;
                $post->post_category_id = $request->post_category_id;
                $post->user_id = $user->id;
                $post->post_status = $post_status;
                $post->post_image = $fileName;
                $post->save();

                /*
                *   Note:
                *   remember about Pivot Table
                *   remember that our Post Model belongsToMany PostTag Model
                */

                $post->tags()->sync($request->tags);

                //session message
                /*$request->session()->flash('flash_message_success', 'post insert successfully');*/
                Session::flash('flash_message_success', 'Post updated successfully');

                //redirect page
                /*return redirect('admin/posts/create');*/
                return redirect(route('posts.index'));
            }
        } else {
            Session::flash('flash_message_error', ' '.$userRow->name.', You are not authorize to modify the post of others.');

            // redirect back
            return redirect()->back();
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
        // get the row record of current user.
        $userRow = Auth::user();
        // get the row record of post table by ID parametes.
        $postRow = Post::findOrFail($id);

        // check if I get the right data.
        /* dd('User ID '.$userRow->id.' AND '.' Author ID '.$postRow->user->id); */

        // if current user id == to user id of post table. Proceed to deleting post record and image.
        if ($userRow->id == $postRow->user->id) {
            if (!empty($id)) {
                // check if the id pass
                /* return $id; */

                // get post image name
                $row = Post::whereId($id)->first();
                /*echo $row->post_image; die;*/

                // getpost image path
                $large_image_path = 'uploads/posts/large/';
                $medium_image_path = 'uploads/posts/medium/';
                $small_image_path = 'uploads/posts/small/';
                $thumbnail_image_path = 'uploads/posts/thumbnail/';

                // delete large image if exists in folder
                if (file_exists($large_image_path.$row->post_image)) {
                    unlink($large_image_path.$row->post_image);
                }
                // delete medium image if exists in folder
                if (file_exists($medium_image_path.$row->post_image)) {
                    unlink($medium_image_path.$row->post_image);
                }
                // delete small image if exists in folder
                if (file_exists($small_image_path.$row->post_image)) {
                    unlink($small_image_path.$row->post_image);
                }
                // delete thumbnail image if exists in folder
                if (file_exists($thumbnail_image_path.$row->post_image)) {
                    unlink($thumbnail_image_path.$row->post_image);
                }

                // Delete the post record in database
                Post::destroy($id);

                //session message
                /*session()->flash('flash_message_success', post has been deleted');*/
                Session::flash('flash_message_success', 'Post has been deleted');

                //redirect page
                return redirect(route('posts.index'));
            }
        } else {
            Session::flash('flash_message_error', ' '.$userRow->name.', You are not authorize to delete the post of others.');

            // redirect back
            return redirect()->back();
        }
    }

    public function multipleDestroy(Request $request)
    {
        /*return "It works";*/

        $posts = Post::findOrFail($request['checkBoxArray']);

        foreach ($posts as $post) {
            $post->delete();
        }

        // session message
        Session::flash('flash_message_success', 'Multiple posts deleted succesfully.');

        // redirect back
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyPostImage($id)
    {
        // get the row record of current user.
        $userRow = Auth::user();
        // get the row record of post table by ID parametes.
        $postRow = Post::findOrFail($id);

        // check if I get the right data.
        /* dd('User ID '.$userRow->id .' AND '. ' Author ID '. $postRow->user->id); */

        // if current user id == to user id of post table. Proceed to deleting post record and image.
        if ($userRow->id == $postRow->user->id) {
            if (!empty($id)) {
                // row post record in row by id
                /*$row = Post::where(['id' => $id])->first();*/
                $row = Post::whereId($id)->first();
                /*echo $row->post_image; die;*/

                // get post image path
                $large_image_path = 'uploads/posts/large/';
                $medium_image_path = 'uploads/posts/medium/';
                $small_image_path = 'uploads/posts/small/';
                $thumbnail_image_path = 'uploads/posts/thumbnail/';

                // delete large image if exists in folder
                if (file_exists($large_image_path.$row->post_image)) {
                    unlink($large_image_path.$row->post_image);
                }
                // delete medium image if exists in folder
                if (file_exists($medium_image_path.$row->post_image)) {
                    unlink($medium_image_path.$row->post_image);
                }
                // delete small image if exists in folder
                if (file_exists($small_image_path.$row->post_image)) {
                    unlink($small_image_path.$row->post_image);
                }
                // delete thumbnail image if exists in folder
                if (file_exists($thumbnail_image_path.$row->post_image)) {
                    unlink($thumbnail_image_path.$row->post_image);
                }

                // delete image from posts table
                /* Post::where(['id'=>$id])->update(['post_image'=>'']); */
                Post::whereId($id)->update(['post_image' => '']);

                // session message
                Session::flash('flash_message_success', 'Post Image has been deleted succesfuly. Choose another one because post image must not be empty.');

                // redirect back
                return redirect()->back();
            }
        } else {
            Session::flash('flash_message_error', ' '.$userRow->name.', You are not authorize to delete the post of others.');

            // redirect back
            return redirect()->back();
        }
    }
}
