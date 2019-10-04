/**
 * Feed modules with dependency object
 *
 * @param dependencies
 * @param modules
 */
const initializesModules = (dependencies, modules) => {
    modules.forEach (module => module (dependencies))
}

export default initializesModules
