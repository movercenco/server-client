import BaseModel from './base-model'

class Payment extends BaseModel {
    static get apiModelName() {
        return 'payments'
    }

    static get availableMethods() {
        return [
            'getAll',
            'createOne',
        ]
    }
}

export default Payment
