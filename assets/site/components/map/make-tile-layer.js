/**
 * Make tile layer
 *
 * @param L
 * @returns {function(*=, *=, *=): *}
 */
const makeTileLayer = L => (url, map, settings) =>
    L.tileLayer(url, settings).addTo(map)

export default makeTileLayer
