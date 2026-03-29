<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')->group(function () {
    Route::group(['prefix' => 'filmout'], function () {
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year}', [FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year}', [FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}/{genre?}', [FilmController::class, "listFilms"])->name('listFilms');
        Route::get('yearFilms/{year?}', [FilmController::class, "listYearFilms"])->name('yearFilms');
        Route::get('genreFilms/{genre?}', [FilmController::class, "listGenreFilms"])->name('genreFilms');
        Route::get('sortFilms/{year?}', [FilmController::class, "sortFilms"])->name('sortFilms');
        Route::get('countFilms/{year?}', [FilmController::class, "countFilms"])->name('countFilms');
    });
});

Route::middleware('url')->group(function () {
    Route::group(['prefix' => 'filmin'], function () {
        Route::post('createFilm', [FilmController::class, "createFilm"])->name('createFilm');
        Route::post('isFilm', [FilmController::class, "isFilm"])->name('isFilm');
    });
});

Route::group(['prefix' => 'actorout'], function () {
    Route::get('actors', [ActorController::class, 'listActors'])->name('listactors');
});