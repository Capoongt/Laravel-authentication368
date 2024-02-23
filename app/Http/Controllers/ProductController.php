<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // คำสั่งนี้ใช้สำหรับดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูลโดยใช้โมเดล Product และเก็บไว้ในตัวแปร $products
        // return view('dashboard',compact('products'));
        return response()->json([$products]);
        //สร้าง JSON จากข้อมูลที่ดึงมา โดยใส่ข้อมูล $products ลงใน JSON จากนั้นส่งข้อมูลกลับไปยังผู้ใช้
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
