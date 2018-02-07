## Install SDK from API server
```
<script src="https://c0c9f349300664f6.api.mundolingo.org/api.js">
// or
<script src="https://api.mundolingo.org/api.js">
```

## Test Users
|email|password|
|:---:|:---:|
|lingo@example.com|123456|
|cm@example.com|123456|
|supplier@example.com|123456|
|admin@example.com|123456|

## Notice
responses status in range 200 - 499 will return in `.then` function, only 50x error will be rejected in promise. you can add a global response interceptor to handle some errors.

```
Api.addResponseInterceptor(({status}) => {
    if(status === 401) {
        // logout()
    }
})
```

meanwhile, you can use `response.isOk` to know if status is in range of 200 - 299


## Universal Model Api
### Initalize an instance of model (currently not using)
```
new Api.Model(id) // id can be null
```

### getOne
```
Api.Model.getOne(id).then(({data}) => console.log(data))
```

### getAll
```
Api.Model.getAll().then(({data}) => console.log(data))
```

### updateOne
```
Api.Model.updateOne(id, data = {
    attribute_1: 'value_1',
    attribute_2: 'value_2'
})
```

### createOne
```
Api.Model.createOne(data = {})
// or
Api.Model.createOne(data, new Api.ParentModel(parentModelId))
// like create a message for a thread. models that have parent model will be written in readme.
// this is a temporary solution before I implement automatic relationship resolver.
```

### deleteOne
```
Api.Model.deleteOne(id)
```

## Auth
### Login
```
Api.Auth.login(email, password)
```

### Register
```
Api.Auth.register(email, password)
```

### Logout
```
Api.Auth.logout()
```

### Check Login Status
```
Api.Auth.checkLoginStatus().then(({data}) => {
    if(data) {
        // code for logged in
    }
})
```

## Convention
### user role type
```
1 normal user, 2 CM, 3 Supplier, 4 Admin, 5 CM assitant, 6 Photographer, 7 Ambassadors
```

### timezone of city
use unicode timezone list, eg: `Asia/Shanghai`

### time of event
use `19:00` format

### flag type
1 for standard and 2 for rare

### order status
-1 expired, 1 created, 2 pending payment, 3 paid, 4 shipped, 5 received

### type of transactions
1 cash in 2 cash out

### payment status
1 created, 2 confirming, 3 paid

## Scoped Model Api
### CityUser
#### Sync
```
const data = {
    user_id: 1,
    city_ids: [
        1, 2, 3
    ]
}
CityUser.sync(data)
```

### FlagUser
#### Sync
```
const data = {
    user_id: 1,
    flag_ids: [
        1, 2, 3
    ]
}
FlagUser.sync(data)
```

### User
#### Me
```
User.me()
```

#### updateRole
```
const data={
    role_type: 1
}
User.updateRole(userId, data)
```

### Inventory
#### update inventory
```
let data = {
    "data": [
        {
            "flag_id": 1,
            "amount": 10
        },
        {
            "flag_id": 2,
            "amount": 100
        }
    ]
}

Inventory.updateInventory(data)
```

### flag order (flags bought in an order)
#### update flagorder
```
let data = {
    "order_id": 1,
    "data": [
        {
            "flag_id": 1,
            "amount": 10
        },
        {
            "flag_id": 2,
            "amount": 100
        }
    ]
}

FlagOrder.updateFlagOrder(data)
```

### CityDeliveryGroup
#### Sync
```
const data = {
    delivery_group_id: 1,
    city_ids: [
        1, 2, 3
    ]
}
CityDeliveryGroup.sync(data)
```

### EventUser
#### toggle
```
EventUser.toggle(eventId)
```

### Order
#### updateOne
```
submit finished=1 in updateOne when order is confirmed/finalized by CM
```

#### mark shipped/received
```
Order.markShipped(id)
Order.markReceived(id)
```


### Event
#### invite
```
Event.invite(id, data = {
    email,
    city_id
})
```
