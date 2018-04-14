var dataTableVariable ;
var month_year;
app.controller('PaymentBook',function($scope,httpService,validateService,$state){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    $('#debitnote_date,#creditnote_date,#cheque_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true,
      startDate : new Date()
    });

    $('#payable_month,#list_payable_month').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true
    });

    $('.select2').select2();

    $scope.showMaterialOutStandingTable = false;
	$scope.month_year = '';
    $scope.materialOutStanding = "";
    setTimeout(function(){$scope.exampleDataTable(); $scope.addNoteData_reset();},100);

    $scope.editMaterialPOData = {};

   $scope.addNoteData_reset = function()
    {
        $scope.addNoteData = {};
        $scope.addNoteData = {
          amount : "",
          type : "",
          creditnote_date : "",
          debitnote_date : "",
          debitnote_no : "",
          payable_month : "",
          query : "",
          supplier_creditnote_no : "",
          supplier_id : ""
        };
    }

	$('#search_month_year').datepicker({
        autoclose: true,
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
    

    $scope.exampleDataTable = function()
    {
        dataTableVariable = $('#example').DataTable({
            dom: 'Brfrtip',
            buttons: [
                'copy', 
                'csv',
                'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    $scope.searchAction = function()
    {
        dataTableVariable.destroy();

        var service_details = {
            method_name : "searchPaymentBookAction",
            controller_name : "PaymentBook",
            data : JSON.stringify($scope.generatePoData)
        };
        $scope.materialOutStanding = [];
        $scope.showMaterialOutStandingTable = false;
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#showPaymentBookSearch').html(data);
                $('#showAddNoteSearch').css('display','block');
            }
        });
    }
    
    $scope.add_note = function(){
        $('#debit_credit_note_modal').modal();
    }
    $scope.getPaymentList = function(data){

        $scope.editPaymentList = {
                s_no        : "",
                avg_cost    : "",
                query       : "",
                deduction   : "",
                cheque_date : "",
                cheque_no   : "",
                cheque_amount : "",
                payable_month : "",
                po_generated_request_id : ""
        };
        $scope.editPaymentList.s_no          = data.s_no;
        $scope.editPaymentList.avg_cost     = data.avg_cost;
        $scope.editPaymentList.query        = data.query;
        $scope.editPaymentList.deduction     = data.deduction;
        $scope.editPaymentList.dc_number    = data.dc_number;
        $scope.editPaymentList.cheque_date  = data.cheque_date;
        $scope.editPaymentList.cheque_no    = data.cheque_no;
        $scope.editPaymentList.cheque_amount = data.cheque_amount;
        $scope.editPaymentList.payable_month  = data.payable_month;
        $scope.editPaymentList.po_generated_request_id  = data.po_generated_request_id;
        $('#material_modal').modal();
    } 
    
    $scope.editPaymentBook = function(){

        var service_details = {
            method_name : "updatePaymentBookDetails",
            controller_name : "PaymentBook",
            data : JSON.stringify($scope.editPaymentList)
        };
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                $scope.searchAction();
                validateService.displayMessage('success','Update Successfully','');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.deleteDepositDetails = function(data){

        $scope.deleteDepositDetails ={};
        
        $scope.deleteDepositDetails.s_no = data.s_no;

            var service_details = {
                method_name : "deleteDepositDetails",
                controller_name : "PaymentBook",
                data : JSON.stringify($scope.deleteDepositDetails)
            };
            httpService.callWebService(service_details).then(function(data){
                if(data)
                { 
                    $scope.searchAction();
                    validateService.displayMessage('success','Data Removed Successfully','');
                }
                else
                {
                    validateService.displayMessage('error','Delete Error',"");
                }
            });
    }

    $scope.downloadAsPdfPaymentBookDetails = function(){
        var url = 'PaymentBook/downloadAsPdfPaymentBookDetails?supplier_name='+$scope.generatePoData['supplier_name'];
        window.open(url);
    }

    $scope.update_note_details = function(){
        $scope.addNoteData['supplier_id'] = $scope.generatePoData['supplier_name'];
        if(validateService.blank($scope.addNoteData['type'],"Please select note type","type")) return false;
        if($scope.addNoteData['type'] !== 'B')
        {
            if(validateService.blank($scope.addNoteData['debitnote_no'],"Please Enter Debit note no","debitnote_no")) return false;
            if(validateService.blank($scope.addNoteData['supplier_creditnote_no'],"Please Enter supplier creditnote no","supplier_creditnote_no")) return false;
            if(validateService.blank($scope.addNoteData['query'],"Please Enter Query","query")) return false;
        }
        if(validateService.blank($scope.addNoteData['amount'],"Please Enter the amount","amount")) return false;

        var service_details = {
            method_name : "addNoteDetails",
            controller_name : "PaymentBook",
            data : JSON.stringify($scope.addNoteData)
        };
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Note Added Successfully','');
                $('#debit_credit_note_modal').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }
});

function editPaymentList(data){
      var scope = angular.element($('[ui-view=div1]')).scope();
    scope.getPaymentList(data);
    scope.$apply();
}
function deleteDepositDetails(data){
    var confim = confirm("Are you sure want to delete?");
    if(confim)
    {
        var scope = angular.element($('[ui-view=div1]')).scope();
        scope.deleteDepositDetails(data);
        scope.$apply();
    }
}

function downloadAsPdfPaymentBookDetails(){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.downloadAsPdfPaymentBookDetails();
    scope.$apply();
}