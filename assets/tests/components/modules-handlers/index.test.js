import modulesHandler from '../../../site/components/modules-handler'

describe ('#modulesHandler', () => {
    it ('calls each module with the dependency object', () => {
        const firstModule = jest.fn (() => {})
        const secondModule = jest.fn (() => {})

        modulesHandler({ hello: 'world' }, [ firstModule, secondModule ])

        expect (firstModule).toBeCalled()
        expect (firstModule).toBeCalledWith (expect.objectContaining({
            hello: expect.stringMatching('world')
        }))

        expect (secondModule).toBeCalled()
        expect (secondModule).toBeCalledWith (expect.objectContaining({
            hello: expect.stringMatching('world')
        }))
    })
})