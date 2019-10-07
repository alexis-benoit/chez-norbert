import initializeMenu from '../../../site/components/header/initialize-menu'

describe ('#initializeMenu', () => {
    it ('calls subscribe with a function as parameter', () => {
        const subscribe = jest.fn ()
        initializeMenu(subscribe, () => {}, () => {})

        expect (subscribe).toBeCalled()
        expect (typeof subscribe.mock.calls[0][0]).toBe('function')
    })

    it ('calls setAttribute with false when getAttribute returns true as a string', () => {
        let callback = null

        const getAttribute = () => 'true'
        const setAttribute = jest.fn ()
        const subscribe = cb => callback = cb

        initializeMenu(subscribe, getAttribute, setAttribute)

        callback()

        expect (setAttribute).toBeCalled()
        expect (setAttribute.mock.calls[0][0]).toBe(false)
    })

    it ('returns setAttribute with true when getAttribute doesnt returns true as a string', () => {
        let callback = null

        const getAttribute = jest.fn ()
            .mockReturnValueOnce('false')
            .mockReturnValueOnce(false)
            .mockReturnValueOnce(null)
            .mockReturnValueOnce(undefined)
            .mockReturnValueOnce(1)
            .mockReturnValueOnce([])

        const setAttribute = jest.fn ()
        const subscribe = cb => callback = cb

        initializeMenu(subscribe, getAttribute, setAttribute)

        callback()
        callback()
        callback()
        callback()
        callback()
        callback()

        expect (setAttribute).toBeCalled()
        expect (setAttribute.mock.calls[0][0]).toBe(true)
        expect (setAttribute.mock.calls[1][0]).toBe(true)
        expect (setAttribute.mock.calls[2][0]).toBe(true)
        expect (setAttribute.mock.calls[2][0]).toBe(true)
        expect (setAttribute.mock.calls[2][0]).toBe(true)
        expect (setAttribute.mock.calls[2][0]).toBe(true)
    })
})
