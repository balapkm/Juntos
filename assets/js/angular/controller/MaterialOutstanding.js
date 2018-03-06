var dataTableVariable ;
app.controller('MaterialOutstanding',function($scope,httpService,validateService,$state){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    $('#received_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true
    });
   
    $('.select2').select2();
    $('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
        $(this).one('focus', select2Focus)
        $(this).closest('.select2-selection').removeClass('border-focus');
    });

    $scope.showMaterialOutStandingTable = false;

    $scope.materialOutStanding = "";

    setTimeout(function(){$scope.exampleDataTable();},100);

    $scope.clearRedMark = function(id)
    {
        $("#"+id).parent('div').removeClass('has-error');
    }

    $('#search_year_po').datepicker({
        autoclose: true,
        format: " yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });


    $scope.resetEditPoData = function(){
        $scope.editMaterialPOData = {};
        $scope.editMaterialPOData = {
            received : "",
            received_date : "",
            invoice_number : "",
            bill_amount : "",
            dc_number : ""
        }
    }

    $scope.generatePoData = {
        po_number : "",
        po_year : "",
        unit : "",
        material_name : "",
        supplier_name : "",
        outputData : []
    }


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
            method_name : "searchMaterialOutstandingAction",
            controller_name : "MaterialOutstanding",
            data : JSON.stringify($scope.generatePoData)
        };
        $scope.materialOutStanding = [];
        $scope.showMaterialOutStandingTable = false;
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $scope.materialOutStanding = data;   
                $scope.showMaterialOutStandingTable = true;
                setTimeout(function(){$scope.exampleDataTable();},100);
            }
        });
    }

    $scope.editMaterialOutStanding = function(x){
        $scope.editMaterialPOData = {
            received : x.received,
            received_date : x.received_date,
            invoice_number : x.invoice_number,
            bill_amount : x.bill_amount,
            dc_number : x.dc_number,
            id : x.po_generated_request_id
        }
        $('#material_modal').modal();
    }

    $scope.edit_material_action = function(){

        var service_details = {
            method_name : "updateMaterialOutstandingAction",
            controller_name : "MaterialOutstanding",
            data : JSON.stringify($scope.editMaterialPOData)
        };

        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Updated Successfully','');
                $scope.searchAction();
                $('#material_modal').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

});