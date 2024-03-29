<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()
            ->where('email', 'olehhovanet@gmail.com')
            ->first();

        if (!$user) {
            User::query()->create([
                'email' => 'olehhovanet@gmail.com',
                'name' => 'Oleh',
                'password' => bcrypt('klasjdflkajsdlf'),
                'is_admin' => true,
                'qr_token' => Str::random(60),
            ]);
        }

        $user = User::query()
            ->where('email', 'ms.tomilovich@gmail.com')
            ->first();

        if (!$user) {
            User::query()->create([
                'email' => 'ms.tomilovich@gmail.com',
                'name' => 'Sanya',
                'password' => bcrypt('qwerty'),
                'is_admin' => true,
                'qr_token' => Str::random(60),
            ]);
        }
    }
}
