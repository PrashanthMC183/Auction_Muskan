<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <span class="caret"></span></a>       
              <ul class="dropdown-menu" role="menu">
                      <li><a href="receipt.php">Receipts</a></li>
                      <li><a href="report.php">Data Report</a></li>
                    </ul>                
                  </li>


                  
<?php
    include("inc/session.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Medical </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<?php
if(isset($_GET['party'])){
          $id=$_GET['party'];
          include_once("inc/connection.php");
          $sql=mysqli_query($con,"SELECT * FROM `add_medical` where mid='$id'") or die(mysqli_error($con));
          $sq=mysqli_fetch_array($sql);
          $pname=$sq['mname'].'--'.$sq['mid'];
          ?>
           <body onload="showTable('pending')">
          <?php
}else 
{
$pname='';
echo '<body>';
 }?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include("inc/mainmenu.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Welcome, <small><?php echo $username; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / Payment Receipt 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="well">
                        <div class="row">
                                <form method="post" action="" name="">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                        <div class="row col-md-6">
                                            <div class="form-group">
                                                <label> Party Name: </label>

                                                <input list="pname" name="pname" onclick="this.value=''" onchange="showTable('pending');" placeholder="Select Party Name" id="partyname" value="<?php echo $pname ?>"  style="width: 250px; "  class="form-control" required>
                                                    <datalist id="pname">
                                                    <!--<input type="text" name='item0'  placeholder='Item Name' class="form-control"/>-->
                                                    <!-- <select name="item0" class="form-control"> -->
                                                        <?php

                                                            include("inc/connection.php");
                                                            $sql=mysqli_query($con,"SELECT * FROM `add_medical` where `active`='Yes' order by mname asc") or die(mysqli_error($con));
                                                            while($sq=mysqli_fetch_array($sql)){
                                                                //echo '<option value="'.$rr[0].'">'.$rr['name'].'</option>';
                                                                echo '<option value="'.$sq['mname'].'--'.$sq['mid'].'">'.$sq['loc1'];
                                                            }
                                                        ?>
                                                    </datalist>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <br>
                                          <a class="btn btn-warning btn-sm" title="Go to receipt report" href="payreport.php">Receipt Report</a>
                                          <a class="btn btn-danger btn-sm" title="Go to cheque details" href="cheque.php">Cheque Details</a>
                                        </div>
                                 
                                      </div>
                                     
                                </div>
                               <ul class="nav nav-pills">
                                <li role="presentation" style='cursor:pointer;' title='7 days' onclick="showTable('cheque')" class="btn btn-primary">Cheque</li>
                                <li role="presentation" onclick="showTable('paid');" data-toggle='modal' data-target='#billModal' class="btn btn-success">Paid</li>
                                <li role="presentation" style='cursor:pointer;' title='Pending' onclick="showTable('red')"  data-toggle='modal' data-target='#billModal' class="btn btn-danger">Red</li>
                                <li role="presentation" style='cursor:pointer;' title='7 days' onclick="showTable('orange')"  data-toggle='modal' data-target='#billModal' class="btn btn-warning">Orange</li>
                                 <li role="presentation" style='cursor:pointer;' title='Other' onclick="showTable('other')"  class="btn btn-info">Other</li>
                                
                              </ul>

                                  <!-- Tab panes -->
                                      <div id="tcontent">
                          
                                      </div>
                                    
              
                                  </div>

                            
                        

                        </form>
                      </div>
                      <div>
                      </div>


                      <div id="billModal" class="modal fade">
                    <div class="modal-dialog modal-lg">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <!-- <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Bill Details</h4>
                        </div> -->
                        <div class="modal-body" id="modal_body">
                          
                        </div>
                        <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                        </div> -->
                      </div>

                    </div>
                  </div>




                        <?php 
                            include('inc/connection.php');
                         
                                
                            if(isset($_POST['add'])){
                             $q=$_POST['pname'];
                             $party= explode('--', $q);
                              $pname=$party[0];
                              $pcode=$party[1]; 
                              $amount=$_POST['amount'];
                              
                              
                            
                            ?>
                         <div class="container">
                         <div class="col-md-5"></div>
                         <div class="col-md-3">
                                            
                                            
                                            <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                            
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Payment Details</h4>
                                                </div>
                                                <div class="modal-body">


                            <form action="add_payreceipt_val.php" method="post">
                                                    <input type="hidden" class="form-control input-sm" name="pcode" value="<?php echo $pcode; ?>">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label>Receipt Number: </label>
                                  <input type="text" class="form-control input-sm" name="recp" required="" >
                                </div>
                              </div>
                              </div>
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label> Party Name: </label>
                                  <input type="text" class="form-control input-sm" name="pname" value="<?php echo $pname; ?>" readonly>
                                </div>
                              </div>
                            
                              <div class="col-md-5">
                              <?php
                              if(isset($_POST['debt']))
                              {
                                ?>
                                <div class="form-group">
                                  <label> Old Debt: </label>
                                  
                                 <input type="text" name="debt" readonly="" value="old debt">

                                
                                </div>
                                <?php
                              }
                             
                                if(isset($_POST['fine']))
                                {
                                ?>
                                <div class="form-group">
                                  <label> Fine(s): </label>
                                  
                                  <select name="fine[]" multiple="true" readonly=''>
                                  <?php
                                  foreach ($_POST['fine'] as $key => $value) {
                                    echo "<option selected>$value</option>";
                                
                                  }

                                  ?>
                                    
                                  </select>
                                </div>
                                <?php
                              }
                                if(isset($_POST['chkd']))
                                {
                               ?>


                                <div class="form-group">
                                  <label> Invoice(s): </label>
                                  
                                  <select name="invoice[]" multiple="true" readonly=''>
                                  <?php
                                  foreach ($_POST['chkd'] as $key => $value) {
                                    echo "<option selected>$value</option>";
                                
                                  }

                                  ?>
                                    
                                  </select>
                                </div>
                                <?php
                                  }
                                ?>
                              </div>
                              </div>



                              <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label> Recievable Amount: </label>
                                  <input type="text" class="form-control input-sm" name="tpaidamt"  style="text-align: right;" id="tpaidamt" value="<?php echo $amount; ?>" readonly>
                                </div>
                              </div>
                              
                            
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label> Paymode: </label>
                                  <select name="paymode" id="slct" onchange='chngeit(<?php echo $pcode; ?>)' class="form-control">
                                  <option value="CASH">Cash</option>
                                  <option value="CHEQUE">Cheque</option>
                                  <option value="CREDIT NO">Credit No.</option>
                                  <option value="OTHER">Other</option>
                                     </select>
                                </div>
                              </div>
                              </div>

                              
                              <div id="container"></div>
                              
                              <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label> Recieved Amount: </label>
                                  <input type="text" class="form-control input-sm"  style="text-align: right;" name="payamt" id="payamt" onkeyup="valuevalidate(this.value)" value="<?php echo $amount; ?>" required>
                                </div>
                              </div>
                             
                        

                              
                              <div class="col-md-5">
                              <div class="form-group">
                              <label> Date: </label>
                              <input type="date"  class="form-control input-sm" name="dt" value="<?php echo date("Y-m-d");?>">
                              </div>
                              </div></div>
                              <div class="row">
                                <div class="col-md-10">
                                <div class="form-group">
                                <label>Narration</label>
                                <textarea name="narration" style="width:100%;"></textarea>
                                </div>
                                </div></div>
                              <div class="row">
                                <div class="col-md-10">
                                <div class="form-group">
                                  <input type="submit" class="form-control input-sm btn btn-primary" name="save" value="Save"/>
                                </div>
                              </div>
                              </div>
                              
                                                      
                                                  </form>

                                                </div>
                                                <div class="modal-footer">
                                                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Close"/>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
  
                                        </div>

                      </div>  <?php } ?>
                    </div>                  
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });


         function upperCaseF(a){
           setTimeout(function(){
           a.value = a.value.toUpperCase();
                   }, 1);
          }
    </script>
  <script>
    function valueValidate(str){
    //alert(str);
    var payingamt= document.getElementById("tpaidamt").value;
    //alert(payingamt);
      
            if(parseInt(str) > payingamt) 
             document.getElementById("payamt").value=payingamt;    
            else document.getElementById("payamt").value=str;
          
  }



