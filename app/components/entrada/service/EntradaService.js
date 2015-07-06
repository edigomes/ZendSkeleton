app.factory('EntradaService', function ($resource) {
    return $resource('../public/entrada/:id', {id: '@id'}, {
        query: { method: 'GET'},
        create: { method: 'POST'},
        show: { method: 'GET'},
        update: { method: 'PUT'},
        delete: { method: 'DELETE', params: {id: '@id'}}
    });
});