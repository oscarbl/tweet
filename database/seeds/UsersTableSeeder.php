<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CReammos un usuario
        User::create([
            'name' => 'Juan',
            'email' => 'hola@programacionanonymas.com',
            'password' => 'bcrypt'('12345678')
        ]);

        factory(User::class,10)->create();
    }

    

}
