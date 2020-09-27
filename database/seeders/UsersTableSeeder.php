<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    $users = [
        0 => [
            'name' => 'Futball-Club Bayern München',
            'email' => 'bayern@gmail.com', 
            'password' => 'bayerm2020',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
         1 => [
            'name' => 'Real Madrid Club de Fútbol',
            'email' => 'realmadrid@gmail.com',
            'password' => 'realmadrid2020',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),],
         2 => [
             'name' => 'Futbol Club Barcelona',
             'email' => 'barcelona@gmail.com',
             'password' => 'barcelona2020',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],

         3 => [
             'name' => 'Associazione Calcio Milan',
             'email' => 'milan@gmail.com', 
             'password' => 'milan2020',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],

         4 => [
             'name' => 'Juventus Football Club',
             'email' => 'juventus@gmail.com', 
             'password' => 'juventus2020', 
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],

         5 => [
             'name' => 'Sport Club do Recife',
             'email' => 'sport@gmail.com', 
             'password' => 'sport2020',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
    ];
    User::insert($users);
    }
}
