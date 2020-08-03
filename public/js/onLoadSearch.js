function toggleContent() {
    let list = document.querySelector('.image-list')
    let preloader = document.querySelector('#preloaderBlock')
    list.classList.remove('d-none')
    preloader.classList.add('d-none')
    list.classList.remove('d-block')
}
window.onload = toggleContent;