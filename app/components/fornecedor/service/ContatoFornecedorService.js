app.factory('ContatoFornecedorService', function ($resource) {
    return $resource('../public/contatofornecedor/:id', {id: '@id'}, {
        query: { method: 'GET'},
        create: { method: 'POST'},
        show: { method: 'GET'},
        update: { method: 'PUT'},
        delete: { method: 'DELETE', params: {id: '@id'}}
    });
});