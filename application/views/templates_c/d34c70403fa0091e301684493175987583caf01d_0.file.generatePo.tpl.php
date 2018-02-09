<?php
/* Smarty version 3.1.30, created on 2018-01-28 21:32:30
  from "/home/Staging/workSpace/Juntos/application/views/templates/generatePo.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6df4164c84e3_41638636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd34c70403fa0091e301684493175987583caf01d' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/generatePo.tpl',
      1 => 1517155347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6df4164c84e3_41638636 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header">
    <h4>
      	Generate Po
    </h4>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Generate</a></li>
	              <li><a href="#tab_2" data-toggle="tab">View</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
	              			<div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Unit</label>
				                  <select class="form-control" id="unit">
				                  	  <option value="">Choose Unit</option>
				                  	  <option value="upper">Upper Unit</option>
				                  	  <option value="full_shoe">Full Shoe Unit</option>
				                  	  <option value="sole_plant">Sole Plant Unit</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Type</label>
				                  <select class="form-control" id="type">
				                  	  <option value="">Choose Type</option>
				                  	  <option value="import">Import</option>
				                  	  <option value="locale">Locale</option>
				                  	  <option value="sample">Sample</option>
				                  </select>
				                </div>
				            </div>
		            		<div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Order Ref</label>
				                  <input type="text" class="form-control" id="order_ref" placeholder="Enter Order Ref">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Number</label>
				                  <input type="text" class="form-control" id="po_number" placeholder="Enter Po Number">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Date</label>
				                  <input type="text" class="form-control" id="po_date" placeholder="Choose Po Date">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Delivery Date</label>
				                  <input type="text" class="form-control" id="delivery_date" placeholder="Choose Delivery Date">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Supplier Name</label>
				                  <select class="form-control" id="supplier_name">
				                  	  <option value="">Choose Supplier Name</option>
				                  	  <option value="import">Import</option>
				                  	  <option value="locale">Locale</option>
				                  	  <option value="sample">Sample</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1"></label>
				                  <select class="form-control" id="material_name">
				                  	  <option value="">Choose Type</option>
				                  	  <option value="import">Import</option>
				                  	  <option value="locale">Locale</option>
				                  	  <option value="sample">Sample</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary">Generate</button>
				            </div>
				        </div>
				        <hr/>
				        <div class="row" style="margin-top: 50px;">
				        	<!-- <div class="col-lg-2" style="position: relative;left: 50px;top: 20px;">
				        		<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"></img>
				        	</div>
				        	<div class="col-lg-5" style="position: relative;top: 40px;">
				                <h4><b>T.M.ABDUL RAHMAN & SONS</b></h4>
                    			<h6>MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h6>
				        	</div>
				        	<div class="col-lg-4" style="position: relative;left: 100px;">
				        		<div>
				        			<h5>43/45 Ammar Road,Ranipet - 631053</br>
				        			43/45 Ammar Road,Ranipet - 631053</br>
				        			43/45 Ammar Road,Ranipet - 631053</br>
				        			43/45 Ammar Road,Ranipet - 631053</h5>
				        		</div>
				        		<div>
				        			<h5>43/45 Ammar Road,Ranipet - 631053</br>
				        			43/45 Ammar Road,Ranipet - 631053</br>
				        			43/45 Ammar Road,Ranipet - 631053</br>
				        			43/45 Ammar Road,Ranipet - 631053</h5>
				        		</div>
				        	</div> -->
				        	<div class="col-lg-12" style="margin-top: 5px;">
				        		<table class="own-table">
				        			<tr>
							        	<table class="own-table">
							        		<tr>
							        			<td width="15%" style="padding: 20px 0px 28px 40px;border: 0px;">
							        				<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"></img>
							        			</td>
									         	<td width="45%" style="border: 0px;">
									         		<h4><b>T.M.ABDUL RAHMAN & SONS</b></h4>
                    								<h6>MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h6>
									         	</td>
									         	<td width="40%" style="border: 0px;padding-right: 20px;" align="right">
									         		<h5>43/45 Ammar Road,Ranipet - 631053</br>
								        			43/45 Ammar Road,Ranipet - 631053</br>
								        			43/45 Ammar Road,Ranipet - 631053</br>
								        			43/45 Ammar Road,Ranipet - 631053</h5>
								        			<h5>43/45 Ammar Road,Ranipet - 631053</br>
								        			43/45 Ammar Road,Ranipet - 631053</br>
								        			43/45 Ammar Road,Ranipet - 631053</br>
								        			43/45 Ammar Road,Ranipet - 631053</h5>
									         	</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr style="font-weight: bold;">
							        			<td align="center" class="own-td-1" width="100%">PURCHASE ORDER</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td class="own-td-1" width="40%">To</td>
									         	<td class="own-td-1" width="30%">LH.Po.No</td>
									         	<td class="own-td-1" width="30%">FS/545</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td class="own-td-1" width="40%">M/s Shoe Care</td>
									         	<td class="own-td-1" width="30%">Date</td>
									         	<td class="own-td-1" width="30%">01.01.2015</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td class="own-td-1" width="40%">Ranipet</td>
									         	<td class="own-td-1" width="30%">Ord Ref</td>
									         	<td class="own-td-1" width="30%">GRML</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td class="own-td-1" width="40%">GSTIN:</td>
									         	<td class="own-td-1" width="30%">Delivery Date</td>
									         	<td class="own-td-1" width="30%">01.01.2015</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr style="font-weight: bold;">
							        			<td align="center" width="5%">S.No</td>
									         	<td align="center" width="20%">DESCRIPTION</td>
									         	<td align="center" width="10%">HSN Code</td>
									         	<td align="center" width="5%">QTY</td>
									         	<td align="center" width="10%">UOM</td>
									         	<td align="center" width="10%">PRICE</td>
									         	<td align="center" width="10%">CGST</td>
									         	<td align="center" width="10%">SGST</td>
									         	<td align="center" width="10%">IGST</td>
									         	<td align="center" width="10%">TOTAL AMOUNT</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td align="center" width="5%"  class="own-td-2">1</td>
									         	<td align="center" width="20%" class="own-td-2">Finish DR Brown Blue India Finish DR Finish DR</td>
									         	<td align="center" width="10%" class="own-td-2">3008</td>
									         	<td align="center" width="5%"  class="own-td-2">1</td>
									         	<td align="center" width="10%" class="own-td-2">Kgs</td>
									         	<td align="center" width="10%" class="own-td-2">657</td>
									         	<td align="center" width="10%" class="own-td-2">9%</td>
									         	<td align="center" width="10%" class="own-td-2">9%</td>
									         	<td align="center" width="10%" class="own-td-2">-</td>
									         	<td align="center" width="10%" class="own-td-2">5686.00</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td align="center" width="5%"  class="own-td-2">2</td>
									         	<td align="center" width="20%" class="own-td-2">
									         		<textarea class="form-control">Finish DR Brown Blue India Finish DR Finish DR</textarea>
									         	</td>
									         	<td align="center" width="10%" class="own-td-2">3008</td>
									         	<td align="center" width="5%"  class="own-td-2">1</td>
									         	<td align="center" width="10%" class="own-td-2">Kgs</td>
									         	<td align="center" width="10%" class="own-td-2">657</td>
									         	<td align="center" width="10%" class="own-td-2">9%</td>
									         	<td align="center" width="10%" class="own-td-2">9%</td>
									         	<td align="center" width="10%" class="own-td-2">-</td>
									         	<td align="center" width="10%" class="own-td-2">5686.00</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td align="center" width="5%"  class="own-td-2">3</td>
									         	<td align="center" width="20%" class="own-td-2">Finish DR Brown Blue India Finish DR Finish DR</td>
									         	<td align="center" width="10%" class="own-td-2">3008</td>
									         	<td align="center" width="5%"  class="own-td-2">1</td>
									         	<td align="center" width="10%" class="own-td-2">Kgs</td>
									         	<td align="center" width="10%" class="own-td-2">657</td>
									         	<td align="center" width="10%" class="own-td-2">9%</td>
									         	<td align="center" width="10%" class="own-td-2">9%</td>
									         	<td align="center" width="10%" class="own-td-2">-</td>
									         	<td align="center" width="10%" class="own-td-2">5686.00</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td align="center" width="5%"  class="own-td-3"></td>
									         	<td align="center" width="20%" class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
									         	<td align="center" width="5%"  class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
									         	<td align="center" width="10%" class="own-td-3"></td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td align="center" width="5%"  class="own-td-2"></td>
									         	<td align="center" width="45%" class="own-td-2">Amount in Words: Rupees Forty-five thousand, six hundred thirty-eightmount in Forty-five thousand, six hundred thirty-eight</td>
									         	<td align="center" width="30%" class="own-td-2">TOTAL AMOUNT INR</td>
									         	<td align="center" width="20%" class="own-td-2">23344.23</td>
							        		</tr>
							        	</table>
							        </tr>
							        <tr>
							        	<table class="own-table">
							        		<tr>
							        			<td align="center" width="50%"  class="own-td-4"></td>
									         	<td align="center" width="50%"  class="own-td-4"></td>
							        		</tr>
							        	</table>
							        </tr>
								</table>
				        	</div>
				        </div>
	              	</div>
	              	<div class="tab-pane" id="tab_2">
	              		
	              	</div>
	            </div>
        	</div>
   		</div>
   	</div>
</section>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Add Supplier Details</h4>
		    </div>
		    <div class="modal-body">
		        
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary">Add</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><?php }
}
