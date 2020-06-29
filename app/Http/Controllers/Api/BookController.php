<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\ApiStoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\GenreRepository;
use App\Repositories\BookRepository;
use Arr;
use Validator;

class BookController extends Controller
{
    private $genreRepository;
    private $bookRepository;

    public function __construct(BookRepository $bookRepository, GenreRepository $genreRepository) 
    {
        $this->bookRepository = $bookRepository;
        $this->genreRepository = $genreRepository;
    }

    public function index() {

        $books = Book::all();

        $result = $books->map(function ($book) {
            $genre = $book->genreInArray;
            $book  = $book->toArray();
            $book['nacional'] = $book['nacional'] === 'S';
            $book['genres'] = $genre;
            return $book;
        });

        return response()->json(['result' => $result]);
        
    }

    public function show($id) {

        $book = Book::find($id);

        if($book === null) {
            return response()->json([
                'error' => true,
                'message' => 'O livro não foi encontrado.'
            ], 404);
        }

        $genre = $book->genreInArray;
        $book = $book->toArray();
        $book['nacional'] = $book['nacional'] === 'S';
        $book['genres'] = $genre;

        return response()->json($book);
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:70',
            'author'      => 'required|max:70',
            'pages'       => 'required|numeric|between:1,1000',
            'genre'       => 'required|max:100|exists:genres,name',
            'nacional'    => 'required|boolean',
            'publisher'   => 'required|max:100',
            'description' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => Arr::flatten($validator->errors()->toArray())
            ], 422);
        }

        $book = $this->bookRepository->save($request->all());

        return response()->json($book, 201);
    }

    public function update($id, Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:70',
            'author'      => 'required|max:70',
            'pages'       => 'required|numeric|between:1,1000',
            'genre'       => 'required|max:100|exists:genres,name',
            'nacional'    => 'required|boolean',
            'publisher'   => 'required|max:100',
            'description' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => Arr::flatten($validator->errors()->toArray())
            ], 422);
        }

        $book = Book::find($id);

        if ($book === null) {
            $book = $this->bookRepository->save($request->all());
            return response()->json($book, 201);
        }

        $book = $this->bookRepository->update($id, $request->all());
        return response()->json($book, 200);

    }

    public function destroy($id) {

        $book = Book::find($id);

        if($book !== null) {
            $book->delete();
        }

        return response()->json(null, 204);
    }
}