<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create();
        factory(\App\User::class)->make([
            'matricula' => '530629700',
            'nome' => 'Diego Cerqueira',
            'email' => 'diego@unigranrio.com',
            'curso_id' => 1,
        ])->save();
    }
}
