<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Company;
use App\Services\FileUploadService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \DB::table('products')->get();
        return view('index', [
            'companies' => Company::all(),
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'companies' => Company::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 商品追加処理
    public function store(ProductRequest $request, FileUploadService $service)
    {
        // //画像投稿処理
        if (isset($img_path)) {
            $file_name = $request->file('img_path')->getClientOriginalName();
            $path = $request->img_path->storeAs('public/images', $file_name);
            $save_path = str_replace('public/images/', '', $path);
        } else {
            $save_path = "";
        }

        Product::create([
            'user_id' => \Auth::user()->id,
            'product_name' => $request->product_name,
            'comment' => $request->comment,
            'price' => $request->price,
            'stock' => $request->stock,
            'img_path' => $save_path,
            'company_id' => $request->company,
        ]);

        return redirect()->route('index', \Auth::user());
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
}
