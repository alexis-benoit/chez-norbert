import checkResponseBody from './check-response-body'

/**
 * Delete a media
 *
 * @param {String} token
 * @param {String} mediaId
 */
const deleteMedia = (token, mediaId) => {
    return fetch (`/api/admin/media/${mediaId}`, {
        method: 'DELETE',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'Content-type': 'application/json'
        },
        body: JSON.stringify({
            _token: token
        })
    })
        .then (response => response.json ())
        .then (data => checkResponseBody(data))
}

export default deleteMedia
