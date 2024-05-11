let previews

function loadDetailsToImage(id) {
    const preview = previews.find(elem => elem.id === id)

    const imgLarge = document.querySelector('#box-preview-large>img')

    imgLarge.setAttribute('src', preview.src)
    imgLarge.style.display = 'block'
}

function setImageActiveById(id) {
    document.querySelector('.box-preview-item.active')?.classList?.remove('active')

    const boxPreviewItem = document.getElementById(id)
    boxPreviewItem.classList.add('active')
    loadDetailsToImage(boxPreviewItem.id)
}

function setImageActiveByClick(event) {
    const boxPreviewItem = event.target.parentElement.parentElement
    setImageActiveById(boxPreviewItem.id)
}

function mountPreviews(files) {
    let count = 0
    const previews = []

    for (const file of files) {
        const id = (++count) + file.name + file.size
        const src = URL.createObjectURL(file)

        const html =
            `<div class="box-preview-item w-2/12 relative flex place-content-center border border-white" id="${id}">
                <progress class="upload absolute left-0 bottom-0" value="0" max="100"></progress>
                <button type="button" class="btn-preview-to-details">
                    <img class="img-preview box-border w-auto h-auto max-w-full max-h-32" src="${src}" alt="">
                </button>
                <div class="preview-at-config text-white absolute top-0 left-0 w-full h-full z-100 bg-gray-500/40 flex place-content-center">
                    <span class="material-symbols-outlined">radio_button_checked</span>
                </div>
            </div>`

        previews.push({count, file, html, id, src})
    }

    return previews
}

function setFirstActive() {
    if (previews.length > 0 && previews[0]) {
        setImageActiveById(previews[0].id)
    }
}

function sendRequest(item) {
    const data = new FormData()
    data.append("file", item.file, item.file.name)

    axios.post(routePhotoStore, data, {
        onUploadProgress: (event) => {
            let progress = Math.round((event.loaded * 100) / event.total)
            const progressbar = document.getElementById(item.id).querySelector('progress')

            if (progress < 100) {
                progressbar.value = progress
            } else {
                progressbar.remove()
            }
        },
    }).then((response) => {
        if (response.data.success) {
            item.path = response.data.path
        }
    }).catch((err) => {
        console.error(`Houve um problema ao realizar o upload da imagem ${item.file.name}`)
        console.log(err)
    })
}

function onChangeInput() {
    /** @type {FileList} */
    const files = inputImage.files

    if (files) {
        boxInput.style.display = 'none'
        dropZone.classList.add('!h-auto', '!min-h-48')

        previews = mountPreviews(files)

        previews.forEach(item => {
            previewImages.insertAdjacentHTML('beforeend', item.html)
            document.getElementById(item.id)
                .querySelector('.btn-preview-to-details')
                .addEventListener('click', setImageActiveByClick, false)

            sendRequest(item)
        })

        console.log(previews)

        setFirstActive()
    }
}

const boxInput = document.getElementById('input-file')
const dropZone = document.getElementById('drop-zone')
const inputImage = document.getElementById('input-image')
const btnOpenImagePiker = document.getElementById('btn-open-image-piker')
const previewImages = document.getElementById('preview-images')

btnOpenImagePiker.onclick = function (event) {
    event.preventDefault()
    inputImage.click()
}

inputImage.onchange = onChangeInput
