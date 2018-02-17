<?php
/**
 * Created by PhpStorm.
 * User: crrki
 * Date: 2018/2/15
 * Time: 15:59
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GlobalController extends Controller
{
    public function upload(Request $request)
    {
        //echo phpinfo();exit;
        $file = $request->file('file')->storeAs(Config::get('constants.PAPER_PATH'), time().'.PDF');
        var_dump($file);
    }
}