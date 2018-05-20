var dataTableVariable ;
var month_year;
app.controller('PaymentBook',function($scope,httpService,validateService,$state,commonService){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    $('#debitnote_date,#creditnote_date,#cheque_date,#dd_date,#ap_date,#ap_supplier_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true,
      startDate : new Date()
    });

    $('#example2').DataTable();

    $('#payable_month,#list_payable_month,#ap_payable_month').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true,
      startDate : new Date()
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
        commonService.showLoader();
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                commonService.hideLoader();
                $('#showPaymentBookSearch').html(data);
                $('#showAddNoteSearch').css('display','block');
            }
            else
            {
                commonService.hideLoader();
                $('#showPaymentBookSearch').html("");
                validateService.displayMessage('error','No data found..',"");
            }
        });
    }
    
    $scope.add_note = function(){
        $('#debit_credit_note_modal').modal();
    }

    $scope.advancePaymentData = {};
    $scope.add_advance_payment = function(){
        $scope.advancePaymentData = {};
        $('#advance_payment_modal').modal();
        $scope.getPoNumberAsPerSupplierData = [];
        $('#ap_supplier_name').on('select2:select', function (e) {
            $scope.getPoNumberAsPerSupplierData = [];
            var data = e.params.data;
            var service_details = {
                method_name : "getPoNumberAsPerSupplier",
                controller_name : "PaymentBook",
                data : JSON.stringify($scope.advancePaymentData)
            };
            commonService.showLoader();
            httpService.callWebService(service_details).then(function(data){
                if(data)
                { 
                    console.log(data);
                    $scope.getPoNumberAsPerSupplierData = data;
                    commonService.hideLoader();
                }
                else
                {
                    commonService.hideLoader();
                }
            });
            console.log(data);
        });
    }

    $scope.add_advance_payment_action = function()
    {
        var service_details = {
            method_name : "addAdvancePaymentAction",
            controller_name : "PaymentBook",
            data : JSON.stringify($scope.advancePaymentData)
        };
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                $scope.searchAction();
                validateService.displayMessage('success','Added Successfully','');
                $('#advance_payment_modal').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.editPaymentListAngular = function(data){

        $scope.editPaymentList = {
                s_no        : "",
                avg_cost    : "",
                query       : "",
                deduction   : "",
                cheque_date : "",
                cheque_no   : "",
                cheque_amount : "",
                payable_month : ""
        };
        $scope.editPaymentList.s_no          = data.s_no;
        $scope.editPaymentList.avg_cost      = data.avg_cost;
        $scope.editPaymentList.query         = data.query;
        $scope.editPaymentList.deduction     = data.deduction;
        $scope.editPaymentList.cheque_date   = data.cheque_date;
        $scope.editPaymentList.cheque_no     = data.cheque_no;
        $scope.editPaymentList.cheque_amount = data.cheque_amount;
        $scope.editPaymentList.payable_month = data.payable_month;
        $scope.editPaymentList.bill_number   = data.bill_number;
        $('#material_modal').modal('show');
    } 

    $scope.downloadAsPdfCoverLetter = function(data)
    {
        var url = 'CoveringLetter/downloadAsPdf?payment_statement_supplier_id='+data['supplier_id']+'&payment_statement_date='+data['payable_month'];
        window.open(url);
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
                $('#material_modal').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.deletePaymentListAngular = function(data)
    {
        var service_details = {
            method_name : "deletePaymentList",
            controller_name : "PaymentBook",
            data : JSON.stringify(data)
        };

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete)
            {
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
        });
    }

    $scope.deleteDepositDetailsFunction = function(data){

        $scope.deleteDepositDetails ={};
        
        $scope.deleteDepositDetails.s_no = data.s_no;

            var service_details = {
                method_name : "deleteDepositDetails",
                controller_name : "PaymentBook",
                data : JSON.stringify($scope.deleteDepositDetails)
            };

            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete)
                {
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
            });
    }

    $scope.deleteAdvancePaymentDetails = function(data){
        var service_details = {
            method_name : "deleteAdvancePaymentDetails",
            controller_name : "PaymentBook",
            data : JSON.stringify(data)
        };

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete)
            {
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
        });
    }

    $scope.downloadAsPdfPaymentBookDetails = function(){
        console.log($scope.generatePoData);
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
        if(validateService.blank($scope.addNoteData['payable_month'],"Please Enter the payable_month","payable_month")) return false;

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
                $scope.searchAction();
                $('#debit_credit_note_modal').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.chequeNumberDetails = {};
    $scope.editChequeNumberDetails = function(data)
    {
        $scope.chequeNumberDetails = {};
        $scope.chequeNumberDetails = data;

        var service_details = {
            method_name : "getChequeNumberDetailsAction",
            controller_name : "PaymentBook",
            data : JSON.stringify($scope.chequeNumberDetails)
        };
        commonService.showLoader();
        httpService.callWebService(service_details).then(function(data){
            commonService.hideLoader();
            if(data)
            {
                $scope.chequeNumberDetails['deduction'] = data.deduction;
                $scope.chequeNumberDetails['cheque_no'] = data.cheque_no;
                $scope.chequeNumberDetails['cheque_date'] = data.cheque_date;
                $scope.chequeNumberDetails['cheque_amount'] = data.cheque_amount;
                $scope.chequeNumberDetails['dd_number'] = data.dd_number;
                $scope.chequeNumberDetails['dd_date'] = data.dd_date;
                $scope.chequeNumberDetails['dd_amount'] = data.dd_amount;
            }
        });

        $('#cheque_number_modal').modal('show');
    }

    $scope.editChequeNumberDetailsAction = function()
    {
        var service_details = {
            method_name : "editChequeNumberDetailsAction",
            controller_name : "PaymentBook",
            data : JSON.stringify($scope.chequeNumberDetails)
        };
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Cheque Number Updated..','');
                $scope.searchAction();
                $('#cheque_number_modal').modal('hide');
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
    scope.editPaymentListAngular(data);
    scope.$apply();
}

function deletePaymentList(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.deletePaymentListAngular(data);
    scope.$apply();
}

function deleteDepositDetails(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.deleteDepositDetailsFunction(data);
    scope.$apply();
}

function deleteAdvancePaymentDetails(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.deleteAdvancePaymentDetails(data);
    scope.$apply();
}

function downloadAsPdfPaymentBookDetails(){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.downloadAsPdfPaymentBookDetails();
    scope.$apply();
}

function editChequeNumberDetails(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.editChequeNumberDetails(data);
    scope.$apply();
}

function downloadAsPdfCoverLetter(data)
{
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.downloadAsPdfCoverLetter(data);
    scope.$apply();
}