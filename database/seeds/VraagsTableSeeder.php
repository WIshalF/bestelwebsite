<?php

use Illuminate\Database\Seeder;

class VraagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vraag::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Vraag::class)->make());
    });
}};
