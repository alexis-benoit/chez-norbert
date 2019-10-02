import settings from './settings'
import initializeModules from './components/modules-handler'
import typography from './components/typography'
import header from './components/header'
import textFields from './components/text-fields'
import map from './components/map'

initializeModules({ document, settings }, [ typography, header, textFields, map ])