function showTable(type) {
    //alert(str);
  // if(type=="cheque" || type=="clear" || type=="bounce")
  // {
  //   str=document.getElementById("partyname").value;
  // }else{
  str=document.getElementById("partyname").value;
 
  
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(type=="pending" || type=="cheque" || type=="other"){
      document.getElementById("tcontent").innerHTML=this.responseText;
    }else
    {

      document.getElementById("modal_body").innerHTML=this.responseText;
    }
      
    }
  }
  xmlhttp.open("GET","matchparty.php?q="+str+"&type="+type,true);
  xmlhttp.send();
}



  function getBill(a) {
    
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("modal_body").innerHTML=this.responseText;
      
    }
  }
  xmlhttp.open("GET","printpop.php?sid="+a,true);
  xmlhttp.send();
}



  function showtotalamt(a){
    //alert(a);
    if (document.getElementById('chkd'+a).checked)
    { 
   // var chkd_bill = document.getElementById("chkd"+a).value;
    var bal_amt = document.getElementById("balamt"+a).innerHTML;
    bal_amt=bal_amt.replace(/\,/g,"");
    bal_amt=parseFloat(bal_amt);
    var amount = parseFloat(document.getElementById("amount").value);
    var amount = amount + bal_amt;
    document.getElementById("amount").value= amount; 
    }
    else
    { 
       var amount = parseFloat(document.getElementById("amount").value);
       var bal_amt = document.getElementById("balamt"+a).innerHTML;
       bal_amt=bal_amt.replace(/\,/g,"");
      bal_amt=parseFloat(bal_amt);
      var amount = amount - bal_amt;
      document.getElementById("amount").value= amount; 
     }
  }

