<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Facade;

class BridesController extends Facade {

    public static function getStatus($state){
        switch ($state) {
            case 1:
             return '<b style="color:green"> Cleaned</b>';
            case 2:
             return '<b style="color:red"> Dirty</b>';
             case 3:
             return '<b style="color:gray"> Review</b>';
        }
    }

}
