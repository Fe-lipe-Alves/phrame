<div id="drop-zone"
     class="w-10/12 lg:w-8/12 mx-auto h-32 relative lg:h-64 bg-zinc-200 flex justify-center items-center text-center">
    <div id="input-file">
        <input type="file" id="input-image" name="file" accept="image/jpeg" class="hidden">
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

    <div id="preview" class="relative hidden">
        <img src=""
             class="max-w-full max-h-32 lg:max-h-64"
             alt="{{ __('Preview image') }}">
    </div>
</div>

@push('scripts')
    <script>
        const btnOpenImagePiker = document.getElementById('btn-open-image-piker')
        const inputImage = document.getElementById('input-image')
        const preview = document.getElementById('preview')
        const inputFile = document.getElementById('input-file')

        inputImage.onchange = event => {
            const [file] = inputImage.files
            if (file) {
                inputFile.style.display = 'none'
                preview.style.display = 'block'
                preview.querySelector('img').src = URL.createObjectURL(file)
            }
        }

        btnOpenImagePiker.onclick = function (event) {
            event.preventDefault()
            inputImage.click()
        }

        const dropZone = document.getElementById('drop-zone')
        ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false)
        })

        function preventDefaults(e) {
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
@endpush
