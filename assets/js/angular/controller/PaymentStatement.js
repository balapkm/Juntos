var dataTableVariable ;
var month_year;
app.controller('PaymentStatement',function($scope,httpService,validateService,$state,commonService){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    setTimeout(function(){
        $('.select2').select2();
        $('#payment_statement_month').daterangepicker({
              autoUpdateInput: false,
              locale: {
                  cancelLabel: 'Clear'
              }
        });
        $('#payment_statement_month').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
        });

        $('#payment_statement_month').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
        });
    },1500)

    $scope.paymentStatementObject    = {};
    $scope.showPaymentStatmentSearch = false;
    $scope.paymentStatmentSearchData = [];
    
    var dataTableVariable;
    $scope.exampleDataTable = function()
    {
        dataTableVariable = $('#example').DataTable({
            dom: 'Brfrtip',
            ordering : false,
            buttons: [
                'copy', 
                'csv',
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: 'th:not(:first-child)'
                    }
                }
            ]
        });
    }

    $scope.exampleDataTable();
    $scope.searchAction = function()
    {
        dataTableVariable.destroy();
        $scope.paymentStatementObject.payment_statement_month = $("#payment_statement_month").val();

        if(validateService.blank($scope.paymentStatementObject['division'],"Please Enter division","division")) return false;
        if(validateService.blank($scope.paymentStatementObject['payment_statement_month'],"Please Choose date range","payment_statement_month")) return false;
        
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

    $scope.updateEditPaymentStatement = function()
    {
        var service_details = {
            method_name : "updateEditPaymentStatement",
            controller_name : "PaymentStatement",
            data : JSON.stringify($scope.editPaymentStatement)
        };

        commonService.showLoader();
        httpService.callWebService(service_details).then(function(data){
            commonService.hideLoader();
            if(data)
            { 
                validateService.displayMessage('success','Updated Successfully','');
                $scope.searchAction();
                $('#edit_payment_statment').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.editpaymentStatment = function(data)
    {
        $scope.editPaymentStatement = {};
        $scope.editPaymentStatement['cheque_number_id'] = data.cheque_number_id;
        $scope.editPaymentStatement['page_no'] = data.page_no;
        $('#edit_payment_statment').modal('show');
    }

});

function editPaymentList(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.editPaymentListAngular(data);
    scope.$apply();
}