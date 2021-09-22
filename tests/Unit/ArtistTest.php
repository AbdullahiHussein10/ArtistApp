<?php

use App\Models\Artist;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('does not create a to-do without a band_name, genre, location field', function () {
    $response = $this->postJson('/api/artist', []);
    $response->assertStatus(422);
});