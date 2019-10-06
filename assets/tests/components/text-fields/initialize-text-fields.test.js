import initializeTextField from '../../../site/components/text-fields/initialize-text-field'

describe ('#initializeTextFields', () => {
    it ('calls subscribe with a function as parameter', () => {
        const subscribe = jest.fn()
        initializeTextField(subscribe, () => {}, () => {})

        expect (subscribe).toBeCalled()
        expect (typeof subscribe.mock.calls[0][0]).toBe('function')
    })

    it ('calls setAttribute with true if getTextLength returns 0', () => {

        let callback = null

        const getTextLength = () => 0
        const setAttribute = jest.fn()
        const subscribe = _callback => callback = _callback

        initializeTextField(subscribe, setAttribute, getTextLength)

        callback()

        expect (setAttribute).toBeCalled()
        expect (setAttribute.mock.calls[0][0]).toBe(true)
    })

    it ('calls setAttribute with false if getTextLength doesnt return 0', () => {
        let callback = null

        const getTextLength = () => 1
        const setAttribute = jest.fn()
        const subscribe = _callback => callback = _callback

        initializeTextField(subscribe, setAttribute, getTextLength)

        callback()

        expect (setAttribute).toBeCalled()
        expect (setAttribute.mock.calls[0][0]).toBe(false)
    })

    it ('calls setAttribute with false if getTextLength returns !== 0', () => {
        let callback = null

        const getTextLength = () => 'jzfoifeiz'
        const setAttribute = jest.fn ()
        const subscribe = _callback => callback = _callback

        initializeTextField(subscribe, setAttribute, getTextLength)

        callback()

        expect (setAttribute).toBeCalled()
        expect (setAttribute.mock.calls[0][0]).toBe(false)
    })

    it ('calls setAttribute with false if getTextLength return a string with 0', () => {
        let callback = null

        const getTextLength = () => '0'
        const setAttribute = jest.fn ()
        const subscribe = _callback => callback = _callback

        initializeTextField(subscribe, setAttribute, getTextLength)

        callback()

        expect (setAttribute).toBeCalled()
        expect (setAttribute.mock.calls[0][0]).toBe(false)
    })
})