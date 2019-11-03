const createAlert = (type, message) => {
    const alert = document.createElement('div')
    alert.setAttribute('class', `alert alert-${type} mt-4`)
    alert.setAttribute('role', 'alert')

    alert.innerHTML = `
        ${message}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    `

    return alert
}

export default createAlert