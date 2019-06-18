<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class BrowseController extends Controller
{
    public function movies()
    {
        $films = DB::select("SELECT * FROM tbl_films");

        return view('browse.movies', array('movies'=>$films));
    }


    public function directors()
    {
        $directors = DB::select("SELECT * FROM tbl_regisseurs");

        return view('browse.directors', array('directors'=>$directors));
    }

    public function actors()
    {
        $actors = DB::select("SELECT * FROM tbl_acteurs");

        return view('browse.actors', array('actors'=>$actors));
    }


    public function index()
    {
        return view('browse.index');
    }


}
