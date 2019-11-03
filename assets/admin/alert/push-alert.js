const pushAlert = alert => {
    document
        .querySelector('[data-alert-container]')
        .appendChild(alert)
}

export default pushAlert
