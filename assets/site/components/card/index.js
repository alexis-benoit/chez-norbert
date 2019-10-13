const initializeCardAdapter = ({ document }) => {
    const intersectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('card-img-expand')
            } else {
                entry.target.classList.remove('card-img-expand')
            }
        })
    })

    document.querySelectorAll('.card-img')
        .forEach(card => {
            intersectionObserver.observe(card)
        })
}

export default initializeCardAdapter