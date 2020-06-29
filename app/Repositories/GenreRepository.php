<?php

namespace App\Repositories;

use App\Genre;

class GenreRepository {

    public function __construct() {

    }

    public function getGenreIdByName($name) {

        $genre = Genre::select('id')
            ->where('name', $name)
            ->first();

        return $genre->id;
    }

    public function allGenres() {

        return Genre::all()->pluck('name', 'id');
    }
}