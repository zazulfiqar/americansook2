<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class LiveCmdController extends Controller
{

//    api_translate
//api_translate_laravel
// langw3school

    public  function  langw3school()
    {
//        return "asdfasdf";
        return view('langw3school');

    }

    public  function  api_translate_laravel()
    {
//        return "asdfasdf";
       return view('languagelaravel');

    } public  function  api_translate()
    {
//        return "asdfasdf";
       return view('language');

    }

    public  function  clear_cache()
    {
        Artisan::call('cache:clear');
        dd("Cache is cleared");

    }
    public  function view_clear()
    {
        \Artisan::call('view:clear');
        dd("Cache is cleared");
    }


    public  function key_generate()
    {
        \Artisan::call('key:generate');
        dd("Key Generated");
    }
    public  function optimize()
    {
        \Artisan::call('optimize');
        dd("optimize Done");

    }

    public  function storage_link()
    {
        \Artisan::call('storage:link');
        dd("Storage Link");
    }

}
