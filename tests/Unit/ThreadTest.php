<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory(\App\Thread::class)->create();
    } 


   /** @test */
   public function a_thread_has_replies()
   {

       $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->thread->replies);
   } 

   /** @test */
   public function a_thread_has_a_creator()
   {
       $this->assertInstanceOf(\App\User::class, $this->thread->creator);
   } 
   
}
