<?php

use App\Actions\Photo\PhotoPaginate;
use App\Models\Photo;

function createManyPhotos(): int
{
    $user = test()->withAuth();
    $perPage = (new Photo)->getPerPage();

    Photo::factory()->count($perPage * 2)->create([
        'author_id' => $user->getKey(),
    ]);

    return $perPage;
}

test('retorna 15 itens por página', function () {
    $perPage = createManyPhotos();

    $paginate = PhotoPaginate::handle();

    expect($paginate->count())->toEqual($perPage);
});

test('retorna paginado usando API', function () {
    $perPage = createManyPhotos();

    $this->actingAs($this->withAuth())
        ->get(route('photo.index'))
        ->assertJsonCount($perPage, 'data');
});
