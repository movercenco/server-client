import BaseModel from './base-model'


class Inquiry extends BaseModel {
    static get apiModelName() {
        return 'inquiries'
    }

    static get availableMethods() {
        return [
            'createOne'
        ]
    }
}

export default Inquiry
