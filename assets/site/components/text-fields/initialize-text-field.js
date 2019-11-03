/**
 * Initialize a new text field length watcher.
 * _subscribe_ needs to be called when the length check need to be done.
 * _setAttribute_ is a function that set the text field attribute
 * _getTextLength_ is a function that returns the text length
 * _getType_ is a function that returns the field's type
 *
 * @param {Function} subscribe
 * @param {Function} setAttribute
 * @param {Function} getTextLength
 * @param {Function} getType
 */
const initializeTextField = (subscribe, setAttribute, getTextLength, getType) =>
    subscribe(() => setAttribute(getType() === 'date' ? false : getTextLength() === 0))

export default initializeTextField
