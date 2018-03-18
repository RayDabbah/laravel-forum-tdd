<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{

    use DatabaseMigrations;

     /** @test */
     public function a_non_authenticated_user_cannot_post_a_reply()
     {
         $this->expectException('Illuminate\Auth\AuthenticationException');
 
         $this->post('/threads/1/reply', []);
     } 
   
    /** @test */
    public function an_authenticated_user_can_participate_in_a_forum()
    {
        // $user = factory('App\User')->create();
        $this->be($user = factory('App\User')->create());

        $reply = factory('App\Reply')->create();
        
        $this->post("/threads/{$reply->thread->id}/reply", $reply->toArray());

         $this->get($reply->thread->path())

         ->assertSee($reply->body);

        $this->assertDatabaseHas('replies', [
            'body' => $reply->body
        ]);
        
    } 

}
