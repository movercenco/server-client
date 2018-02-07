import BaseModel from './base-model'

class Order extends BaseModel {
    static get apiModelName() {
        return 'orders'
    }

    static markShipped(id, data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `orders/${id}/shipped`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static markReceived(id, data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `orders/${id}/received`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'createOne',
            'updateOne',
            'getOne',
            'getAll',
            'markShipped',
            'markReceived'
        ]
    }
}

export default Order
