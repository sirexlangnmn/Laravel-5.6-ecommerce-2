<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use Image;
use App\Product;
use App\ProductAlternativeImage;
use Session;


class ProductAlternativeImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$row = Product::with('productImages')->where(['id'=>$id])->first();*/
        
        /*$row = Product::findOrFail($id);

        return view('backend_views.modules.products.alternative_images', compact('row'));*/
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
        if($request->isMethod('POST'))
        {
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            if($request->hasFile('prod_alt_image'))
            {
                $files=$request->file('prod_alt_image');
                /*echo "<pre>"; print_r($files); die;*/

                foreach ($files as $file) {

                    // I used date to concatinate to the image name
                    $date = date("Y-m-d H-i-s");

                    $extension = $file->getClientOriginalExtension();
                    $fileNameRand = rand(111,99999).'.'.$extension;
                    $fileName =  $date . '_' .$fileNameRand;
                      
                    $large_image_path = 'uploads/products/large/'.$fileName;
                    $medium_image_path = 'uploads/products/medium/'.$fileName;  
                    $thumbnail_image_path = 'uploads/products/thumbnail/'.$fileName;  

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($file)->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($file)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($medium_image_path);

                    Image::make($file)->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbnail_image_path);

                    // Stretch the image to be fit to your declared dimension
                    /*Image::make($file)->resize(1200, 1200)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);*/

                    // store the data in the database
                    ProductAlternativeImage::create([
                        'product_id' => $request->product_id,
                        'prod_alt_image' => $fileName
                    ]);
                }
                
            }

            Session::flash('flash_message_success', 'Product alternative images insert successfully.');

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
        $row = Product::with('productAlternativeImages')->whereId($id)->first();
        return view('backend_views.modules.products.alternative_images', compact('row'));
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
}
