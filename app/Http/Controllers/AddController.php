<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    public function index()
    {
        $movies = DB::select("SELECT * FROM tbl_films");
        $directors = DB::select("SELECT * FROM tbl_regisseurs");

        return view('add.index', array('movies'=>$movies,'directors'=>$directors));
    }




    public function director(Request $request)
    {
        // Validation

        $request->validate([
            'name' => 'required|string',
            'fname' => 'required|string'
        ]);



        // Code
        $input = $request->all();

        $result = DB::table("tbl_regisseurs")->insert(array('name'=>$input['name'], 'fname'=>$input['fname']));

        if($result)
        {
            $request->session()->flash('success', 'Added director successfuly!');

            return redirect(route('user'));
        }

        $request->session()->flash('error', 'Could not add the Director to the database!');

        return redirect(route('add'));
    }











    public function movie(Request $request)
    {
        // Validation

        $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer|between:1888,2030',
            'director' => 'required|integer|between:0,1000',
        ]);



        // Code
        $input = $request->all();


        $cover = str_replace( " ", "", $input['title'] );

        $movie_result = DB::table("tbl_films")->insert(array('titel'=>$input['title'], 'jaar'=>$input['year'], 'filmcover'=>$cover));
        if ( $movie_result )
        {
            $title = $input['title'];
            $movie = DB::select("SELECT * FROM tbl_films WHERE titel = '$title'");



            $result = DB::table('tbl_films_regisseur')->insert(array('film_id'=>$movie[0]->film_id, 'reg_id'=>$input['director']));
            if($result)
            {
                $request->session()->flash('success', 'Added movie successfuly!');

                return redirect(route('user'));
            }

            $request->session()->flash('error', 'Could not add the link between Director and the Movie in the database!');

            return redirect(route('add'));

        }

        $request->session()->flash('error', 'Could not add the Movie to the database!');

        return redirect(route('add'));
    }










    public function actor(Request $request)
    {
        // Validation

        $request->validate([
            'name' => 'required|string',
            'fname' => 'required|string'
        ]);



        // Code

        $input = $request->all();

        $result = DB::table("tbl_acteurs")->insert(array('name'=>$input['name'], 'fname'=>$input['fname']));

        if($result)
        {
            $request->session()->flash('success', 'Added actor successfuly!');


            return redirect(route('user'));
        }

        $request->session()->flash('error', 'Could not add the Actor to the database!');

        return redirect(route('add'));
    }
}
