app.controller('Report',function($scope,validateService,commonService,httpService){
	$('#datePicker').daterangepicker({
	      autoUpdateInput: false,
	      locale: {
	          cancelLabel: 'Clear'
	      }
	});
	$('.select2').select2();
	

	$('#datePicker').on('apply.daterangepicker', function(ev, picker) {
	      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
	});

	$('.content-wrapper').css('background-color','#ecf0f5');

	$('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
	      $(this).val('');
	});
	$scope.searchData       = [];
	$scope.searchShow       = false;
	$scope.formData         = {
		date : "",
		serial_no : "",
		leather : "",
		query : ""
	};

	$scope.searchDataAction = function()
	{
		$scope.formData.date = $("#datePicker").val();
		if(($scope.formData['serial_no'] === "") && ($scope.formData['date'] === "") && ($scope.formData['query'] === "") && ($scope.formData['leather'] === ""))
		{
			validateService.displayMessage('error','Please choose any filter','Validation Error');
			return false;
		}
		$scope.formData.date = $scope.formData.date.split('/');

		var service_details = {
	      method_name : "searchAction",
	      controller_name : "Report",
	      data : JSON.stringify($scope.formData)
	    };
	    $scope.searchShow       = false;
    	commonService.showLoader();
    	httpService.callWebService(service_details).then(function(data){
    		commonService.hideLoader();
    		$scope.searchData = data;
    		$scope.searchShow = true;
    		setTimeout(function(){
    			$('#example').DataTable( {
			        dom: 'Brfrtip',
			        buttons: [
			            'copy', 
			            'csv',
			            'excel',
			            {
			                extend: 'pdf',
			                messageBottom: "",
			                messageTop : ($scope.formData['date'][0] === "")?"":"Date : "+$scope.formData['date'][0]+" - "+$scope.formData['date'][1]
			            }
			        ]
			    });
			    $("body").niceScroll();
    			$("body").getNiceScroll().resize();
    		},100);
    		
    	})
	}
})