import checkResponseBody from './check-response-body'

/**
 * Create a media
 *
 * @param {FormData} media
 * @param {string} houseId
 */
const createMedia = (media, houseId) => {
    return fetch (`/api/admin/${houseId}/media/add`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
        body: media
    })
        .then (response => response.json ())
        .then (data => checkResponseBody(data))
}

export default createMedia
