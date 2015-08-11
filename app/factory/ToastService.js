app.service('ToastService', function(ngToast) {

    this.showSucess = function(message) {
        $.notify({
            title: "Sucesso",
            text: message,
            image: '<span class="glyphicon mdi-action-done"></span>'
        }, {globalPosition: "bottom right", className: 'success', autoHide: true});
    };

    this.showError = function(message) {
        $.notify({
            title: "Erro",
            text: message,
            image: '<span class="glyphicon mdi-content-remove-circle"></span>'
        }, {globalPosition: "bottom right", className: 'error', autoHide: true});
    };
    
    this.show = function(data, callbackSucess, callbackError) {
        if (data.status) {
            $.notify({
                title: "Sucesso",
                text: data.message,
                image: '<span class="glyphicon mdi-action-done"></span>'
            }, {globalPosition: "bottom right", className: 'success', autoHide: true});
        } else {
            $.notify({
                title: "Erro",
                text: data.message,
                image: '<span class="glyphicon mdi-content-remove-circle"></span>'
            }, {globalPosition: "bottom right", className: 'error', autoHide: true});
        }
    };
    
});