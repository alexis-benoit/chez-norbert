import flatpickr from 'flatpickr'

const initializeDateAdapter = ({ document }) => {
    flatpickr(document.querySelectorAll('[data-date]'))
}

export default initializeDateAdapter
