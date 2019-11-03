import checkResponseBody from './check-response-body'

/**
 * Update a media
 *
 * @param {FormData} media
 * @param {string} mediaId
 * @returns {Promise<any>}
 */
const editMedia = (media, mediaId) => {
    return fetch (`/api/admin/house/media/${mediaId}`, {
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

export default editMedia