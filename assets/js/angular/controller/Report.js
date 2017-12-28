app.controller('Report',function($scope,validateService,commonService,httpService){
	$('#datePicker,#datePicker1').daterangepicker({
	      autoUpdateInput: false,
	      locale: {
	          cancelLabel: 'Clear'
	      }
	});
	$('.select2').select2();
	

	$('#datePicker,#datePicker1').on('apply.daterangepicker', function(ev, picker) {
	      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
	});

	$('.content-wrapper').css('background-color','#ecf0f5');

	$('#datePicker,#datePicker1').on('cancel.daterangepicker', function(ev, picker) {
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
			                extend: 'pdfHtml5',
			                text: 'Pdf',
			                titleAttr: 'PDF',
			                extension: ".pdf",
			                filename: "Report",
			                title: "",
			                orientation: 'landscape',
			                customize: function (doc) {

			                    doc.styles.tableHeader = {
			                        color: 'black',
			                        background: 'grey',
			                        alignment: 'center'
			                    }

			                    doc.styles = {
			                        subheader: {
			                            fontSize: 15,
			                            bold: true,
			                            color: 'black'
			                        },
			                        tableHeader: {
			                            bold: true,
			                            fontSize: 15,
			                            color: 'black'
			                        },
			                        lastLine: {
			                            bold: true,
			                            fontSize: 15,
			                            color: 'blue'
			                        },
			                        defaultStyle: {
			                            fontSize: 15,
			                            color: 'black'
			                        }
			                    }

			                    doc['header']=(function() {
									return {
										columns: [
											{
												alignment: 'left',
												text: ($scope.formData['date'][0] === "")?"":"Date : "+$scope.formData['date'][0]+" - "+$scope.formData['date'][1],
												fontSize: 10,
												bold: true
											},
											{
												alignment: 'right',
												fontSize: 10,
												text: 'T.M.ABDUL RAHMAN & SONS',
												bold: true
											}
										],
										margin: 20
									}
								});

			                    var objLayout = {};
			                    objLayout['hLineWidth'] = function(i) { return .8; };
			                    objLayout['vLineWidth'] = function(i) { return .5; };
			                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
			                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
			                    objLayout['paddingLeft'] = function(i) { return 8; };
			                    objLayout['paddingRight'] = function(i) { return 8; };
			                    doc.content[0].layout = objLayout;

			                },
			                exportOptions: {
			                    columns: ':visible'
			                }
			            }
			        ]
			    });
			    $("body").niceScroll();
    			$("body").getNiceScroll().resize();
    		},100);
    		
    	})
	}

	$scope.searchDataAction = function()
	{
		$scope.formData.date = $("#datePicker").val();
		/*if(($scope.formData['serial_no'] === "") && ($scope.formData['date1'] === "") && ($scope.formData['query'] === "") && ($scope.formData['leather'] === ""))
		{
			validateService.displayMessage('error','Please choose any filter','Validation Error');
			return false;
		}*/
		// $scope.formData.date1 = $scope.formData.date1.split('/');

		var service_details = {
	      method_name : "leatherSummaryReportSearcAction",
	      controller_name : "Report",
	      data : JSON.stringify($scope.formData)
	    };
    	// commonService.showLoader();

    	httpService.callWebService(service_details).then(function(data){
    		// commonService.hideLoader();
    		console.log(data);

    	});

    }

	$scope.clearRedMark = function(id)
    {
    	$("#"+id).parent('div').removeClass('has-error');
    }
})