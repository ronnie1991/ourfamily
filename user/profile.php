<?php include_once("main.class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Our Family,A crowd funding.">
  <meta name="keywords" content="crowd funding , funding, top crowd funding, reliable crowd funding, our family,">
  <title>Our Family</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <?php include_once("header.php"); 
  $multiLvlIDcreter=$object->createMultilabelUserId();
  ?>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <?php include_once("left_sidebar.php"); ?>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Member Profile</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

        <?php $singelMbrDtls=$object->singelRegisteredParentUsersByAccessLevelId($_SESSION['sl_no']); ?>
        <!--start container-->
        <div class="container">
          <div class="section">
           <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <div class="row">
                  <form class="col s12" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="file-field input-field col s6 m3">
                        <label class="slNoStatus">SL. No</label>
                        <input type="text" value="<?= $singelMbrDtls['sl_no'];?>" readonly >
                      </div>
                      <div class="file-field input-field col s6 m3">
                         <label>Name</label>
                        <input type="text" value="<?= $singelMbrDtls['name'];?>" readonly >
                      </div> 
                      <div class="file-field input-field col s6 m3">
                        <label>Father / Spouse Name </label>
                        <input type="text" value="<?= $singelMbrDtls['father_spouse'];?>" readonly >
                      </div> 
                      <div class="file-field input-field col s6 m3">
                        <label class="rollAvl">Mother`s Name </label>
                        <input type="text" value="<?= $singelMbrDtls['mother_name'];?>" readonly >
                      </div>    
                    </div>
                    <div class="row">
                      <div class="input-field col s6 m3">
                        <label>Date Of Birth </label>
                       <input type="text" value="<?= date('d M Y',strtotime($singelMbrDtls['dob']));?>" readonly >
                        
                      </div> 
                      <div class="input-field col s6 m3">
                        <?php if($singelMbrDtls['maritial_status']==2) { $mstatus="Married";} if($singelMbrDtls['maritial_status']==1) { $mstatus="Un Married";} ?> 
                        <label>Marital Status </label>
                      <input type="text" value="<?= $mstatus;?>"  readonly >                       
                      </div>
                      <div class="input-field col s6 m3">
                         <?php if($singelMbrDtls['sex']==1) { $sex="Male";} if($singelMbrDtls['sex']==0) { $sex="Female";} ?> 
                         <label>Sex </label>
                       <input type="text" value="<?= $sex;?>" readonly >
                      </div>
                      <div class="file-field input-field col s6 m3">
                        <label>Family Member</label>
                        <input type="text" value="<?= $singelMbrDtls['family_member'];?>" readonly >
                      </div>
                    </div>                   
                    <div class="row">
                       <div class="input-field col s12">
                        <label>Address</label>
                        <textarea id="address" class="materialize-textarea"  readonly><?= $singelMbrDtls['address'];?></textarea>
                      </div>   
                      
                    </div>
                    
                    <div class="row">
                      <div class="input-field col s6 m3"> 
                      <label>Mobile Number</label>                         
                          <input type="text" value="<?= $singelMbrDtls['mobile_number'];?>" readonly >
                      </div>
                      <div class="input-field col s6 m3 ">
                      <label class="emailStatus">Email ID</label>                         
                        <input type="text" value="<?= $singelMbrDtls['email_id'];?>" readonly >
                      </div>
                      <div class="input-field col s6 m2"> 
                      <label>Aadhar Card Number </label>                         
                         <input type="text" value="<?= $singelMbrDtls['adhar_card_number'];?>" readonly >
                      </div>
                      <div class="input-field col s6 m2"> 
                      <label>PAN Card Number </label>                         
                        <input type="text" value="<?= $singelMbrDtls['pan_card_number'];?>" readonly >
                      </div>
                      <div class="input-field col s12 m2">   
                      <label>Voter ID Number </label>                       
                         <input type="text" value="<?= $singelMbrDtls['voter_id_number'];?>" readonly >
                      </div>

                    </div>
                    <div class="row">
                      <div class="input-field col s6 m3">
                       <label>Bank Account Number </label>                          
                          <input type="text" value="<?= $singelMbrDtls['bank_ac_number'];?>" readonly >
                      </div>
                      <div class="input-field col s6 m3">  
                       <label>Bank IFSC Code  </label>                        
                          <input type="text" value="<?= $singelMbrDtls['bank_ifsc_code'];?>" readonly >
                      </div> 
                      <div class="input-field col s6 m3"> 
                      <label>Proposer Name </label>                         
                         <input type="text" value="<?= $singelMbrDtls['propose_name'];?>" readonly >
                      </div>
                      <div class="input-field col s6 m3"> 
                         <input type="text" value="<?= $singelMbrDtls['cod_id_number'];?>" readonly >
                        <label for="Cod">Cod / ID Number</label>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="input-field col s6">                          
                         <input type="text" value="<?= $singelMbrDtls['donation_amount'];?>" readonly >
                        <label for="Donation">Donation Amount *</label>
                      </div>
                      <div class="input-field col s6">
                        
                       <input type="text" value="<?= date('d M Y',strtotime($singelMbrDtls['date_of_membership']));?>" readonly > <label for="dm" >Date Of Membership</label>                      
                      </div> 
                                       
                    </div>
                    <div class="row"> 
                      <div class="input-field col s12 m4">
                        <span>Gov.Id </span>
                          <img src="../common/rmbr_gov_id/<?=$singelMbrDtls['gov_id'];?>" width="80px" height="80px"> 
                      </div>
                      <div class=" input-field col s6 m4">
                        <span>Member Image</span>
                           <img src="../common/rmbr_img/<?=$singelMbrDtls['member_img'];?>" width="80px" height="80px">
                      </div> 
                      <div class="input-field col s6 m4">
                        
                        <span>Signature Image</span>
                          <img src="../common/rmbr_signature/<?=$singelMbrDtls['signature'];?>" width="80px" height="80px">
                      </div>                  
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- END CONTENT -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START RIGHT SIDEBAR NAV-->
  
  <!-- LEFT RIGHT SIDEBAR NAV-->

  </div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <?php include_once("footer.php"); ?>
  <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    
</body>

</html>