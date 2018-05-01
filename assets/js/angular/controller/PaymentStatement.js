var dataTableVariable ;
var month_year;
app.controller('PaymentStatement',function($scope,httpService,validateService,$state,commonService){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    $('#payment_statement_month').datepicker({
      autoclose: true,
      format: "yyyy-mm",
      viewMode: "months", 
      minViewMode: "months"
    });

    $scope.paymentStatementObject    = {};
    $scope.showPaymentStatmentSearch = false;
    $scope.paymentStatmentSearchData = [];
    
    $('.select2').select2();
    var dataTableVariable;
    $scope.exampleDataTable = function()
    {
        dataTableVariable = $('#example').DataTable({
            dom: 'Brfrtip',
            ordering : false,
            buttons: [
                'copy', 
                'csv',
                'excel',
                'pdf'
            ]
        });
    }

    $scope.exampleDataTable();
    $scope.searchAction = function()
    {
        dataTableVariable.destroy();
        var service_details = {
            method_name : "searchAction",
            controller_name : "PaymentStatement",
            data : JSON.stringify($scope.paymentStatementObject)
        };

        $scope.showPaymentStatmentSearch = false;
        commonService.showLoader();
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                setTimeout(function(){$scope.exampleDataTable();},500);
                $scope.paymentStatmentSearchData = data;
                $scope.showPaymentStatmentSearch = true;
                commonService.hideLoader();
            }
            else
            {
                $scope.showPaymentStatmentSearch = false;
                commonService.hideLoader();
                validateService.displayMessage('error','No data found..',"");
            }
        });
    }

});

function editPaymentList(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.editPaymentListAngular(data);
    scope.$apply();
}