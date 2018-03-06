var tab_switch_name = 'tab_1';
var po_year = "";
var po_number = "";
app.controller('GeneratePo',function($scope,httpService,validateService,$state){

    $('.modal-backdrop').css('display','none');
    $('body').removeClass('modal-open');

	$('#po_date,#delivery_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true
    });

    setTimeout(function(){$scope.po_reset();$scope.po_search_reset();$scope.po_edit_reset();},10);

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
    },100);


    $('#search_year_po').datepicker({
        autoclose: true,
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    $scope.showPoSearch = false;

    $scope.po_number_details = JSON.parse($('#po_number_details').val());


    $('.select2').select2();
    $('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
        $(this).one('focus', select2Focus)
        $(this).closest('.select2-selection').removeClass('border-focus');
    });


    $scope.po_search_reset = function(){
        $scope.searchPoData   = {};
        $scope.searchPoData = {
          po_year : "",
          po_number : "",
          final_po_data : {}
        };
    }

    $scope.po_edit_reset = function(){
        $scope.poEditFormData   = {};
        $scope.poEditFormData = {
            material_name : "",
            qty : "",
            id : ""
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
          supplier_id : ""
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

    $scope.clearRedMark = function(id)
    {
        $("#"+id).parent('div').removeClass('has-error');
    }

    $scope.generatePo = function()
    {
        if(validateService.blank($scope.generatePoData['unit'],"Please Choose type","unit")) return false;
        if(validateService.blank($scope.generatePoData['type'],"Please Choose type","type")) return false;
        if(validateService.blank($scope.generatePoData['order_reference'],"Please Enter Order Reference query","order_reference")) return false;
        if(validateService.blank($scope.generatePoData['po_date'],"Please Choose Po Date","po_date")) return false;
        if(validateService.blank($scope.generatePoData['delivery_date'],"Please Choose Delivery Date","delivery_date")) return false;
        if(validateService.blank($scope.generatePoData['supplier_id'],"Please Choose Supplier name","supplier_id")) return false;
          
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

    $scope.searchPo = function()
    {
        if(validateService.blank($scope.searchPoData['po_number'],"Please Choose Po Number","po_number_search")) return false;
        if(validateService.blank($scope.searchPoData['po_year'],"Please Choose Po Year","search_year_po")) return false;

        var service_details = {
            method_name : "viewPoData",
            controller_name : "GeneratePo",
            data : JSON.stringify($scope.searchPoData)
        };

        po_year = $scope.searchPoData['po_year'];
        po_number = $scope.searchPoData['po_number'];

        httpService.callWebService(service_details).then(function(data){
            if(!data)
            {
                validateService.displayMessage('error','No data Found..',"");
            }
            else
            {
                var translator = new T2W("EN_US");
                $scope.showPoSearch = true;
                $('#showPoSearch').html(data);
                var number = parseInt($("#GrandTotal").text());
                $('#numberToWord').html("<b>Amount In Words : </b>"+translator.toWords(number).toUpperCase());
            }
        });
    }

    $scope.downloadAsPdfPODetails = function(){
        var url = 'GeneratePo/downloadAsPdfPODetailsAction?po_number='+po_number+"&po_year="+po_year;
        window.open(url);
    }

    $scope.poEditClick = function(data){
        console.log(data);
        $scope.poEditFormData.material_name = data.material_name;
        $scope.poEditFormData.qty           = data.qty;
        $scope.poEditFormData.id            = data.po_generated_request_id;
        $('#po_modal').modal('show');
    }

    $scope.edit_po_action = function(){

        if(validateService.blank($scope.poEditFormData['material_name'],"Please Enter material name","material_name")) return false;
        if(validateService.blank($scope.poEditFormData['qty'],"Please Enter quantity","Quantity")) return false;

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
});

function editPoDetails(data)
{
    var scope = angular.element($('[ui-view=div1]')).scope();
    scope.poEditClick(data);
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