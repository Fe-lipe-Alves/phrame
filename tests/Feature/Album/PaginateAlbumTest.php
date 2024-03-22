<?php

use App\Actions\Album\AlbumPaginate;
use App\Models\Album;

test('retorna 15 itens por página', function () {
    Album::factory()->count(30)->create();

    $paginate = AlbumPaginate::handle();

    expect($paginate->count())->toEqual(15);
});

test('filtra por título', function () {
    $title = 'Album de Teste';

    Album::factory()->create(compact('title'));

    $paginate = AlbumPaginate::handle($title);

    expect($paginate->items())->each->toMatchArray(compact('title'));
});

test('retorna paginado usando API', function () {
    Album::factory()->count(30)->create();

    $this->actingAs($this->withAuth())
        ->get(route('album.index'))
        ->assertJsonCount(15, 'data');
});
