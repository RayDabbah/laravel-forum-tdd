<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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

        $response = $this->get('/threads')
        
        ->assertStatus(200)
        
        ->assertSee($this->thread->title);

    }
    /** @test */
    public function a_user_can_browse_a_specific_thread()
    {
        
        $response = $this->get('/threads/'. $this->thread->id)

        ->assertStatus(200)

        ->assertSee($this->thread->title);

    }


    /** @test */
    public function a_user_can_read_replies_associated_with_a_thread()
    {

        $reply = factory(\App\Reply::class)->create(['thread_id' => $this->thread->id]);

        $response = $this->get('/threads/'. $this->thread->id);

        $response->assertSee($reply->body);
    } 
}
