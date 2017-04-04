<?php

use Illuminate\Database\Seeder;
use App\Section;
use \Orchestra\Support\Facades\Memory;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::truncate();

        // Главная секция
        $main = new Section();
        $main->slug = 'main';
        $main->save();

        $main->translateOrNew('ru')->properties = json_encode([
            'title' => 'Diplinth - производитель деревянного<br>шпонированного плинтуса из Украины',
            'under_title_text' => 'Мы производим высококачественный продукт, используя лучшее сырьё и <br>материалы от украинских и европейских производителей.',
            'form_title' => 'Оформить заявку',
        ]);
        $main->translateOrNew('uk')->properties = json_encode([
            'title' => 'Diplinth - виробник дерев\'яного<br>шпонованого плінтуса з України',
            'under_title_text' => 'Ми виробляємо високоякісний продукт, використовуючи найкращий сировину і <br>матеріали від українських і європейських виробників.',
            'form_title' => 'Оформити заявку',
        ]);
        $main->translateOrNew('en')->properties = json_encode([
            'title' => 'Diplinth - manufacturer of wood<br>veneer skirting from Ukraine',
            'under_title_text' => 'We produce high quality products using the best raw materials <br> from the Ukrainian and European manufacturers.',
            'form_title' => 'Make a request',
        ]);
        $main->translateOrNew('pl')->properties = json_encode([
            'title' => 'Diplinth - producent okleiny<br>drewniane listwy z Ukrainy',
            'under_title_text' => 'Zajmujemy się produkcją wysokiej jakości produktów przy użyciu <br> najlepszych surowców z ukraińskich i europejskich producentów.',
            'form_title' => 'Złóż wniosek',
        ]);
        $main->save();

        $about = new Section();
        $about->slug = 'about';
        $about->save();

        $about->translateOrNew('ru')->properties = json_encode([
            'title'         => 'О нас',
            'block_1_text'  => 'При производстве мы используем срощенную сосну, которую окутываем натуральным или fine-line шпоном.',
            'block_2_text'  => 'Мы используем натуральный шпон дуба, ясеня, красного дерева. Затем заготовка покрывается несколькими слоями полиуретанового лака производства Италии.',
            'block_3_text'  => 'Плинтус, представленный в нашей коллекции, имеет прямой профиль и подходит под любой интерьер. Высота плинтуса: 60 мм, <br>80 мм и 100 мм. <br> Длинна: 2200 мм. <br> Толщина: 18 мм.',
            'block_4_text'  => 'Цветовая гамма составляет более 20 оттенков и постоянно пополняется новыми декорами. Возможно изготовление необходимого Вам цвета под заказ.',
            'parallax_text' => 'Выбирайте из более чем <span class="color-green">20 различных оттенков</span> плинтуса или мы изготовим плинтус необходимого вам цвета на заказ.'
        ]);
        $about->translateOrNew('uk')->properties = json_encode([
            'title'         => 'Про нас',
            'block_1_text'  => 'При виробництві ми використовуємо зрощену сосну, яку вкутуємо натуральним або fine-line шпоном.',
            'block_2_text'  => 'Ми використовуємо натуральний шпон дуба, ясеня, червоного дерева. Потім заготовка покривається декількома шарами поліуретанового лаку виробництва Італії.',
            'block_3_text'  => 'Плінтус, представлений в нашій колекції, має прямий профіль і підходить під будь-який інтер\'єр. Висота плінтуса: 60 мм, <br> 80 мм і 100 мм. <br> Довжина: 2200 мм. <br> Товщина: 18 мм.',
            'block_4_text'  => 'Кольорова гамма становить понад 20 відтінків і постійно поповнюється новими декорами. Можливо виготовлення необхідного Вам кольору під замовлення.',
            'parallax_text' => 'Вибирайте з більш ніж <span class="color-green">20 різних відтінків</span> плінтуса або ми виготовимо плінтус необхідного вам кольору на замовлення.'
        ]);
        $about->translateOrNew('en')->properties = json_encode([
            'title'         => 'About',
            'block_1_text'  => 'In the production we use spliced pine that surrounds the natural or fine-line veneer.',
            'block_2_text'  => 'We use natural veneer oak, ash, mahogany. Then the workpiece is covered with several layers of polyurethane varnish produced in Italy.',
            'block_3_text'  => 'Plinth, represented in our collection, has a straight profile and fits into any interior. The height of the skirting board 60 mm, <br> 80 mm and 100 mm. <br> Length: 2200 mm. <br> thickness: 18 mm.',
            'block_4_text'  => 'The color scheme is more than 20 colors and is constantly updated with new decor. Possible to produce the desired color you order.',
            'parallax_text' => 'Choose from more than <span class="color-green">20 different shades</span> plinth or we will make you a plinth required colors available on request.'
        ]);
        $about->translateOrNew('pl')->properties = json_encode([
            'title'         => 'O nas',
            'block_1_text'  => 'W produkcji używamy sosny łączonej, która otacza okleiną naturalną lub fine-line.',
            'block_2_text'  => 'Używamy okleina naturalna dąb, jesion, mahoń. Następnie obrabiany przedmiot jest pokryta kilkoma warstwami lakieru poliuretanowego wytwarzanego we Włoszech.',
            'block_3_text'  => 'Cokół, reprezentowany w naszej kolekcji, ma prosty profil i pasuje do każdego wnętrza. Wysokość cokołu 60 mm, 80 mm i 100 mm. Długość: 2200 mm. Największa grubość: 18 mm.',
            'block_4_text'  => 'Kolorystyka jest ponad 20 kolorów i jest stale aktualizowana o nowe dekoracje. Możliwa do uzyskania żądanego koloru zamówienia.',
            'parallax_text' => 'Wybieraj spośród ponad <span class="color-green">20 różnych odcieniach</span> cokole albo zrobimy ci cokole wymagane kolory dostępne na życzenie.'
        ]);
        $about->save();

        $contacts = new Section();
        $contacts->slug = 'contacts';
        $contacts->specs = json_encode([
            'email' => 'diplinth@ukr.net',
            'web_site' => 'diplinth.com.ua',
            'map_marker_position' => [
                'lat' => 50.4424284,
                'lng' => 30.6321976,
            ],
        ]);
        $contacts->save();

        $contacts->translateOrNew('ru')->properties = json_encode([
            'title'             => 'Контакты',
            'under_title_text'  => 'Вы всегда сможете связаться с нами по одному из телефонов ниже,<br>электронной почте или написать нам сообщение прямо с сайта.',
            'address'           => 'Украина, Киев',
            'tel_1'             => '+38 050-381-77-27',
            'tel_2'             => '+38 067-381-77-27',
            'tel_3'             => '',
            'collaboration'     => '',
        ]);

        $contacts->translateOrNew('uk')->properties = json_encode([
            'title'             => 'Контакти',
            'under_title_text'  => 'Ви завжди зможете зв\'язатися з нами по одному з телефонів нижче, <br> електронній пошті або написати нам повідомлення прямо з сайту.',
            'address'           => 'Україна, Київ',
            'tel_1'             => '+38 050-381-77-27',
            'tel_2'             => '+38 067-381-77-27',
            'tel_3'             => '',
            'collaboration'     => '',
        ]);

        $contacts->translateOrNew('en')->properties = json_encode([
            'title'             => 'Contacts',
            'under_title_text'  => 'You can always contact us through one of the phone numbers below, <br> e-mail or send us a message directly from the site.',
            'address'           => 'Ukraine, Kiev',
            'tel_1'             => '+38 050-381-77-27',
            'tel_2'             => '+38 067-381-77-27',
            'tel_3'             => '',
            'collaboration'     => '',
        ]);

        $contacts->translateOrNew('pl')->properties = json_encode([
            'title'             => 'Kontakt',
            'under_title_text'  => 'Zawsze możesz skontaktować się z nami za pośrednictwem jednego z poniższych numerów telefonów, <br>e-mail lub wysłać do nas wiadomość bezpośrednio ze strony.',
            'address'           => 'Ukraina, Kijów',
            'tel_1'             => '+38 050-381-77-27',
            'tel_2'             => '+38 067-381-77-27',
            'tel_3'             => '',
            'collaboration'     => '',
        ]);
        $contacts->save();

        Memory::put('orders_form_email', 'diplinth@ukr.net');
        Memory::put('contacts_form_email', 'diplinth@ukr.net');

        // Подсекция "Крепления плинтуса"
        $fixing = new Section();
        $fixing->slug = 'fixing';
        $fixing->specs = json_encode([
            'block_1_icon' => 'icon-wrench',
            'block_2_icon' => 'icon-check',
            'block_3_icon' => 'icon-diamond',
        ]);
        $fixing->save();

        $fixing->translateOrNew('ru')->properties = json_encode([
            'title'             => 'Крепление плинтуса',
            'under_title_text'  => 'Для монтажа плинтуса компания DiPlinth разработала специальные крепления',
            'block_1' => [
                'title' => 'Простой монтаж',
                'text' => 'Установка производится с помощью саморезов',
            ],
            'block_2' => [
                'title' => 'Надёжность конструкции',
                'text' => 'Материал крепежей очень прочный и стойкий к коррозии',
            ],
            'block_3' => [
                'title' => 'Универсальность',
                'text' => 'Благодаря использованию данного крепежа вам не нужно заботиться о степени ровности стен',
            ],
        ]);
        $fixing->translateOrNew('uk')->properties = json_encode([
            'title'             => 'Кріплення плинтуса',
            'under_title_text'  => 'Для монтажу плінтуса компанія DiPlinth розробила спеціальні кріплення',
            'block_1' => [
                'title' => 'Простий монтаж',
                'text' => 'Установка проводиться за допомогою саморізів',
            ],
            'block_2' => [
                'title' => 'Надійність конструкції',
                'text' => 'Матеріал кріплень дуже міцний і стійкий до корозії',
            ],
            'block_3' => [
                'title' => 'Універсальність',
                'text' => 'Завдяки використанню даного кріплення вам не потрібно піклуватися про ступінь рівності стін',
            ],
        ]);
        $fixing->translateOrNew('en')->properties = json_encode([
            'title'             => 'Fixing the plinth',
            'under_title_text'  => 'For mounting plinth DiPlinth company has developed a special attachment',
            'block_1' => [
                'title' => 'Easy installation',
                'text' => 'Installation is made with self-tapping screws',
            ],
            'block_2' => [
                'title' => 'Reliability design',
                'text' => 'Fastener material is very durable and resistant to corrosion',
            ],
            'block_3' => [
                'title' => 'Versatility',
                'text' => 'Through the use of fasteners you need not worry about the smoothness of the walls',
            ],
        ]);
        $fixing->translateOrNew('pl')->properties = json_encode([
            'title'             => 'Cokół montażowy',
            'under_title_text'  => 'Do montażu firmę cokół DiPlinth opracowała specjalną nasadkę',
            'block_1' => [
                'title' => 'Prosty instalacja',
                'text' => 'Instalacja wykonana jest za pomocą wkrętów samogwintujących',
            ],
            'block_2' => [
                'title' => 'Konstrukcja niezawodność',
                'text' => 'Materiał mocujący jest bardzo trwałe i odporne na korozję',
            ],
            'block_3' => [
                'title' => 'Wszechstronność',
                'text' => 'Poprzez zastosowanie łączników nie musisz się martwić o gładkości ścian',
            ],
        ]);
        $fixing->save();
    }
}
