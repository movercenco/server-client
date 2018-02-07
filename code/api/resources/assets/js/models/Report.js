import BaseModel from './base-model'

class Report extends BaseModel {
    static get apiModelName() {
        return 'reports'
    }

    static get availableMethods() {
        return [
            'getAll',
            'getAll(new Event(id))',
            'createOne',
        ]
    }
}

export default Report
