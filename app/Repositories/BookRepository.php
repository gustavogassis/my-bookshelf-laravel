<?php

namespace App\Repositories;

use App\Book;
use App\Repositories\GenreRepository;

class BookRepository {

    private $genreRepository;

    public function __construct(GenreRepository $genreRepository) 
    {
        $this->genreRepository = $genreRepository;
    }

    public function allBooks() {
        return Book::latest()->paginate(4);
    }

    public function find($id) {

        return Book::find($id);
    }

    public function save($attributes) {

        $idGenre = array_map(function ($genre) {
            return $this->genreRepository->getGenreIdByName($genre);
        }, $attributes['genre']);

        unset($attributes['genre']);
        
        $book = new Book($attributes);
        $book->save();

        $book->genres()->attach($idGenre);

        return $book;
    }

    public function update($id, $attributes) {

        $book = $this->find($id);

        $idGenre = array_map(function ($genre) {
            return $this->genreRepository->getGenreIdByName($genre);
        }, $attributes['genre']);

        unset($attributes['genre']);

        $book->update($attributes);
        $book->genres()->sync($idGenre);

        return $book;
    }

}