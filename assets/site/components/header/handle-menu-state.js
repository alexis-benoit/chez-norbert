const handleMenuState = menu => {
    return !!menu.style.display ? null : 'none'
}

export default handleMenuState