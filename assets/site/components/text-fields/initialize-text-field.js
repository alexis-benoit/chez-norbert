/**
 *
 * @param {HTMLInputElement[]} textFields
 */
const initializeTextField = textFields => {
    textFields.forEach(tf => {
        tf.addEventListener('blur', () => {
            tf.setAttribute('data-empty', tf.value.length === 0)
        })
    })
}

export default initializeTextField