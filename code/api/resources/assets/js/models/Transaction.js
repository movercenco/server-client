import BaseModel from './base-model'

class Transaction extends BaseModel {
    static get apiModelName() {
        return 'transactions'
    }

    static get availableMethods() {
        return [
            'createOne',
            'getAll',
        ]
    }

}

export default Transaction
