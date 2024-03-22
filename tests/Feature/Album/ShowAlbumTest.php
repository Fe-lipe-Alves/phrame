<?php

use App\Models\Album;
use Illuminate\Testing\Fluent\AssertableJson;

test('consulta um album usando a API', function () {
    $album = Album::factory()->create();

    $this->actingAs($this->withAuth())
        ->get(route('album.show', ['album' => $album->getKey()]))
        ->assertSuccessful()
        ->assertJson(fn (AssertableJson $json) => $json->has('data'))
        ->assertJson(fn (AssertableJson $json) => $json->has('data.id'));

});
