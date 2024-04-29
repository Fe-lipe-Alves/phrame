<x-layouts.auth>
    <form class="w-full" method="post" enctype="multipart/form-data" action="{{ route('photo.store') }}">
        @csrf

        @include('picture.drop-zone')

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
                <input type="checkbox" name="private" id="private">
                <x-base.label-base for="private">{{ __('Private image') }}</x-base.label-base>
            </div>

            <div class="flex flex-col gap-1 hidden" id="box-description">
                <x-base.label-base for="description">Descrição</x-base.label-base>
                <x-form.textarea rows="2" id="description" name="description"></x-form.textarea>
                <small class="text-gray-600">0 de 1000 caracteres.</small>
            </div>

            @include('picture.technical-data')

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

    </x-slot:scripts>
</x-layouts.auth>
