class Auth {
    static set api(axios) {
        this._api = axios
    }

    static get availableMethods() {
        return [
            'login',
            'logout',
            'register',
            'checkLoginStatus'
        ]
    }

    static login(email, password) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/auth/login`

            let data = {
                email,
                password
            }

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    static logout() {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/auth/logout`

            this._api.post(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    static register(email, password) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/auth/reg`

            let data = {
                email,
                password
            }

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    static checkLoginStatus() {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/auth/check`

            this._api.get(apiEndpoint)
                .then(data => resolve(data))
                .catch(err => reject(err))

        })
    }

    static getFillableAttributes() {
        return new Promise((resolve, reject) => {
            reject('This model do not have attributes')
        })
    }

    static getAllAttributes() {
        return new Promise((resolve, reject) => {
            reject('This model do not have attributes')
        })
    }

    static sendResetPasswordEmail(email) {
        return new Promise((resolve, reject) => {
            if (email == null) {
                reject('email is null')
            }

            let apiEndpoint = `/password/email`

            let data = {
                email
            }

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static checkResetTokenStatus(token) {
        return new Promise((resolve, reject) => {
            if (token == null) {
                reject('token is null')
            }
            let apiEndpoint = `/password/token`

            let data = {
                token
            }

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static resetPassword(token, password) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = `/password/reset`
            if (token == null) {
                reject('token is null')
            }

            if (password == null) {
                reject('password is null')
            }

            let data = {
                token,
                password
            }

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }
}

export default Auth
