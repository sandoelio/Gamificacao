<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->insert([
            [
                'question_text' => "Em que ano foi criado o basquete?\nA) 1891\nB) 1901\nC) 1911\nD) 1921",
                'answer_correct' => 'A',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quem é considerado o inventor do basquete?\nA) Larry Bird\nB) Michael Jordan\nC) James Naismith\nD) Magic Johnson",
                'answer_correct' => 'C',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é a altura oficial do aro da cesta de basquete?\nA) 2,75 metros\nB) 3,05 metros\nC) 3,25 metros\nD) 3,50 metros",
                'answer_correct' => 'B',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quantos jogadores de cada equipe ficam em quadra?\nA) 4\nB) 5\nC) 6\nD) 7",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é a duração de uma partida oficial de basquete da NBA?\nA) 4 períodos de 10 minutos\nB) 4 períodos de 12 minutos\nC) 2 tempos de 20 minutos\nD) 2 tempos de 25 minutos",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido como 'Air Jordan'?\nA) LeBron James\nB) Kobe Bryant\nC) Michael Jordan\nD) Shaquille O'Neal",
                'answer_correct' => 'C',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em que cidade o basquete foi inventado?\nA) Nova York\nB) Springfield\nC) Chicago\nD) Los Angeles",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o nome do campeonato profissional de basquete dos Estados Unidos?\nA) NFL\nB) MLB\nC) NBA\nD) NHL",
                'answer_correct' => 'C',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quantos pontos vale um arremesso feito além da linha de três pontos?\nA) 2 pontos\nB) 3 pontos\nC) 4 pontos\nD) 5 pontos",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual equipe venceu o primeiro campeonato da NBA?\nA) Boston Celtics\nB) Philadelphia Warriors\nC) Los Angeles Lakers\nD) Chicago Bulls",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quem é o maior pontuador da história da NBA?\nA) Kareem Abdul-Jabbar\nB) Michael Jordan\nC) LeBron James\nD) Kobe Bryant",
                'answer_correct' => 'A',
                'points' => 20,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é a violação chamada quando um jogador dá mais de dois passos sem quicar a bola?\nA) Dupla condução\nB) Andada\nC) Goaltending\nD) Falta técnica",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o tempo máximo que uma equipe tem para tentar um arremesso na NBA?\nA) 24 segundos\nB) 30 segundos\nC) 35 segundos\nD) 40 segundos",
                'answer_correct' => 'A',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido como 'King James'?\nA) James Harden\nB) LeBron James\nC) James Worthy\nD) James Naismith",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em que ano o basquete se tornou um esporte olímpico?\nA) 1936\nB) 1948\nC) 1952\nD) 1960",
                'answer_correct' => 'A',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é a penalidade para uma falta técnica (FIBA)?\nA) Dois lances livres e posse de bola\nB) Um lance livre e posse de bola\nC) Dois lances livres sem posse de bola\nD) Um lance livre sem posse de bola",
                'answer_correct' => 'A',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador detém o recorde de mais pontos em um único jogo da NBA?\nA) Michael Jordan\nB) Wilt Chamberlain\nC) Kobe Bryant\nD) LeBron James",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é a largura oficial de uma quadra de basquete (FIBA)?\nA) 15 metros\nB) 16 metros\nC) 17 metros\nD) 18 metros",
                'answer_correct' => 'A',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual equipe detém o maior número de títulos da NBA?\nA) Los Angeles Lakers\nB) Boston Celtics\nC) Chicago Bulls\nD) San Antonio Spurs",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quem foi o primeiro jogador estrangeiro a ser eleito MVP da NBA?\nA) Dirk Nowitzki\nB) Hakeem Olajuwon\nC) Steve Nash\nD) Yao Ming",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o nome do movimento em que o jogador gira sobre um pé mantendo o outro fixo no chão?\nA) Drible\nB) Arremesso\nC) Pivot\nD) Rebote",
                'answer_correct' => 'C',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quantos árbitros oficiais conduzem uma partida da NBA?\nA) 2\nB) 3\nC) 4\nD) 5",
                'answer_correct' => 'B',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido pelo apelido 'Black Mamba'?\nA) Michael Jordan\nB) LeBron James\nC) Kobe Bryant\nD) Allen Iverson",
                'answer_correct' => 'C',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é a distância da linha de três pontos em uma quadra da NBA (no topo)?\nA) 6,75 metros\nB) 7,24 metros\nC) 7,50 metros\nD) 8,00 metros",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em que ano o Dream Team original dos EUA competiu nas Olimpíadas?\nA) 1988\nB) 1992\nC) 1996\nD) 2000",
                'answer_correct' => 'B',
                'points' => 15,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido por popularizar o 'Skyhook'?\nA) Kareem Abdul-Jabbar\nB) Magic Johnson\nC) Larry Bird\nD) Shaquille ONeal",
                'answer_correct' => 'A',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o limite de faltas pessoais para um jogador antes de ser desqualificado na NBA?\nA) 5\nB) 6\nC) 7\nD) 8",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual equipe venceu o maior número de campeonatos consecutivos da NBA?\nA) Boston Celtics\nB) Chicago Bulls\nC) Los Angeles Lakers\nD) Golden State Warriors",
                'answer_correct' => 'A',
                'points' => 20,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quem foi o primeiro jogador a quebrar uma tabela durante uma partida da NBA?\nA) Shaquille ONeal\nB) Darryl Dawkins\nC) Shawn Kemp\nD) Dwight Howard",
                'answer_correct' => 'B',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em qual ano Michael Jordan conquistou seu primeiro título da NBA?\nA) 1988\nB) 1989\nC) 1991\nD) 1992",
                'answer_correct' => 'C',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido como 'The Answer'?\nA) Allen Iverson\nB) Tracy McGrady\nC) Vince Carter\nD) Paul Pierce",
                'answer_correct' => 'A',
                'points' => 10,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o nome do movimento em que o jogador bloqueia um arremesso do adversário?\nA) Rebote\nB) Toco\nC) Interceptação\nD) Desarme",
                'answer_correct' => 'B',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido como 'The Big Fundamental'?\nA) Tim Duncan\nB) Kevin Garnett\nC) Dirk Nowitzki\nD) Pau Gasol",
                'answer_correct' => 'A',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o nome do movimento em que o jogador passa a bola para um companheiro de equipe?\nA) Arremesso\nB) Drible\nC) Passe\nD) Rebote",
                'answer_correct' => 'C',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual jogador é conhecido como 'The Greek Freak'?\nA) Giannis Antetokounmpo\nB) Luka Doncic\nC) Kristaps Porzingis\nD) Nikola Jokic",
                'answer_correct' => 'A',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual é o nome do movimento em que o jogador recupera a posse de bola após um arremesso errado?\nA) Rebote\nB) Interceptação\nC) Desarme\nD) Toco",
                'answer_correct' => 'A',
                'points' => 5,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em uma partida de basquete o que significa essa sinalização do arbitro?\nA) Falta técnica\nB) Dois Pontos\nC) Falta de ataque\nD) Dois Lances",
                'answer_correct' => 'D',
                'points' => 20,
                'image' =>  base64_encode(file_get_contents(base_path('database/seeders/imagens/1.png'))),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em uma partida de basquete o que significa essa sinalização do arbitro?\nA) 11\nB) Um Lance\nC) Falta de ataque\nD) Dois Lances",
                'answer_correct' => 'A',
                'points' => 20,
                'image' =>  base64_encode(file_get_contents(base_path('database/seeders/imagens/2.png'))),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Em uma partida de basquete o que significa essa sinalização do arbitro?\nA) Falta técnica\nB) Carregou\nC) Dois Dribles\nD) Andou",
                'answer_correct' => 'C',
                'points' => 20,
                'image' =>  base64_encode(file_get_contents(base_path('database/seeders/imagens/3.png'))),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Qual o fundamento básico do basquete na cruzada?",
                'answer_correct' => 'Arremesso',
                'points' => 20,
                'image' =>  base64_encode(file_get_contents(base_path('database/seeders/imagens/4.png'))),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question_text' => "Quais as medidas oficiais da quadra de basquete?",
                'answer_correct' => '28x15',
                'points' => 20,
                'image' =>  base64_encode(file_get_contents(base_path('database/seeders/imagens/quadra.png'))),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ]);
    }
}
