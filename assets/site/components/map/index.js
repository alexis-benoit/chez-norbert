import L from 'leaflet'
import initialMap from './initialize-map'
import makeMapFactory from "./make-map-factory"
import makePopupFactory from "./make-popup-factory"
import makeTileLayer from "./make-tile-layer";

/**
 * Initialize the contact page map.
 *
 * @param settings
 * @param document
 */
const initializeMapsAdapter = ({ settings, document }) => {

    const mapElements = document.querySelectorAll('[data-map]')

    mapElements.forEach(mapElement => {
        const center = JSON.parse(mapElement.getAttribute('data-center'))
        const zoom = mapElement.getAttribute('data-zoom')
        const markers = [...document.querySelectorAll(`[data-marker="${mapElement.id}"`)]
            .map(markerElement => {
                const position = JSON.parse(markerElement.getAttribute('data-position'))
                const content = markerElement.cloneNode(true).innerHTML

                return { position, content }
            })

        const makePopup = makePopupFactory(L)
        const makeMap = makeMapFactory(L)
        const tileLayer = makeTileLayer(L)

        initialMap(settings.map, { makePopup, makeMap, tileLayer }, { center, zoom, markers, id: mapElement.id })
    })

    // const map = L.map('map-id').setView([48.2050849, 7.3633694], 100)
    //
    // L.tileLayer(settings.map.url, settings.map).addTo(map)
    // L.popup()
    //     .setLatLng([48.2050849, 7.3633694])
    //     .setContent("Chez Norbert")
    //     .openOn(map);
}

export default initializeMapsAdapter