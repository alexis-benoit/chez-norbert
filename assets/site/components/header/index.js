// import handleMenuState from './handle-menu-state'
import initializeMenu from './initialize-menu'

const initializeMenuAdapter = ({ document }) => {
    const menu = document.querySelector('[data-menu]')
    const button = document.querySelector('[data-hamburger]')

    const subscribe = callback => button.addEventListener('click', callback)
    const getAttribute = () => menu.getAttribute('data-menu')
    const setAttribute = state => menu.setAttribute('data-menu', state)

    const navLinks = document.querySelectorAll('.nav-list-item')
    const navLinksSubscribe = callback => navLinks.forEach(navLink => navLink.addEventListener('click', callback))

    initializeMenu(subscribe, getAttribute, setAttribute, navLinksSubscribe)
}

export default initializeMenuAdapter
