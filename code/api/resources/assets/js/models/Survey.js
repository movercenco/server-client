import BaseModel from './base-model'


class Survey extends BaseModel {
    static get apiModelName() {
        return 'surveys'
    }

    static get availableMethods() {
        return [
            'createOne'
        ]
    }
}

export default Survey
