<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    public static function sendMessage($message)
    {
        $token = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }
}
