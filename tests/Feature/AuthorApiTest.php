<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuthorItWorks()
    {
        $response = $this->get('api/authors');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'suggestions' => [
                    '*' => [
                        'value',
                        'data'
                    ]
                ]
            ]);
    }
}
