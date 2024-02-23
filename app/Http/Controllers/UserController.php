<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       // ตรวจสอบข้อมูลที่ส่งมา Login : email, password, device_name
        $request->validate([
            'email' => 'required|email', //ตรวงสอบอีเมล
            'password' => 'required', //ตรวจสอลรหัส
            'device_name' => 'required', // ตรวจสอบชื่อ
        ]);

        // ค้นหา user ในฐานข้อมูล  เป็นการคนหาข้อมูลใน email ใน user
        $user = User::where('email', $request->email)->first();

        // ตรวจสอบ ถ้าไม่มี user ให้แจ้งค้ดด้านบนเป็นการตรวจสอบข้อมูลการเข้าสู่ระบบ
        //ถ้าไม่มีผู้ใช้หรือรหัสผ่านไม่ตรงกัน จะเกิดการโยกย้าย (throw) ข้อผิดพลาดและสร้าง ValidationException ที่มีข้อความว่า
        //"The provided credentials are incorrect." โดยผู้ใช้จะได้รับการแจ้งเตือนว่าข้อมูลการเข้าสู่ระบบที่ให้มาไม่ถูกต้อง
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);

        }

        // สร้าง Token และเก็บไว้ในฐานข้อมูลและเข้ารหัส Hash Token คือการเก็บข้อมูลที่หน้า login ลงไปยังหน้าโทรเค่น
        return $user->createToken($request->device_name)->plainTextToken;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user){

        return $user->tokens()->delete(); //เป็นคำสั่งเป็นการลบ Token ทั้งหมดของผู้ใช้งานนั้น
    }
}
