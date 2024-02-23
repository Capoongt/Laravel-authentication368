<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //สร้างตารางใน DB ที่ชื้อ products
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // กำหนดหมายเลย id
            $table->string('code')->unique(); // รหัสสินค้าเป็น unique
            $table->string('name'); // ชื่อสินค้า
            $table->text('description'); // รายละเอียดสินค้า
            $table->decimal('price', 8, 2); // ราคาสินค้า เลขจุดทศนิยม 8 ตำแหน่ง 2 ตำแหน่ง
            $table->integer('quantity'); // จำนวนสินค้า
            $table->timestamps(); // วันที่สร้างและอัปเดต
            $table->integer('stock')->nullable(); // ปริมาณสินค้าที่มีอยู่ในสต็อก

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); //
    }
}
