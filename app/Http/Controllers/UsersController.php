<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; // for uploading files files
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use App\Role;
use App\Order;
use Image;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users = User::orderBy('id', 'DESC')->get();*/
        $users = User::All();

        return view('backend_views.modules.users.index_page', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row = new User();
        $roles = Role::pluck('role_title', 'id')->All();

        return view('backend_views.modules.users.create_page', compact('row', 'roles'));
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
            // check if data can receive. dd means die and dump.
            /* dd($request->All()); */

            // validate the user
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'role_id' => 'required',
            ]);

            // if status is empty, value = 0. Else, value = 1
            if (empty($request['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            // store data
            /* User::create($request->all()); */
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'role_id' => $request->role_id,
                'status' => $status,
            ]);

            // session message
            /*$request->session()->flash('flash_message_success', 'User created successfully.');*/
            Session::flash('flash_message_success', 'User created successfully.');

            // redirect
            return redirect(route('users.create'));
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
        $row = User::findOrFail($id);

        return view('backend_views.modules.users.showUserProfile', compact('row'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrderRecords($id)
    {
        if (!empty($id)) {
            /*return $id; die;*/
            $orders = Order::where(['user_id' => $id])->get();

            return view('backend_views.modules.users.showOrderRecords_page', compact('orders'));
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
        if (!empty($id)) {
            $row = User::findOrFail($id);
            $roles = Role::pluck('role_title', 'id')->All();

            return view('backend_views.modules.users.edit_page', compact('row', 'roles'));
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
    public function update(Request $request, $id)
    {
        if ($request->isMethod('PUT') && !empty($id) && !empty($request)) {
            // validate the user
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                /*'password' => 'required|string|min:6',*/
                'role_id' => 'required',
            ]);

            // if status is empty, value = 0. Else, value = 1
            if (empty($request['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            // if image is empty. Let it empty
            if (empty($request['image'])) {
                $fileName = '';
            } else {
                $fileName = $request['image'];
            }

            // upload the image. I preferred this upload method
            $date = date('Y-m-d H-i-s');

            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');

                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileNameRand = rand(111, 99999).'.'.$extension;
                    $fileName = $date.'_'.$fileNameRand;

                    $large_image_path = 'uploads/users/large/'.$fileName;
                    $medium_image_path = 'uploads/users/medium/'.$fileName;
                    $small_image_path = 'uploads/users/small/'.$fileName;
                    $thumbnail_image_path = 'uploads/users/thumbnail/'.$fileName;

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

                    // Stretch the image to be fit to your declared dimension
                    /*Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/
                }
            } else {
                $fileName = $request['current_image'];
            }

            // update the data in the database
            User::where(['id' => $id])
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                /*'password' => Hash::make($request['password']),*/
                'role_id' => $request->role_id,
                'status' => $status,
                'image' => $fileName,
            ]);

            // session message
            /*$request->session()->flash('flash_message_success', 'User updated successfully.');*/
            Session::flash('flash_message_success', 'User updated successfully.');

            // redirect
            return redirect(route('users.index'));
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
            // check if the id pass
            /* return $id; */

            // get post image name
            $row = User::whereId($id)->first();
            /*echo $row->userProfile->avatar; die;*/

            // getpost image path
            $large_image_path = 'uploads/users/large/';
            $medium_image_path = 'uploads/users/medium/';
            $small_image_path = 'uploads/users/small/';
            $thumbnail_image_path = 'uploads/users/thumbnail/';

            // delete large image if exists in folder
            if (file_exists($large_image_path.$row->userProfile->avatar)) {
                unlink($large_image_path.$row->userProfile->avatar);
            }
            // delete medium image if exists in folder
            if (file_exists($medium_image_path.$row->userProfile->avatar)) {
                unlink($medium_image_path.$row->userProfile->avatar);
            }
            // delete small image if exists in folder
            if (file_exists($small_image_path.$row->userProfile->avatar)) {
                unlink($small_image_path.$row->userProfile->avatar);
            }
            // delete thumbnail image if exists in folder
            if (file_exists($thumbnail_image_path.$row->userProfile->avatar)) {
                unlink($thumbnail_image_path.$row->userProfile->avatar);
            }

            // Delete the post record in database
            User::destroy($id);

            //session message
            /*session()->flash('flash_message_success', post has been deleted');*/
            Session::flash('flash_message_success', 'User record has been deleted');

            //redirect page
            return redirect(route('users.index'));
        }
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
