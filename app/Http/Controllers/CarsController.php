<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;

use Illuminate\Http\Request;

class CarsController extends Controller
{
    
    private $model;

    public function __construct(CarsModel $cars)
    {
        $this->model = $cars;
    }

    public function getAll()
    {
        $cars = $this->model->all();

        return response()->json($cars);
    }

    public function get($id)
    {
      
        $car = $this->model->find($id);
        dd($car);
        
        return response()->json($car);
    }
    public function store(Request $request)
    {
        $car = $this->model->crate($request->all());
        return response()->json($car);
    }
    public function update(Request $request, $id)
    {
        $car = $this->model->find($id)
            ->update($request->all());

        return response()->json($car);
    }
    public function delete($id)
    {

        $car = $this->model->find($id)
            ->delete();

        return response()->json(null);
    }
}
