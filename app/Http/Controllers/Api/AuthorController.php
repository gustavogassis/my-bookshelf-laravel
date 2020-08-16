<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class AuthorController extends Controller
{
    public function index() {

        $books = Book::distinct()->get(['author']);

        $result = $books->map(function ($book) {
            return ['value' => $book->author, 'data' => $book->author];
        })->toArray();

        return response()
            ->json(['suggestions' => $result], 200);
    }
}
