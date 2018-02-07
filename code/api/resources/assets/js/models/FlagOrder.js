import BaseModel from './base-model'

class FlagOrder extends BaseModel {
    static get apiModelName() {
        return 'flag_order'
    }

    static updateFlagOrder(data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = 'flag_order/update'

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'updateFlagOrder',
        ]
    }
}

export default FlagOrder
