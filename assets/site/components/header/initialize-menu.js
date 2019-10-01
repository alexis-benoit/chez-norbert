import handleMenuState from './handle-menu-state'

/**
 *
 * @param {Function} subscribe
 * @param {Function} getAttribute
 * @param {Function} setAttribute
 */
const initializeMenu = (subscribe, getAttribute, setAttribute) => {

    subscribe(() => {
        const currentState = ('true' === getAttribute())
        setAttribute (handleMenuState(currentState))
    })
}

export default initializeMenu
