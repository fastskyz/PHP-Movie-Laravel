<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function movie(Request $request, $Id)
    {
        DB::table('tbl_films')->where('film_id', '=', $Id)->delete();

        $request->session()->flash('success', 'Removed movie from database!');
        return redirect()->route('user');
    }


    public function actor(Request $request, $Id)
    {
        DB::table('tbl_acteurs')->where('acteur_id', '=', $Id)->delete();

        $request->session()->flash('success', 'Removed actor from database!');
        return redirect()->route('user');
    }


    public function director(Request $request, $Id)
    {
        DB::table('tbl_regisseurs')->where('regisseur_id', '=', $Id)->delete();

        $request->session()->flash('success', 'Removed director from database!');
        return redirect()->route('user');
    }

}
