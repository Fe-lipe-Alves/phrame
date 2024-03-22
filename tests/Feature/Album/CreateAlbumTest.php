<?php

use App\Actions\Album\AlbumCreate;
use App\Models\Album;
use Illuminate\Testing\Fluent\AssertableJson;

function dataAlbum(): array
{
    return [
        'title' => fake()->domainName(),
        'description' => fake()->text(),
        'cover_url' => fake()->imageUrl(),
    ];
}

test('retorna objeto Album da Action\\AlbumCreate', function () {
    $this->withAuth();

    $album = AlbumCreate::handle(dataAlbum());

    expect($album)
        ->toBeInstanceOf(Album::class)
        ->and($album)->id->toBeUuid();
});

test('criar album pela API', function () {
    $this->actingAs($this->withAuth())
        ->post(route('album.store'), dataAlbum())
        ->assertStatus(201)
        ->assertJson(fn (AssertableJson $json) => $json->has('data.created_at'));
});
