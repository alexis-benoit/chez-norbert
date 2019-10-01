import initializeModules from './components/modules-handler'
import typography from './components/typography'
import header from './components/header'
import textFields from './components/text-fields'

initializeModules({ document }, [ typography, header, textFields ])
