<?php

namespace Database\Seeders;

use App\Models\item;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::Create([
            'name' => 'Muhammad Aldy Pratama',
            'username' => 'aldyPratama',
            'nama_mitra' => "PT Abadi Sampah",
            'alamat' => 'Jl. Dipatiukur No 113 A, kec Citerep, Cimahi Utara',
            'email' => 'aldy@gmail.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        Item::create([
            'item_name' => 'Botol Kaca',
            'category' => 'Botol / Cup'
        ]);
        Item::create([
            'item_name' => 'Botol Plastik',
            'category' => 'Botol / Cup'
        ]);
        Item::create([
            'item_name' => 'Cup',
            'category' => 'Botol / Cup'
        ]);
        Item::create([
            'item_name' => 'Karton Susu',
            'category' => 'Karton Susu'
        ]);
        Item::create([
            'item_name' => 'Kardus Besar',
            'category' => 'Kardus'
        ]);
        Item::create([
            'item_name' => 'Kardus Sedang',
            'category' => 'Kardus'
        ]);
        Item::create([
            'item_name' => 'Kardus Kecil',
            'category' => 'Kardus'
        ]);
    }
}
