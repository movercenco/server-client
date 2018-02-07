import BaseModel from './base-model'

class Flag extends BaseModel {
    static get apiModelName() {
        return 'flags'
    }

    static get availableMethods() {
        return [
            'getAll'
        ]
    }
}

export default Flag
