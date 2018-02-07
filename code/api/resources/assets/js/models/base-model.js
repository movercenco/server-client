class BaseModel {
    constructor(id = null) {
        this.id = id
        this.init()
    }

    init() {
        this._api = this.constructor._api
        this.checkModelName()
    }

    checkModelName() {
        return this.apiModelName !== undefined
    }

    get apiModelName() {
        return this.constructor.apiModelName
    }

    static get apiModelName() {
        throw new Error('model name is not defined')
    }

    static set api(axios) {
        this._api = axios
    }

    update(data) {
        return this.constructor.updateOne(this.id, data)
    }

    static deleteOne(id = null) {
        return new Promise((resolve, reject) => {
            if (id === null) {
                reject('id is not defined')
            }

            let apiEndpoint = `/${this.apiModelName}/${id}/delete`

            this._api.post(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    static updateOne(id = null, data = {}) {
        return new Promise((resolve, reject) => {
            if (id === null) {
                reject('id is not defined')
            }
            let apiEndpoint = `/${this.apiModelName}/${id}`

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    // parentModel = new Model(id)
    static createOne(data = {}, parentModel = null) {
        return new Promise((resolve, reject) => {
            let apiEndpoint

            if (parentModel === null) {
                apiEndpoint = `/${this.apiModelName}/create`
            } else {
                apiEndpoint = `/${parentModel.apiModelName}/${parentModel.id}/${this.apiModelName}/create`
            }

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static getOne(id = null) {
        return new Promise((resolve, reject) => {
            if (id === null) {
                reject('id is not defined')
            }

            let apiEndpoint = `/${this.apiModelName}/${id}`

            this._api.get(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    // parentModel = new Model(id)
    static getAll(parentModel = null) {
        return new Promise((resolve, reject) => {
            let apiEndpoint

            if (parentModel === null) {
                apiEndpoint = `/${this.apiModelName}`
            } else {
                apiEndpoint = `/${parentModel.apiModelName}/${parentModel.id}/${this.apiModelName}`
            }

            this._api.get(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static getFillableAttributes() {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/${this.apiModelName}/attributes/fillable`

            this._api.get(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static getAllAttributes() {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/${this.apiModelName}/attributes/all`

            this._api.get(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }
}

export default BaseModel
