import BaseModel from './base-model'

class DeliveryGroup extends BaseModel {
    static get apiModelName() {
        return 'delivery_groups'
    }

    static get availableMethods() {
        return [
            'createOne',
            'getAll',
            'updateOne',
        ]
    }
}

export default DeliveryGroup
