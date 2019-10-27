/**
 * Make a popup factory
 *
 * @param L
 * @returns {function(*=, {position?: *, content?: *}): *}
 */
const makePopupFactory = L => (map, { position, content }) =>
    L.popup({ autoClose: false })
        .setLatLng(position)
        .setContent(content)
        .openOn(map)

export default makePopupFactory
