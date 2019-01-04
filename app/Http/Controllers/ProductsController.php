<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\Product;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $allProducts = Product::orderBy('created_at', 'ASC')->get(); */
        /* $allProducts = Product::orderBy('id', 'DESC')->get(); */
        $allProducts = Product::All();

        return view('backend_views.modules.products.index_page', compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row = new Product();

        return view('backend_views.modules.products.create_page', compact('row'));
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
            // check if data can receive. dd meand die and dump.
            /* dd($request->All()); */

            // validate the form
            $request->validate([
                'product_name' => 'required|string|max:255',
                'product_code' => 'required|string|max:255',
                'product_price' => 'required',
                'product_description' => 'required|string|max:255',
                'product_image' => 'image|required',
            ]);

            // if product status is empty, value = 0. Else, value = 1
            if (empty($request['product_status'])) {
                $product_status = 0;
            } else {
                $product_status = 1;
            }

            // direct upload image. Another method. But I preferred the next one
            /*
            if($request->hasFile('product_image')){
                $product_image = $request->product_image;
                $product_image->move('uploads', $product_image->getClientOriginalName());
            }
            */

            // I used date to concatinate to the image name
            $date = date('Y-m-d H-i-s');

            // upload the image. I preferred this upload method
            if ($request->hasFile('product_image')) {
                $image_tmp = Input::file('product_image');

                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileNameRand = rand(111, 99999).'.'.$extension;
                    $fileName = $date.'_'.$fileNameRand;

                    $large_image_path = 'uploads/products/large/'.$fileName;
                    $medium_image_path = 'uploads/products/medium/'.$fileName;
                    $small_image_path = 'uploads/products/small/'.$fileName;
                    $thumbnail_image_path = 'uploads/products/thumbnail/'.$fileName;

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(400, 600, function ($constraint) {
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
                    Image::make($image_tmp)->resize(400, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/
                }
            }

            // store the data in the database
            Product::create([
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'product_description' => $request->product_description,
                'product_status' => $product_status,
                'product_image' => $fileName,
            ]);

            //session message
            /*$request->session()->flash('flash_message_success', 'Product insert successfully');*/
            Session::flash('flash_message_success', 'Product insert successfully');

            //redirect page
            /*return redirect('admin/products/create');*/
            return redirect(route('products.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check if the id pass
        /* return $id;  */
        $row = Product::findOrFail($id);

        return view('backend_views.modules.products.show_page', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check if the id pass
        /* return $id;  */
        $row = Product::findOrFail($id);

        return view('backend_views.modules.products.edit_page', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product             $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('PUT') && !empty($id) && !empty($request)) {
            // check if data can receive. dd meand die and dump.
            /* dd($request->All()); */

            // validate the form
            $request->validate([
                'product_name' => 'required|string|max:255',
                'product_code' => 'required|string|max:255',
                'product_price' => 'required',
                'product_description' => 'required|string|max:255',
                /* 'product_image' => 'image|required' */
            ]);

            // if product status is empty, value = 0. Else, value = 1
            if (empty($request['product_status'])) {
                $product_status = 0;
            } else {
                $product_status = 1;
            }

            //upload files/image
            if ($request->hasFile('product_image')) {
                $image_tmp = Input::file('product_image');

                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999).'.'.$extension;
                    $large_image_path = 'uploads/products/large/'.$fileName;
                    $medium_image_path = 'uploads/products/medium/'.$fileName;
                    $small_image_path = 'uploads/products/small/'.$fileName;
                    $thumbnail_image_path = 'uploads/products/thumbnail/'.$fileName;

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(400, 600, function ($constraint) {
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
                    Image::make($image_tmp)->resize(400, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/
                }
            } else {
                $fileName = $request['current_image'];
            }

            // update the data in the database
            /* Product::where([ 'id' => $id ]) */
            Product::whereId($id)
            ->update([
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'product_description' => $request->product_description,
                'product_status' => $product_status,
                'product_image' => $fileName,
            ]);

            //session message
            /*$request->session()->flash('flash_message_success', 'Product updated successfully');*/
            Session::flash('flash_message_success', 'Product updated successfully');

            //redirect page
            return redirect(route('products.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyProductImage($id)
    {
        if (!empty($id)) {
            // get product record in row by id
            /* $productImage = Product::where(['id' => $id])->first(); */
            $productImage = Product::findOrFail($id);
            /*echo $productImage->product_image; die;*/

            // get product image path
            $large_image_path = 'uploads/products/large/';
            $medium_image_path = 'uploads/products/medium/';
            $small_image_path = 'uploads/products/small/';
            $thumbnail_image_path = 'uploads/products/thumbnail/';

            // delete large image if exists in folder
            if (file_exists($large_image_path.$productImage->product_image)) {
                unlink($large_image_path.$productImage->product_image);
            }
            // delete medium image if exists in folder
            if (file_exists($medium_image_path.$productImage->product_image)) {
                unlink($medium_image_path.$productImage->product_image);
            }
            // delete small image if exists in folder
            if (file_exists($small_image_path.$productImage->product_image)) {
                unlink($small_image_path.$productImage->product_image);
            }
            // delete thumbnail image if exists in folder
            if (file_exists($thumbnail_image_path.$productImage->product_image)) {
                unlink($thumbnail_image_path.$productImage->product_image);
            }

            // delete image from products table
            Product::where(['id' => $id])->update(['product_image' => '']);

            // session message
            Session::flash('flash_message_success', 'Product Image has been deleted succesfuly. Choose another one because product image must not be empty.');

            // redirect back
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!empty($id)) {
            // check if the id pass
            /* return $id; */

            // direct delete if without image
            /* $user = User::findOrFail( $id )->delete(); */

            // get product image name
            /* $productImage = Product::where(['id' => $id])->first(); */
            $productImage = Product::findOrFail($id);
            /*echo $productImage->product_image; die;*/

            // get product image path
            $large_image_path = 'uploads/products/large/';
            $medium_image_path = 'uploads/products/medium/';
            $small_image_path = 'uploads/products/small/';
            $thumbnail_image_path = 'uploads/products/thumbnail/';

            // delete large image if exists in folder
            if (file_exists($large_image_path.$productImage->product_image)) {
                unlink($large_image_path.$productImage->product_image);
            }
            // delete medium image if exists in folder
            if (file_exists($medium_image_path.$productImage->product_image)) {
                unlink($medium_image_path.$productImage->product_image);
            }
            // delete small image if exists in folder
            if (file_exists($small_image_path.$productImage->product_image)) {
                unlink($small_image_path.$productImage->product_image);
            }
            // delete thumbnail image if exists in folder
            if (file_exists($thumbnail_image_path.$productImage->product_image)) {
                unlink($thumbnail_image_path.$productImage->product_image);
            }

            // Delete the product record in database
            Product::destroy($id);

            //session message
            /*session()->flash('flash_message_success', 'Product has been deleted');*/
            Session::flash('flash_message_success', 'Product has been deleted');

            //redirect page
            return redirect(route('products.index'));
            /*return redirect('admin/products/create');*/
        }
    }
}
