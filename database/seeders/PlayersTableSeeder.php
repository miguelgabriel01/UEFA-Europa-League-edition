<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Players;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            0 => [
                'name' => 'Cristiano Ronaldo dos Santos Aveiro',
                'nationality' => 'Português', 
                'age' => ' 37',
                'position' => 'ponta',
                'photo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwall.alphacoders.com%2Fbig.php%3Fi%3D408982%26lang%3DPortuguese&psig=AOvVaw1mS7A8qY3PR-wMr_hJVQOd&ust=1601261255564000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNj95KGpiOwCFQAAAAAdAAAAABAD',
                'user_id' => '5',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
             1 => [
                'name' => 'Lionel Andrés Messi Cuccittini ',
                'nationality' => 'Argentino', 
                'age' => '35',
                'position' => 'atacante',
                'photo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2F121quotes.com%2Flionel-messi-wallpaper%2F&psig=AOvVaw3qWRUTyjdEEdeEcmR_XkxC&ust=1601261466133000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNj2_PupiOwCFQAAAAAdAAAAABAD',
                'user_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
             2 => [
                'name' => 'Neymar da Silva Santos Júnior',
                'nationality' => 'Brasileiro', 
                'age' => '27',
                'position' => 'atacante',
                'photo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwallpaperaccess.com%2Fneymar-2020&psig=AOvVaw0fUZX4wHzjun9kELbZK5Ud&ust=1601261597265000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIjhrMCqiOwCFQAAAAAdAAAAABAD',
                'user_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
    
             3 => [
                'name' => 'Alessandro Beti Rosa',
                'nationality' => 'Brasileiro', 
                'age' => '40',
                'position' => 'goleiro',
                'photo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.noticiasaominuto.com.br%2Fesporte%2F385968%2Fmagrao-do-sport-recife-pega-30-penalti-e-supera-buffon-da-juventus&psig=AOvVaw13xT6LlY9-IrGntBj7Af3F&ust=1601261837440000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCICjuq2riOwCFQAAAAAdAAAAABAN',
                'user_id' => '6',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
    
             4 => [
                'name' => 'Toni Kroos',
                'nationality' => 'Alemão', 
                'age' => ' 32',
                'position' => 'atacante',
                'photo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwall.alphacoders.com%2Fbig.php%3Fi%3D860935%26lang%3DPortuguese&psig=AOvVaw0q-zHNILjRf3aQoOGHofMS&ust=1601262034758000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCOCduIysiOwCFQAAAAAdAAAAABAD',
                'user_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],

                5 => [
                    'name' => 'Robin van Persie',
                    'nationality' => 'Holandês', 
                    'age' => '42',
                    'position' => 'atacante',
                    'photo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwallhere.com%2Fen%2Fwallpaper%2F1009379&psig=AOvVaw0XVtJoJL4vlPQyL-oneHT0&ust=1601262171450000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPDOw9GsiOwCFQAAAAAdAAAAABAD',
                    'user_id' => '5',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
            ];
        Players::insert($players);
        }
    
    }

