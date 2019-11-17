import WebFontLoader from 'webfontloader'

/**
 * Initialize font loader
 */
const initializeWebFontLoader = ({}) => {
    WebFontLoader.load ({
        google: {
            families: ['Montserrat:400,500,600', 'Playfair Display:400,700', 'Charmonman:400', 'Material Icons']
        }
    })
}

export default initializeWebFontLoader
