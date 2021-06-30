<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WelcomeController extends Controller
{
    public function index () 
    {
        $storage = Redis::Connection();

        // Controll's number of get item ('articleViews', 0, -1) -> 
        // [-1 -->> states last element] -- 
        $popular = $storage->zRevRange('articleViews', 0, -1);
        // dd($popular);
        foreach ($popular as $key => $value) {
            echo $key . "This is the key " . $value . "<br>";
            $id = str_replace('article:', '', $value);
            echo "Article" . $id . " is popular " . "<br>";
        }
    }
}
