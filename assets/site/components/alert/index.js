const initializeModalAdapter = ({ document, window }) => {
    const alert = document.querySelector('.alert')

    if (!alert)
        return

    window.setTimeout(() => {
        alert.remove()
    }, 3000)
}

export default initializeModalAdapter