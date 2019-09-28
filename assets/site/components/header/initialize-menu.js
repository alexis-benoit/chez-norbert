import handleMenuState from './handle-menu-state'

/**
 *
 * @param {HTMLButtonElement|HTMLLinkElement} button
 * @param {HTMLElement} menu
 */
const initializeMenu = (button, menu) => {

    console.log(menu)
    button.addEventListener('click', () => {
        console.log('helolo')
        menu.style.display = handleMenuState(menu)
    })
}

export default initializeMenu