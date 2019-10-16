import Glide from '@glidejs/glide'

const initializeCarousel = ({ document }) => {
    if (!document.querySelector('.glide')) return

    new Glide('.glide').mount()
}

export default initializeCarousel
