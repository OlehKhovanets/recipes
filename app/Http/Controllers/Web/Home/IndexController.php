<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Web\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    public function index()
    {
        return view('web.questions.index_new');
    }

    public function profile()
    {
        return view('web.profile.index');
    }
}
