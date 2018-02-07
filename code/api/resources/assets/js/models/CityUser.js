import BaseModel from './base-model'


class CityUser extends BaseModel {
    static get apiModelName() {
        return 'city_user'
    }

    static sync(data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = 'city_user/sync'

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

export default CityUser
