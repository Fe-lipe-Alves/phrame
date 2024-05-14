let previews

function loadDetailsToImage(id) {
    const preview = previews.find(elem => elem.id === id)

    const imgLarge = document.querySelector('#box-preview-large>img')

    imgLarge.setAttribute('src', preview.url)
    imgLarge.style.display = 'block'
}

function setImageActiveById(id) {
    const boxPreviewItem = document.getElementById(id)

    document.querySelector('.box-preview-item.active')?.classList?.remove('active')
    boxPreviewItem.classList.add('active')

    loadDetailsToImage(id)
}

function setImageActiveByClick(event) {
    const boxPreviewItem = event.target.parentElement.parentElement
    setImageActiveById(boxPreviewItem.id)
}

function setFirstActive() {
    if (previews.length > 0 && previews[0]) {
        setImageActiveById(previews[0].id)
    }
}

function handleProgress(event) {
    let progress = Math.round((event.loaded * 100) / event.total)

    if (progress < 100) {
        progressFiles.value = progress
    } else {
        progressFiles.remove()
    }
}

async function sendRequest(files) {
    const data = new FormData()

    for (let i = 0; i < files.length; i++) {
        data.append(`files[${i}]`, files[i], files[i].name)
    }

    const response = await axios
        .post(routePhotoStore, data, {onUploadProgress: handleProgress})
        .catch((err) => {
            console.error('Houve um problema ao realizar o upload das imagens')
            console.log(err)
        })

    return response.data.success ? response.data.content : undefined
}

async function onChangeInput() {
    /** @type {FileList} */
    const files = inputImage.files

    if (files) {
        boxInput.style.display = 'none'
        dropZone.classList.add('!h-auto', '!min-h-48')

        previews = await sendRequest(files)

        if (previews) {
            previews.forEach(item => {
                previewImages.insertAdjacentHTML('beforeend', item.html)
                document.getElementById(item.id)
                    .querySelector('.btn-preview-to-details')
                    .addEventListener('click', setImageActiveByClick, false)
            })
        }

        setFirstActive()
    }
}

const boxInput = document.getElementById('input-file')
const dropZone = document.getElementById('drop-zone')
const inputImage = document.getElementById('input-image')
const btnOpenImagePiker = document.getElementById('btn-open-image-piker')
const previewImages = document.getElementById('preview-images')
const progressFiles = document.getElementById('progress-files')

btnOpenImagePiker.onclick = function (event) {
    event.preventDefault()
    inputImage.click()
}

inputImage.onchange = onChangeInput
