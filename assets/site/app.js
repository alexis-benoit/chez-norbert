import settings from './settings'
import initializeModules from './components/modules-handler'
import typography from './components/typography'
import header from './components/header'
import textFields from './components/text-fields'
import map from './components/map'
import card from './components/card'
import carousel from './components/carousel'
import modal from './components/modal'
import alert from './components/alert'
import lazyLoad from './components/lazy-load'

initializeModules(
    { document, settings, window },
    [ typography, header, textFields, map, card, carousel, modal, alert, lazyLoad ]
)
