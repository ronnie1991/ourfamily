<?php 
include_once("main.class.php");
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= $object->title()?> | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include_once('header.php');?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include_once('left_asid.php');
	 
	 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Register Of Root Members           
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="add_root_members">Register Of Root Members</a></li>
            <li class="active">Add Root Members</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
		  <?php
				if(isset($_POST['add_register_mbr']))
				{
				if($_POST['form_id']==$_SESSION['session_form'])
				{
				$_SESSION['session_form']='';
				$msg=$object->addRegisteredUsers();
				}                					
				}
				else
				{
				$_SESSION['session_form']=md5(uniqid(rand(0,10000000)));
				session_write_close();
				}	                 				 
			?>
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><?= isset($msg)? $msg:'All Fields are required';?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />        
			
                 <div class="slno">
                 <div class="col-md-3">
                  <div class="form-group">
                    <label class="slNoStatus">SL. No <b style="color: red;font-size: 14px;">*</b></label>
                    <input id="RMbrSlNo" type="number" min=1 max=100 class="form-control" name="sl_number" placeholder="Serial Number" required="required">          
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->                                 
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Name (In Block Letter) <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" class="form-control" name="name" placeholder="Name (In Block Letter)"  required >    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Father / Spouse Name  <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" class="form-control" name="father_spouse_name" placeholder="Father / Spouse Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}" required >
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                  <label class="rollAvl">Mother`s Name <b style="color: red;font-size: 14px;">*</b></label>
                  <input id="rollNum" type="text" class="form-control" name="mother_name" placeholder="Mother`s Name" pattern="[a-zA-Z][a-zA-Z\s]*" minlength="3" maxlength="50" oninvalid="setCustomValidity('Enter Valid Name')"  onchange="try{setCustomValidity('')}catch(e){}"  required="required">        
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="date" class="form-control" name="dob" required="required">    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->  		
        								
              <div class="col-md-3">
                  <div class="form-group">
                    <label>Marital Status <b style="color: red;font-size: 14px;">*</b></label>
                    <select  class="form-control select2 ldfon" name="marital_status"  required="required" style="width: 100%;">
                      <option value="" >Marital Status</option>                      
                      <option value="2" >Married</option>
                      <option value="1" >Un Married</option>
                       
                    </select>                           
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->                 
				      <div class="col-md-3">
                  <div class="form-group">
                    <label>Sex <b style="color: red;font-size: 14px;">*</b></label>
                    <select  class="form-control select2 ldfon" name="sex" required style="width: 100%;">
                      <option value="" >Sex Status</option>                      
                      <option value="1" >Male</option>
                      <option value="0" >Female</option>
                       
                    </select>                           
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->

				        <div class="col-md-3">
                  <div class="form-group">
                    <label>Family Member <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" class="form-control" name="family_member" placeholder="Family Member"  required >    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
			 <div class="col-md-6">
                  <div class="form-group">
                      <label>Address <b style="color: red;font-size: 14px;">*</b></label>
                      <textarea class="form-control" rows="3" name="address" placeholder="Address" required="required" ></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mobile Number<b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" class="form-control" name="mobile_number"  placeholder="Mobile Number" pattern="[0-9]{1}[0-9]{9}" maxlength="10"  oninvalid="setCustomValidity('Enter Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}" required="required" >
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Email ID <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="email" class="form-control emailUniq" name="email_id" placeholder="Email Id" oninvalid="setCustomValidity('Enter Valid Emai Id')"  onchange="try{setCustomValidity('')}catch(e){}">          
                  </div><!-- /.form-group -->                  
          </div><!-- /.col -->

                
                 </div><!-- /.row --> 

                 <div class="row">
				
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Aadhar Card Number <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" data-type="adhaar-number" class="form-control" name="adhar_card_number" placeholder="Aadhar Card Number"  maxLength="19"  required="required" oninvalid="setCustomValidity('Enter Valid Aadhar Card Number')"  onchange="try{setCustomValidity('')}catch(e){}" >    
                  </div><!-- /.form-group -->                  
              </div><!-- /.col -->
               
              <div class="col-md-3">
                  <div class="form-group">
                    <label>PAN Card Number </label>
                    <input type="text" class="form-control" name="pan_card_number" placeholder="PAN Card Number" maxlength="10" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" title="Please enter valid PAN number. E.g. KABAA9959A" >    
                  </div><!-- /.form-group -->                  
              </div><!-- /.col --> 

                

            <div class="col-md-3">
                  <div class="form-group">
                    <label>Voter ID Number </label>
                    <input type="text" class="form-control" name="voter_id" placeholder="Voter ID Number" required="required" min="1"  maxLength="20"  pattern="([^\s][A-z0-9À-ž\s]+)" title="Only AlphaNumeric" >    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 

             <div class="col-md-3">
                  <div class="form-group">
                    <label>Bank Account Number <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="number" class="form-control" name="bank_ac_no" placeholder="Bank Account" required="required" >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
        </div> 
         <div class="row">
           <div class="col-md-3">
                  <div class="form-group">
                    <label>Bank IFSC Code <b style="color: red;font-size: 14px;">*</b> </label>
                    <input type="text" class="form-control" name="ifsc" placeholder="Bank IFSC Code"  required="required">    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
                  <div class="form-group">
                    <label>Proposer Name <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" class="form-control" name="proposer_name" placeholder="Proposer Name"  required="required" >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
                  <div class="form-group">
                    <label>Cod / ID Number <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="text" class="form-control" name="code_id" placeholder="Cod / ID Number"  required="required">    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
                  <div class="form-group">
                    <label>Donation Amount <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="number" class="form-control" name="donation_amount" placeholder="Donation Amount" required="required" min=600 max=600  >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
         </div>
        
        <div class="row">
          <div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Membership <b style="color: red;font-size: 14px;">*</b></label>
                    <input type="date" class="form-control" name="date_membership" placeholder="Date Of Membership" required="required" >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
           <div class="form-group">
                      <label for="exampleInputFile">Any Gov.Id <b style="color: red;font-size: 14px;">*</b></label>
                      <input type="file" id="exampleInputFile" name="gov_id" required="required">
                      <p class="help-block">Any Gov.Id </p>
                    </div>
                  <!-- /.form-group -->                  
        </div><!-- /.col --> 
           <div class="col-md-3">
           <div class="form-group">
                      <label for="exampleInputFile">Member Image <b style="color: red;font-size: 14px;">*</b></label>
                      <input type="file" id="exampleInputFile" name="membr_img" required="required" >
                      <p class="help-block">Member Image </p>
                    </div>
                  <!-- /.form-group -->                  
        </div><!-- /.col --> 
        <div class="col-md-3">
           <div class="form-group">
                      <label for="exampleInputFile">Signature Image <b style="color: red;font-size: 14px;">*</b></label>
                      <input type="file" id="exampleInputFile" name="signature_img" required="required">
                      <p class="help-block">Member Signature </p>
                    </div>
                  <!-- /.form-group -->                  
        </div><!-- /.col --> 
        
       <div class="col-md-6">
                   <div class="box-footer">
                    <button id="submt"  type="submit" name="add_register_mbr" class="btn btn-block btn-primary btn-flat">Submit</button>
                  </div>                 
                </div><!-- /.col -->
          </div> 
         
				</div>
				
				</form>
              </div><!-- /.row -->
            </div><!-- /.box-body -->            
          </div><!-- /.box -->          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once('footer.php');?>
     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
		
		$(document).on('keyup','#RMbrSlNo',function(){           
			  var slNo = $.trim($('#RMbrSlNo').val());		
         $.ajax({
				  url:'ajax_register_mbr_slno_valid',
				  data:{slNo:slNo},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".slNoStatus").html(data);
          if(data.indexOf("Sl. No. Not Available") > -1)
				  {
					   $("#submt").prop('disabled', true);
				  }	
                  if(data.indexOf("Sl. No.  Available") > -1)
				  {
					   $("#submt").prop('disabled', false);
				  }	
          //console.log(data);				  
				 } 		   
		});
		});	
      $('[data-type="adhaar-number"]').keyup(function() {
      var value = $(this).val();
      value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
      $(this).val(value);
      });

      $('[data-type="adhaar-number"]').on("change, blur", function() {
      var value = $(this).val();
      var maxLength = $(this).attr("maxLength");
      if (value.length != maxLength) {
      $(this).addClass("highlight-error");
      } else {
      $(this).removeClass("highlight-error");
      }
      });	

		
		
      
        //Initialize Select2 Elements
        $(".select2").select2();       
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

       
      });
    </script>
  </body>
</html>
