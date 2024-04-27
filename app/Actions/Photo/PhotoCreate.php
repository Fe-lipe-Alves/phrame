<?php

namespace App\Actions\Photo;

use App\Models\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

readonly class PhotoCreate
{
    public function __construct(
        private PhotoCamCreate $photoCamCreate
    ) {

    }

    public function handle(array $data): Photo
    {
        $photo = new Photo(Arr::only($data, ['title', 'description']));

        $photo->author_id = Auth::id();
        $photo->url = $this->storeFile($data['file']);
        $photo->size = $this->size($data['file']);

        $photo->save();

        $this->photoCamCreate->handle($data['cam'], $photo);

        return $photo->refresh();
    }

    private function storeFIle(UploadedFile $file): string
    {
        $path = $file->store('public/images');

        return ! $path ? throw new \Exception('Image not saved') : $path;
    }

    private function size(UploadedFile $file): int
    {
        return $file->getSize();
    }
}
