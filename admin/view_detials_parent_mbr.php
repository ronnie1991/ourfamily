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

      <?php include_once('header.php');
      include_once('left_asid.php');
      $rootMemberDtls=$object->singelRootMbrDtls(base64_decode($_GET['rmID']));	 
	    ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Details Of Root Members - "<?= $rootMemberDtls['name'];?>""      
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="all_registerd_mber">All Root Members</a></li>
            <li class="active">Detils Root Members</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-default"><!-- /.box-header -->
			
            <div class="box-body">
              <div class="row">
			<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" name="form_id" value="<?= $_SESSION['session_form'];?>" />        
			
                 <div class="slno">
                  <div class="col-md-2">
                  <div class="form-group">
                    <label class="slNoStatus">Parent ID </label>
                    <input  type="text" class="form-control" Value="<?= $rootMemberDtls['child_of']?>" readonly>          
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
                 <div class="col-md-1">
                  <div class="form-group">
                    <label class="slNoStatus">SL. No </label>
                    <input  type="text" class="form-control" Value="<?= $rootMemberDtls['sl_no']?>" readonly>          
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->                                 
                </div><!-- /.col -->
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Name (In Block Letter) </label>
                    <input type="text" class="form-control"  value="<?= $rootMemberDtls['name']?>"  readonly >    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Father / Spouse Name  </label>
                    <input type="text" class="form-control"  value="<?= $rootMemberDtls['father_spouse']?>" readonly >
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                  <label class="rollAvl">Mother`s Name </label>
                  <input id="rollNum" type="text" class="form-control"  value="<?= $rootMemberDtls['mother_name']?>"  readonly>        
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->	
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" class="form-control"  value="<?= $rootMemberDtls['dob']?>" readonly>    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->  		
        								
              <div class="col-md-3">
                  <div class="form-group">
                    <label>Marital Status </label>
                    <select  class="form-control select2" disabled="disabled" style="width: 100%;">
                      <option value="" >Marital Status</option>                      
                      <option <?php if($rootMemberDtls['maritial_status']=='2') {echo"selected=selected";}  ?> value="2" >Married</option>
                      <option <?php if($rootMemberDtls['maritial_status']=='1') {echo"selected=selected";}  ?> value="1" >Un Married</option>
                       
                    </select>                           
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->                 
				      <div class="col-md-3">
                  <div class="form-group">
                    <label>Sex </label>
                    <select  class="form-control select2 ldfon" disabled="disabled" required style="width: 100%;">
                      <option value="" >Sex Status</option>                      
                      <option <?php if($rootMemberDtls['sex']=='1') {echo"selected=selected";}  ?> value="1" >Male</option>
                      <option <?php if($rootMemberDtls['sex']=='0') {echo"selected=selected";}  ?> value="0" >Female</option>
                       
                    </select>                           
                  </div><!-- /.form-group -->                  
                </div><!-- /.col -->

				        <div class="col-md-3">
                  <div class="form-group">
                    <label>Family Member </label>
                    <input type="text" class="form-control"  value="<?= $rootMemberDtls['family_member']?>"  readonly >    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
			 <div class="col-md-6">
                  <div class="form-group">
                      <label>Address </label>
                      <textarea class="form-control" rows="3" readonly ><?= $rootMemberDtls['address']?></textarea>
                    </div><!-- /.form-group -->                  
                </div><!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" readonly value="<?= $rootMemberDtls['mobile_number']?>"  >
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 
				<div class="col-md-3">
                  <div class="form-group">
                    <label class="emailStatus">Email ID </label>
                    <input type="email" class="form-control" value="<?= $rootMemberDtls['email_id']?>" readonly>          
                  </div><!-- /.form-group -->                  
          </div><!-- /.col -->

                
                 </div><!-- /.row --> 

                 <div class="row">
				
               <div class="col-md-3">
                  <div class="form-group">
                    <label>Aadhar Card Number </label>
                    <input type="text"  class="form-control" readonly  value="<?= $rootMemberDtls['adhar_card_number']?>" >    
                  </div><!-- /.form-group -->                  
              </div><!-- /.col -->
               
              <div class="col-md-3">
                  <div class="form-group">
                    <label>PAN Card Number </label>
                    <input type="text" class="form-control" readonly value="<?= $rootMemberDtls['pan_card_number']?>">    
                  </div><!-- /.form-group -->                  
              </div><!-- /.col --> 

                

            <div class="col-md-3">
                  <div class="form-group">
                    <label>Voter ID Number </label>
                    <input type="text" class="form-control" readonly value="<?= $rootMemberDtls['voter_id_number']?>" >    
                  </div><!-- /.form-group -->                  
                </div><!-- /.col --> 

             <div class="col-md-3">
                  <div class="form-group">
                    <label>Bank Account Number </label>
                    <input type="text" class="form-control"  value="<?= $rootMemberDtls['bank_ac_number']?>" readonly >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
        </div> 
         <div class="row">
           <div class="col-md-3">
                  <div class="form-group">
                    <label>Bank IFSC Code  </label>
                    <input type="text" class="form-control"  value="<?= $rootMemberDtls['bank_ifsc_code']?>" readonly>    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
                  <div class="form-group">
                    <label>Proposer Name </label>
                    <input type="text" class="form-control" value="<?= $rootMemberDtls['propose_name']?>"  readonly>    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
                  <div class="form-group">
                    <label>Cod / ID Number </label>
                    <input type="text" class="form-control" value="<?= $rootMemberDtls['cod_id_number']?>"  readonly>    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <div class="col-md-3">
                  <div class="form-group">
                    <label>Donation Amount </label>
                    <input type="number" class="form-control" readonly value="<?= $rootMemberDtls['donation_amount']?>" >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
         </div>
        
        <div class="row">
          <div class="col-md-4">
                  <div class="form-group">
                    <label>Date Of Membership </label>
                    <input type="date" class="form-control" readonly value="<?= $rootMemberDtls['date_of_membership']?>">    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
            <?php $userPass=$object->singelRootMbrUserPassword(base64_decode($_GET['rmID'])); ?>
            <div class="col-md-4">
                  <div class="form-group">
                    <label>User Id </label>
                    <input type="text" class="form-control" readonly value="<?= $userPass['user_id']?>" >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->
           <div class="col-md-4">
                  <div class="form-group">
                    <label>Password </label>
                    <input type="text" class="form-control" readonly value="<?= $userPass['password']?>" >    
                  </div><!-- /.form-group -->                  
            </div><!-- /.col -->       
         
				</div>

        <div class="row">
            <div class="col-md-4">
           <div class="form-group">
                      <label for="exampleInputFile">Any Gov.Id </label>
                      <img src="../common/rmbr_gov_id/<?=$rootMemberDtls['gov_id'];?>" width="80px" height="80px"> 
                    </div>
                  <!-- /.form-group -->                  
        </div><!-- /.col --> 
           <div class="col-md-4">
           <div class="form-group">
                      <label for="exampleInputFile">Member Image </label>
                      <img src="../common/rmbr_img/<?=$rootMemberDtls['member_img'];?>" width="80px" height="80px">
                    </div>
                  <!-- /.form-group -->                  
        </div><!-- /.col --> 
        <div class="col-md-4">
           <div class="form-group">
                      <label for="exampleInputFile">Signature Image </label>                    
                     <img src="../common/rmbr_signature/<?=$rootMemberDtls['signature'];?>" width="80px" height="80px">
                    </div>
                  <!-- /.form-group -->                  
        </div><!-- /.col --> 
         
        </div>
        <h4 >Name - "<?= $rootMemberDtls['name'];?>" &nbsp; &nbsp;&nbsp;  ID-  "<?= $rootMemberDtls['access_id'];?>" </h4>
          <?php if($rootMemberDtls['status']=='0') { ?>
         <span class="verifymsg"> <h3 style="cursor: pointer;color: #038401;text-decoration: underline;" class="verfication">Verify the Member? </h3></span>
          <?php } ?>
          <?php if($rootMemberDtls['status']=='1') { ?>
          <span class="verifymsg"><h3 style="cursor: pointer;color: #c30c36;text-decoration: underline;" class="verfication">Detained the Member? </h3></span>
          <?php } ?>
          
				
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
      
        //Initialize Select2 Elements
        $(".select2").select2();       
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        $(".verfication").click(function(){  		 
			  var id="<?= $rootMemberDtls['access_id']?>"; 
			 if(confirm("Are You Sure you want to change member acess status?"))
			 {            		  
			  $.ajax({
				  url:'ajax_member_verification',
				  data:{id:id},
				  type : 'POST' ,
				  cache:false,
				  success:function(data){
				  $(".verifymsg").html(data);			
				 } 
		    });
			}
		});

       
      });
    </script>
  </body>
</html>
