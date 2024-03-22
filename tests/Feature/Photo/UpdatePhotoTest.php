<?php

use App\Models\Photo;

test('atualiza uma foto existente', function () {
    $user = $this->withAuth();
    $newTitle = 'Título Editado';
    $photo = Photo::factory()->create(['author_id' => $user->getKey()]);

    $route = route('photo.update', ['photo' => $photo->getKey()]);
    $this->patch($route, ['title' => $newTitle])
        ->assertSuccessful()
        ->assertJson(['success' => true])
        ->assertJsonPath('data.title', $newTitle);
});
