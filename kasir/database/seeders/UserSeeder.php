<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'toko_id' => 0,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'admin',
        ]);
        User::create([
            'toko_id' => 1,
            'username' => 'manajer1toko1',
            'email' => 'manajer1toko1@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'manajer',
        ]);
        User::create([
            'toko_id' => 1,
            'username' => 'kasir1toko1',
            'email' => 'kasir1toko1@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'kasir',
        ]);
        User::create([
            'toko_id' => 2,
            'username' => 'manajer1toko2',
            'email' => 'manajer1toko2@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'manajer',
        ]);
        User::create([
            'toko_id' => 2,
            'username' => 'kasir1toko2',
            'email' => 'kasir1toko2@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'kasir',
        ]);
        User::create([
            'toko_id' => 3,
            'username' => 'manajer1toko3',
            'email' => 'manajer1toko3@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'manajer',
        ]);
        User::create([
            'toko_id' => 3,
            'username' => 'kasir1toko3',
            'email' => 'kasir1toko3@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'alamat' => fake()->address(),
            'access_level' => 'kasir',
        ]);
    }
}
