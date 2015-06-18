app.factory('CustomersService', function ($resource) {
    return $resource('../public/cliente/:id', {}, {
        query: { method: 'GET'},
        create: { method: 'POST', params: {data: '@customer'}},
        show: { method: 'GET'},
        update: { method: 'PUT', params: {id: '@id', data: '@customer'} },
        delete: { method: 'DELETE', params: {id: '@id'} }
    });
});