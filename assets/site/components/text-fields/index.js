import initializeTextField from './initialize-text-field'

/**
 * Initialize text field module
 *
 * @param document
 */
const initializeTextFieldAdapter = ({ document }) => {
    const textFields = [
        ...document.querySelectorAll('.form-control'),
        ...document.querySelectorAll('textarea')
    ]

    textFields.forEach(textField => {
        const subscribe = callback => textField.addEventListener('blur', callback)
        const setAttribute = newAttributeValue => textField.setAttribute('data-empty', newAttributeValue)
        const getTextLength = () => textField.value.length

        initializeTextField(subscribe, setAttribute, getTextLength)
    })
}

export default initializeTextFieldAdapter
