app.factory('CustomersService', function ($resource) {
    return $resource('../public/cliente/:id', {id: '@id'}, {
        query: { method: 'GET'},
        create: { method: 'POST'},
        show: { method: 'GET'},
        //*update: { method: 'PUT', params: {id: '@id', data: '@customer'} },
        update: { method: 'PUT'},
        delete: { method: 'DELETE', params: {id: '@id'}}
    });
});