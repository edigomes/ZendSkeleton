app.factory('VendaService', function ($resource) {
    return $resource('../public/venda/:id', {id: '@id'}, {
        query: { method: 'GET'},
        create: { method: 'POST'},
        show: { method: 'GET'},
        update: { method: 'PUT'},
        finaliza: { method: 'PUT', params: {finaliza: true}},
        cancela: { method: 'PUT', params: {cancela: true}},
        delete: { method: 'DELETE', params: {id: '@id'}}
    });
});