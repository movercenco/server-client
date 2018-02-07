import BaseModel from './base-model'

class Event extends BaseModel {
    static get apiModelName() {
        return 'events'
    }

    static invite(id, data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `events/${id}/invite`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'createOne',
            'getAll(new City(id))',
            'getAll(new User(id))',
            'getOne',
            'updateOne',
            'deleteOne',
            'invite'
        ]
    }
}

export default Event
