<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QueriesTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
    */

    /**@test */
    public function test_a_user_can_see_queries(){
        $response = $this->get('/queries/all');
        $response->assertStatus(200);
    }

//    public function testExample()
//    {
//        $response = $this->get('/queries/all');
//
//        $response->assertStatus(200);
//
//
//
//    }



}
