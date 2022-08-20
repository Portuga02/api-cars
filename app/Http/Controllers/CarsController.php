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
        return "iD Selecionado é o ID de Número " . $id;
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function update(Request $request, $id)
    {
        dd($id, $request->all());
    }
    public function delete($id)
    {
        dd($id);
    }
}
