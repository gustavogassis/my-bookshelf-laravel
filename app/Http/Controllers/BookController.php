<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\GenreRepository;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    private $genreRepository;
    private $bookRepository;

    public function __construct(BookRepository $bookRepository, GenreRepository $genreRepository) 
    {
        $this->bookRepository = $bookRepository;
        $this->genreRepository = $genreRepository;
    }

    public function index()
    {
        return view('books.index', [
            'books' => $this->bookRepository->allBooks()
        ]);
    }

    public function create()
    {
        return view('books.create', [
            'genres' => $this->genreRepository->allGenres()
        ]);
    }

    public function store(StoreBookRequest $request) 
    {
        $attributes = $request->validated();

        $attributes['nacional'] = $request['nacional'];
        $attributes['cover'] = request('cover')->store('covers');

        $this->bookRepository->save($attributes);

        return redirect(route('books'))
            ->with('success', ["O livro <span class='alert__strong'>{$attributes['title']}</span> foi cadastrado com sucesso!"]);
    }

    public function show($id) 
    {
        $book = $this->bookRepository->find($id);

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function edit($id)
    {
        $book = $this->bookRepository->find($id);

        return view('books.edit', [
            'book'   => $book,
            'genres' => $this->genreRepository->allGenres()
        ]);
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $attributes = $request->validated();
        $attributes['nacional'] = $request['nacional'];

        $book = $this->bookRepository->find($id);
        $this->bookRepository->update($id, $attributes);

        return redirect(route('books'))
            ->with('success', ["O livro <span class='alert__strong'>{$attributes['title']}</span> foi atualizado com sucesso!"]);
    }

    public function destroy($id)
    {
        $book = $this->bookRepository->find($id);
        $bookName = $book->title;
        $book->delete($book->id);
        unlink('storage/' . $book->cover);

        return redirect(route('books'))
            ->with('success', ["O livro <span class='alert__strong'>{$bookName}</span> foi removido com sucesso!"]);
    }

    public function destroyBatch()
    {
        $idLivros = explode(',', request('idLivros'));
        $messages = [];
        foreach ($idLivros as $id) {
            $book = $this->bookRepository->find($id);
            $messages[] = "O livro <span class='alert__strong'>{$book->title}</span> foi removido com sucesso!";

            $book->delete($book->id);
            unlink('storage/' . $book->cover);
        }
        

        return redirect(route('books'))->with('success', $messages);
    }
}
