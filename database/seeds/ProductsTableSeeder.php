<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $titlesArr = [
            ['ru' => 'Дуб белый', 'uk' => 'Дуб білий', 'en' => 'White oak', 'pl' => 'Biały dąb'],
            ['ru' => 'Ясень белый', 'uk' => 'Ясень білий', 'en' => 'Ash white', 'pl' => 'Jesion biały'],
            ['ru' => 'Ясень выбеленый', 'uk' => 'Ясень вибілений', 'en' => 'Ash bleached', 'pl' => 'Jesion bielony'],
            ['ru' => 'Дуб выбеленый', 'uk' => 'Дуб білений', 'en' => 'Oak bleached', 'pl' => 'Dąb bielony'],
            ['ru' => 'Дуб натуральный', 'uk' => 'Дуб натуральний', 'en' => 'Natural oak', 'pl' => 'Naturalny dąb'],
            ['ru' => 'Дуб виктория', 'uk' => 'Дуб вікторія', 'en' => 'Oak Victory', 'pl' => 'Dąb Victory'],
            ['ru' => 'Дуб патина', 'uk' => 'Дуб патина', 'en' => 'Oak patina', 'pl' => 'Dąb patyna'],
            ['ru' => 'Ясень натуральный', 'uk' => 'Ясень натуральний', 'en' => 'Natural ash', 'pl' => 'Jesion naturalne'],
            ['ru' => 'Дуб антик', 'uk' => 'Дуб антик', 'en' => 'Oak antique', 'pl' => 'Dąb antyczny'],
            ['ru' => 'Дуб силки', 'uk' => 'Дуб сильця', 'en' => 'Oak snares', 'pl' => 'Oak sidła'],
            ['ru' => 'Сапеле', 'uk' => 'Сапеле', 'en' => 'Sapele', 'pl' => 'Sapele'],
            ['ru' => 'Орех гранд', 'uk' => 'Горіх гранд', 'en' => 'Walnut grand', 'pl' => 'Orzech wielki'],
            ['ru' => 'Каштан', 'uk' => 'Каштан', 'en' => 'Chestnut', 'pl' => 'Kasztan'],
            ['ru' => 'Дуб рустикальный',  'uk' => 'Дуб рустикальний', 'en' => 'Oak rustic', 'pl' => 'Dąb rustykalny'],
            ['ru' => 'Орех', 'uk' => 'Горіх', 'en' => 'Nut', 'pl' => 'Nakrętka'],
            ['ru' => 'Венге', 'uk' => 'Венге', 'en' => 'Wenge', 'pl' => 'Wenge'],
            ['ru' => 'Венге темный', 'uk' => 'Венге темний', 'en' => 'Dark wenge', 'pl' => 'Ciemne wenge'],
            ['ru' => 'Орех темный', 'uk' => 'Горіх темний', 'en' => 'Walnut dark', 'pl' => 'Orzech ciemny'],
            ['ru' => 'Дуб черный', 'uk' => 'Дуб чорний', 'en' => 'Black oak', 'pl' => 'Dąb czarny'],
            ['ru' => 'Капри', 'uk' => 'Капрі', 'en' => 'Capri', 'pl' => 'Capri'],
            ['ru' => 'Белый глянец', 'uk' => 'Білий глянець', 'en' => 'White gloss', 'pl' => 'Biały połysk'],
            ['ru' => 'Белый глянец "волна"', 'uk' => 'Білий глянець "хвиля"', 'en' => 'White gloss "wave"', 'pl' => 'Biały połysk "fali"'],
        ];
        $descriptionsArr = [
            'ru' => 'На финишном этапе облицовки пола паркетом и паркетной доской принято устанавливать деревянный плинтус. Он подбирается в соответствии с общим цвета покрытия и имеет такой же непревзойденный внешний вид. Однако при этом отличается еще и высокой ценой. Хорошей альтернативой может быть плинтус шпонированный, который имеет тот же дизайн, но более низкую стоимость.',
            'uk' => 'На фінішному етапі облицювання підлоги паркетом і паркетною дошкою прийнято встановлювати дерев\'яний плінтус. Він підбирається відповідно до загального кольору покриття і має такий же неперевершений зовнішній вигляд. Однак при цьому відрізняється ще й високою ціною. Хорошою альтернативою може бути плінтус шпонований, який має той же дизайн, але нижчу вартість.',
            'en' => 'At the final stage facing parquet floor and floorboard decided to install a wooden plinth. He was selected in accordance with the general color of the coating and has the same unsurpassed appearance. However, it differs more and high cost. A good alternative can be veneered plinth, which has the same design, but a lower cost.',
            'pl' => 'W końcowym etapie skierowaną parkiet i deski postanowił zainstalować Cokół drewniany. Został wybrany zgodnie z ogólną kolor powłoki i ma tę samą niespotykaną wygląd. Jednakże różnią się więcej i wysokie koszty. Dobrą alternatywą może być fornirowane cokół, który ma taką samą konstrukcję, ale niższy koszt.',
        ];

        for ($i = 0; $i <= 21; $i++) {
            $product = new Product();
            $product->enabled = true;
            $product->in_stock = true;
            $product->is_new = ($i <= 19) ? false : true;
            $product->save();

            foreach (['ru', 'uk', 'en', 'pl'] as $lang) {
                $product->translateOrNew($lang)->title = $titlesArr[$i][$lang];
                $product->translateOrNew($lang)->description = $descriptionsArr[$lang];
            }
            $product->save();
        }
    }
}
