<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-show-password.min.js"></script>
</head>

<body>

     <?php include("menu.php"); ?>
    <div class="container-fluid">

		
		<div class="row">
				<div class="col-md-12 column">
				
					<!--Form start -->
					<form name="" method="post" action="sales_value.php">
						<table class="table table-bordered table-hover" id="tab_logic">
							<tr>
								<th class="text-center" colspan="2">
									BIll no
								</th>
								<th class="text-center" >
									<input type="text" name="sbillno" value="<?php echo $sbill; ?>" class="form-control" style="width:100px;" required>
								</th>
								<th class="text-center">
									Party
								</th>
								<th class="text-center" colspan="2">
									<input list="pname" name="pname" onblur="showCreditCno(this.value)" placeholder="Party Name"  class="form-control" required>
									<datalist id="pname">
									<!--Below query displays the medical names in ascending order-->
										
									</datalist>
								</th>
								<th class="text-center">
									Bill Date
								</th>
								<th class="text-center" colspan="3">
									<input type="date" name="bdate" value="<?php echo date("Y-m-d"); ?>" class="form-control" required>
								</th>
							</tr>
							<tr>
								<th class="text-center">
									#
								</th>
								<th class="text-center">
									Item Name
								</th>
								<th class="text-center">
									Batch
								</th>
								<th class="text-center">
									Exp. Date
								</th>
								<th class="text-center">
									Qty
								</th>
								<th class="text-center">
									Offer
								</th>
								<th class="text-center">
									Disc%
								</th>
								<th class="text-center">
									Price
								</th>
								<th class="text-center">
									MRP
								</th>
								<th class="text-center">
									TOTAL
								</th>
							</tr>
							
							<tr id='addr0'>
								<td>
									1
								</td>
								<td>
									<input list="item0" name="item0" placeholder="Product" onkeypress="return AvoidSpace(event)" tabindex="1" class="form-control" spellcheck="false" style="width:200px;" id="items0" onblur="showContent(0,this.value)" required>
									<datalist id="item0">
										<!--Below query displays the product list with the active status value having Yes-->
											<?php
												include("con_db.php");
												$ee = mysql_query("SELECT * FROM `medicine_tb` order by mname asc") or die(mysql_error());
												while($rr = mysql_fetch_array($ee))
												{
													echo '<option value="'.$rr['mname'].'">'.$rr['med_id'];
												}

											?>
										</datalist>
										<input type="hidden" name='tax0' id="tax0" /> <!--Tax code value is kept in hidden input box, the tax code value will be displayed by onblur="showContent" event -->
								</td>
								<td>
									<input list="batch0" id="bat0" name="batch0" onkeydown="upperCaseF(this,event)" tabindex="2" placeholder="Batch No" onkeypress="return AvoidSpace(event)" style="width:100px;" class="form-control" onblur="showBatch(0,this.value)" autocomplete="off" required>
									<datalist id="batch0">
									<!--This block displays the batches for the selected product, onblur event showContent of the product name datalist is responsible to display the batch-->
									</datalist>
								</td>
								<td>
									<input type="month" name='exp0' id="exp0" placeholder='Expiry Date' tabindex="3" class="form-control" style="width:125px;" required/>
								</td>
								<td>
									<input type="text" name='qty0' id='qty0' onblur="checkquantity(0)" placeholder='Quantity' onkeypress="return AvoidSpace(event)" tabindex="4"  style="width:65px; text-align: right; " class="form-control" required/>
									<input type="hidden" name='value' id="value" value="1"/><!--Hidden input box holds the number of rows, entry done -->
								</td>
								<td>
									<input type="text" name='offer0' id='offer0' value='0' style="width:50px; text-align: right;" tabindex="5"  class="form-control" onkeypress="return AvoidSpace(event)" required/>
								</td>
								<td>
									<input type="text" name='disc0' id='disc0' onblur="sumit(0)" style="width:65px; text-align: right;" tabindex="6" value='0' class="form-control" onkeypress="return AvoidSpace(event)" required/>
								</td>
								<td>
									<input type="text" name='price0' id='price0' onblur="sumit(0)" placeholder='Price' tabindex="7" style="width:100px; text-align: right;" class="form-control" onkeypress="return AvoidSpace(event)" required/>
								</td>
								<td>
									<input type="text" name='mrp0' id='mrp0' style="width:100px; text-align: right;" onkeypress="return AvoidSpace(event)" placeholder='MRP' tabindex="8" class="form-control"
										required/>
								</td>
								<td>
									<input type="text" name='total0' id='total0' onkeypress="return AvoidSpace(event)" style="width:100px; text-align: right;" placeholder='Total' tabindex="9" class="form-control" />
								</td>
							</tr>
							<tr id='addr1'></tr>
						</table>
						<!--Start of row for the calculation value to display -->	
						<div class="row">
							<table class="table table-stripped">
								<tr>
									<td colspan="2" style="text-align:right;"></td>
									<td colspan="6" style="text-align:right;">Total :</td>
									<td style="text-align:right;"><input type="text" name="ttot" id="ttot" class="form-control" style='width:150px; text-align: right;' value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;"> </td>
									<td colspan="6" style="text-align:right;">Disc : </td>
									<td style="text-align:right;"><input type="text" name="dis" id="dis" class="form-control" style='width:150px; text-align: right;' value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;"> </td>
									<td colspan="6" style="text-align:right;">Vat : </td>
									<td style="text-align:right;"><input type="text" name="vat" id="vat" class="form-control" style='width:150px; text-align: right;' value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;"> </td>
									<td colspan="6" style="text-align:right;">Freight : </td>
									<td style="text-align:right;"><input type="text" name="freight" onblur="sumit(0)" id="freight" class="form-control" style='width:150px; text-align: right;' onkeypress="return AvoidSpace(event)" value="0"></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;"></td> 
									<td colspan="6" style="text-align:right;">Grand Total :</td>
									<td style="text-align:right;"> <input type="text" name="gtot" id="gtot" class="form-control" style='width:150px; text-align: right;' value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;">Select Credit Note :</td>
									<td>
										<input list="cno" name="cno" id="crno" onkeydown="upperCaseF(this)" placeholder="Credit No" onkeypress="return AvoidSpace(event)" style="width:150px;" class="form-control" onblur="showCreditamt(this.value)" autocomplete="off">
										<datalist id="cno">
										</datalist>
										</td>
									<td style="text-align:right;">Select Purchase Bill :</td>
									<td>
										<input list="pno" name="pno" id="prno" onkeydown="upperCaseF(this)" placeholder="Purchase bill No" onkeypress="return AvoidSpace(event)" style="width:150px;" class="form-control" onblur="showCreditamt(this.value)" autocomplete="off">
										<datalist id="pno">
										</datalist>
										</td>
									<td style="text-align:right;" colspan="6"> <input type="text" name="creditamt" id="creditamt" class="form-control" style='width:150px; text-align: right;' value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;"></td> 
									<td colspan="6" style="text-align:right;">To Pay :</td>
									<td style="text-align:right;"> <input type="text" name="topay" id="topay" class="form-control" style='width:150px; text-align: right;' value="0" readonly></td>
								</tr>
							</table>
							<div class="col-md-12 column">
								<div class="btn-group">
									<a id="add_row" class="btn btn-primary" tabindex="10"><i class="fa fa-plus">&nbsp;</i>Add New</a>
									<a id='delete_row' class="btn btn-danger" tabindex="11"><i class="fa fa-trash-o">&nbsp;</i>Delete</a>
									<button type="submit" id="subm" class="btn btn-success" tabindex="12"><i class="fa fa-check">&nbsp;</i>Submit</button>
								</div>
							</div>
						</div> <!--End of row for the calculation value to display -->
					</form><!--End of form -->
				</div>
			</div><!--Content row end -->
		</div>


</body>
</html>
