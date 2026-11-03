<?php

/*
| Store products. This file is the source of truth: ProductSeeder writes it to the
| products table (matching by id) and images are served from public/images/products:
|   {slug}-1.jpg  studio photo (main)      {slug}-2.jpg  lifestyle photo
|   {slug}-3.jpg  original post photo      {slug}-banner.jpg  21:9 carousel banner
| Keep ids stable: carts and orders reference them.
*/

return [
    // t.me/Abdushukur_tabib/245 (also /235)
    [
        'id' => 1,
        'name_uz' => 'Erkak Immun 707',
        'name_ru' => 'Эркак Иммун 707',
        'name_en' => 'Erkak Immun 707',
        'description_uz' => "Sino Tib Erkak Immun 707 tabiiy asal va shifobaxsh giyohlar asosida tayyorlangan bo‘lib, erkaklar salomatligini qo‘llab-quvvatlash uchun tavsiya etiladi.\n\n"
            . "✨ Mahsulotning foydali jihatlari:\n"
            . "🛡️ Immunitetni mustahkamlashga yordam beradi.\n"
            . "⚡ Kundalik jismoniy va aqliy faollikni qo‘llab-quvvatlaydi.\n"
            . "🔥 Erkaklar quvvati va umumiy tonusni saqlashga ko‘maklashadi.\n"
            . "👨‍👩‍👦 Ota bo‘lishni rejalashtirayotgan erkaklar uchun reproduktiv salomatlikni qo‘llab-quvvatlashga yordam beradi.\n"
            . "🦴 Bo‘g‘im va mushaklardagi noqulayliklarni kamaytirish hamda organizmning tiklanish jarayonini qo‘llab-quvvatlaydi.",
        'description_ru' => "Sino Tib Erkak Immun 707 приготовлен на основе натурального мёда и целебных трав и рекомендуется для поддержки мужского здоровья.\n\n"
            . "✨ Полезные свойства:\n"
            . "🛡️ Помогает укрепить иммунитет.\n"
            . "⚡ Поддерживает ежедневную физическую и умственную активность.\n"
            . "🔥 Помогает сохранять мужскую силу и общий тонус.\n"
            . "👨‍👩‍👦 Помогает поддерживать репродуктивное здоровье мужчин, планирующих стать отцами.\n"
            . "🦴 Уменьшает дискомфорт в суставах и мышцах, поддерживает восстановление организма.",
        'description_en' => "Sino Tib Erkak Immun 707 is made from natural honey and medicinal herbs and is recommended to support men's health.\n\n"
            . "✨ Benefits:\n"
            . "🛡️ Helps strengthen immunity.\n"
            . "⚡ Supports daily physical and mental activity.\n"
            . "🔥 Helps maintain male vitality and overall tone.\n"
            . "👨‍👩‍👦 Helps support reproductive health for men planning to become fathers.\n"
            . "🦴 Eases joint and muscle discomfort and supports the body's recovery.",
        'price' => 350000,
        'slug' => 'erkak-immun-707',
        'carousel' => true,
    ],
    // t.me/Abdushukur_tabib/246
    [
        'id' => 2,
        'name_uz' => 'Erkak Immun 999',
        'name_ru' => 'Эркак Иммун 999',
        'name_en' => 'Erkak Immun 999',
        'description_uz' => "Erkaklar salomatligi va reproduktiv faoliyatini qo‘llab-quvvatlash uchun tabiiy giyohlar, asal va foydali komponentlar asosida tayyorlangan mahsulot.\n\n"
            . "✨ Erkak Immun 999:\n"
            . "💪 Organizmning umumiy holati, kuchi va quvvatini qo‘llab-quvvatlaydi\n"
            . "🧬 Spermatozoidlar soni, harakatchanligi va sifatini qo‘llab-quvvatlashga yordam beradi\n"
            . "🛡️ Immunitetni mustahkamlashga ko‘maklashadi\n"
            . "⚡ Umumiy tetiklik va erkaklik funksiyasini qo‘llab-quvvatlaydi\n"
            . "🌿 Tabiiy giyohlar va asal asosida tayyorlangan\n\n"
            . "👨‍👩‍👦 Farzandli bo‘lishni rejalashtirayotgan erkaklar uchun qo‘shimcha tabiiy vosita sifatida tavsiya etiladi.",
        'description_ru' => "Продукт на основе натуральных трав, мёда и полезных компонентов для поддержки мужского здоровья и репродуктивной функции.\n\n"
            . "✨ Erkak Immun 999:\n"
            . "💪 Поддерживает общее состояние организма, силу и энергию\n"
            . "🧬 Помогает поддерживать количество, подвижность и качество сперматозоидов\n"
            . "🛡️ Помогает укрепить иммунитет\n"
            . "⚡ Поддерживает общий тонус и мужскую функцию\n"
            . "🌿 Приготовлен на основе натуральных трав и мёда\n\n"
            . "👨‍👩‍👦 Рекомендуется как дополнительное натуральное средство для мужчин, планирующих детей.",
        'description_en' => "A product made from natural herbs, honey and beneficial ingredients to support men's health and reproductive function.\n\n"
            . "✨ Erkak Immun 999:\n"
            . "💪 Supports overall condition, strength and energy\n"
            . "🧬 Helps support sperm count, motility and quality\n"
            . "🛡️ Helps strengthen immunity\n"
            . "⚡ Supports overall vitality and male function\n"
            . "🌿 Made from natural herbs and honey\n\n"
            . "👨‍👩‍👦 Recommended as a supplementary natural remedy for men planning to have children.",
        'price' => 450000,
        'slug' => 'erkak-immun-999',
        'carousel' => true,
    ],
    // t.me/Abdushukur_tabib/233 (no price in the post)
    [
        'id' => 3,
        'name_uz' => 'Super Aktiv 777',
        'name_ru' => 'Супер Актив 777',
        'name_en' => 'Super Aktiv 777',
        'description_uz' => "Erkaklar salomatligini qo‘llab-quvvatlash uchun ishlab chiqilgan Sino Tib Super Aktiv 777.\n\n"
            . "✨ Mahsulotning afzalliklari:\n"
            . "⚡ Yuqori jismoniy energiyani qo‘llab-quvvatlaydi\n"
            . "💪 Mushaklar kuchi va bardoshliligini oshirishga yordam beradi\n"
            . "🔥 Erkaklik quvvati va umumiy tonusni qo‘llab-quvvatlaydi\n"
            . "🧬 Organizmni foydali oziq moddalar bilan ta’minlaydi\n"
            . "🌿 Tabiiy tarkib asosida tayyorlangan\n\n"
            . "O‘zingizni yanada tetik, kuchli va faol his qilishni istasangiz, tabiiy tanlovni tanlang.",
        'description_ru' => "Sino Tib Super Aktiv 777, разработанный для поддержки мужского здоровья.\n\n"
            . "✨ Преимущества:\n"
            . "⚡ Поддерживает высокую физическую энергию\n"
            . "💪 Помогает повысить силу и выносливость мышц\n"
            . "🔥 Поддерживает мужскую силу и общий тонус\n"
            . "🧬 Обеспечивает организм полезными питательными веществами\n"
            . "🌿 Приготовлен на натуральной основе\n\n"
            . "Если хотите чувствовать себя бодрее, сильнее и активнее, выбирайте натуральное.",
        'description_en' => "Sino Tib Super Aktiv 777, made to support men's health.\n\n"
            . "✨ Advantages:\n"
            . "⚡ Supports high physical energy\n"
            . "💪 Helps increase muscle strength and endurance\n"
            . "🔥 Supports male vitality and overall tone\n"
            . "🧬 Provides the body with useful nutrients\n"
            . "🌿 Made from natural ingredients\n\n"
            . "If you want to feel more energetic, stronger and active, choose the natural option.",
        'price' => 0,
        'slug' => 'super-aktiv-777',
    ],
    // t.me/Abdushukur_tabib/242
    [
        'id' => 4,
        'name_uz' => 'Ayol Immun',
        'name_ru' => 'Аёл Иммун',
        'name_en' => 'Ayol Immun',
        'description_uz' => "🌸 Ayollar salomatligi — oila baxtining asosi!\n\n"
            . "✨ Mahsulotning foydali jihatlari:\n"
            . "🛡️ Immunitetni mustahkamlashga yordam beradi.\n"
            . "🤧 Mavsumiy shamollash davrida organizmni qo‘llab-quvvatlaydi.\n"
            . "👩‍👧 Farzandli bo‘lishni rejalashtirayotgan ayollar uchun sog‘lom turmush tarziga qo‘shimcha sifatida tavsiya etiladi.\n"
            . "🩸 Organizmni zararli toksinlardan himoya qilishga va umumiy salomatlikni qo‘llab-quvvatlashga yordam beradi.\n"
            . "🦴 Yallig‘lanishlarni kamaytirish hamda bo‘g‘im va mushaklardagi noqulayliklarni yengillashtirishga ko‘maklashadi.\n\n"
            . "✅ 100% tabiiy tarkib\n"
            . "🍯 Asal va tabiiy giyohlar asosida tayyorlangan\n"
            . "🚫 Konservantlar qo‘shilmagan",
        'description_ru' => "🌸 Здоровье женщины — основа счастья семьи!\n\n"
            . "✨ Полезные свойства:\n"
            . "🛡️ Помогает укрепить иммунитет.\n"
            . "🤧 Поддерживает организм в сезон простуд.\n"
            . "👩‍👧 Рекомендуется как дополнение к здоровому образу жизни для женщин, планирующих детей.\n"
            . "🩸 Помогает защитить организм от вредных токсинов и поддерживает общее здоровье.\n"
            . "🦴 Помогает уменьшить воспаления и облегчить дискомфорт в суставах и мышцах.\n\n"
            . "✅ 100% натуральный состав\n"
            . "🍯 На основе мёда и натуральных трав\n"
            . "🚫 Без консервантов",
        'description_en' => "🌸 A woman's health is the foundation of a happy family!\n\n"
            . "✨ Benefits:\n"
            . "🛡️ Helps strengthen immunity.\n"
            . "🤧 Supports the body during the cold season.\n"
            . "👩‍👧 Recommended as part of a healthy lifestyle for women planning to have children.\n"
            . "🩸 Helps protect the body from harmful toxins and supports overall health.\n"
            . "🦴 Helps reduce inflammation and ease joint and muscle discomfort.\n\n"
            . "✅ 100% natural ingredients\n"
            . "🍯 Made from honey and natural herbs\n"
            . "🚫 No preservatives",
        'price' => 350000,
        'slug' => 'ayol-immun',
        'carousel' => true,
    ],
    // t.me/Abdushukur_tabib/244
    [
        'id' => 5,
        'name_uz' => 'Bolajon Immun 555',
        'name_ru' => 'Боложон Иммун 555',
        'name_en' => 'Bolajon Immun 555',
        'description_uz' => "Sino Tib Bolajon Immun 555 tabiiy asal va shifobaxsh giyohlar asosida tayyorlangan bo‘lib, bolalar organizmini qo‘llab-quvvatlash uchun tavsiya etiladi.\n\n"
            . "✨ Mahsulotning foydali jihatlari:\n"
            . "🛡️ Immunitetni mustahkamlashga yordam beradi.\n"
            . "🤧 Mavsumiy shamollash davrida organizmni qo‘llab-quvvatlaydi.\n"
            . "⚡ Bolaning kun davomida tetik va bardam bo‘lishiga ko‘maklashadi.\n"
            . "📈 Sog‘lom o‘sish va rivojlanishni qo‘llab-quvvatlaydi.\n"
            . "🧠 Diqqat jamlash va aqliy faollikni qo‘llab-quvvatlashga yordam beradi.\n\n"
            . "✅ 100% tabiiy tarkib\n"
            . "🍯 Asal va shifobaxsh giyohlar asosida tayyorlangan\n"
            . "🚫 Konservant va sun'iy qo‘shimchalarsiz",
        'description_ru' => "Sino Tib Bolajon Immun 555 приготовлен на основе натурального мёда и целебных трав и рекомендуется для поддержки детского организма.\n\n"
            . "✨ Полезные свойства:\n"
            . "🛡️ Помогает укрепить иммунитет.\n"
            . "🤧 Поддерживает организм в сезон простуд.\n"
            . "⚡ Помогает ребёнку быть бодрым весь день.\n"
            . "📈 Поддерживает здоровый рост и развитие.\n"
            . "🧠 Помогает поддерживать концентрацию внимания и умственную активность.\n\n"
            . "✅ 100% натуральный состав\n"
            . "🍯 На основе мёда и целебных трав\n"
            . "🚫 Без консервантов и искусственных добавок",
        'description_en' => "Sino Tib Bolajon Immun 555 is made from natural honey and medicinal herbs and is recommended to support children's health.\n\n"
            . "✨ Benefits:\n"
            . "🛡️ Helps strengthen immunity.\n"
            . "🤧 Supports the body during the cold season.\n"
            . "⚡ Helps the child stay active and energetic all day.\n"
            . "📈 Supports healthy growth and development.\n"
            . "🧠 Helps support focus and mental activity.\n\n"
            . "✅ 100% natural ingredients\n"
            . "🍯 Made from honey and medicinal herbs\n"
            . "🚫 No preservatives or artificial additives",
        'price' => 350000,
        'slug' => 'bolajon-immun-555',
        'carousel' => true,
    ],
    // t.me/Abdushukur_tabib/241
    [
        'id' => 6,
        'name_uz' => 'Tabon',
        'name_ru' => 'Табон',
        'name_en' => 'Tabon',
        'description_uz' => "Tabon — ayollar salomatligi uchun tabiiy ginekologik sham.\n\n"
            . "Tabon tabiiy giyohlar, asal va foydali yog‘lar asosida tayyorlangan bo‘lib, ayollar salomatligini qo‘llab-quvvatlash uchun tavsiya etiladi.\n\n"
            . "Qo‘llab-quvvatlashi mumkin:\n"
            . "• Jinsiy a'zolardagi yallig‘lanish va noqulayliklarni kamaytirish\n"
            . "• Qin (vajina) mushaklari tonusini tiklashga yordam berish\n"
            . "• Bachadon bo‘yni eroziyasining boshlang‘ich bosqichlarida qo‘shimcha vosita sifatida\n"
            . "• Sistit va ayrim ginekologik muammolarda organizmni qo‘llab-quvvatlash\n"
            . "• Homiladorlikni rejalashtirish davrida ayollar salomatligiga e'tibor qaratishda",
        'description_ru' => "Табон — натуральная гинекологическая свеча для женского здоровья.\n\n"
            . "Табон приготовлен на основе натуральных трав, мёда и полезных масел и рекомендуется для поддержки женского здоровья.\n\n"
            . "Может помочь:\n"
            . "• Уменьшить воспаление и дискомфорт половых органов\n"
            . "• Восстановить тонус мышц влагалища\n"
            . "• Как дополнительное средство на начальных стадиях эрозии шейки матки\n"
            . "• Поддержать организм при цистите и некоторых гинекологических проблемах\n"
            . "• Позаботиться о женском здоровье в период планирования беременности",
        'description_en' => "Tabon is a natural gynecological suppository for women's health.\n\n"
            . "Tabon is made from natural herbs, honey and beneficial oils and is recommended to support women's health.\n\n"
            . "It may help:\n"
            . "• Reduce inflammation and discomfort of the genital organs\n"
            . "• Restore vaginal muscle tone\n"
            . "• As a supplementary remedy in the early stages of cervical erosion\n"
            . "• Support the body with cystitis and some gynecological problems\n"
            . "• Care for women's health while planning a pregnancy",
        'price' => 350000,
        'slug' => 'tabon',
    ],
    // t.me/Abdushukur_tabib/250
    [
        'id' => 7,
        'name_uz' => 'Sinomum',
        'name_ru' => 'Синомум',
        'name_en' => 'Sinomum',
        'description_uz' => "SINOMUM — mumiyoli majun.\n\n"
            . "🧬 Tabiiy tarkib: shifobaxsh giyohlar, mumiyo va asal asosida tayyorlangan tabiiy mahsulot.\n\n"
            . "💪 Asosiy foydalari:\n"
            . "🦴 Suyak va bo‘g‘imlarni qo‘llab-quvvatlashga yordam beradi\n"
            . "🧘‍♂️ Bo‘g‘imlar harakatchanligini yaxshilashga ko‘maklashadi\n"
            . "⚡️ Organizmga kuch-quvvat beradi\n"
            . "🛡️ Immunitetni mustahkamlashga yordam beradi\n\n"
            . "🥄 Qabul qilish tartibi: kuniga 2 mahal, ertalab va kechqurun, ovqatdan 2 soat oldin 1 choy qoshiqdan.\n\n"
            . "📦 Hajmi: 500 gr",
        'description_ru' => "SINOMUM — маджун с мумиё.\n\n"
            . "🧬 Натуральный состав: продукт на основе целебных трав, мумиё и мёда.\n\n"
            . "💪 Основная польза:\n"
            . "🦴 Помогает поддерживать кости и суставы\n"
            . "🧘‍♂️ Помогает улучшить подвижность суставов\n"
            . "⚡️ Придаёт организму силу и энергию\n"
            . "🛡️ Помогает укрепить иммунитет\n\n"
            . "🥄 Способ применения: 2 раза в день, утром и вечером, за 2 часа до еды по 1 чайной ложке.\n\n"
            . "📦 Объём: 500 г",
        'description_en' => "SINOMUM — majun with mumiyo (shilajit).\n\n"
            . "🧬 Natural ingredients: made from medicinal herbs, mumiyo and honey.\n\n"
            . "💪 Main benefits:\n"
            . "🦴 Helps support bones and joints\n"
            . "🧘‍♂️ Helps improve joint mobility\n"
            . "⚡️ Gives the body strength and energy\n"
            . "🛡️ Helps strengthen immunity\n\n"
            . "🥄 How to take: 1 teaspoon twice a day, morning and evening, 2 hours before meals.\n\n"
            . "📦 Size: 500 g",
        'price' => 450000,
        'slug' => 'sinomum',
        'carousel' => true,
    ],
    // t.me/Abdushukur_tabib/248 (also /238); "Buyrak damlamasi" on the jar label
    [
        'id' => 8,
        'name_uz' => 'Detoks klen',
        'name_ru' => 'Детокс клен',
        'name_en' => 'Detoks klen',
        'description_uz' => "Sino Tib Buyrak Damlamasi — buyrak va ichki a’zolar salomatligi uchun shifobaxsh giyohlar to‘plami.\n\n"
            . "U qanday yordam beradi?\n"
            . "🫁 Buyrak, jigar, o‘t pufagi, qora taloq, siydik yo‘llari va qovuq bilan bog‘liq muammolarda qo‘llab-quvvatlaydi.\n"
            . "💎 Buyrak hamda o‘t yo‘llaridagi tuz, qum va toshlarni asta-sekin eritib, tanadan chiqarishga ko‘maklashadi.\n"
            . "🛡️ Shamollash va yallig‘lanish holatlarini kamaytirishga yordam beradi.\n"
            . "🧹 Jigarni yog‘ bosishi holatlarida jigarni tozalashga ko‘maklashadi.\n"
            . "🩸 Qonni suyultirishga va qon aylanishini yaxshilashga yordam beradi.\n"
            . "💧 Siydik yo‘llarini tozalaydi hamda siydik haydash jarayonini yaxshilaydi.\n\n"
            . "☕ Qo‘llanilishi: 1 choy qoshiq damlama kukunini 1 litr qaynoq suv solingan termosga soling. Ertalabdan kun davomida och qoringa, ovqatdan 1 soat oldin iching.\n"
            . "‼️ Davolanish davrida sut, qatiq, achchiq va sho‘r taomlar, sovuq gazli ichimliklardan tiyilish tavsiya etiladi.\n"
            . "Davolanish muddati: 3 oydan 6 oygacha.\n\n"
            . "🌿 100% tabiiy tarkib",
        'description_ru' => "Sino Tib — почечный травяной сбор (дамлама) для здоровья почек и внутренних органов.\n\n"
            . "Чем помогает?\n"
            . "🫁 Поддерживает при проблемах с почками, печенью, желчным пузырём, селезёнкой, мочевыводящими путями и мочевым пузырём.\n"
            . "💎 Помогает постепенно растворять и выводить соли, песок и камни из почек и желчных путей.\n"
            . "🛡️ Помогает уменьшить простудные и воспалительные состояния.\n"
            . "🧹 Помогает очищать печень при её ожирении.\n"
            . "🩸 Помогает разжижать кровь и улучшать кровообращение.\n"
            . "💧 Очищает мочевыводящие пути и улучшает мочеотделение.\n\n"
            . "☕ Применение: 1 чайную ложку сбора залить 1 литром кипятка в термосе. Пить в течение дня натощак, за 1 час до еды.\n"
            . "‼️ Во время лечения рекомендуется исключить молоко, кефир, острую и солёную пищу, холодные газированные напитки.\n"
            . "Курс лечения: от 3 до 6 месяцев.\n\n"
            . "🌿 100% натуральный состав",
        'description_en' => "Sino Tib kidney herbal infusion (damlama) for the health of the kidneys and internal organs.\n\n"
            . "How does it help?\n"
            . "🫁 Supports problems with the kidneys, liver, gallbladder, spleen, urinary tract and bladder.\n"
            . "💎 Helps gradually dissolve and remove salts, sand and stones from the kidneys and bile ducts.\n"
            . "🛡️ Helps reduce colds and inflammation.\n"
            . "🧹 Helps cleanse the liver in cases of fatty liver.\n"
            . "🩸 Helps thin the blood and improve circulation.\n"
            . "💧 Cleanses the urinary tract and improves urine flow.\n\n"
            . "☕ How to use: put 1 teaspoon of the herbal powder into a thermos with 1 liter of boiling water. Drink throughout the day on an empty stomach, 1 hour before meals.\n"
            . "‼️ During treatment avoid milk, yogurt, spicy and salty food and cold carbonated drinks.\n"
            . "Course: 3 to 6 months.\n\n"
            . "🌿 100% natural ingredients",
        'price' => 250000,
        'slug' => 'detoks-klen',
    ],
    // t.me/Abdushukur_tabib/247; "Prostatit damlamasi" in the post
    [
        'id' => 9,
        'name_uz' => 'Herbo Prostat',
        'name_ru' => 'Хербо Простат',
        'name_en' => 'Herbo Prostat',
        'description_uz' => "Sino Tib Prostatit Damlamasi — erkaklar salomatligi uchun tabiiy giyohlar asosidagi damlama.\n\n"
            . "U:\n"
            . "🌱 Prostata va siydik yo‘llaridagi noqulayliklarni kamaytirishga yordam beradi\n"
            . "💧 Siydik chiqarishdagi qiyinchilik va achishishni yengillashtirishga ko‘maklashadi\n"
            . "🛡️ Siydik yo‘llaridagi yallig‘lanish holatlarida qo‘llab-quvvatlovchi ta’sir ko‘rsatadi\n"
            . "🚻 Tez-tez hojatga chiqish kabi noqulayliklarni kamaytirishga yordam beradi\n"
            . "💪 Erkaklar siydik-tanosil tizimi salomatligini qo‘llab-quvvatlaydi\n\n"
            . "🌿 100% tabiiy tarkib. Kimyoviy qo‘shimchalarsiz, shifobaxsh o‘simliklar asosida tayyorlangan.",
        'description_ru' => "Sino Tib — травяной сбор (дамлама) от простатита на основе натуральных трав для мужского здоровья.\n\n"
            . "Он:\n"
            . "🌱 Помогает уменьшить дискомфорт в простате и мочевыводящих путях\n"
            . "💧 Помогает облегчить затруднённое мочеиспускание и жжение\n"
            . "🛡️ Оказывает поддерживающее действие при воспалении мочевыводящих путей\n"
            . "🚻 Помогает уменьшить частые позывы к мочеиспусканию\n"
            . "💪 Поддерживает здоровье мужской мочеполовой системы\n\n"
            . "🌿 100% натуральный состав. Без химических добавок, на основе целебных растений.",
        'description_en' => "Sino Tib prostatitis herbal infusion (damlama) made from natural herbs for men's health.\n\n"
            . "It:\n"
            . "🌱 Helps reduce discomfort in the prostate and urinary tract\n"
            . "💧 Helps ease difficult and burning urination\n"
            . "🛡️ Provides support in urinary tract inflammation\n"
            . "🚻 Helps reduce frequent urges to urinate\n"
            . "💪 Supports the health of the male genitourinary system\n\n"
            . "🌿 100% natural ingredients. No chemical additives, made from medicinal plants.",
        'price' => 250000,
        'slug' => 'herbo-prostat',
    ],
    // March 6 photos + March 9 texts in the "Tugallangan videolar" group
    [
        'id' => 10,
        'name_uz' => 'Buqoq dorisi',
        'name_ru' => 'Средство от зоба',
        'name_en' => 'Goiter remedy',
        'description_uz' => "Ichki va tashqi bo'qoqlarni so'rishda hamda bo'qoqning zaharli turlarini davolashda, bo'qoqning yurak va boshqa a'zolarga o'tkazadigan salbiy ta'sirida, shuningdek onkologik o'simta va bezlarni so'rdirishda ishlatiladi.\n\n"
            . "Ishlatish qoidasi: kuniga 2 mahal 2 tadan kapsula 200 gr iliq suv bilan ichiladi.\n"
            . "‼️ Eslatma: achchiq, sho'r yeguliklar va gazlangan ichimliklardan parhez qilinadi.\n"
            . "Davolanish muddati: 3 oydan 6 oygacha, holatga qarab uzaytirish mumkin.\n\n"
            . "90 ta kapsula, 100% tabiiy.",
        'description_ru' => "Применяется для рассасывания внутреннего и наружного зоба и при лечении токсических форм зоба, при негативном влиянии зоба на сердце и другие органы, а также для рассасывания онкологических опухолей и узлов.\n\n"
            . "Способ применения: 2 раза в день по 2 капсулы, запивая 200 мл тёплой воды.\n"
            . "‼️ Примечание: исключить острую, солёную пищу и газированные напитки.\n"
            . "Курс лечения: от 3 до 6 месяцев, при необходимости можно продлить.\n\n"
            . "90 капсул, 100% натуральный продукт.",
        'description_en' => "Used to help resolve internal and external goiter, in treating toxic forms of goiter and the negative effects of goiter on the heart and other organs, and to help shrink tumors and nodules.\n\n"
            . "How to use: 2 capsules twice a day with 200 ml of warm water.\n"
            . "‼️ Note: avoid spicy and salty food and carbonated drinks.\n"
            . "Course: 3 to 6 months, may be extended depending on the condition.\n\n"
            . "90 capsules, 100% natural.",
        'price' => 250000,
        'slug' => 'buqoq-dorisi',
    ],
    [
        'id' => 11,
        'name_uz' => 'Oshqozon dorisi',
        'name_ru' => 'Средство для желудка',
        'name_en' => 'Stomach remedy',
        'description_uz' => "Oshqozon-ichak, 12 barmoqli ichak yaralari hamda ichki va tashqi gemorroy uchun talqon dori.\n\n"
            . "Ishlatish qoidasi: kuniga 2 mahal ertalab va kechqurun och qoringa 2 tadan kapsula 200 gr iliq suv bilan ichiladi.\n"
            . "‼️ Eslatma: achchiq, sho'r yeguliklar va gazlangan ichimliklardan parhez qilinadi.\n"
            . "Davolanish muddati: holatga qarab 3–6 oygacha uzaytirish mumkin.\n\n"
            . "90 ta kapsula, 100% tabiiy.",
        'description_ru' => "Порошковое средство при язвах желудка, кишечника и двенадцатиперстной кишки, а также при внутреннем и наружном геморрое.\n\n"
            . "Способ применения: 2 раза в день, утром и вечером натощак, по 2 капсулы, запивая 200 мл тёплой воды.\n"
            . "‼️ Примечание: исключить острую, солёную пищу и газированные напитки.\n"
            . "Курс лечения: в зависимости от состояния можно продлить до 3–6 месяцев.\n\n"
            . "90 капсул, 100% натуральный продукт.",
        'description_en' => "Powder remedy for stomach, intestinal and duodenal ulcers, as well as internal and external hemorrhoids.\n\n"
            . "How to use: 2 capsules twice a day, morning and evening on an empty stomach, with 200 ml of warm water.\n"
            . "‼️ Note: avoid spicy and salty food and carbonated drinks.\n"
            . "Course: may be extended to 3–6 months depending on the condition.\n\n"
            . "90 capsules, 100% natural.",
        'price' => 250000,
        'slug' => 'oshqozon-dorisi',
    ],
    [
        'id' => 12,
        'name_uz' => 'Gemorroy dorisi',
        'name_ru' => 'Средство от геморроя',
        'name_en' => 'Hemorrhoid remedy',
        'description_uz' => "Ayollar va erkaklardagi to'g'ri ichak yallig'lanishlarida, og'riqlardan xalos etishda, ichki va tashqi bavosil kasalligini davolashda yordam beradi.\n\n"
            . "Ishlatish qoidasi: kuniga 2 mahal ertalab va kechqurun och qoringa 2 tadan kapsula 200 gr iliq suv bilan ichiladi.\n"
            . "‼️ Eslatma: achchiq, sho'r yeguliklar va gazlangan ichimliklardan parhez qilinadi.\n"
            . "Davolanish muddati: 3–6 oygacha uzaytirish mumkin.\n\n"
            . "90 ta kapsula, 100% tabiiy.",
        'description_ru' => "Помогает при воспалениях прямой кишки у женщин и мужчин, снимает боль, помогает в лечении внутреннего и наружного геморроя.\n\n"
            . "Способ применения: 2 раза в день, утром и вечером натощак, по 2 капсулы, запивая 200 мл тёплой воды.\n"
            . "‼️ Примечание: исключить острую, солёную пищу и газированные напитки.\n"
            . "Курс лечения: можно продлить до 3–6 месяцев.\n\n"
            . "90 капсул, 100% натуральный продукт.",
        'description_en' => "Helps with rectal inflammation in women and men, relieves pain and helps treat internal and external hemorrhoids.\n\n"
            . "How to use: 2 capsules twice a day, morning and evening on an empty stomach, with 200 ml of warm water.\n"
            . "‼️ Note: avoid spicy and salty food and carbonated drinks.\n"
            . "Course: may be extended to 3–6 months.\n\n"
            . "90 capsules, 100% natural.",
        'price' => 250000,
        'slug' => 'gemorroy-dorisi',
    ],
];
