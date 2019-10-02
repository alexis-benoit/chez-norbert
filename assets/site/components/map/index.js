import L from 'leaflet'

/**
 * Initialize the contact page map.
 *
 * @param settings
 */
const makeMap = ({ settings }) => {
    const map = L.map('map-id').setView([48.2050849, 7.3633694], 100)

    L.tileLayer(settings.map.url, settings.map).addTo(map)
    L.popup()
        .setLatLng([48.2050849, 7.3633694])
        .setContent("Chez Norbert")
        .openOn(map);
}

export default makeMap