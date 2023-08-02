<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Khuyenmai;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id==2){
            $product = Product::all();
            $product->load('category','khuyenmai');
            return view('admin.product.list',['product' => $product]);
        }
        else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $khuyenmai = Khuyenmai::get();
        return view('admin.product.create',['category' => $category , 'khuyenmai' => $khuyenmai]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $name_product = $request->input('name_product');
        $description = $request->input('description');
        $price = $request->input('price');
        $soluong = $request->input('soluong');
        $category_id = $request->input('category_id');
        $khuyenmai_id = $request->input('khuyenmai_id');
        
        $img = $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('public/images', $img);

        $data = [
            'name_product' => $name_product,
            'description' => $description,
            'price' => $price,
            'soluong' => $soluong,
            'category_id' => $category_id,
            'img' => $img,
            'khuyenmai_id' => $khuyenmai_id,
        ];
        Product::create($data);
        return redirect()->route('product.index')
        ->with('success','Product has been created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::get();
        $khuyenmai = Khuyenmai::get();
        $product->load('category','khuyenmai');
        return view('admin.product.edit',compact('product'),['category' => $category , 'khuyenmai' => $khuyenmai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $Product)
    {
        $name_product = $request->input('name_product');
        $description = $request->input('description');
        $price = $request->input('price');
        $soluong = $request->input('soluong');
        $category_id = $request->input('category_id');
        $khuyenmai_id = $request->input('khuyenmai_id');
        
        $Product->fill([
            'name_product' => $name_product,
            'description' => $description,
            'price' => $price,
            'soluong' => $soluong,
            'category_id' => $category_id,
            'khuyenmai_id' => $khuyenmai_id,
            ])->save();
            if ($request->file('img') !== null) {
                $img = $request->file('img')->getClientOriginalName(); //lay ten file
                $request->file('img')->storeAs('public/images', $img); //luu file vao duong dan public/images voi ten $logo
            
                $Product->fill([
                    'img' => $img,
                ])->save();
            }
            
            return redirect()->route('product.index')
            ->with('success', 'Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->route('product.index')
        ->with('success', 'Delete Product  successfully');
    }
}