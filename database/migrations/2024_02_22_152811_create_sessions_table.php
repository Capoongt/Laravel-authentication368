<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //สร้างตารางใน DB ที่ชื้อ sessions ตารางบันทึกข้อมูลเข้าเวป http://127.0.0.1:8000/dashboard
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); //ป็นคอลัมน์ที่ใช้เก็บรหัสของผู้ใช้ (User ID)
            $table->string('ip_address', 45)->nullable(); //เป็นคอลัมน์ที่ใช้เก็บที่อยู่ IP ของผู้ใช้ที่เชื่อมต่อเข้าสู่ระบบ
            $table->text('user_agent')->nullable(); // เป็นคอลัมน์ที่ใช้เก็บข้อมูลเกี่ยวกับ User Agent ของเบราว์เซอร์หรือแอปพลิเคชันที่ผู้ใช้ใช้ในการเข้าถึง
            $table->longText('payload'); //ตัวแปรหรือค่าที่ต้องการจะเก็บไว้ระหว่างเซสชัน
            $table->integer('last_activity')->index(); //เป็นคอลัมน์ที่ใช้เก็บเวลาล่าสุดที่มีการใช้งานของเซสชัน
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
