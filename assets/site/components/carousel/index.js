import Glide from '@glidejs/glide'

const initializeCarousel = ({ document, window }) => {
    if (!document.querySelector('.glide')) return

    new Glide('.glide').mount()

    // fix glide width issues
    window.dispatchEvent(new Event('resize'))
}

export default initializeCarousel
