const initializeModalAdapter = ({ document, window }) => {
    const alert = document.querySelector('.alert')

    if (!alert)
        return

    window.setTimeout(() => {
        const handleAlert = () => {
            alert.removeEventListener('transitionend', handleAlert)
            alert.remove()
            initializeModalAdapter({ document, window })
        }
        alert.addEventListener('transitionend', handleAlert)

        alert.classList.add ('alert-out')

    }, 3000)
}

export default initializeModalAdapter