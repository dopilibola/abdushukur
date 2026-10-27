<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{
    private $translations = [
        'en' => [
            'welcome' => "🌍 Welcome! Please choose your language:",
            'language_changed' => "✅ Language changed to English",
            'share_phone' => "📱 Please share your phone number:",
            'phone_button' => "📱 Share phone number",
            'orders_found' => "✅ Order Found!",
            'order_id' => "Order ID",
            'total' => "Total",
            'status' => "Status",
            'send_payment' => "📸 Please send payment screenshot",
            'no_orders' => "❌ No pending orders found for this phone number.",
            'payment_received' => "✅ Payment screenshot received! Waiting for admin confirmation...",
            'no_pending' => "❌ No pending orders found. Please create an order first or contact support.",
            'payment_approved' => "✅ Your payment has been approved!",
            'order_confirmed' => "Your order is confirmed and will be processed soon.",
            'payment_rejected' => "❌ Your payment was not approved.",
            'contact_support' => "Please contact support or try again with a valid payment.",
            'approved' => "approved",
            'rejected' => "rejected",
            'created' => "created",
            'menu_orders' => "📦 My Orders",
            'menu_language' => "🌍 Change Language",
            'menu_back' => "🔙 Back to Menu",
            'order_history' => "📦 Your Order History:",
            'no_history' => "📭 You don't have any orders yet.",
            'order_details' => "Order Details",
            'payment_method' => '💳 Choose the payment method',
            'humo' => "🏦 Humo (9860 1666 5364 4418)",
            'visa' => "💳 Visa (4738 7203 4457 8541)",
            'click' => "📱 Click (5614681626866978)",
            'product' => "Product",
            'price' => "Price",
            'menu_unpaid_orders' => 'Unpaid Orders',
            'no_unpaid_orders' => 'You have no unpaid orders.',
            'products' => 'Products',
            'subtotal' => 'Subtotal',
            'grand_total' => 'Grand Total',
            'pending_payment' => 'Pending payment',
            'delivery_fee_info' => 'Delivery fee: 50,000 sum for orders under 500,000 sum',
            'free_delivery_info' => 'Free delivery for orders 500,000 sum and above!',
            'abroad_contact' => 'If you are abroad, the admin will contact you',

        ],
        'ru' => [
            'welcome' => "🌍 Добро пожаловать! Пожалуйста, выберите язык:",
            'language_changed' => "✅ Язык изменен на Русский",
            'share_phone' => "📱 Пожалуйста, поделитесь своим номером телефона:",
            'phone_button' => "📱 Поделиться номером",
            'orders_found' => "✅ Заказ найден!",
            'order_id' => "ID заказа",
            'total' => "Итого",
            'status' => "Статус",
            'send_payment' => "📸 Пожалуйста, отправьте скриншот оплаты",
            'no_orders' => "❌ Не найдено ожидающих заказов для этого номера телефона.",
            'payment_received' => "✅ Скриншот оплаты получен! Ожидание подтверждения администратора...",
            'no_pending' => "❌ Ожидающих заказов не найдено. Пожалуйста, сначала создайте заказ или свяжитесь с поддержкой.",
            'payment_approved' => "✅ Ваш платеж одобрен!",
            'order_confirmed' => "Ваш заказ подтвержден и скоро будет обработан.",
            'payment_rejected' => "❌ Ваш платеж не был одобрен.",
            'contact_support' => "Пожалуйста, свяжитесь с поддержкой или попробуйте снова с действительным платежом.",
            'approved' => "одобрен",
            'rejected' => "отклонен",
            'created' => "создан",
            'menu_orders' => "📦 Мои Заказы",
            'menu_language' => "🌍 Изменить Язык",
            'menu_back' => "🔙 Назад в Меню",
            'order_history' => "📦 История Ваших Заказов:",
            'no_history' => "📭 У вас пока нет заказов.",
            'order_details' => "Детали Заказа",
            'payment_method' => "💳 Выберите способ оплаты:",
            'humo' => "🏦 Humo (9860 1666 5364 4418)",
            'visa' => "💳 Visa (4738 7203 4457 8541)",
            'click' => "📱 Click (5614681626866978)",
            'product' => "Продукт",
            'price' => "Цена",
            'menu_unpaid_orders' => 'Неоплаченные заказы',
            'no_unpaid_orders' => 'У вас нет неоплаченных заказов.',
            'products' => 'Продуктu',
            'subtotal' => 'Промежуточный итог',
            'grand_total' => 'Общая сумма',
            'pending_payment' => 'Ожидается оплата',
            'delivery_fee_info' => 'Стоимость доставки: 50,000 сум для заказов до 500,000 сум',
            'free_delivery_info' => 'Бесплатная доставка для заказов от 500,000 сум!',
            'abroad_contact' => 'Если вы находитесь за границей, администратор свяжется с вами',



        ],
        'uz' => [
            'welcome' => "🌍 Xush kelibsiz! Iltimos, tilni tanlang:",
            'language_changed' => "✅ Til O'zbek tiliga o'zgartirildi",
            'share_phone' => "📱 Iltimos, telefon raqamingizni ulashing:",
            'phone_button' => "📱 Telefon raqamni ulashish",
            'orders_found' => "✅ Buyurtma topildi!",
            'order_id' => "Buyurtma ID",
            'total' => "Jami",
            'status' => "Holat",
            'send_payment' => "📸 Iltimos, to'lov skrinshotini yuboring",
            'no_orders' => "❌ Ushbu telefon raqami uchun kutilayotgan buyurtmalar topilmadi.",
            'payment_received' => "✅ To'lov skrinshoti qabul qilindi! Admin tasdig'ini kutilmoqda...",
            'no_pending' => "❌ Kutilayotgan buyurtmalar topilmadi. Iltimos, avval buyurtma yarating yoki qo'llab-quvvatlash xizmatiga murojaat qiling.",
            'payment_approved' => "✅ To'lovingiz tasdiqlandi!",
            'order_confirmed' => "Buyurtmangiz tasdiqlandi va tez orada qayta ishlanadi.",
            'payment_rejected' => "❌ To'lovingiz tasdiqlanmadi.",
            'contact_support' => "Iltimos, qo'llab-quvvatlash xizmatiga murojaat qiling yoki haqiqiy to'lov bilan qayta urinib ko'ring.",
            'approved' => "tasdiqlangan",
            'rejected' => "rad etilgan",
            'created' => "yaratilgan",
            'menu_orders' => "📦 Mening Buyurtmalarim",
            'menu_language' => "🌍 Tilni O'zgartirish",
            'menu_back' => "🔙 Menyuga Qaytish",
            'order_history' => "📦 Buyurtmalar Tarixi:",
            'no_history' => "📭 Sizda hali buyurtmalar yo'q.",
            'order_details' => "Buyurtma Tafsilotlari",
            'payment_method' => "💳 To'lov usulini tanlang:",
            'humo' => "🏦 Humo (9860 1666 5364 4418)",
            'visa' => "💳 Visa (4738 7203 4457 8541)",
            'click' => "📱 Click (5614681626866978)",
            'product' => 'Mahsulot',
            'price' => 'Narxi',
            'menu_unpaid_orders' => 'To‘lanmagan buyurtmalar',
            'no_unpaid_orders' => 'Sizda to‘lanmagan buyurtmalar yo‘q.',
            'products' => 'Mahsulotlar',
            'subtotal' => 'Oraliq summa',
            'grand_total' => 'Umumiy summa',
            'pending_payment' => 'Toʻlov kutilmoqda',
            'delivery_fee_info' => '500,000 so\'mdan kam buyurtmalar uchun yetkazib berish 50,000 so\'m',
            'free_delivery_info' => '500,000 so\'m va undan ko\'p buyurtmalar uchun yetkazib berish bepul!',
            'abroad_contact' => 'Agar siz chet elda bo\'lsangiz admin siz bilan bog\'lanadi',

        ]
    ];


    // Add this method to get delivery fee based on total
    private function getDeliveryFee($total)
    {
        return $total < 500000 ? 50000 : 0;
    }

    private function formatOrderMessage($order, $lang)
    {
        $productsList = "";
        foreach ($order->items as $item) {
            $productsList .= "   • {$item->product->name_uz} x{$item->quantity} - {$item->price} so'm\n";
        }

        $deliveryFee = $this->getDeliveryFee($order->total);
        $finalTotal = $order->total + $deliveryFee;

        $deliveryText = $deliveryFee > 0
            ? "\n🚚 Yetkazib berish: {$deliveryFee} so'm"
            : "\n🚚 Yetkazib berish: Bepul";

        return "{$this->trans('orders_found',$lang)}\n\n" .
            "{$this->trans('order_id',$lang)}: #{$order->id}\n" .
            "👤 {$order->first_name} {$order->last_name}\n" .
            "📍 {$order->address}\n" .
            "📞 {$order->phone}\n\n" .
            "🛒 {$this->trans('products',$lang)}:\n{$productsList}\n" .
            "💰 {$this->trans('total',$lang)}: {$order->total} so'm" .
            $deliveryText .
            "\n💵 Jami to'lov: {$finalTotal} so'm\n" .
            "📊 {$this->trans('status',$lang)}: {$this->trans($order->status,$lang)}\n\n" .
            $this->trans('send_payment', $lang);
    }
    private function normalizePhone($phone)
    {
        $cleaned = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($cleaned) === 9) {
            $cleaned = '998' . $cleaned;
        }

        return $cleaned;
    }

    // Foydalanuvchi "To'lov qilish" tugmasini bosgan buyurtmani eslab qolish uchun kalit
    private function pendingPaymentKey($chatId)
    {
        return "pending_payment_order_{$chatId}";
    }

    // Foydalanuvchi tanlagan buyurtmani topadi, topilmasa eng oxirgi to'lanmagan buyurtmani qaytaradi
    private function getPendingPaymentOrder($chatId)
    {
        $orderId = Cache::get($this->pendingPaymentKey($chatId));

        if ($orderId) {
            $order = Order::where('id', $orderId)
                ->where('chat_id', $chatId)
                ->where('status', 'created')
                ->with('items.product')
                ->first();

            if ($order) {
                return $order;
            }
        }

        return Order::where('chat_id', $chatId)
            ->where('status', 'created')
            ->whereNotNull('address')
            ->with('items.product')
            ->latest()
            ->first();
    }

    private function trans($key, $lang)
    {
        return $this->translations[$lang][$key] ?? $this->translations['en'][$key];
    }

    private function getMainMenuKeyboard($lang)
    {
        return [
            'keyboard' => [
                [
                    ['text' => $this->trans('menu_orders', $lang)],
                    ['text' => $this->trans('menu_unpaid_orders', $lang)],
                    ['text' => $this->trans('menu_language', $lang)]
                ]
            ],
            'resize_keyboard' => true
        ];
    }


    private function getLanguageKeyboard()
    {
        return [
            'inline_keyboard' => [
                [
                    ['text' => '🇬🇧 English', 'callback_data' => 'lang_en'],
                    ['text' => '🇷🇺 Русский', 'callback_data' => 'lang_ru']
                ],
                [
                    ['text' => '🇺🇿 O\'zbekcha', 'callback_data' => 'lang_uz']
                ]
            ]
        ];
    }

    private function getUserLanguage($chatId)
    {
        $order = Order::where('chat_id', $chatId)->first();
        return $order && $order->language ? $order->language : 'en';
    }

    private function setUserLanguage($chatId, $language)
    {
        Order::updateOrCreate(
            ['chat_id' => $chatId],
            ['language' => $language]
        );
    }

    public function webhook(Request $request)
    {
        // Faqat Telegram'dan kelgan so'rovlar qabul qilinadi (setWebhook'dagi secret_token)
        $secret = (string) env('TELEGRAM_WEBHOOK_SECRET');
        $receivedSecret = (string) $request->header('X-Telegram-Bot-Api-Secret-Token');

        if ($secret === '' || !hash_equals($secret, $receivedSecret)) {
            Log::warning('Telegram webhook: noto\'g\'ri secret token', ['ip' => $request->ip()]);
            return response()->json(['ok' => false], 403);
        }

        $data = $request->all();
        $token = env('TELEGRAM_BOT_TOKEN');
        $apiUrl = "https://api.telegram.org/bot{$token}/sendMessage";

        if (isset($data['message'])) {
            $chatId = $data['message']['chat']['id'];
            $text = $data['message']['text'] ?? '';
            $lang = $this->getUserLanguage($chatId);

            if ($text === '/start') {
                $existingOrder = Order::where('chat_id', $chatId)->first();

                if ($existingOrder && $existingOrder->language) {
                    $lang = $existingOrder->language;

                    $keyboard = [
                        'keyboard' => [
                            [
                                [
                                    'text' => $this->trans('phone_button', $lang),
                                    'request_contact' => true
                                ]
                            ]
                        ],
                        'one_time_keyboard' => true,
                        'resize_keyboard' => true
                    ];

                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('share_phone', $lang),
                        'reply_markup' => json_encode($keyboard)
                    ]);
                } else {
                    // New user, ask for language
                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('welcome', 'en'),
                        'reply_markup' => json_encode($this->getLanguageKeyboard())
                    ]);
                }
                return response()->json(['ok' => true]);
            }

            if (
                strpos($text, $this->trans('menu_orders', $lang)) !== false ||
                strpos($text, '📦') === 0
            ) {
                $this->showOrderHistory($chatId, $lang, $token);
                return response()->json(['ok' => true]);
            }

            if (
                strpos($text, $this->trans('menu_language', $lang)) !== false ||
                strpos($text, '🌍') === 0
            ) {
                Http::post($apiUrl, [
                    'chat_id' => $chatId,
                    'text' => $this->trans('welcome', $lang),
                    'reply_markup' => json_encode($this->getLanguageKeyboard())
                ]);
                return response()->json(['ok' => true]);
            }

            if (
                strpos($text, $this->trans('menu_unpaid_orders', $lang)) !== false
            ) {
                $orders = Order::where('chat_id', $chatId)
                    ->where('status', 'created')
                    ->whereNotNull('address')
                    ->with('items.product')
                    ->latest()
                    ->get();

                if ($orders->isNotEmpty()) {
                    foreach ($orders as $order) {
                        $message = $this->formatOrderMessage($order, $lang);

                        $keyboard = [
                            'inline_keyboard' => [[
                                ['text' => '💳 To\'lov qilish', 'callback_data' => "show_payment_{$order->id}"]
                            ]]
                        ];

                        Http::post($apiUrl, [
                            'chat_id' => $chatId,
                            'text' => $message,
                            'reply_markup' => json_encode($keyboard)
                        ]);
                    }

                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => '✅',
                        'reply_markup' => json_encode($this->getMainMenuKeyboard($lang))
                    ]);
                } else {
                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('no_unpaid_orders', $lang),
                        'reply_markup' => json_encode($this->getMainMenuKeyboard($lang))
                    ]);
                }

                return response()->json(['ok' => true]);
            }

            // Phone number handling
            if (isset($data['message']['contact'])) {
                $phone = $data['message']['contact']['phone_number'];
                $normalizedPhone = $this->normalizePhone($phone);

                // Update chat ID
                Order::updateOrCreate(
                    ['chat_id' => $chatId],
                    ['phone' => $normalizedPhone]
                );

                // Update all matching orders
                Order::where('phone', 'LIKE', '%' . substr($normalizedPhone, -9))
                    ->update(['chat_id' => $chatId]);

                // Find orders with LIKE operator
                $orders = Order::where(function ($query) use ($normalizedPhone) {
                    $query->where('phone', $normalizedPhone)
                        ->orWhere('phone', 'LIKE', '%' . substr($normalizedPhone, -9))
                        ->orWhere('phone', '+' . $normalizedPhone);
                })
                    ->where('status', 'created')
                    ->whereNotNull('address')
                    ->with('items.product')
                    ->latest()
                    ->get();

                if ($orders->isNotEmpty()) {
                    foreach ($orders as $order) {
                        // Build products list
                        $productsList = "";
                        foreach ($order->items as $item) {
                            $productsList .= "   • {$item->product->name_uz} x{$item->quantity} - " . number_format($item->price * $item->quantity) . " so'm\n";
                        }

                        // Calculate delivery fee and final total
                        $deliveryFee = $this->getDeliveryFee($order->total);
                        $finalTotal = $order->total + $deliveryFee;
                        // In phone contact handling and unpaid orders sections, replace the deliveryText line with:

                        $deliveryText = $deliveryFee > 0
                            ? "🚚 Yetkazib berish: " . number_format($deliveryFee) . " so'm\n" .
                            "ℹ️ {$this->trans('delivery_fee_info',$lang)}\n" .
                            "🌍 {$this->trans('abroad_contact',$lang)}\n"
                            : "🚚 Yetkazib berish: BEPUL ✅\n" .
                            "ℹ️ {$this->trans('free_delivery_info',$lang)}\n" .
                            "🌍 {$this->trans('abroad_contact',$lang)}\n";

                        // Format complete message
                        $message = "📦 {$this->trans('order_details',$lang)}\n\n" .
                            "{$this->trans('order_id',$lang)}: #{$order->id}\n" .
                            "👤 {$order->first_name} {$order->last_name}\n" .
                            "📞 {$order->phone}\n" .
                            "📍 {$order->address}\n\n" .
                            "🛒 {$this->trans('products',$lang)}:\n{$productsList}\n" .
                            "💰 {$this->trans('subtotal',$lang)}: " . number_format($order->total) . " so'm\n" .
                            $deliveryText .
                            "💵 {$this->trans('grand_total',$lang)}: " . number_format($finalTotal) . " so'm\n" .
                            "📊 {$this->trans('status',$lang)}: {$this->trans('pending_payment',$lang)}";

                        $keyboard = [
                            'inline_keyboard' => [[
                                ['text' => '💳 To\'lov qilish', 'callback_data' => "show_payment_{$order->id}"]
                            ]]
                        ];

                        Http::post($apiUrl, [
                            'chat_id' => $chatId,
                            'text' => $message,
                            'reply_markup' => json_encode($keyboard)
                        ]);
                    }

                    // Remove phone button and show main menu
                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => '✅',
                        'reply_markup' => json_encode($this->getMainMenuKeyboard($lang))
                    ]);
                } else {
                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('no_orders', $lang),
                        'reply_markup' => json_encode($this->getMainMenuKeyboard($lang))
                    ]);
                }
            }

            // Photo handling (payment screenshot)
            if (isset($data['message']['photo'])) {
                $photo = end($data['message']['photo']);
                $fileId = $photo['file_id'];

                $order = $this->getPendingPaymentOrder($chatId);

                if ($order) {
                    Cache::forget($this->pendingPaymentKey($chatId));

                    $channelId = env('TELEGRAM_CHAT_ID');
                    $productsList = "";
                    foreach ($order->items as $item) {
                        $productsList .= "   • {$item->product->name_uz} x{$item->quantity} - " . number_format($item->price * $item->quantity) . " so'm\n";
                    }

                    // MUHIM: Delivery fee hisoblash
                    $deliveryFee = $this->getDeliveryFee($order->total);
                    $finalTotal = $order->total + $deliveryFee;

                    // Delivery text formatlash
                    $deliveryText = $deliveryFee > 0
                        ? "🚚 Yetkazib berish: " . number_format($deliveryFee) . " so'm\n" .
                        "ℹ️ 500,000 so'mdan kam buyurtmalar uchun yetkazib berish 50,000 so'm\n" .
                        "🌍 Agar chet elda bo'lsangiz admin siz bilan bog'lanadi\n"
                        : "🚚 Yetkazib berish: BEPUL ✅\n" .
                        "ℹ️ 500,000 so'm va undan ko'p buyurtmalar uchun yetkazib berish bepul!\n" .
                        "🌍 Agar chet elda bo'lsangiz admin siz bilan bog'lanadi\n";

                    // Kanalga yuborish
                    $response = Http::post("https://api.telegram.org/bot{$token}/sendPhoto", [
                        'chat_id' => $channelId,
                        'photo' => $fileId,
                        'caption' => "💳 To'lov Skrinshoti\n\n" .
                            "Buyurtma ID: #{$order->id}\n" .
                            "👤 {$order->first_name} {$order->last_name}\n" .
                            "📞 {$order->phone}\n" .
                            "📍 {$order->address}\n\n" .
                            "🛒 Mahsulotlar:\n{$productsList}\n" .
                            "💰 Oraliq summa: " . number_format($order->total) . " so'm\n" .
                            $deliveryText .
                            "💵 Jami to'lov: " . number_format($finalTotal) . " so'm\n" .
                            "💳 To'lov usuli: " . ($order->payment_method ?? '—') . "\n" .
                            "📊 Status: {$order->status}\n",
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [[
                                ['text' => '✅ Tasdiqlash', 'callback_data' => "approve_{$order->id}"],
                                ['text' => '❌ Bekor qilish', 'callback_data' => "reject_{$order->id}"]
                            ]]
                        ])
                    ]);

                    // Userga javob
                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('payment_received', $lang)
                    ]);
                } else {
                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('no_pending', $lang)
                    ]);
                }
            }
        }

        // Callback query handling
        if (isset($data['callback_query'])) {
            $callbackId = $data['callback_query']['id'];
            $callbackData = $data['callback_query']['data'];
            $chatId = $data['callback_query']['message']['chat']['id'];
            $messageId = $data['callback_query']['message']['message_id'];

            if (strpos($callbackData, 'show_payment_') === 0) {
                $orderId = substr($callbackData, 13);
                $order = Order::where('id', $orderId)
                    ->where('chat_id', $chatId)
                    ->first();

                if ($order && $order->status === 'created') {
                    $lang = $this->getUserLanguage($chatId);

                    // Skrinshot aynan shu buyurtmaga bog'lanishi uchun eslab qolamiz
                    Cache::put($this->pendingPaymentKey($chatId), $order->id, now()->addDays(3));

                    Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                        'callback_query_id' => $callbackId,
                        'text' => $this->trans('payment_method', $lang)
                    ]);

                    Http::post($apiUrl, [
                        'chat_id' => $chatId,
                        'text' => $this->trans('payment_method', $lang),
                        'reply_markup' => json_encode($this->getPaymentMethodsKeyboard($order->id))
                    ]);
                }

                return response()->json(['ok' => true]);
            }

            if (strpos($callbackData, 'payment_') === 0) {
                // Format: payment_{method}_{orderId} (eski tugmalarda: payment_{method})
                $parts = explode('_', substr($callbackData, 8));
                $paymentMethod = $parts[0];
                $orderId = $parts[1] ?? null;
                $lang = $this->getUserLanguage($chatId);

                $paymentDetails = [
                    'humo' => [
                        'name' => 'Humo Virtual',
                        'card' => '9860 1666 5364 4418',
                        'owner' => 'Jurayev Y'
                    ],
                    'visa' => [
                        'name' => 'Visa',
                        'card' => '4738 7203 4457 8541',
                        'owner' => 'Yunus Jurayev'
                    ],
                    'click' => [
                        'name' => 'Click',
                        'card' => '5614681626866978',
                        'owner' => 'Jurayev Ismoil'
                    ]
                ];

                if (!isset($paymentDetails[$paymentMethod])) {
                    return response()->json(['ok' => true]);
                }

                $details = $paymentDetails[$paymentMethod];

                $message = "💳 To'lov tafsilotlari:\n\n" .
                    "Usuli: {$details['name']}\n" .
                    "Karta: {$details['card']}\n" .
                    "Egasi: {$details['owner']}\n\n" .
                    "📸 To'lovdan keyin skrinshot yuboring\n" .
                    "⏱ Admin 15-30 daqiqada tasdiqlaydi";

                Http::post($apiUrl, [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'reply_markup' => json_encode($this->getMainMenuKeyboard($lang))
                ]);

                if ($orderId) {
                    Cache::put($this->pendingPaymentKey($chatId), $orderId, now()->addDays(3));
                }

                $this->getPendingPaymentOrder($chatId)
                    ?->update(['payment_method' => $paymentMethod]);

                Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                    'callback_query_id' => $callbackId,
                    'text' => '✅ To\'lov usuli tanlab olindi'
                ]);

                return response()->json(['ok' => true]);
            }

            if (strpos($callbackData, 'lang_') === 0) {
                $selectedLang = substr($callbackData, 5);
                $this->setUserLanguage($chatId, $selectedLang);

                $keyboard = [
                    'keyboard' => [
                        [
                            [
                                'text' => $this->trans('phone_button', $selectedLang),
                                'request_contact' => true
                            ]
                        ]
                    ],
                    'one_time_keyboard' => true,
                    'resize_keyboard' => true
                ];

                Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                    'callback_query_id' => $callbackId,
                    'text' => $this->trans('language_changed', $selectedLang)
                ]);

                Http::post("https://api.telegram.org/bot{$token}/editMessageText", [
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                    'text' => $this->trans('language_changed', $selectedLang)
                ]);

                Http::post($apiUrl, [
                    'chat_id' => $chatId,
                    'text' => $this->trans('share_phone', $selectedLang),
                    'reply_markup' => json_encode($keyboard)
                ]);

                return response()->json(['ok' => true]);
            }

            if (strpos($callbackData, 'approve_') === 0 || strpos($callbackData, 'reject_') === 0) {
                // Tasdiqlash/rad etish faqat admin kanalidagi tugmalardan qabul qilinadi
                if ((string) $chatId !== (string) env('TELEGRAM_CHAT_ID')) {
                    Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                        'callback_query_id' => $callbackId,
                        'text' => '⛔ Ruxsat yo\'q'
                    ]);
                    return response()->json(['ok' => true]);
                }

                list($action, $orderId) = explode('_', $callbackData);
                $order = Order::with('items.product')->find($orderId);

                // Allaqachon ko'rib chiqilgan buyurtmani qayta o'zgartirib bo'lmaydi
                if ($order && $order->status !== 'created') {
                    Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                        'callback_query_id' => $callbackId,
                        'text' => "ℹ️ Buyurtma #{$order->id} allaqachon: {$order->status}"
                    ]);
                    return response()->json(['ok' => true]);
                }

                if ($order) {
                    $userChatId = $order->chat_id;
                    $lang = $this->getUserLanguage($userChatId);

                    $productsList = "";
                    foreach ($order->items as $item) {
                        $productsList .= "   • {$item->product->name_uz} x{$item->quantity} - " . number_format($item->price * $item->quantity) . " so'm\n";
                    }

                    $deliveryFee = $this->getDeliveryFee($order->total);
                    $finalTotal = $order->total + $deliveryFee;
                    $deliveryText = $deliveryFee > 0 ? "🚚 Yetkazib berish: " . number_format($deliveryFee) . " so'm\n" : "🚚 Yetkazib berish: Bepul\n";

                    if ($action === 'approve') {
                        $order->update(['status' => 'approved']);

                        Http::post($apiUrl, [
                            'chat_id' => $userChatId,
                            'text' => "{$this->trans('payment_approved',$lang)}\n\n" .
                                "{$this->trans('order_id',$lang)}: #{$order->id}\n" .
                                "🛒 {$this->trans('products',$lang)}:\n{$productsList}\n" .
                                "💰 {$this->trans('subtotal',$lang)}: " . number_format($order->total) . " so'm\n" .
                                $deliveryText .
                                "💵 {$this->trans('grand_total',$lang)}: " . number_format($finalTotal) . " so'm\n" .
                                "{$this->trans('status',$lang)}: {$this->trans('approved',$lang)}\n\n" .
                                $this->trans('order_confirmed', $lang)
                        ]);

                        Http::post("https://api.telegram.org/bot{$token}/editMessageCaption", [
                            'chat_id' => $chatId,
                            'message_id' => $messageId,
                            'caption' => "✅ APPROVED\n\n" .
                                "Order ID: #{$order->id}\n" .
                                "👤 {$order->first_name} {$order->last_name}\n" .
                                "📞 {$order->phone}\n" .
                                "📍 {$order->address}\n\n" .
                                "🛒 Maxsulotlar:\n{$productsList}\n" .
                                "💰 Subtotal: " . number_format($order->total) . " so'm\n" .
                                $deliveryText .
                                "💵 Jami to'lov: " . number_format($finalTotal) . " so'm\n" .
                                "📊 Status: approved"
                        ]);
                    } elseif ($action === 'reject') {
                        $order->update(['status' => 'rejected']);

                        Http::post($apiUrl, [
                            'chat_id' => $userChatId,
                            'text' => "{$this->trans('payment_rejected',$lang)}\n\n" .
                                "{$this->trans('order_id',$lang)}: #{$order->id}\n" .
                                "🛒 {$this->trans('products',$lang)}:\n{$productsList}\n" .
                                "💰 {$this->trans('subtotal',$lang)}: " . number_format($order->total) . " so'm\n" .
                                $deliveryText .
                                "💵 {$this->trans('grand_total',$lang)}: " . number_format($finalTotal) . " so'm\n" .
                                "{$this->trans('status',$lang)}: {$this->trans('rejected',$lang)}\n\n" .
                                $this->trans('contact_support', $lang)
                        ]);

                        Http::post("https://api.telegram.org/bot{$token}/editMessageCaption", [
                            'chat_id' => $chatId,
                            'message_id' => $messageId,
                            'caption' => "❌ REJECTED\n\n" .
                                "Order ID: #{$order->id}\n" .
                                "👤 {$order->first_name} {$order->last_name}\n" .
                                "📞 {$order->phone}\n" .
                                "📍 {$order->address}\n\n" .
                                "🛒 Maxsulotlar:\n{$productsList}\n" .
                                "💰 Subtotal: " . number_format($order->total) . " so'm\n" .
                                $deliveryText .
                                "💵 Jami to'lov: " . number_format($finalTotal) . " so'm\n" .
                                "📊 Status: rejected"
                        ]);
                    }

                    Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                        'callback_query_id' => $callbackId,
                        'text' => $action === 'approve' ? '✅ Order Approved' : '❌ Order Rejected'
                    ]);
                }

                return response()->json(['ok' => true]);
            }
        }

        return response()->json(['ok' => true]);
    }

    private function showOrderHistory($chatId, $lang, $token)
    {
        $apiUrl = "https://api.telegram.org/bot{$token}/sendMessage";

        $orders = Order::where('chat_id', $chatId)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($orders->count() > 0) {
            $message = "{$this->trans('order_history',$lang)}\n\n";

            foreach ($orders as $order) {
                $message .= "━━━━━━━━━━━━━━━\n";
                $message .= "{$this->trans('order_id',$lang)}: #{$order->id}\n";
                $message .= "👤 {$order->first_name} {$order->last_name}\n";
                $message .= "📍 {$order->address}\n";
                $message .= "💰 {$this->trans('total',$lang)}: {$order->total}\n";
                $message .= "📊 {$this->trans('status',$lang)}: {$this->trans($order->status,$lang)}\n";
                $message .= "📅 {$order->created_at->format('d.m.Y H:i')}\n\n";
            }
        } else {
            $message = $this->trans('no_history', $lang);
        }

        Http::post($apiUrl, [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode($this->getMainMenuKeyboard($lang))
        ]);
    }

    private function getPaymentMethodsKeyboard($orderId)
    {
        return [
            'inline_keyboard' => [
                [
                    ['text' => '🏦 Humo Virtual', 'callback_data' => "payment_humo_{$orderId}"],
                    ['text' => '💳 Visa', 'callback_data' => "payment_visa_{$orderId}"]
                ],
                [
                    ['text' => '📱 Click', 'callback_data' => "payment_click_{$orderId}"]
                ],
                [
                    ['text' => '🔙 Orqaga', 'callback_data' => 'back_to_menu']
                ]
            ]
        ];
    }
}
