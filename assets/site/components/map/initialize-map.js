const initializeMap = (leafletConfig, { makeMap, makePopup, tileLayer }, { center, zoom, markers, id }) => {
    const map = makeMap({ id, center, zoom })
    tileLayer (leafletConfig.url, map, leafletConfig)
    markers.forEach (marker => makePopup(map, marker))
}

export default initializeMap
