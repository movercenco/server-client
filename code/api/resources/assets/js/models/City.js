import BaseModel from './base-model'

class City extends BaseModel {
    static get apiModelName() {
        return 'cities'
    }

    static cleanReports(id, data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `cities/${id}/reports/clean`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'getOne',
            'getAll',
            'updateOne',
            'createOne',
            'deleteOne',
            'cleanReports',
        ]
    }
}

export default City
