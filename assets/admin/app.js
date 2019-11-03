import createAlert from './alert/create-alert'
import editMedia from './api/edit-media'
import pushAlert from './alert/push-alert'
import deleteMediaApi from './api/delete-media'
import createMediaApi from './api/create-media'
import $ from 'jquery'
import 'bootstrap'

// gestion des ajouts de media
document.querySelector('[data-add-media]').addEventListener('submit', e => {
    e.preventDefault()

    createMediaApi(new FormData(e.target), document.querySelector('[data-house-id]').dataset.houseId)
        .then (data => {
            pushAlert(createAlert('success', 'Le média a bien été ajouté'))

            const container = document.querySelector('[data-image-container]')
            const div = document.createElement('div')
            div.setAttribute('class', 'col-md-8 mb-4')
            div.dataset.mediaElement = data.id

            div.innerHTML = `
                <img src="${data.filename}" alt="${data.alt}" class="img-fluid mb-2">
                <div>
                    <button class="btn btn-primary" data-toggle="modal" data-alt="${data.alt}" data-image-url="${data.filename}" data-target="#imageModal" data-media-id="${data.id}">Modifier</button>
                    <button class="btn btn-danger" data-delete="${data.id}" data-token="${data.token}">Supprimer</button>
                </div>
            `

            div.querySelector('[data-delete]').addEventListener('click', handleMediaDelete)

            container.appendChild(div)
        })
        .catch (error => pushAlert(createAlert('danger', error.message)))
})

// gere le formulaire de modification d'un média
document.querySelector('#media-update').addEventListener('submit', e => {
    e.preventDefault()
    const mediaId = e.target.dataset.mediaId

    editMedia(new FormData(e.target), mediaId)
        .then(data => pushAlert(createAlert('success', 'Le média a bien été mis à jour.')))
        .catch (error => pushAlert(createAlert('danger', error.message)))
        .finally(() => {
            e.target.reset()
            $('#imageModal').modal('hide')
        })
})

// gere l'affichage des données de la modal modification d'un média
$('#imageModal').on('show.bs.modal', ({ target, ...e }) => {
    const button = $(e.relatedTarget)
    const modal = $(target)

    modal
        .find ('form')
        .attr('data-media-id', button.data('mediaId'))
        .end()
        .find('[data-image]')
        .attr('src', button.data('imageUrl'))
        .end()
        .find('[data-alt]')
        .attr('value', button.data('alt'))
        .end()
})

const handleMediaDelete = e => {
    e.preventDefault()

    deleteMediaApi(e.target.dataset.token, e.target.dataset.delete)
        .then (data => {
            pushAlert(createAlert('success', 'Le média a bien été supprimé.'))
            const container = document.querySelector(`[data-media-element="${e.target.dataset.delete}"]`)
            container.removeEventListener('click', handleMediaDelete)
            container.remove ()
        })
        .catch (error => pushAlert(createAlert('danger', error.message)))
}

document.querySelectorAll('[data-delete]')
    .forEach(button => button.addEventListener('click', handleMediaDelete))
