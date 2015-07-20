app.factory('EntradaService', function ($resource) {
    return $resource('../public/entrada/:id', {id: '@id'}, {
        query: { method: 'GET'},
        create: { method: 'POST'},
        show: { method: 'GET'},
        update: { method: 'PUT'},
        finaliza: { method: 'PUT', params: {finaliza: true}},
        delete: { method: 'DELETE', params: {id: '@id'}}
    });
});