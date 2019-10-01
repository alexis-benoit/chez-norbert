import initializeTextField from './initialize-text-field'

const initializeTextFieldAdapter = ({ document }) => {
    const textFields = document.querySelectorAll('.form-control[type="text"]')

    initializeTextField(textFields)
}

export default initializeTextFieldAdapter