</script>


<script>
        function chk(type,id){
            var divv = document.getElementById("modal_body");
            if(type=="clear")
            {
            toAppend='<form method="post" action="savechk.php"><input type="hidden" name="id" value="'+id+'"><label>Enter cleared date</label><input type="date" name="dt" ><input type="submit" class="byn btn-success" name="clear" value="Submit"></form>';
            divv.innerHTML=toAppend;
          }else if(type=="bounce")
          {

            toAppend='<form method="post"  action="savechk.php"><input type="hidden" name="id" value="'+id+'"><label>Enter penalty</label><input type="text" name="penalty" value="0"><input type="submit" class="byn btn-success" name="bounce" value="Submit"></form>';
            divv.innerHTML=toAppend;
          }
        }

        function chngeit(str) {
            var value = document.getElementById("slct").value;
               var divv = document.getElementById("container");
               if (value == 'CASH') {
                      toAppend = ""; divv.innerHTML = toAppend;
                  }
               if (value == 'CHEQUE') {
                  toAppend = "<div class='row'><div class='col-md-5'><div class='form-group'><label>Cheque No.:</label><input type='textbox' class='form-control' placeholder='cheque number' required onkeydown='Caps(this)' name='cheque_no'></div></div><div class='col-md-5'><div class='form-group'><label>Bank Name:</label><input type='textbox' placeholder='bank name' onkeydown='Caps(this)' class='form-control' required name='bankname'></div></div></div><div class='row'><div class='col-md-5'><div class='form-group'><label>Cheque Date:</label><input type='date' class='form-control' name='cheque_date' required ></div></div></div>"; divv.innerHTML=toAppend;
                  }
                  if (value == 'CREDIT NO') {
                      toAppend = "<div class='row'><div class='col-md-5'><div class='form-group'><label>Credit No.:</label><select name='creditno' id='creditno' class='form-control'  onblur='showCreditamt()'></select></div></div></div>";divv.innerHTML = toAppend;
                  

                               if (window.XMLHttpRequest) {
                          // code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        
                        xmlhttp.onreadystatechange=function() {
                          if (this.readyState==4 && this.status==200) {
                            document.getElementById("creditno").innerHTML=this.responseText;
                            if(this.responseText==''){
                              divv.innerHTML='';
                            }
                            showCreditamt();
                          }
                  }
                  xmlhttp.open("GET","creditnolist.php?q="+str,true);
                  xmlhttp.send();  
            }


              
              }



      function showCreditamt() 
      {
        var str=document.getElementById("creditno");
        str=str.options[str.selectedIndex].value;
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("payamt").value=this.responseText;
          }
        }
        xmlhttp.open("GET","getcreditamt.php?q="+str,true);
        xmlhttp.send();
        }
            

     </script>

     <script type="text/javascript">
         function Caps(a){
           setTimeout(function(){
           a.value = a.value.toUpperCase();
                   }, 1);
          }
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
