<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{


    private function checkResults($results)
    {
        foreach ($results as $result)
        {
            if($result == false) {

                return false;
            }
        }

        return true;
    }




    // GET //

    // Movie
    public function movie(Request $request, $Id)
    {
        $movie = DB::select("SELECT * FROM tbl_films WHERE film_id = $Id");
        $directors = DB::table('tbl_regisseurs')->get();

        return view('edit.movie', array('movie'=>$movie, 'directors'=>$directors));
    }

    // Director
    public function director(Request $request, $Id)
    {
        $director = DB::select("SELECT * FROM tbl_regisseurs WHERE regisseur_id = $Id");

        return view('edit.director', array('director'=>$director));
    }

    // Actor
    public function actor(Request $request, $Id)
    {
        $acteur = DB::select("SELECT * FROM tbl_acteurs WHERE acteur_id = $Id");

        return view('edit.actor', array('actor'=>$acteur));
    }


















    // POST | UPDATE //

    // Movie
    public function updateMovie(Request $request ,$Id)
    {
        // Validation

        $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer|between:1888,2030',
            'director' => 'required|integer|between:0,1000',
        ]);



        // Execute

        $input = $request->all();

        $results = array(
            DB::table("tbl_films")->where('film_id', '=', $Id)->update(array('titel'=>$input['title'], 'jaar'=>$input['year'])),
            DB::table('tbl_films_regisseur')->where('film_id', '=', $Id)->update(array('reg_id'=>$input['director']))
        );

        if($this->checkResults($results))
        {
            $request->session()->flash('success', 'Movie data changed!');
            return redirect()->route('user');
        }
        else
        {
            $request->session()->flash('error', 'Failed to update movie in database!');
            return redirect()->route('user');
        }
    }


    // Director
    public function updateDirector(Request $request ,$Id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            'fname' => 'required|string'
        ]);



        // Execute
        $input = $request->all();
        $result = DB::table("tbl_regisseurs")->where('regisseur_id', '=', $Id)->update(array('name'=>$input['name'], 'fname'=>$input['fname']));

        if($result)
        {
            $request->session()->flash('success', 'Director data changed!');
            return redirect()->route('user');
        }
        else
        {
            $request->session()->flash('error', 'Failed to update Director in database!');
            return redirect()->route('user');
        }
    }



    // Actor
    public function updateActor(Request $request ,$Id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            'fname' => 'required|string'
        ]);



        // Execute
        $input = $request->all();
        $result = DB::table("tbl_acteurs")->where('acteur_id', '=', $Id)->update(array('name'=>$input['name'], 'fname'=>$input['fname']));

        if($result)
        {
            $request->session()->flash('success', 'Actor data changed!');
            return redirect()->route('user');
        }
        else
        {
            $request->session()->flash('error', 'Failed to update Actor in database!');
            return redirect()->route('user');
        }
    }

}
