var tab_switch_name = 'tab_1';
var po_year = "";
var po_number = "";
function select2Focus() {
    $(this).closest('.select2').prev('select').select2('open');
    $(this).closest('.select2-selection').addClass('border-focus');
}
app.controller('GeneratePo',function($scope,httpService,validateService,$state,commonService){


    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');
    setTimeout(function(){$('body').css('padding-right','0px');},1000);
	$('#delivery_date,#import_delivery_date,#edit_delivery_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true,
      startDate : new Date()
    });
    $('#po_date,#edit_po_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true
    });
    $scope.showOtherChargeName = false;
    $scope.materialNameDetails = [];

    setTimeout(function(){
        $scope.po_reset();
        $scope.po_search_reset();
        $scope.po_edit_reset();
        $scope.po_other_charge_reset();
        $scope.import_other_charge_reset();

    },10);

    

    setTimeout(function(){
        if(tab_switch_name === 'tab_2')
        {
            $scope.searchPoData = {
              po_year : po_year,
              po_number : po_number
            };
            $('#po_number_search').select2().val(po_number).trigger("change");
            $scope.searchPo();

            $('a[href="#'+tab_switch_name+'"]').trigger('click');
        }
    },500);


    $('#search_year_po').datepicker({
        autoclose: true,
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    $scope.showPoSearch = false;

    $scope.po_number_details = JSON.parse($('#po_number_details').val());


    $('.select2').select2();
    $('.select2_multiple').select2();
    $('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
        $(this).one('focus', select2Focus)
        $(this).closest('.select2-selection').removeClass('border-focus');
    });

    $scope.importDetailsShow = {
        incoterms : false,
        Shipment  : false,
        payment_status   : false
    }

    $scope.changeImportDetailsShow = function(id)
    {
        if($scope.importOtherCharge[id] === 'OTHERS')
        {
            $scope.importDetailsShow[id] = true;
        }
        else
        {
            $scope.importDetailsShow[id] = false;
        }
    }

    $scope.po_other_charge_reset = function(){
        $scope.poOtherCharge   = {};
        $scope.poOtherCharge = {
          unit : "",
          type : "",
          po_number : "",
          po_date : "",
          name : "",
          hsn_code : "",
          amount_type : "",
          amount : "",
          CGST : "",
          SGST : "",
          IGST : ""
        };
    }

    $scope.import_other_charge_reset = function(){
        $scope.importOtherCharge   = {};
        $scope.importOtherCharge = {
          delivery_date : "",
          incoterms : "",
          Shipment : "",
          payment_status : ""
        };
    }

    $scope.po_search_reset = function(){
        $scope.searchPoData   = {};
        $scope.searchPoData = {
          po_year : new Date().getFullYear(),
          po_number : "",
          final_po_data : {}
        };
        $scope.searchPoBasedOnYear();
    }

    $scope.po_edit_reset = function(){
        $scope.poEditFormData   = {};
        $scope.poEditFormData = {
            material_name : "",
            qty : "",
            id : "",
            price : ""
        };
    }

    $scope.po_reset = function()
    {
        $scope.generatePoData = {};
        $scope.generatePoData = {
          unit : "",
          type : "",
          order_reference : "",
          po_number : "",
          po_raw_number : "",
          po_date : "",
          delivery_date : "",
          supplier_id : "",
          material_id : ""
        };
    }

    $scope.getPoNumber = function()
    {
        if(($scope.generatePoData.unit !=="") && ($scope.generatePoData.type !=="")){
            var $object = $scope.po_number_details[$scope.generatePoData.unit][$scope.generatePoData.type];
            $scope.generatePoData.po_number     = $object['format']+$object['po_current_value'];
            $scope.generatePoData.po_raw_number = $object['po_current_value'];
        }
    }

    $scope.searchPoBasedOnYear = function()
    {
        if($scope.searchPoData.po_year !== "")
        {
            $scope.searchPoBasedOnYearData = [];
            commonService.showLoader();
            var service_details = {
                method_name : "searchPoBasedOnYear",
                controller_name : "GeneratePo",
                data : JSON.stringify($scope.searchPoData)
            };
            httpService.callWebService(service_details).then(function(data){
                commonService.hideLoader();
                if(data)
                { 
                    $scope.searchPoBasedOnYearData = data;
                }
            });
        }
    }

    $scope.clearRedMark = function(id)
    {
        $("#"+id).parent('div').removeClass('has-error');
    }

    $scope.getPONumberHighestBasedPODate = function()
    {
        if(($scope.generatePoData.unit !=="") && ($scope.generatePoData.type !=="") && ($scope.generatePoData.po_date !== ""))
        {
            commonService.showLoader();
            var service_details = {
                method_name : "getPONumberHighestBasedPODate",
                controller_name : "GeneratePo",
                data : JSON.stringify($scope.generatePoData)
            };
            httpService.callWebService(service_details).then(function(data){
                commonService.hideLoader();
                if(data)
                { 
                    $scope.generatePoData.po_number     = data['po_number']
                    $scope.generatePoData.po_raw_number = data['po_raw_number'];
                }
            });
        }
    }

    $scope.generatePo = function()
    {
        if(validateService.blank($scope.generatePoData['unit'],"Please Choose type","unit")) return false;
        if(validateService.blank($scope.generatePoData['type'],"Please Choose type","type")) return false;
        if(validateService.blank($scope.generatePoData['order_reference'],"Please Enter Order Reference query","order_reference")) return false;
        if(validateService.blank($scope.generatePoData['po_date'],"Please Choose Po Date","po_date")) return false;
        if(validateService.blank($scope.generatePoData['delivery_date'],"Please Choose Delivery Date","delivery_date")) return false;
        if(validateService.blank($scope.generatePoData['supplier_id'],"Please Choose Supplier name","supplier_id")) return false;
        // if(validateService.blank($scope.generatePoData['material_id'],"Please Choose Material name","material_id")) return false;
        
        $scope.tempMaterialNameDetails = {};
        for (var i = 0; i < $scope.materialNameDetails.length; i++) {
            $scope.tempMaterialNameDetails['material_'+$scope.materialNameDetails[i]['material_id']] = $scope.materialNameDetails[i]['material_name'];
        }


        if($scope.generatePoData['material_id'].length === 0)
        {
            validateService.displayMessage('error','Please Choose Material Name','');
            validateService.addErrorTag(['material_id']);
        }

        $scope.generatePoData['quantity'] = [];
        $('#add_quantity_details').modal('show');
        // console.log($scope.generatePoData);
        return false;
    }

    $scope.updateQuantityGeneratePo = function()
    {
        for(var i=0;i<$scope.generatePoData['quantity'].length;i++)
        {
            if(validateService.blank($scope.generatePoData['quantity'][i],"Please Enter Quantity"+i,"edit_quantity_"+i)) return false;
        }
        var service_details = {
            method_name : "generatePoData",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.generatePoData)
        };
        po_number = $scope.generatePoData['unit']+"|"+$scope.generatePoData['type']+"|"+$scope.generatePoData['po_raw_number']+"|"+$scope.generatePoData['po_number'];
        po_year   = new Date($scope.generatePoData['po_date']).getFullYear();
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Added Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
                $('#add_quantity_details').modal('hide');
            }
            else
            {
                validateService.displayMessage('error','Duplicate Entry',"");
            }
        });
    }

    $scope.searchPo = function()
    {
        if(validateService.blank($scope.searchPoData['po_number'],"Please Choose Po Number","po_number_search")) return false;
        if(validateService.blank($scope.searchPoData['po_year'],"Please Choose Po Year","search_year_po")) return false;

        var service_details = {
            method_name : "viewPoData",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.searchPoData)
        };
        commonService.showLoader();
        po_year = $scope.searchPoData['po_year'];
        po_number = $scope.searchPoData['po_number'];

        httpService.callWebService(service_details).then(function(data){
            commonService.hideLoader();
            if(!data)
            {
                validateService.displayMessage('error','No data Found..',"");
            }
            else
            {
                $scope.showPoSearch = true;
                $('#showPoSearch').html(data);
                var number   = $("#GrandTotal").text();
                var currency = $("#currencyCode").text();
                $('#numberToWord').html("<b>Amount In Words : </b>"+commonService.number2text(number,currency).toUpperCase());
            }
        });
    }

    $scope.downloadAsPdfPODetails = function(){
        var url = 'GeneratePo/downloadAsPdfPODetailsAction?po_number='+po_number+"&po_year="+po_year;
        window.open(url);
    }

    $scope.downloadAsHtmlPdfPODetailsAction = function(){
        var url = 'GeneratePo/downloadAsHtmlPdfPODetailsAction?po_number='+po_number+"&po_year="+po_year;
        window.open(url);
    }

    $scope.poEditClick = function(data){
        $scope.poEditFormData.po_description = data.po_description;
        $scope.poEditFormData.qty           = data.qty;
        $scope.poEditFormData.id            = data.po_generated_request_id;
        $scope.poEditFormData.price         = data.price;
        $scope.poEditFormData.material_hsn_code  = data.material_hsn_code;
        $('#edit_material_uom').select2().val(data.material_uom).trigger("change");
        $scope.poEditFormData.material_uom   = data.material_uom;
        $scope.poEditFormData.discount       = data.discount;
        $scope.poEditFormData.state_code     = data.state_code;
        $scope.poEditFormData.CGST           = data.CGST;
        $scope.poEditFormData.SGST           = data.SGST;
        $scope.poEditFormData.IGST           = data.IGST;
        $('#po_modal').modal('show');
    }
    $scope.editOtherDetailsFn = function(data){
        $scope.editOtherDetails = {};
        $scope.editOtherDetails.po_date = data[0].po_date;
        $scope.editOtherDetails.supplier_id = data[0].supplier_id;
        $scope.editOtherDetails.delivery_date = data[0].delivery_date;
        $scope.editOtherDetails.order_reference = data[0].order_reference;
        $scope.editOtherDetails.po_ids = [];
        for (var i = 0;i < data.length;i++) {
            $scope.editOtherDetails.po_ids.push(data[i].po_generated_request_id);
        }
        setTimeout(function(){$('#edit_supplier_id').select2().val(data[0].supplier_id).trigger('change.select2')},100);
        $('#edit_other_details').modal('show');
    }

    $scope.updateOtherPoDetails = function()
    {
        var service_details = {
            method_name : "editPoOtherDetailsAction",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.editOtherDetails)
        };

        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Updated Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.edit_po_action = function(){

        // if(validateService.blank($scope.poEditFormData['po_description'],"Please Enter material Description","po_description")) return false;
        if(validateService.blank($scope.poEditFormData['qty'],"Please Enter quantity","Quantity")) return false;
        // if(validateService.blank($scope.poEditFormData['price'],"Please Enter price","edit_price")) return false;

        $scope.poEditFormData['po_description'] = $scope.poEditFormData['po_description'].replace(/<br\s*\/?>/mg,"\n");
        delete $scope.poEditFormData.state_code;
        var service_details = {
            method_name : "editPoDetailsAction",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.poEditFormData)
        };

        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Updated Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
            }
            else
            {
                validateService.displayMessage('error','Update Error',"");
            }
        });
    }

    $scope.poDeleteActiom = function(data){

        var service_details = {
            method_name : "deletePoDetailsAction",
            controller_name : "GeneratePo",
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
            if(willDelete){
                httpService.callWebService(service_details).then(function(data){
                    if(data)
                    {
                        validateService.displayMessage('success','Deleted Successfully','');
                        $state.reload();
                        tab_switch_name = 'tab_2';
                    }
                    else
                    {
                        validateService.displayMessage('error','Failed to delete',"");
                    }
                })
            }
        });
    }

    $scope.getMaterialDetailsAsPerSupplier = function(id){
        $scope.clearRedMark(id);
        $scope.generatePoData.material_id = "";
        var service_details = {
            method_name : "getMaterialDetailsAsPerSupplier",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.generatePoData)
        };
        $scope.materialNameDetails = [];   
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $scope.materialNameDetails = data;
            }
        });
    }

    $scope.addAdditionalCharges = function(data)
    {
        $scope.poOtherCharge['unit'] = data['unit'];
        $scope.poOtherCharge['type'] = data['type'];
        $scope.poOtherCharge['po_date'] = data['po_date'];
        $scope.poOtherCharge['po_number'] = data['po_number'];
        $scope.poOtherCharge['state_code'] = data['state_code'];
        $('#additional_charge_modal').modal('show');
    }

    $scope.addAdditionalChargesAction = function()
    {
        if($scope.poOtherCharge.name === 'OTHER')
        {
            $scope.showOtherChargeName   = !$scope.showOtherChargeName;
            $scope.poOtherCharge['name'] = $scope.poOtherCharge.other_charge_name;
            delete $scope.poOtherCharge.other_charge_name;
        }

        if(validateService.blank($scope.poOtherCharge['name'],"Please Enter Charge name","charge_name")) return false;
        // if(validateService.blank($scope.poOtherCharge['hsn_code'],"Please Enter HSN Code","chargeHSNCode")) return false;
        if(validateService.blank($scope.poOtherCharge['amount_type'],"Please Choose Amount Type","chargeAmountType")) return false;
        if(validateService.blank($scope.poOtherCharge['amount'],"Please Enter Amount","chargeAmount")) return false;
        
        if($scope.poOtherCharge['type'] !== 'Import' && $scope.poOtherCharge['type'] !== 'Sample_Import')
        {
            if($scope.poOtherCharge['state_code'] === "33")
            {
                if(validateService.blank($scope.poOtherCharge['CGST'],"Please Enter CGST","chargeCGST")) return false;
                if(validateService.blank($scope.poOtherCharge['SGST'],"Please Enter SGST","chargeSGST")) return false;
            }
            else
            {
                if(validateService.blank($scope.poOtherCharge['IGST'],"Please Enter iGST","chargeIGST")) return false;
            }
        }   
        $scope.poOtherCharge = validateService.changeAllUpperCase($scope.poOtherCharge);
        var service_details = {
          method_name : "addAdditionalChargesAction",
          controller_name : "GeneratePo",
          data : JSON.stringify($scope.poOtherCharge)
        };
        
        httpService.callWebService(service_details).then(function(data){
            if(data)
            {
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Added Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
            }
            else
            {
                validateService.displayMessage('error','Error',"");
            }
        })
    }

    $scope.deletePoOtherAdditionalCharges =function(data)
    {
        var service_details = {
            method_name : "deletePoOtherAdditionalCharges",
            controller_name : "GeneratePo",
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
            if(willDelete){
                httpService.callWebService(service_details).then(function(data){
                    if(data)
                    {
                        validateService.displayMessage('success','Deleted Successfully','');
                        $state.reload();
                        tab_switch_name = 'tab_2';
                    }
                    else
                    {
                        validateService.displayMessage('error','Failed to delete',"");
                    }
                })
            }
        });
    }

    $scope.changeOtherCharges = function(id)
    {
        $scope.clearRedMark(id);
        if($scope.poOtherCharge.name === 'OTHER')
        {
            $scope.showOtherChargeName = !$scope.showOtherChargeName;
        }
    }

    $scope.editImportOtherDetails = function(data)
    {
        if(data.length !== 0)
        {
            $scope.importOtherCharge['id'] = data[0]['import_other_id'];
            $scope.importOtherCharge['delivery_date'] = data[0]['delivery_date'];
            $scope.importOtherCharge['incoterms'] = data[0]['incoterms'];
            $scope.importOtherCharge['payment_status'] = data[0]['payment_terms'];
            $scope.importOtherCharge['Shipment'] = data[0]['Shipment'];
            $scope.importOtherCharge['query'] = data[0]['query'];
        }
        
        $('#import_other_details_modal').modal('show');
    }

    $scope.editImportOtherDetailsAction = function()
    {
        // if(validateService.blank($scope.importOtherCharge['delivery_date'],"Please Choose delivery date","import_delivery_date")) return false;
        if(validateService.blank($scope.importOtherCharge['incoterms'],"Please Choose incoterms","import_incoterms")) return false;
        // if(validateService.blank($scope.importOtherCharge['query'],"Please Enter Query","import_query")) return false;
        if(validateService.blank($scope.importOtherCharge['payment_status'],"Please Choose payment Status","import_payment_status")) return false;
        if(validateService.blank($scope.importOtherCharge['Shipment'],"Please Choose Shipment","import_shipment")) return false;

        if($scope.importOtherCharge['incoterms'] === 'OTHERS')
        {
            $scope.importOtherCharge['incoterms'] = $scope.importOtherCharge['import_incoterms_other'];
            delete $scope.importOtherCharge['import_incoterms_other'];
        }

        if($scope.importOtherCharge['payment_status'] === 'OTHERS')
        {
            $scope.importOtherCharge['payment_status'] = $scope.importOtherCharge['import_payment_status_other'];
            delete $scope.importOtherCharge['import_payment_status_other'];
        }

        if($scope.importOtherCharge['Shipment'] === 'OTHERS')
        {
            $scope.importOtherCharge['Shipment'] = $scope.importOtherCharge['Shipment_other'];
            delete $scope.importOtherCharge['Shipment_other'];
        }

        $scope.importOtherCharge = validateService.changeAllUpperCase($scope.importOtherCharge);
        var service_details = {
          method_name : "editImportOtherDetailsAction",
          controller_name : "GeneratePo",
          data : JSON.stringify($scope.importOtherCharge)
        };
        httpService.callWebService(service_details).then(function(data){
            if(data)
            {
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Updated Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
            }
            else
            {
                validateService.displayMessage('error','Error',"");
            }
        })
    }

    $scope.addPurchaseOrder = function(data)
    {
        var po_number_details = JSON.parse($('#po_number_details').val());
        $scope.generatePoData = {
          unit : data.unit,
          type : data.type,
          order_reference : data.order_reference,
          po_number : po_number_details[data.unit][data.type]['format']+data.po_number,
          po_raw_number : data.po_number,
          po_date : data.po_date,
          delivery_date : data.delivery_date,
          supplier_id : data.supplier_id,
          material_id : ""
        };
        $scope.getMaterialDetailsAsPerSupplier('add_purchase_order');
        $('#add_purchase_order').modal('show')
    }

    $scope.addPurchaseOrderAction = function()
    {
        if($scope.generatePoData['material_id'].length === 0)
        {
            validateService.displayMessage('error','Please Choose Material Name','');
            validateService.addErrorTag(['material_id']);
        }
        var service_details = {
            method_name : "generatePoData",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.generatePoData)
        };
        po_number = $scope.generatePoData['unit']+"|"+$scope.generatePoData['type']+"|"+$scope.generatePoData['po_raw_number']+"|"+$scope.generatePoData['po_number'];
        po_year   = new Date($scope.generatePoData['po_date']).getFullYear();
        httpService.callWebService(service_details).then(function(data){
            if(data)
            { 
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Added Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
            }
            else
            {
                validateService.displayMessage('error','Duplicate Entry',"");
            }
        });
    }

    $scope.overAllDiscountDetails = {
        discount_type : "",
        discount : "",
        unit : "",
        type : "",
        po_number: "",
        po_date : ""
    }
    $scope.addOverAllDiscount = function(data)
    {
        $scope.overAllDiscountDetails = {
            discount_type : "",
            discount : "",
            unit : data.unit,
            type : data.type,
            po_number: data.po_number,
            po_date : data.po_date
        }
        $('#overall_discount_modal').modal('show');
    }

    $scope.addOverAllDiscountAction = function()
    {
        $scope.overAllDiscountDetails = validateService.changeAllUpperCase($scope.overAllDiscountDetails);
        var service_details = {
          method_name : "addOverAllDiscountAction",
          controller_name : "GeneratePo",
          data : JSON.stringify($scope.overAllDiscountDetails)
        };
        httpService.callWebService(service_details).then(function(data){
            if(data)
            {
                $('#modal-backdrop').css('display','none');
                validateService.displayMessage('success','Add Successfully','');
                $state.reload();
                tab_switch_name = "tab_2";
            }
            else
            {
                validateService.displayMessage('error','Error',"");
            }
        })
    }

    $scope.deleteOverAllDiscountDetails = function(data)
    {
        var service_details = {
            method_name : "deleteOverAllDiscountDetails",
            controller_name : "GeneratePo",
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
            if(willDelete){
                httpService.callWebService(service_details).then(function(data){
                    if(data)
                    {
                        validateService.displayMessage('success','Deleted Successfully','');
                        $state.reload();
                        tab_switch_name = 'tab_2';
                    }
                    else
                    {
                        validateService.displayMessage('error','Failed to delete',"");
                    }
                })
            }
        });
    }
});

function editPoDetails(data)
{
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.poEditClick(data);
    scope.$apply();
}

function editOtherDetails(data)
{
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.editOtherDetailsFn(data);
    scope.$apply();
}

function deletePoDetails(data)
{
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.poDeleteActiom(data);
    scope.$apply();
}

function downloadAsPdfPODetails(){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.downloadAsPdfPODetails();
    scope.$apply();
}


function downloadAsHtmlPdfPODetailsAction(){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.downloadAsHtmlPdfPODetailsAction();
    scope.$apply();
}

function addAdditionalCharges(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.addAdditionalCharges(data);
    scope.$apply();
}

function deletePoOtherAdditionalCharges(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.deletePoOtherAdditionalCharges(data);
    scope.$apply();
}

function editImportOtherDetails(data){
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.editImportOtherDetails(data);
    scope.$apply();
}

function addPurchaseOrder(data) {
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.addPurchaseOrder(data);
    scope.$apply();
}

function addOverAllDiscount(data) {
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.addOverAllDiscount(data);
    scope.$apply();
}

function deleteOverAllDiscountDetails(data) {
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.deleteOverAllDiscountDetails(data);
    scope.$apply();
}