import BaseModel from './base-model'


class FlagUser extends BaseModel {
    static get apiModelName() {
        return 'flag_user'
    }

    static sync(data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = 'flag_user/sync'

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

export default FlagUser
