<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase as TestCase; //Good ol' unit and feature tests framework
use PHPUnit\Framework\TestCase as IDontHaveTheTimeForThisFancyDistinctionNow;

class BooksTest extends TestCase
{
    use WithoutMiddleware;

    private $getStructure = [
        'data' => [
            ['id', 'name', 'category']
        ]
    ];

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->assertTrue(true);
    }

    public function testGet()
    {
        $response = $this->get('/api/books');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->getStructure);
    }

    public function testPost()
    {


    }

    public function testPut()
    {


    }
}
