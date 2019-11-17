const initializeLazyLoad = ({ document }) => {
    const observer = new IntersectionObserver(entries => entries.forEach(entry => {
        if (entry.isIntersecting) {
            const parent = entry.target.parentElement

            if (parent.tagName.toLowerCase() === 'picture') {
                parent.querySelectorAll('source')
                    .forEach(source => {
                        console.log(source)
                        source.setAttribute('srcset', source.dataset.srcset)
                    })
            }

            entry.target.src = entry.target.dataset.src
        }
    }))

    document.querySelectorAll ('[data-src]')
        .forEach(img => {
            observer.observe(img)
        })
}

export default initializeLazyLoad