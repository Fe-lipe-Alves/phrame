<div class="box-preview-item w-2/12 relative flex place-content-center border border-white" id="{{ $image['id'] }}">
    <button type="button" class="btn-preview-to-details">
        <img
            class="img-preview box-border w-auto h-auto max-w-full max-h-32"
            src="{{ $image['url'] }}"
            alt="{{ $image['name'] }}"
        >
    </button>
    <div
        class="preview-at-config text-white absolute top-0 left-0 w-full h-full z-100 bg-gray-500/40 flex place-content-center">
        <span class="material-symbols-outlined">radio_button_checked</span>
    </div>
</div>
