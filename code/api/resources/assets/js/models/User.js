import BaseModel from './base-model'


class User extends BaseModel {
    static get apiModelName() {
        return 'users'
    }

    static get availableMethods() {
        return [
            'me',
            'updateRole',
            'getOne',
            'updateOne',
            'getAll(new City(id))',
            'getAll(new Event(id))'
        ]
    }

    static me() {
        return new Promise((resolve, reject) => {

            let apiEndpoint = `/${this.apiModelName}/me`


            this._api.get(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    static updateRole(userId, data) {
        return new Promise((resolve, reject) => {

            let apiEndpoint = `/${this.apiModelName}/${userId}/role`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }
}

export default User
