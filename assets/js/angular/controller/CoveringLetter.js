var dataTableVariable ;
var month_year;
app.controller('CoveringLetter',function($scope,httpService,validateService,$state,commonService){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    $('#payment_statement_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true
    });

    $scope.coveringLetterObject    = {};
    
    $('.select2').select2();
    
    $scope.searchAction = function()
    {
        var service_details = {
            method_name : "searchAction",
            controller_name : "CoveringLetter",
            data : JSON.stringify($scope.coveringLetterObject)
        };
        $('#showCoveringLetterSearch').html("");
        commonService.showLoader();
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#showCoveringLetterSearch').html(data);
                commonService.hideLoader();
            }
            else
            {
                commonService.hideLoader();
                $('#showCoveringLetterSearch').html("");
                validateService.displayMessage('error','No data found..',"");
            }
        });
    }

    $scope.downloadAsPdfCoverLetter = function()
    {
        var url = 'CoveringLetter/downloadAsPdf?payment_statement_supplier_id='+$scope.coveringLetterObject['payment_statement_supplier_id']+'&payment_statement_date='+$scope.coveringLetterObject['payment_statement_date'];
        window.open(url);
    }
});

function downloadAsPdfCoverLetter()
{
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.downloadAsPdfCoverLetter();
    scope.$apply();
}