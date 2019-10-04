/**
 * Create a new map factory
 *
 * @param L
 * @returns {function({id?: *, center?: *, zoom?: *}): *}
 */
const makeMapFactory = L => ({ id, center, zoom }) =>
    L.map(id).setView(center, zoom)

export default makeMapFactory
