/**
 * Initialize menu component
 *
 * @param {Function} subscribe Function that wraps dom event listener
 * @param {Function} getAttribute Function that wraps dom get attribute
 * @param {Function} setAttribute Function that wraps dom set attribute
 */
const initializeMenu = (subscribe, getAttribute, setAttribute) => {
    subscribe(() => {
        const currentState = ('true' === getAttribute())
        setAttribute (!currentState)
    })
}

export default initializeMenu
