app.controller('PoReport',function($scope,validateService,commonService,httpService){
	setTimeout(function(){
		$('.select2').select2();
		$('#datePicker').daterangepicker({
		      autoUpdateInput: false,
		      locale: {
		          cancelLabel: 'Clear'
		      }
		});
		$('#datePicker').on('apply.daterangepicker', function(ev, picker) {
		      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
		});

		$('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
		      $(this).val('');
		});
	},500)  

	$scope.po_report = {
		report_type : "report_4",
		division : "",
		type : "",
		date_range : "",
		material_id : "",
		supplier_id : "",
		order_ref   : "",
		tax_type : "",
		tax_perc : ""
	}

	$scope.tabChange = function(report_type){
		$scope.po_report.report_type = report_type;
	}

	$scope.po_report_show = {
		division : true,
		type : true,
		date_range : true,
		material_id : true,
		supplier_id : true,
		order_ref   : true,
		tax_type : true
	}

	
	$scope.chageReportType = function(){
		if($scope.po_report.report_type === "report_1"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : true,
				supplier_id : true,
				order_ref : true,
				tax_type : true
			}
		}
		if($scope.po_report.report_type === "report_2"){
			$scope.po_report_show = {
				division : false,
				type : false,
				date_range : false,
				material_id : true,
				supplier_id : false,
				order_ref : false,
				tax_type : false
			}
		}
		if($scope.po_report.report_type === "report_3"){
			$scope.po_report_show = {
				division : false,
				type : false,
				date_range : false,
				material_id : false,
				supplier_id : true,
				order_ref : false,
				tax_type : false
			}
		}
		
		setTimeout(function(){
			$('.select2').select2();
			$('#datePicker').daterangepicker({
			      autoUpdateInput: false,
			      locale: {
			          cancelLabel: 'Clear'
			      }
			});
			$('#datePicker').on('apply.daterangepicker', function(ev, picker) {
			      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
			});

			$('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
			      $(this).val('');
			});
		},100);
	}

	$scope.poDownloadAction = function(){
		$scope.po_report.date_range = $("#datePicker").val();
		if($scope.po_report.report_type === "report_2"){
			if(validateService.blank($scope.po_report['material_id'],"Please Choose material","material_id")) return false;
		}
		if($scope.po_report.report_type === "report_3"){
			if(validateService.blank($scope.po_report['supplier_id'],"Please Choose supplier","supplier_id")) return false;
		}
		
		$scope.po_report['action'] = "download";
		var url = "PoReport/poDownloadAction?";
		for(var i in $scope.po_report){
			url += i+"="+$scope.po_report[i]+"&";
		}
		window.open(url);
	}

	var dataTableVariable;
	$scope.loadTable = function(){
		dataTableVariable = $('#example').DataTable({
            iDisplayLength: 100,
            dom: 'Brfrtip',
            buttons: [
                'copy', 
                'csv',
                'excel',
                {
		            extend: "print",
		            customize: function(win)
		            {
		 
		                var last = null;
		                var current = null;
		                var bod = [];
		 
		                var css = '@page { size: landscape; }',
		                    head = win.document.head || win.document.getElementsByTagName('head')[0],
		                    style = win.document.createElement('style');
		 
		                style.type = 'text/css';
		                style.media = 'print';
		 
		                if (style.styleSheet)
		                {
		                  style.styleSheet.cssText = css;
		                }
		                else
		                {
		                  style.appendChild(win.document.createTextNode(css));
		                }
		                head.appendChild(style);
		         	}
		      	},
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
	}

	$scope.viewTable = false;
	setTimeout(function(){
        $scope.loadTable();
    },250);
	$scope.poViewAction = function(){
		$scope.po_report.date_range = $("#datePicker").val();
		if($scope.po_report.report_type === "report_2"){
			if(validateService.blank($scope.po_report['material_id'],"Please Choose material","material_id")) return false;
		}
		if($scope.po_report.report_type === "report_3"){
			if(validateService.blank($scope.po_report['supplier_id'],"Please Choose supplier","supplier_id")) return false;
		}
		dataTableVariable.destroy();
		$scope.po_report['action']  = "view";
		commonService.showLoader();
		$scope.viewTable = false;
        var service_details = {
            method_name : "poDownloadAction",
            controller_name : "PoReport",
            data : JSON.stringify($scope.po_report)
        };
        httpService.callWebService(service_details).then(function(data){
            commonService.hideLoader();
            setTimeout(function(){
		        $scope.loadTable();
            },250);
            if(!data)
            {
	           validateService.displayMessage('error','No data found',""); 
	        }
	        else
	        {
	        	$scope.viewTable = true;
	            $scope.viewTableData = data;
	        }
        });
	}
})