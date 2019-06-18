<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.index', ["user"=>$user]);
    }



    public function setRate(Request $request)
    {
        $request->validate([
            'movie' => 'required|integer',
            'rating' => 'required|integer|between:-1,6',
            'review' => 'nullable|string',
        ]);


        $input = $request->all();

        if( $input['review'] == "" )
        {
            $review = DB::table("tbl_ratings")->insert(array('film_id'=>$input['movie'], 'score'=>$input['rating'], 'user_id'=>Auth::id()));

            $request->session()->flash('success', 'Successfuly added rating!');
            return redirect(route('user'));
        }
        else
        {
            $rating = DB::table("tbl_review")->insert(array('film_id'=>$input['movie'], 'rating'=>$input['rating'], 'review'=>$input['review'], 'user_id'=>Auth::id()));

            $request->session()->flash('success', 'Successfuly added review!');
            return redirect(route('user'));
        }

    }

    public function rate()
    {
        $films = DB::select("SELECT * FROM tbl_films");

        return view('browse.rate', array('movies'=>$films));
    }

    public function rateList()
    {
        $films = DB::select("SELECT * FROM tbl_films");

        $ratings = DB::select("SELECT * FROM tbl_ratings");
        $reviews = DB::select("SELECT * FROM tbl_review");


        return view('user.list', array('ratings'=>$ratings, 'reviews'=>$reviews, 'movies'=>$films));
    }

}
