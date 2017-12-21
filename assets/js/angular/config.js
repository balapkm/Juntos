var $stateProviderRef = null;
app.config(function($stateProvider, $urlRouterProvider){
    $stateProviderRef = $stateProvider;
});

app.run(function(httpService,commonService){
    var data = {
        controller_name : 'Dashboard',
        method_name     : 'getComponentDetails'
    };

    httpService.callWebService(data).then(function(data){
        angular.forEach(data,function(v,k){
            $stateProviderRef.state(v.component_path,{
                url        : v.component_path,
                views : {
                    "div1" : {
                        templateProvider : function(getTemplateData){
                            return getTemplateData;
                        },
                        controller : v.component_name
                    }
                },
                resolve:{
                    getTemplateData : function($q){
                        commonService.showLoader();
                        var deferred = $q.defer();
                        httpService.callWebService({
                            controller_name : v.component_name,
                            method_name     : 'index'
                        }).then(function(data){
                            commonService.hideLoader();
                            deferred.resolve(data);
                        });
                        return deferred.promise;
                    }
                } 
            })
        });
    });
});