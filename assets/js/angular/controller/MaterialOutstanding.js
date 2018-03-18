var dataTableVariable ;
app.controller('MaterialOutstanding',function($scope,httpService,validateService,$state){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

    $('#received_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true
    });

    $scope.showMaterialOutStandingTable = false;

    $scope.materialOutStanding = "";

    setTimeout(function(){$scope.exampleDataTable();},100);

    $scope.clearRedMark = function(id)
    {
        $("#"+id).parent('div').removeClass('has-error');
    }

    $scope.editMaterialPOData = {};
    $scope.resetEditPoData = function(){
        /*$scope.editMaterialPOData = {};
        $scope.editMaterialPOData = {
            received : "",
            received_date : "",
            invoice_number : "",
            bill_amount : "",
            dc_number : ""
        }*/
    }

    $scope.generatePoData = {
        po_number : "",
        po_year : "",
        unit : "",
        material_name : "",
        supplier_name : "",
        outstanding_type : "M",
        filter_type_wise : "",
        filter_type : {
            PO : false,
            Material : false,
            Unit : false,
            Supplier : false
        },
        show_button : false,
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

    $scope.filterChange = function(value){
        $scope.generatePoData['filter_type'] = {
            PO : false,
            Material : false,
            Unit : false,
            Supplier : false
        };
        value = $scope.generatePoData.filter_type_wise;
        $scope.generatePoData.show_button = (value === "")?false:true;
        $scope.generatePoData['filter_type'][value] = !$scope.generatePoData['filter_type'][value];

        setTimeout(function(){
            $('#search_year_po').datepicker({
                autoclose: true,
                format: " yyyy",
                viewMode: "years", 
                minViewMode: "years"
            });

            $('.select2').select2();
            /*$('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
                $(this).one('focus', select2Focus)
                $(this).closest('.select2-selection').removeClass('border-focus');
            });*/
        },100)
    }

    $scope.searchAction = function()
    {
        if(validateService.blank($scope.generatePoData['outstanding_type'],"Please Choose outstanding type","outstanding_type")) return false;

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
        $scope.editMaterialPOData  = {};
        for(var i in x)
        {
            $scope.editMaterialPOData[i] = x[i];
        }
        $scope.editMaterialPOData['received_data'] = x.received;
        if($scope.generatePoData['outstanding_type'] === 'M')
        {
            $scope.editMaterialPOData['received'] = 0;
            $scope.editMaterialPOData['bill_amount'] = 0;
            $scope.editMaterialPOData['invoice_number'] = "";
            $scope.editMaterialPOData['dc_number'] = "";
        }
        $('#invoice_number').parent('div').removeClass('has-error')
        $('#dc_number').parent('div').removeClass('has-error')
        $('#material_modal').modal();
    }

    $scope.edit_material_action = function(){

        if(validateService.blank($scope.editMaterialPOData['received'],"Please Enter Received Data","received")) return false;

        if($scope.generatePoData['outstanding_type'] === 'M')
        {
            if(parseInt($scope.editMaterialPOData['received']) === 0){
                validateService.displayMessage('error',"Must give received data","Validation Error");
                validateService.addErrorTag(["received"]);
                return false;
            }

            if($scope.editMaterialPOData['bill_amount'] === "0" || $scope.editMaterialPOData['bill_amount'] === "")
            {
                validateService.displayMessage('error',"Must give bill_amount","Validation Error");
                validateService.addErrorTag(["bill_amount"]);
                return false;
            }
        }

        if($scope.editMaterialPOData['invoice_number'] === "" && $scope.editMaterialPOData['dc_number'] === ""){
            validateService.displayMessage('error',"Please enter any one field(invoice_number,bill_amount,dc_number)","Validation Error");
            validateService.addErrorTag(["invoice_number","dc_number"]);
            return false;
        }
        
        
        var balance = parseInt($scope.editMaterialPOData['qty'] - $scope.editMaterialPOData['received_data']);
        if((balance < parseInt($scope.editMaterialPOData['received'])) && $scope.editMaterialPOData['outstanding_type'] === 'M')
        {
           validateService.displayMessage('error',"Invalid Received Data","Validation Error");
           return false;
        }

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

    $scope.deleteMaterialOutStanding = function(data){
        var service_details = {
            method_name : "deleteMaterialOutstandingAction",
            controller_name : "MaterialOutstanding",
            data : JSON.stringify(data)
        };

        swal({
          title: "Are you sure?",
          text: "",
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
                        validateService.displayMessage('success','Deleted Successfully','');
                        $scope.searchAction();
                    }
                    else
                    {
                        validateService.displayMessage('error','Update Error',"");
                    }
                });
            }
        });
    }

});