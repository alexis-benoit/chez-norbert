/**
 * Initialize a new text field length watcher.
 * _subscribe_ needs to be called when the length check need to be done.
 * _setAttribute_ is a function that set the text field attribute
 * _getTextLength_ is a function that returns the text length
 *
 * @param {Function} subscribe
 * @param {Function} setAttribute
 * @param {Function} getTextLength
 */
const initializeTextField = (subscribe, setAttribute, getTextLength) =>
    subscribe(() => setAttribute(getTextLength() === 0))

export default initializeTextField