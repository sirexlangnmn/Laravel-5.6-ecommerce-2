<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; 
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth; 
use App\User;
use App\UserProfile;
use App\Role;
use avatar;
use Session;

class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $roles = Role::pluck('role_title', 'id')->All();
        return view('backend_views.modules.users.editUserProfile', compact('user', 'roles'));
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
        if($request->isMethod('POST') && !empty($request))
        {
            // check if data can receive. dd means die and dump.
            /* dd($request->All()); */

            // validate the user
            $request->validate([
                'avatar' => 'image|dimensions:min_width=550, max_width=650, min_height=550, max_height=650', 
                'contact' => 'required|string|min:6',
                'about' => 'required',
            ]);


            // if image is empty. Let it empty
            if(empty($request['new_avatar']))
            {
                $fileName = '';
            }
            else
            {
                $fileName = $request['new_avatar'];
            }


            if($request->has('password'))
            {
                $password = Hash::make($request['new_password']);
            }
            else
            {
                $password = $request['current_password'];
            }

        
            if($request->hasFile('new_avatar'))
            {
                $avatar_tmp = Input::file('new_avatar');
                
                if($avatar_tmp->isValid())
                {
        
                    $date = date("Y-m-d H-i-s");

                    $extension = $avatar_tmp->getClientOriginalExtension();
                    $fileNameRand = rand(111,99999).'.'.$extension;
                    $fileName =  $date . '_' . $fileNameRand;
                    

                    $medium_avatar_path = 'uploads/users/medium/'.$fileName; 
                    $thumbnail_avatar_path = 'uploads/users/thumbnail/'.$fileName;  


                    Image::make($avatar_tmp)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($medium_avatar_path);

                    Image::make($avatar_tmp)->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbnail_avatar_path);



                }

            }  
            else
            {
                $fileName = $request['current_avatar']; 
            }


            // get the logged in user. This is the user who editing the profile.
            $user = Auth::user();

            /*$user->userProfile->user_id = $user->id;*/
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $password;
            $user->userProfile->avatar = $fileName;
            $user->userProfile->contact = $request->contact;
            $user->userProfile->about = $request->about;

            $user->save();
            $user->userProfile->save();
            // session message
            /*$request->session()->flash('flash_message_success', 'User created successfully.');*/
            Session::flash('flash_message_success', 'User profile updated successfully.');

            // redirect
            return redirect()->back();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyUserImage($user_id)
    { 
        if(!empty($user_id))
        {

            // get user record in row by id
            $userRow = UserProfile::where(['user_id' => $user_id])->first();
            /*echo $userRow->avatar; die;*/

            // get user image path
            $medium_image_path = 'uploads/users/medium/';  
            $thumbnail_image_path = 'uploads/users/thumbnail/';

            // delete medium image if exists in folder
            if (file_exists($medium_image_path.$userRow->avatar)) {
                unlink($medium_image_path.$userRow->avatar);
            }
            // delete thumbnail image if exists in folder
            if (file_exists($thumbnail_image_path.$userRow->avatar)) {
                unlink($thumbnail_image_path.$userRow->avatar);
            }

            // delete image from users table
            UserProfile::where(['user_id'=>$user_id])->update(['avatar'=>'']);

            Session::flash('flash_message_success', 'User Image has been deleted successfully. Choose another one because user image must not be empty.');

            // redirect
            return redirect()->back();

        }
    }


}
