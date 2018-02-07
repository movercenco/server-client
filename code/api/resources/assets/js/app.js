import Api from './api.js'

window.Raven = require('raven-js')

Raven.config('https://fca4bc75e18545ea9da2e34f72b89c14@sentry.createl.la/12', {
    ignoreUrls: [/localhost/]
}).install()

let settings = {
    baseDomain: process.env.NODE_ENV == 'production' ? 'https://api.mundolingo.org/' : 'https://c0c9f349300664f6.api.mundolingo.org/'
}

if (process.env.NODE_ENV !== 'production') {
    if (window._playground) {
        settings = {
            baseDomain: ''
        }
    }
}


window.Api = new Api(settings)

const models = {
    User: require('./models/User').default,
    Survey: require('./models/Survey').default,
    City: require('./models/City').default,
    Inquiry: require('./models/Inquiry').default,
    CityUser: require('./models/CityUser').default,
    Flag: require('./models/Flag').default,
    FlagUser: require('./models/FlagUser').default,
    Event: require('./models/Event').default,
    Inventory: require('./models/Inventory').default,
    FlagOrder: require('./models/FlagOrder').default,
    Order: require('./models/Order').default,
    DeliveryGroup: require('./models/DeliveryGroup').default,
    CityDeliveryGroup: require('./models/CityDeliveryGroup').default,
    DeliveryPrice: require('./models/DeliveryPrice').default,
    EventUser: require('./models/EventUser').default,
    Transaction: require('./models/Transaction').default,
    Report: require('./models/Report').default,
    Payment: require('./models/Payment').default
}

window.Api.addModels(models)
