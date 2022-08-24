<?php

/** @var \Laravel\Lumen\Routing\Router $router */



$router->get("api-cars/cars", "CarsController@getAll");

$router->group(["prefix" => "api-cars/cars"], function () use ($router) {
    $router->get("/{id}", "CarsController@get");
    $router->post("/", "CarsController@store");
    $router->put("/{id}", "CarsController@update");
    $router->delete("/{id}", "CarsController@delete");
});
