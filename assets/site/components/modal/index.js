const initializeModalAdapter = ({ document }) => {
    document.querySelectorAll ('[data-modal-action="open"]')
        .forEach(button => button.addEventListener('click', () => {
            console.log('Modal button triggered')
            const modalSelector = button.dataset.modal
            const modal = document.querySelector(modalSelector)

            modal.dataset.modalActive = 'true'
        }))

    document.querySelectorAll('.modal-container')
        .forEach(modalContainer => modalContainer.addEventListener('click', ({ target }) => {
            if (modalContainer === target) {
                modalContainer.dataset.modalActive = 'false'
            }
        }))
}

export default initializeModalAdapter
