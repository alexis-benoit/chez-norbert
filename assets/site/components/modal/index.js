const initializeModalAdapter = ({ document }) => {
    document.querySelectorAll ('[data-modal-action="open"]')
        .forEach(button => button.addEventListener('click', () => {
            console.log('Modal button triggered')
            const modalSelector = button.dataset.modal
            const modal = document.querySelector(modalSelector)

            modal.dataset.modalActive = 'true'
        }))
}

export default initializeModalAdapter
