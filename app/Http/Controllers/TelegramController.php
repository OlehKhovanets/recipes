<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function logWebAppData(Request $request)
    {
        Log::info('Telegram Web App Data:', $request->all());
        return response()->json(['status' => 'logged']);
    }

}
