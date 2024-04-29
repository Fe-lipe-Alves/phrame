<style>
    progress.upload {
        width: 100%;
        height: 5px;
    }
    progress.upload::-webkit-progress-bar,
    progress.upload::-moz-progress-bar{
        background-color: #2f2f2f;
    }
    progress.upload::-webkit-progress-value {
        background-color: #fdfdfd;
    }

    .box-preview-item.active {
        border: 3px white solid;
    }
    .box-preview-item > .preview-at-config {
        display: none;
    }
    .box-preview-item.active > .preview-at-config {
        display: block;
    }
</style>

<x-layouts.auth>
    <form class="w-full" id="form-send-photo" method="post" enctype="multipart/form-data" action="{{ route('photo.store') }}">
        @csrf
        <div class="w-10/12 lg:w-8/12 mx-auto border rounded-2xl py-8 flex flex-col gap-4">
            <div class="px-4">
                <x-base.title-page>{{ __('Send new image') }}</x-base.title-page>
                <p class="text-granite-gray">
                    A imagem devem estar no formato
                    <em>JPEG</em> e não deve ter largura menor que 1080px ou altura
                    menor que 780px.
                </p>
            </div>

            <div id="drop-zone"
                 class="h-48 relative bg-zinc-200 flex justify-center items-center text-center transition-all duration-500">
                <div class="hiddenz" id="input-file">
                    <input type="file" id="input-image" name="file" accept="image/jpeg" class="hidden" multiple="multiple">

                    <x-base.button-base type="button" id="btn-open-image-piker">
                        <span class="hidden lg:inline">Clique para selecionar a imagem</span>
                        <span class="lg:hidden">Selecione a imagem</span>
                    </x-base.button-base>

                    <small class="hidden lg:inline">ou a arraste para esta área</small>
                    <br>
                    <small class="text-gray-500">apenas arquivos .jpeg</small>

                    @error('file')
                        <br/>
                        <x-form.input-feedback type="danger" :message="$message"/>
                    @enderror
                </div>

                <div id="preview-images" class="flex flex-wrap gap-2">
                </div>
            </div>
        </div>
    </form>

    <x-slot:scripts>
        <script>
            const routePhotoStore = '{{ route('photo.store') }}'
        </script>
        @vite('resources/js/send-photo/send-photo.js')
    </x-slot:scripts>
</x-layouts.auth>
