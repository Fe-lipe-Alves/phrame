<?php

use App\Actions\Photo\PhotoCreate;
use App\Models\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;

test('cria um registro Photo', function () {
    $this->actingAs($this->withAuth());

    $data = [
        'title' => fake()->text(50),
        'description' => fake()->text(255),
        'file' => UploadedFile::fake()->image('photo_test.jpg'),
    ];

    $photo = (new PhotoCreate)->handle($data);

    expect($photo)
        ->toBeInstanceOf(Photo::class)
        ->and($photo->getKey())
        ->not->toBeNull();

    Storage::assertExists($photo->url);
});

test('cria um registro Photo usando API', function () {
    $data = [
        'title' => fake()->text(50),
        'description' => fake()->text(255),
        'file' => UploadedFile::fake()->image('photo_test.jpg'),
    ];

    $this->actingAs($this->withAuth())
        ->post(route('photo.store'), $data)
        ->assertSuccessful()
        ->assertStatus(201)
        ->assertJson(fn (AssertableJson $json) => $json->has('data.id'));
});
