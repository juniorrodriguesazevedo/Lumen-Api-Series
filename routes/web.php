<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->delete('series/{id}', 'SeriesController@destroy');
    $router->put('series/{id}', 'SeriesController@update');
    $router->get('series/{id}', 'SeriesController@show');
    $router->post('series', 'SeriesController@store');
    $router->get('series', 'SeriesController@index');

    $router->get('series/{id}/episodes', 'EpisodesController@searchSerie');
});

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->delete('episodes/{id}', 'EpisodesController@destroy');
    $router->put('episodes/{id}', 'EpisodesController@update');
    $router->get('episodes/{id}', 'EpisodesController@show');
    $router->post('episodes', 'EpisodesController@store');
    $router->get('episodes', 'EpisodesController@index');
});