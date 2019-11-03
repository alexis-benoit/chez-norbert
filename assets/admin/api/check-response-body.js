/**
 * Check if the API response is valid or not.
 * If it's not then an error will be thrown with the violation.
 *
 * @param {{}} body
 */
const checkResponseBody = body => {
    if (body.success === 0)
        throw new Error ( body.violations ? body.violations.shift() : "Quelque chose s'est mal passé.")

    return body.media
}

export default checkResponseBody