import initializeTextFieldAdapter from '../../../site/components/text-fields'

describe ('#initializeTextFieldAdapter', () => {
    it ('calls querySelectorAll three time', () => {
        const querySelectorAll = jest.fn ()

        querySelectorAll.mockReturnValue([])

        const document = { querySelectorAll }

        initializeTextFieldAdapter({ document })

        expect (querySelectorAll).toBeCalledTimes(3)
    })
})
