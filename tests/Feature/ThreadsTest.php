<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */

public function setUp()
{
    parent::setUp();

    $this->thread = factory(\App\Thread::class)->create();

} 

    /** @test*/
    public function a_user_can_browse_all_threads()
    {

        $response = $this->get('/threads');
        
        $response->assertStatus(200);
        
        $response->assertSee($this->thread->title);

    }
    public function a_user_can_browse_a_specific_thread()
    {
        
        $response = $this->get('/threads/'. $this->thread->id);

        $response->assertStatus(200);

        $response->assertSee($this->thread->title);

    }
}
