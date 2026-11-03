<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Sino Tib products from the March 6 photos in the "Tugallangan videolar" group.
     * Photos live in database/seeders/images/products and are copied to the public
     * disk, so the store shows them via asset('storage/products/...').
     *
     * Run: php artisan db:seed --class=ProductSeeder (safe to re-run).
     */
    public function run(): void
    {
        $category = Category::firstOrCreate(
            ['name_uz' => 'Tabiiy dorilar'],
            ['name_ru' => 'Натуральные средства', 'name_en' => 'Natural remedies']
        );

        foreach ($this->products() as $data) {
            $image = $data['image'];
            unset($data['image']);

            Storage::disk('public')->put(
                "products/{$image}",
                file_get_contents(__DIR__ . "/images/products/{$image}")
            );

            Product::updateOrCreate(
                ['name_uz' => $data['name_uz']],
                $data + [
                    'category_id' => $category->id,
                    'country_uz' => "O'zbekiston",
                    'country_ru' => 'Узбекистан',
                    'country_en' => 'Uzbekistan',
                    'image1' => "products/{$image}",
                    'count' => 100,
                ]
            );
        }
    }

    private function products(): array
    {
        return [
            [
                'name_uz' => 'Buqoq dorisi',
                'name_ru' => 'Средство от зоба',
                'name_en' => 'Goiter remedy',
                'description_uz' => "Ichki va tashqi bo'qoqlarni so'rishda hamda bo'qoqning zaharli turlarini davolashda, bo'qoqning yurak va boshqa a'zolarga o'tkazadigan salbiy ta'sirida, shuningdek onkologik o'simta va bezlarni so'rdirishda ishlatiladi. "
                    . "Ishlatish qoidasi: kuniga 2 mahal 2 tadan kapsula 200 gr iliq suv bilan ichiladi. "
                    . "Eslatma: achchiq, sho'r yeguliklar va gazlangan ichimliklardan parhez qilinadi. "
                    . "Davolanish muddati: 3 oydan 6 oygacha, holatga qarab uzaytirish mumkin. 90 ta kapsula, 100% tabiiy.",
                'description_ru' => 'Применяется для рассасывания внутреннего и наружного зоба и при лечении токсических форм зоба, при негативном влиянии зоба на сердце и другие органы, а также для рассасывания онкологических опухолей и узлов. '
                    . 'Способ применения: 2 раза в день по 2 капсулы, запивая 200 мл тёплой воды. '
                    . 'Примечание: исключить острую, солёную пищу и газированные напитки. '
                    . 'Курс лечения: от 3 до 6 месяцев, при необходимости можно продлить. 90 капсул, 100% натуральный продукт.',
                'description_en' => 'Used to help resolve internal and external goiter, in treating toxic forms of goiter and the negative effects of goiter on the heart and other organs, and to help shrink tumors and nodules. '
                    . 'How to use: 2 capsules twice a day with 200 ml of warm water. '
                    . 'Note: avoid spicy and salty food and carbonated drinks. '
                    . 'Course: 3 to 6 months, may be extended depending on the condition. 90 capsules, 100% natural.',
                'price' => 200000,
                'image' => 'buqoq-dorisi.jpg',
            ],
            [
                'name_uz' => 'Oshqozon dorisi',
                'name_ru' => 'Средство для желудка',
                'name_en' => 'Stomach remedy',
                'description_uz' => "Oshqozon-ichak, 12 barmoqli ichak yaralari hamda ichki va tashqi gemorroy uchun talqon dori. "
                    . "Ishlatish qoidasi: kuniga 2 mahal ertalab va kechqurun och qoringa 2 tadan kapsula 200 gr iliq suv bilan ichiladi. "
                    . "Eslatma: achchiq, sho'r yeguliklar va gazlangan ichimliklardan parhez qilinadi. "
                    . "Davolanish muddati: holatga qarab 3–6 oygacha uzaytirish mumkin. 90 ta kapsula, 100% tabiiy.",
                'description_ru' => 'Порошковое средство при язвах желудка, кишечника и двенадцатиперстной кишки, а также при внутреннем и наружном геморрое. '
                    . 'Способ применения: 2 раза в день, утром и вечером натощак, по 2 капсулы, запивая 200 мл тёплой воды. '
                    . 'Примечание: исключить острую, солёную пищу и газированные напитки. '
                    . 'Курс лечения: в зависимости от состояния можно продлить до 3–6 месяцев. 90 капсул, 100% натуральный продукт.',
                'description_en' => 'Powder remedy for stomach, intestinal and duodenal ulcers, as well as internal and external hemorrhoids. '
                    . 'How to use: 2 capsules twice a day, morning and evening on an empty stomach, with 200 ml of warm water. '
                    . 'Note: avoid spicy and salty food and carbonated drinks. '
                    . 'Course: may be extended to 3–6 months depending on the condition. 90 capsules, 100% natural.',
                'price' => 200000,
                'image' => 'oshqozon-dorisi.jpg',
            ],
            [
                'name_uz' => 'Gemorroy dorisi',
                'name_ru' => 'Средство от геморроя',
                'name_en' => 'Hemorrhoid remedy',
                'description_uz' => "Ayollar va erkaklardagi to'g'ri ichak yallig'lanishlarida, og'riqlardan xalos etishda, ichki va tashqi bavosil kasalligini davolashda yordam beradi. "
                    . "Ishlatish qoidasi: kuniga 2 mahal ertalab va kechqurun och qoringa 2 tadan kapsula 200 gr iliq suv bilan ichiladi. "
                    . "Eslatma: achchiq, sho'r yeguliklar va gazlangan ichimliklardan parhez qilinadi. "
                    . "Davolanish muddati: 3–6 oygacha uzaytirish mumkin. 90 ta kapsula, 100% tabiiy.",
                'description_ru' => 'Помогает при воспалениях прямой кишки у женщин и мужчин, снимает боль, помогает в лечении внутреннего и наружного геморроя. '
                    . 'Способ применения: 2 раза в день, утром и вечером натощак, по 2 капсулы, запивая 200 мл тёплой воды. '
                    . 'Примечание: исключить острую, солёную пищу и газированные напитки. '
                    . 'Курс лечения: можно продлить до 3–6 месяцев. 90 капсул, 100% натуральный продукт.',
                'description_en' => 'Helps with rectal inflammation in women and men, relieves pain and helps treat internal and external hemorrhoids. '
                    . 'How to use: 2 capsules twice a day, morning and evening on an empty stomach, with 200 ml of warm water. '
                    . 'Note: avoid spicy and salty food and carbonated drinks. '
                    . 'Course: may be extended to 3–6 months. 90 capsules, 100% natural.',
                'price' => 200000,
                'image' => 'gemorroy-dorisi.jpg',
            ],
            [
                // No written description was sent; text is taken from the jar label.
                'name_uz' => 'Detoks klen',
                'name_ru' => 'Детокс клен',
                'name_en' => 'Detoks klen',
                'description_uz' => "Buyrak damlamasi. "
                    . "Eslatma: qon bosimi past bemorlar 1 osh qoshiq maydalangan novvot solib ichishlari mumkin. Achchiq, sho'r narsalar va muzdak gazlangan ichimliklardan parhez qilinadi. "
                    . "Davolanish muddati: holatga qarab 3–6 oygacha uzaytirish mumkin.",
                'description_ru' => 'Почечный травяной сбор (заварка). '
                    . 'Примечание: больным с пониженным давлением можно добавлять 1 столовую ложку измельчённого навата. Исключить острое, солёное и холодные газированные напитки. '
                    . 'Курс лечения: в зависимости от состояния можно продлить до 3–6 месяцев.',
                'description_en' => 'Herbal kidney infusion. '
                    . 'Note: people with low blood pressure may add 1 tablespoon of crushed navat (crystal sugar). Avoid spicy and salty food and cold carbonated drinks. '
                    . 'Course: may be extended to 3–6 months depending on the condition.',
                'price' => 250000,
                'image' => 'detoks-klen.jpg',
            ],
            [
                // No written description or price was sent; text is taken from the jar label.
                'name_uz' => 'Herbo Prostat',
                'name_ru' => 'Хербо Простат',
                'name_en' => 'Herbo Prostat',
                'description_uz' => "Prostat damlamasi. "
                    . "Eslatma: qon bosimi past bemorlar 1 osh qoshiq maydalangan novvot solib ichishlari mumkin. Sut, qatiq, achchiq, sho'r narsalar va muzdak gazlangan ichimliklardan parhez qilinadi. "
                    . "Davolanish muddati: holatga qarab 3–6 oygacha uzaytirish mumkin.",
                'description_ru' => 'Травяной сбор (заварка) для простаты. '
                    . 'Примечание: больным с пониженным давлением можно добавлять 1 столовую ложку измельчённого навата. Исключить молоко, кефир, острое, солёное и холодные газированные напитки. '
                    . 'Курс лечения: в зависимости от состояния можно продлить до 3–6 месяцев.',
                'description_en' => 'Herbal prostate infusion. '
                    . 'Note: people with low blood pressure may add 1 tablespoon of crushed navat (crystal sugar). Avoid milk, yogurt, spicy and salty food and cold carbonated drinks. '
                    . 'Course: may be extended to 3–6 months depending on the condition.',
                'price' => 0,
                'image' => 'herbo-prostat.jpg',
            ],
        ];
    }
}
