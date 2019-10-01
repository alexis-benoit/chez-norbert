// import handleMenuState from './handle-menu-state'
import initializeMenu from './initialize-menu'

const initializeMenuAdapter = ({ document }) => {
    const menu = document.querySelector('[data-menu]')
    const button = document.querySelector('[data-hamburger]')

    const getAttribute = () => menu.getAttribute('data-menu')
    const setAttribute = state => menu.setAttribute('data-menu', state)

    initializeMenu(button, getAttribute, setAttribute)
}

export default initializeMenuAdapter
