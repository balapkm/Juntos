app.controller('Report',function($scope,validateService,commonService,httpService){
	$('#datePicker,#datePicker1').daterangepicker({
	      autoUpdateInput: false,
	      locale: {
	          cancelLabel: 'Clear'
	      }
	});
	$('.select2').select2();
	var selectAll = false;
	$('#description').on('select2:select', function (e) {
	  	if(e.params.data.id === 'SA')
	  	{
	  		var option  = $(this).find('option');
	  		var SAvalue = [];
	  		console.log(selectAll);
	  		if(selectAll)
	  		{
	  			selectAll = false;
	  		}
	  		else
	  		{
	  			angular.forEach(option,function(v,k){
		  			value = $(v).val();
		  			if(value !== "" && value !== "SA")
		  			{
		  				SAvalue.push(value);
		  			}
		  			selectAll = true;
		  		});
	  		}
	  		$(this).select2().val(SAvalue).trigger("change");
	  	}
	});

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
			   /* $("body").niceScroll();
    			$("body").getNiceScroll().resize();*/
    		},100);
    		
    	})
	}

	$scope.leatherSummarySearchDataAction = function()
	{
		$scope.formData.date = $("#datePicker1").val();

		if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather")) return false;
		if(validateService.blank($scope.formData['date'],"Please Choose date","datePicker1")) return false;
		if(validateService.blank($scope.formData['description'],"Please Choose description","description")) return false;
		
		if($scope.formData['description'].length === 0)
		{
			validateService.displayMessage('error','Please choose description','Validation Error');
			return false;
		}
		$scope.formData.date = $scope.formData.date.split('/');
		var url = 'Report/leatherSummaryReportSearcAction?leather='+$scope.formData['leather']+"&date="+JSON.stringify($scope.formData['date'])+"&description="+JSON.stringify($scope.formData['description']);
		
		var service_details = {
	      method_name : "leatherSummaryReportSearcAjaxAction",
	      controller_name : "Report",
	      data : JSON.stringify($scope.formData)
	    };
    	commonService.showLoader();
    	
    	httpService.callWebService(service_details).then(function(data){
    		commonService.hideLoader();
    		if(data.length === 0)
    		{
    			validateService.displayMessage('error','No Data Found..','Validation Error');
    		}
    		else
    		{
    			window.open(url);
    		}
    	});
    }

	$scope.clearRedMark = function(id)
    {
    	$("#"+id).parent('div').removeClass('has-error');
    }
})