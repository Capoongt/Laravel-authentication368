<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word, // สร้างรหัสสินค้าที่ไม่ซ้ำกันแบบสุ่ม
            'name' => $this->faker->name, // สร้างชื่อสินค้าแบบสุ่ม
            'description' => $this->faker->sentence, // สร้างคำอธิบายสินค้าแบบสุ่ม
            'price' => $this->faker->randomFloat(2, 10, 1000), // สร้างราคาสินค้าแบบสุ่ม
            'quantity' => $this->faker->numberBetween(1, 100), // สร้างจำนวนสินค้าที่มีในคลังแบบสุ่ม
            'updated_at' => now(), // กำหนดวันที่และเวลาของการอัปเดตข้อมูลเป็นปัจจุบัน
            'created_at' => now(), // กำหนดวันที่และเวลาของการสร้างข้อมูลเป็นปัจจุบัน
        ];
    }

}
