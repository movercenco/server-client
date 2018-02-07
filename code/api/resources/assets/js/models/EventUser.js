import BaseModel from './base-model'

class EventUser extends BaseModel {
    static get apiModelName() {
        return 'event_user'
    }

    static toggle(id, data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `events/${id}/rsvp`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'toggle'
        ]
    }
}

export default EventUser
