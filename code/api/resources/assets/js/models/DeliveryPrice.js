import BaseModel from './base-model'

class DeliveryPrice extends BaseModel {
    static get apiModelName() {
        return 'delivery_prices'
    }

    static get availableMethods() {
        return [
            'createOne(new DeliveryGroup(id))',
            'updateOne',
            'deleteOne',
        ]
    }
}

export default DeliveryPrice
