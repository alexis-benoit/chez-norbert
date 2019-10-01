import handleMenuState from './handle-menu-state'

/**
 *
 * @param {Function} subscribe
 * @param {Function} getAttribute
 * @param {Function} setAttribute
 */
const initializeMenu = (subscribe, getAttribute, setAttribute) => {

    // console.log(menu)
    subscribe(() => {
        console.log('helolo')
        const currentState = ('true' === getAttribute())
        setAttribute (handleMenuState(currentState))
    })
}

export default initializeMenu
