<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Two users by default
        factory(User::class)->create([
           'name' => 'Jon Doe',
           'email' => 'jon@example.com',
        ]);
        factory(User::class)->create([
            'name' => 'Marie Doe',
            'email' => 'marie@example.com',
        ]);
         $this->call(AppointmentSeeder::class);
    }
}
