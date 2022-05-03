<?php

namespace TrungPhuNA\Common\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ZanySoft\Zip\Zip;
use ZanySoft\Zip\ZipManager;


class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('common::index');
    }

    public function test()
    {
        $file = public_path().'/'.'sanpham.zip';
        $zip = Zip::open($file);
//        $zip = new ZipManager();
        dd($zip->listFiles());
        return view('common::test');
    }
}
