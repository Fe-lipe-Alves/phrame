<x-layouts.auth>
    <form class="w-full" method="post" enctype="multipart/form-data" action="{{ route('photo.store') }}">
        @csrf

        <div id="drop-zone" class="w-10/12 lg:w-8/12 mx-auto h-32 lg:h-64 bg-zinc-200 flex justify-center items-center text-center">
            <div>
                <input type="file" id="input-image" name="file" accept="image/jpeg" class="hidden">
                <x-base.button-base id="btn-open-image-piker">
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
        </div>

        <div class="w-10/12 lg:w-8/12 mx-auto border p-8 flex flex-col gap-4">
            <div class="text-center">
                <x-base.title-page>{{ __('Send new image') }}</x-base.title-page>
            </div>

            <div class="w-full flex gap-4 flex-wrap lg:flex-nowrap">
                <div class="w-12 lg:w-1/2">
                    <x-form.input-with-label label="Título da foto" id="title" name="title"></x-form.input-with-label>
                </div>
                <div class="w-12 lg:w-1/2">
                    <x-form.input-with-label label="Palavras chaves" id="title" name="keywords"></x-form.input-with-label>
                    <small class="text-gray-600">Separe as palavras usando ponto e vírgula ";"</small>
                </div>
            </div>

            <div>
                <input type="checkbox" name="private" id="private" checked>
                <x-base.label-base for="private">{{ __('Private image') }}</x-base.label-base>
            </div>

            <div class="flex flex-col gap-1 hidden" id="box-description">
                <x-base.label-base for="description">Descrição</x-base.label-base>
                <x-form.textarea rows="2" id="description" name="description"></x-form.textarea>
                <small class="text-gray-600">0 de 1000 caracteres.</small>
            </div>

            <div id="box-technical-data" class="w-full grid grid-cols-2 lg:grid-cols-3 gap-4 items-end hidden">
                <div class="flex-1">
                    <x-form.input-with-label label="Marca da câmera" id="cam_brand" name="cam[brand]"></x-form.input-with-label>
                </div>

                <div class="flex-1">
                    <x-form.input-with-label label="Modelo da câmera" id="cam_model" name="cam[model]"></x-form.input-with-label>
                </div>

                <div class="flex-1">
                    <x-form.input-with-label label="Distância focal (mm)" id="focal_length" name="cam[focal_length]"></x-form.input-with-label>
                </div>

                <div class="flex-1">
                    <x-form.input-with-label label="Aperture (f)" id="cam_open" name="cam[open]"></x-form.input-with-label>
                </div>

                <div class="flex-1">
                    <x-form.input-with-label label="ISO" id="cam_iso" name="cam[iso]"></x-form.input-with-label>
                </div>

                <div class="flex-1">
                    <x-form.input-with-label label="Velocidade do obturador" id="cam_shutter_speed" name="cam[shutter_speed]"></x-form.input-with-label>
                </div>
            </div>

            <div class="flex gap-4 flex-wrap">
                <x-base.button-base id="add-description" color="gray" class="!w-fit">Adicionar descrição</x-base.button-base>
                <x-base.button-base id="add-technical-data" color="gray" class="!w-fit">Adicionar informações técnicas</x-base.button-base>
            </div>
        </div>

        <div class="w-10/12 lg:w-8/12 mx-auto flex justify-end py-4 gap-4">
            <div>
                <x-base.button-base color="gray">Cancelar</x-base.button-base>
            </div>
            <div>
                <x-base.button-base>Salvar</x-base.button-base>
            </div>
        </div>
    </form>

    <x-slot:scripts>
        <script>
            const actions = {
                'add-description': 'box-description',
                'add-technical-data': 'box-technical-data',
            }

            Object.keys(actions).forEach(buttonClass => {
                const button = document.getElementById(buttonClass)
                const box = document.getElementById(actions[buttonClass])
                button.onclick = function () {
                    box.classList.remove('hidden')
                    button.classList.add('hidden')
                }
            })
        </script>
        <script>
            const btnOpenImagePiker = document.getElementById('btn-open-image-piker')
            const inputImage = document.getElementById('input-image')

            btnOpenImagePiker.onclick = function (event) {
                event.preventDefault()
                inputImage.click()
            }

            const dropZone = document.getElementById('drop-zone')
            ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false)
            })

            function preventDefaults (e) {
                // e.preventDefault()
                // e.stopPropagation()
            }

            ;['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false)
            })

            ;['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false)
            })

            function highlight(e) {
                dropZone.classList.add('!bg-red-100')
            }

            function unhighlight(e) {
                dropZone.classList.remove('!bg-red-100')
            }

            dropZone.addEventListener('drop', handleDrop, false)

            function handleDrop(e) {
                let dt = e.dataTransfer
                let files = dt.files

                console.log(files)
            }
        </script>
    </x-slot:scripts>
</x-layouts.auth>
