<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Book;

class BookApiTest extends TestCase
{
    public function testBookItWorks()
    {
        $response = $this->get('/api/books');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'result' => [
                    '*' => [
                        'id',
                        'title',
                        'author',
                        'cover',
                        'description',
                        'pages',
                        'nacional',
                        'publisher',
                        'genres'
                    ]
                ]
            ]);
    }

    public function testBookWasFound() 
    {
        $this
            ->get('api/books/31')
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'title',
                'author',
                'cover',
                'description',
                'pages',
                'nacional',
                'publisher',
                'genres'
            ]);
    }

    public function testBooksAreCreatedCorrectly() 
    {

        $payload = [
            'title'       => 'Apanhador no Campo de Centeio',
            'author'      => 'J. D. Salinger',
            'pages'       => '196',
            'genre'       => ['Drama'],
            'nacional'    => false,
            'publisher'   => 'Globo',
            'description' => 'Lorem Ipsum Dolor',
        ];

        $this->json('POST', '/api/books/', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'title',
                'author',
                'description',
                'pages',
                'nacional',
                'publisher',
                'id'
        ]);
    }

    public function testBooksAreUpdatedCorrectly() 
    {
        $payload = [
            'title'       => 'Capitães de Areia',
            'author'      => 'Jorge Amado',
            'pages'       => '213',
            'genre'       => ['Drama', 'Romance'],
            'nacional'    => true,
            'publisher'   => 'Globo',
            'description' => 'Capitães da Areia é um romance de autoria do escritor brasileiro Jorge Amado, escrito em 1937. A obra retrata a vida de um grupo de menores abandonados, que crescem nas ruas da cidade de Salvador, Bahia, vivendo em um trapiche, roubando para sobreviver, chamados de "Capitães da Areia".',
        ];

        $this->json('PUT', '/api/books/31', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'title',
                'author',
                'description',
                'pages',
                'nacional',
                'publisher',
                'id'
        ]);
    }

    public function testBooksAreDeletedCorrectly()
    {
        $book = factory(Book::class)->create();
        
        $response = $this->delete('/api/books/' . $book->id);
        $response->assertStatus(204);
    }

    public function testProvideInvalidValues() 
    {
        $payload = [
            "title"       => "",
            "author"      => "",
            "pages"       => "",
            "genre"       => ["Juvenil"],
            "nacional"    => false,
            "publisher"   => str_repeat("Glovo", 25),
            "description" => "Lorem Ipsum Dolor"
        ];

        $this
            ->json('post', '/api/books', $payload)
            ->assertStatus(422)
            ->assertJson([
                'error' => true,
                'message' => [
                    "O campo título é obrigatório.",
                    "O campo author é obrigatório.",
                    "O campo pages é obrigatório.",
                    "O valor selecionado para o campo genre é inválido."
                ]
            ]);
    }

    public function testBookNotFound() 
    {
        $this
            ->get("/api/books/99")
            ->assertStatus(404)
            ->assertJson([
                'error' => true,
                'message' => 'O livro não foi encontrado.'
            ]);
    }

    public function testNonExistentResource() 
    {
        $this
            ->get('/api/foobar')
            ->assertStatus(404)
            ->assertJson([
                'error'   => true,
                'message' => 'O recurso buscado não existe.'
            ]);
    }
}
