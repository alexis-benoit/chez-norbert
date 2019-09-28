// import handleMenuState from './handle-menu-state'
import initializeMenu from './initialize-menu'

const initializeMenuAdapter = ({ document }) => {
    const menu = document.querySelector('[data-menu]')
    const button = document.querySelector('[data-hamburger]')

    initializeMenu(button, menu)
}

export default initializeMenuAdapter