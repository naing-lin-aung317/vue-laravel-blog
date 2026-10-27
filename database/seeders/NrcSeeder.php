<?php

namespace Database\Seeders;

use App\Models\Nrc;
use App\Models\User;
use Illuminate\Database\Seeder;

class NrcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->doesntHave('nrc')->each(function (User $user): void {
            Nrc::factory()->for($user)->create();
        });
    }
}
