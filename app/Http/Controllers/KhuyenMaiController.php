<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhuyenMaiRequest;
use Illuminate\Http\Request;
use App\Models\Khuyenmai;
use Illuminate\Support\Facades\Auth;
class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id==2){
            $khuyenmai = Khuyenmai::all();
            $khuyenmai->load('products');
            return view('admin.khuyenmai.list',['khuyenmai' => $khuyenmai]);
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
        return view('admin.khuyenmai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KhuyenMaiRequest $request)
    {
        $khuyenmai = $request->input('price_khuyenmai');
        $data = [
            'price_khuyenmai' => $khuyenmai,
        ];
        Khuyenmai::create($data);
        
        return redirect()->route('khuyenmai.index')
            ->with('success','Khuyenmai has been created successfully.');
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
    public function edit(Khuyenmai $Khuyenmai)
    {
        return view('admin.Khuyenmai.edit', compact('Khuyenmai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KhuyenMaiRequest $request, Khuyenmai $Khuyenmai)
    {
        $price_khuyenmai = $request->input('price_khuyenmai');
        $Khuyenmai->fill([
            'price_khuyenmai' => $price_khuyenmai,
        ])->save();
        return redirect()->route('khuyenmai.index')
            ->with('success', 'Khuyến Mại update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Khuyenmai $Khuyenmai)
    {
        $Khuyenmai->delete();
        return redirect()->route('khuyenmai.index')
        ->with('success', 'Delete Khuyen Mai successfully');
    }
}