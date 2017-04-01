<?php

use Illuminate\Database\Seeder;

class SeoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Memory::put('site.title_ru', 'DiPlinth | Купить деревянный плинтус в Киеве по выгодной цене, напольный плинтус лучшего качества');
        Memory::put('site.title_uk', 'DiPlinth | Купить дерев\'яний плінтус у Києві по вигідній вартості, підлоговий плінтус найкращої якості');
        Memory::put('site.title_en', 'DiPlinth | Buy a wooden plinth in Kiev at a bargain price');
        Memory::put('site.title_pl', 'DiPlinth | Kup Cokół drewniany w Kijowie w okazyjnej cenie');

        Memory::put('site.keywords_ru', 'плинтус, купить плинтус, плинтус цена, плинтус напольный, плинтус деревянный, плинтус деревянный купить, плинтус деревянный цена, плинтус деревянный цена украина, плинтус мдф купить киев, плинтус белый, плинтус сосновый киев');
        Memory::put('site.keywords_uk', 'плінтус, купити плінтус, плінтус ціна, плінтус підлоговий, плінтус дерев\'яний, плінтус дерев\'яний купити, плінтус дерев\'яний ціна, плінтус дерев\'яний ціна Україна, плінтус мдф купити київ, плінтус білий, плінтус сосновий київ');
        Memory::put('site.keywords_en', '');
        Memory::put('site.keywords_pl', '');

        Memory::put('site.description_ru', 'DiPlinth - производитель деревянного шпонированного плинтуса из Украины. Купить плинтус наилучшего качества в Киеве по низкой цене. Большая цветовая гамма или изготовление необходимого Вам цвета под заказ.');
        Memory::put('site.description_uk', 'DiPlinth - виробник дерев\'яного шпонированного плінтуса з України. Купити плінтус найкращої якості в Києві за низьку вартість. Велика колірна гамма або виготовлення необхідного Вам кольору під замовлення.');
        Memory::put('site.description_en', 'DiPlinth is a manufacturer of wood veneer skirting boards from Ukraine. Buy the best quality moldings in Kiev. A large range of colors or making the required color of your order.');
        Memory::put('site.description_pl', 'DiPlinth - producent oklein drewnianych listew przypodłogowych z Ukrainy. Kup najlepsze listwy jakości w Kijowie. Duża gama kolorystyczna oraz dokonując wymaganych kolor swojego zamówienia.');
    }
}
