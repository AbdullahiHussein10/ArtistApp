<?php

namespace Tests\Unit;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class ArtistTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_can_create_post() 
    {
        $data = [
            'band_name' => "The Animals",
            'genre' => "Classical Music",
            'location' => "United States"
        ];

        $response = $this->post(route('artist.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
}
