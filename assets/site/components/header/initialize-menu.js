import handleMenuState from './handle-menu-state'

/**
 *
 * @param {HTMLButtonElement|HTMLLinkElement} button
 * @param {Function} getAttribute
 * @param {Function} setAttribute
 */
const initializeMenu = (button, getAttribute, setAttribute) => {

    // console.log(menu)
    button.addEventListener('click', () => {
        console.log('helolo')
        const currentState = ('true' === getAttribute())
        setAttribute (handleMenuState(currentState))
    })
}

export default initializeMenu