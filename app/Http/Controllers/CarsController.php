<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
class CarsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAll()
    {
        return "Chegou no get all";
    }

    public function get($id)
    {
        return "get" . $id;
    }
    public function store(Request $request)
    {
        dd($request->all());
    }

    
}
