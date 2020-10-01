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
                'email' => 'cristiano@gmail.com',
                'number' => '081992765185',
                'nationality' => 'Português', 
                'age' => ' 37',
                'position' => 'ponta',
                'description' => 'Cristiano Ronaldo dos Santos Aveiro é um futebolista português que atua como extremo-esquerdo ou ponta de lança. Atualmente joga pela Juventus e pela Seleção Portuguesa.',
                'user_id' => '5',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
             1 => [
                'name' => 'Lionel Andrés Messi Cuccittini ',
                'email' => 'messi@gmail.com',
                'number' => '081998777458',
                'nationality' => 'Argentino', 
                'age' => '35',
                'position' => 'atacante',
                'description' => 'Lionel Andrés Messi Cuccittini é um futebolista argentino que atua como atacante. Atualmente joga pelo Barcelona e pela Seleção Argentina, onde é capitão por ambos. Messi é frequentemente considerado o melhor jogador do mundo e é amplamente considerado um dos melhores jogadores de todos os tempos.',
                'user_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
             2 => [
                'name' => 'Neymar da Silva Santos Júnior',
                'email' => 'neymar@gmail.com',
                'number' => '081993452627',
                'nationality' => 'Brasileiro', 
                'age' => '27',
                'position' => 'atacante',
                'description' => 'Neymar da Silva Santos Júnior, mais conhecido como Neymar ou Neymar Jr. é um futebolista brasileiro que atua como atacante. Atualmente joga pelo Paris Saint-Germain e pela Seleção Brasileira. É considerado o principal futebolista brasileiro da atualidade e um dos melhores futebolistas do mundo.',
                'user_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
    
             3 => [
                'name' => 'Alessandro Beti Rosa',
                'email' => 'magrao@gmail.com',
                'number' => '081986754432',
                'nationality' => 'Brasileiro', 
                'age' => '40',
                'position' => 'goleiro',
                'description' => 'Alessandro Beti Rosa, mais conhecido como Magrão, é um ex-futebolista brasileiro que atuava como goleiro. Com 732 jogos disputados e 10 títulos conquistados pelo Sport, é considerado por muitos como o maior ídolo da história do Leão da Ilha.',
                'user_id' => '6',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
    
             4 => [
                'name' => 'Toni Kroos',
                'email' => 'tony@gmail.com',
                'number' => '081976859475',
                'nationality' => 'Alemão', 
                'age' => ' 32',
                'position' => 'atacante',
                'description' => 'Toni Kroos é um futebolista alemão que atua como meio-campista. Atualmente joga pelo Real Madrid.',
                'user_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],

                5 => [
                    'name' => 'Robin van Persie',
                    'email' => 'vanpersie@gmail.com',
                    'number' => '081992764256',
                    'nationality' => 'Holandês', 
                    'age' => '42',
                    'position' => 'atacante',
                    'description' => 'Robin van Persie é um ex-futebolista holandês que atuava como atacante. Ídolo do Arsenal, chegou ao clube londrino em maio de 2004 e, ainda no início de sua carreira, não criou grandes expectativas nos torcedores.',
                    'user_id' => '5',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")],
            ];
        Players::insert($players);
        }
    
    }

