<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        //$list = DB::table('menu')->get();
        $list = Menu::get();
        foreach($list as $row){
            echo "<h1>".$row->name."</h1>";
        }
        return view('frontend.home');
    }
}
