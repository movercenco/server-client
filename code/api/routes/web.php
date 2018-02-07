<?php

if(env('APP_ENV') != 'production') {
    Route::get('playground', function(){
        return view('playground');
    });

    Route::get('readme', function() {
        return \File::get(base_path('docs.md'));
    });

    Route::get('users/attributes/all', 'UserController@getAllAttributes');
    Route::get('users/attributes/fillable', 'UserController@getFillableAttributes');
    Route::get('surveys/attributes/all', 'SurveyController@getAllAttributes');
    Route::get('surveys/attributes/fillable', 'SurveyController@getFillableAttributes');
    Route::get('cities/attributes/all', 'CityController@getAllAttributes');
    Route::get('cities/attributes/fillable', 'CityController@getFillableAttributes');
    Route::get('inquiries/attributes/all', 'InquiryController@getAllAttributes');
    Route::get('inquiries/attributes/fillable', 'InquiryController@getFillableAttributes');
    Route::get('city_user/attributes/all', 'CityUserController@getAllAttributes');
    Route::get('city_user/attributes/fillable', 'CityUserController@getFillableAttributes');
    Route::get('flags/attributes/all', 'FlagController@getAllAttributes');
    Route::get('flags/attributes/fillable', 'FlagController@getFillableAttributes');
    Route::get('flag_user/attributes/all', 'FlagUserController@getAllAttributes');
    Route::get('flag_user/attributes/fillable', 'FlagUserController@getFillableAttributes');
    Route::get('events/attributes/all', 'EventController@getAllAttributes');
    Route::get('events/attributes/fillable', 'EventController@getFillableAttributes');
    Route::get('inventories/attributes/all', 'InventoryController@getAllAttributes');
    Route::get('inventories/attributes/fillable', 'InventoryController@getFillableAttributes');
    Route::get('orders/attributes/all', 'OrderController@getAllAttributes');
    Route::get('orders/attributes/fillable', 'OrderController@getFillableAttributes');
    Route::get('flag_order/attributes/all', 'FlagOrderController@getAllAttributes');
    Route::get('flag_order/attributes/fillable', 'FlagOrderController@getFillableAttributes');
    Route::get('delivery_groups/attributes/all', 'DeliveryGroupController@getAllAttributes');
    Route::get('delivery_groups/attributes/fillable', 'DeliveryGroupController@getFillableAttributes');
    Route::get('delivery_prices/attributes/all', 'DeliveryPriceController@getAllAttributes');
    Route::get('delivery_prices/attributes/fillable', 'DeliveryPriceController@getFillableAttributes');
    Route::get('city_delivery_group/attributes/all', 'CityDeliveryGroupController@getAllAttributes');
    Route::get('city_delivery_group/attributes/fillable', 'CityDeliveryGroupController@getFillableAttributes');
    Route::get('event_user/attributes/all', 'EventUserController@getAllAttributes');
    Route::get('event_user/attributes/fillable', 'EventUserController@getFillableAttributes');
    Route::get('transactions/attributes/all', 'TransactionController@getAllAttributes');
    Route::get('transactions/attributes/fillable', 'TransactionController@getFillableAttributes');
    Route::get('payments/attributes/all', 'PaymentController@getAllAttributes');
    Route::get('payments/attributes/fillable', 'PaymentController@getFillableAttributes');
    Route::get('reports/attributes/all', 'ReportController@getAllAttributes');
    Route::get('reports/attributes/fillable', 'ReportController@getFillableAttributes');
}


Route::get('blockchain/callback/order', 'OrderController@processCallback');
Route::get('blockchain/callback/payment', 'PaymentController@processCallback');

//Route::get('email/verify/{code}', 'UserController@verifyEmail');
Route::get('auth/check', 'AuthenticateController@check');
Route::post('auth/reg', 'AuthenticateController@reg');
Route::post('auth/login', 'AuthenticateController@login');
//Route::post('auth/oauth', 'AuthenticateController@socialLogin');
Route::post('auth/logout', 'AuthenticateController@logout');

Route::get('verify/email', 'UserController@verifyEmail');

Route::post('password/email', 'UserController@sendResetLinkEmail');
Route::post('password/reset', 'UserController@resetPassword');
Route::post('password/token', 'UserController@checkToken');

Route::post('files/upload', 'UploadController@upload');
Route::post('images/upload', 'UploadController@uploadImage');

Route::get('cities', 'CityController@getAll');
Route::get('cities/{id}', 'CityController@getOne');
Route::get('cities/{id}/users', 'CityUserController@getUserForOneCity');
Route::get('cities/{id}/events', 'EventController@getEventsForCity');

Route::get('events/{id}/users', 'EventUserController@getUserForOneEvent');
Route::get('users/{id}/events', 'EventUserController@getEventForOneUser');

Route::get('flags', 'FlagController@getAll');

Route::post('surveys/create', 'SurveyController@create');
Route::post('inquiries/create', 'InquiryController@create');


Route::group(['middleware' => 'auth'], function() {
    Route::post('cities/create', 'CityController@create');
    Route::post('cities/{id}', 'CityController@updateOne');
    Route::post('cities/{id}/delete', 'CityController@delete');
    Route::post('cities/{id}/reports/clean', 'CityController@cleanReports');

    Route::post('city_user/sync', 'CityUserController@sync');

    Route::post('flag_user/sync', 'FlagUserController@sync');

    Route::get('users/me', 'UserController@me');
    Route::post('users/{id}', 'UserController@updateOne');
    Route::post('users/{id}/role', 'UserController@updateRole');

    Route::get('inventories', 'InventoryController@getAll');
    Route::post('inventories/update', 'InventoryController@update');

    Route::post('orders/create', 'OrderController@create');
    Route::get('orders', 'OrderController@getAll');
    Route::get('orders/{id}', 'OrderController@getOne');
    Route::post('orders/{id}', 'OrderController@updateOne');
    Route::post('orders/{id}/shipped', 'OrderController@markShipped');
    Route::post('orders/{id}/received', 'OrderController@markReceived');

    Route::post('flag_order/update', 'FlagOrderController@update');

    Route::post('events/create', 'EventController@create');
    Route::post('events/{id}', 'EventController@update');
    Route::post('events/{id}/rsvp', 'EventUserController@toggle');
    Route::post('events/{id}/delete', 'EventController@delete');
    Route::post('events/{id}/invite', 'EventController@invite');

    Route::post('delivery_groups/create', 'DeliveryGroupController@create');
    Route::post('delivery_groups/{id}', 'DeliveryGroupController@update');
    Route::get('delivery_groups', 'DeliveryGroupController@getAll');

    Route::post('city_delivery_group/sync', 'CityDeliveryGroupController@sync');

    Route::post('delivery_groups/{id}/delivery_prices/create', 'DeliveryPriceController@create');
    Route::post('delivery_prices/{id}', 'DeliveryPriceController@update');
    Route::post('delivery_prices/{id}/delete', 'DeliveryPriceController@delete');

    Route::get('transactions', 'TransactionController@getAll');
    Route::post('transactions/create', 'TransactionController@create');

    Route::get('reports', 'ReportController@getAll');
    Route::get('cities/{id}/reports', 'ReportController@getReportForOneCity');
    Route::post('reports/create', 'ReportController@create');

    Route::get('payments', 'PaymentController@getAll');
    Route::post('payments/create', 'PaymentController@create');
});

Route::get('users/{id}', 'UserController@getOne');
Route::get('events/{id}', 'EventController@getOne');
