<?php

use App\Models\Photo;

test('deleta uma foto existente', function () {
    $user = $this->withAuth();
    $photo = Photo::factory()->create(['author_id' => $user->getKey()]);

    $route = route('photo.destroy', ['photo' => $photo->getKey()]);
    $this->delete($route)
        ->assertStatus(204);
});
