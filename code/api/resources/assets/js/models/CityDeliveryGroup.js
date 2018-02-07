import BaseModel from './base-model'

class CityDeliveryGroup extends BaseModel {
    static get apiModelName() {
        return 'city_delivery_group'
    }

    static sync(data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = 'city_delivery_group/sync'

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'sync'
        ]
    }
}

export default CityDeliveryGroup
