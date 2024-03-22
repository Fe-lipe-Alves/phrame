<?php

use App\Models\Photo;
use Illuminate\Testing\Fluent\AssertableJson;

test('consulta uma foto usando a API', function () {
    $photo = Photo::factory()->create();

    $this->actingAs($this->withAuth())
        ->get(route('photo.show', ['photo' => $photo->getKey()]))
        ->assertSuccessful()
        ->assertJson(fn (AssertableJson $json) => $json->has('data'))
        ->assertJson(fn (AssertableJson $json) => $json->has('data.id'));

});
