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

// const handleMediaDelete = e => {
//     e.preventDefault()
//     //
//     // const formData = new FormData()
//     // formData.append('_token', a.dataset.token)
//
//     const a = e.target
//
//     fetch (a.href, {
//         method: 'DELETE',
//         headers: {
//             'X-Requested-With': 'XMLHttpRequest',
//             'Accept': 'application/json',
//             'Content-type': 'application/json'
//         },
//         body: JSON.stringify({
//             '_token':a.dataset.token
//         })
//     })
//         .then (response => response.json())
//         .then(data => {
//             if (data.success === 1) {
//                 a.parentNode.parentNode.parentNode.removeChild(a.parentNode.parentNode)
//             } else {
//                 console.log(data.error)
//             }
//         })
//         .catch(error => console.log(error))
//
// }