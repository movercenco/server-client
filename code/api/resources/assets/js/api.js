import axios from 'axios'

const _ = require('lodash')

//const axios = require('axios')

class Api {
    constructor(settings = {}) {
        if (settings.baseDomain) {
            this.axios = axios.create({
                baseURL: settings.baseDomain,
                withCredentials: true
            })
        } else {
            this.axios = axios
        }

        this.axios.defaults.validateStatus = status => {
            return status >= 200 && status < 500
        }
        this.axios.interceptors.response.use(response => {
            response.isOk = response.status >= 200 && response.status < 300
            return response
        })

        this.Auth = require('./auth').default
        this.Auth.api = this.axios
    }

    addModels(models) {
        _.each(models, (value, key) => {
            this.addModel(value, key)
        })

        return this
    }

    addModel(value, key) {
        this[key] = value
        this[key].api = this.axios
    }

    addResponseInterceptor(handler) {
        this.axios.interceptors.response.use(response => {
            handler(response)

            response.isOk = response.status >= 200 && response.status < 300

            return response
        })
    }
}

export default Api;
