<?php
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();    //คือการสุ่มรายชื้อลูกค้ามา10 คน เพื่อเพิ่มลงไปในตาราง User
        \App\Models\Product::factory(20)->create();  //คือการสุ่มรายชื้อลูกค้ามา20 คน เพื่อเพิ่มลงไปในตาราง product
        //\App\Models\User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}


