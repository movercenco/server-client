import BaseModel from './base-model'


class Inventory extends BaseModel {
    static get apiModelName() {
        return 'inventories'
    }

    static updateInventory(data = {}) {
        return new Promise((resolve, reject) => {
            let apiEndpoint = 'inventories/update'

            this._api.post(apiEndpoint, data)
                .then(data => resolve(data))
                .catch(err => reject(err))
        })
    }

    static get availableMethods() {
        return [
            'updateInventory',
            'getAll'
        ]
    }
}

export default Inventory
