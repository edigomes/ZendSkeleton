app.service('DataService', function($http) {
    
    /**
     * 
     * @param {type} id
     * @param {type} service
     * @param {type} store
     * @param {type} filter
     * @returns {undefined}
     */
    this.getData = function(id, service, callback, filter) {
        //var get = $http.get('system/CAD_cliente/'+id);
        var get = $http.get('../public/'+service+'/'+id);
        get.success(function (data, status, headers, config) {
            callback(data);
        });
        get.error(function (data, status, headers, config) {
            // Some code has gone here
        });
    };
    
    this.setData = function(data, service) {
        
    };
    
});