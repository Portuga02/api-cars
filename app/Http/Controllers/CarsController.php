<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{

    private $model;

    public function __construct(CarsModel $cars)
    {
        $this->model = $cars;
    }

    public function getAll()
    {
        try {
            $cars = $this->model->all();
            if (count($cars) > 0) {
                return response()->json($cars, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $sqlException) {
            return response()->json([
                'msg' => 'Erro ao se conectar com o banco de dados',
                'error' => $sqlException->getMessage(),
                'Linha' => $sqlException->getLine(),
                'Arquivo' => $sqlException->getFile()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do usuário!.',
                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function get($id)
    {
        try {
            $car = $this->model->find($id);
            if (count($car) > 0) {
                return response()->json($car, Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(null, Response::HTTP_OK);
            }
        } catch (QueryException $sqlException) {
            return response()->json([
                'msg' => 'Erro ao se conectar com o banco de dados',
                'error' => $sqlException->getMessage(),
                'Linha' => $sqlException->getLine(),
                'Arquivo' => $sqlException->getFile()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do usuário!.',
                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function newRegister(Request $request)
    {
        try {
            $car = $this->model->create($request->all());
            return response()->json($car, Response::HTTP_CREATED);
        } catch (QueryException $sqlException) {
            return response()->json([
                'msg' => 'Erro ao se conectar com o banco de dados',
                'error' => $sqlException->getMessage(),
                'Linha' => $sqlException->getLine(),
                'Arquivo' => $sqlException->getFile()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do usuário!.',
                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $car = $this->model->find($id)
                ->update($request->all());

            return response()->json($car, Response::HTTP_OK);
        } catch (QueryException $sqlException) {
            return response()->json([
                'msg' => 'Erro ao se conectar com o banco de dados',
                'error' => $sqlException->getMessage(),
                'Linha' => $sqlException->getLine(),
                'Arquivo' => $sqlException->getFile()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do usuário!.',
                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function delete($id)
    {
        try {
            $car = $this->model->find($id);

            if ($car != null) {
                $car->delete();
                return response()->json(['msg' => 'Usuário deletado com sucesso'], Response::HTTP_OK);
            }
            return response()->json(['msg' => 'Este usuário já foi deletado '], Response::HTTP_BAD_REQUEST);
        } catch (QueryException $sqlException) {
            return response()->json([
                'msg' => 'Erro ao se conectar com o banco de dados',
                'error' => $sqlException->getMessage(),
                'Linha' => $sqlException->getLine(),
                'Arquivo' => $sqlException->getFile()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'Não foi possível capturar os dados do usuário!.',
                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
