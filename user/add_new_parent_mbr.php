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
                <h5 class="breadcrumbs-title">Register of Parent Member</h5>
                <ol class="breadcrumb">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li><a href="#">Register of Parent Member</a>
                  </li>
                  <li class="active">Enroll new member</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

        <?php
        if(isset($_POST['reg_parnt_mbr']))
        {   
        $msg=$object->addRegisteredParentUsers();
        }                               
      ?>
        <!--start container-->
        <div class="container">
          <div class="section">
           <!--Form Advance-->          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2"><?= isset($msg)? $msg:'Parent Member Enrollment Form';?></h4>
                <div class="row">
                  <form class="col s12" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="input-field col s6 m3">
                      <select name="sl_number" required="required">                          
                      <option value="" disabled selected>Sl. No. *</option>
                      <?php foreach ($multiLvlIDcreter as  $muLvlTreId) {
                        $chkIdAvailabality=$object->singelRegisteredParentUsers($muLvlTreId);
                        if($chkIdAvailabality==False)
                        {
                      ?>
                      <option value="<?=  $muLvlTreId;?>"><?=  $muLvlTreId;?></option>
                      <?php } } ?>

                      </select>
                      </div>
                      <div class="file-field input-field col s6 m3">
                        <input id="name" type="text" name="name" >
                        <label for="name">Name (In Block Letter</label>
                      </div>   
                      <div class="file-field input-field col s6 m3">
                        <input id="fs_name" type="text" name="father_spouse_name" >
                        <label for="fs_name">Father / Spouse Name</label>
                      </div> 
                      <div class="file-field input-field col s6 m3">
                        <input id="m_name" type="text" name="mother_name" >
                        <label for="m_name">Mother`s Name</label>
                      </div>     
                    </div>
                    <div class="row">
                      <div class="input-field col s6 m3">
                        <label for="dob" style="margin-top: -20px;">Date Of Birth </label>
                        <input type="date" name="dob" >
                        
                      </div> 
                      <div class="input-field col s6 m3">
                      <select name="marital_status" required="required">                          
                      <option value="" value="" disabled selected>Marital Status *</option>
                       <option value="2" >Married</option>
                      <option value="1" >Un Married</option> 
                      </select>                        
                      </div>
                      <div class="input-field col s6 m3">
                      <select name="sex" required="required">                          
                      <option value="" disabled selected>Sex *</option>
                      <option value="1" >Male</option>
                      <option value="0" >Female</option>
                        </select>
                      </div>
                      <div class="file-field input-field col s6 m3">
                        <input id="f_mbr" type="text" name="family_member" >
                        <label for="f_mbr">Family Member</label>
                      </div>
                    </div>                   
                    <div class="row">
                       <div class="input-field col s12">
                        <textarea id="address" class="materialize-textarea" length="120" name="address"></textarea>
                        <label for="address">Address</label>
                      </div>   
                      
                    </div>
                    
                    <div class="row">
                      <div class="input-field col s6 m3">                          
                         <input id="mobile" type="text" name="mobile_number">
                        <label for="mobile">Mobile Number</label>
                      </div>
                      <div class="input-field col s6 m3 ">                          
                         <input id="email" type="text" name="email_id">
                        <label for="email">Email ID</label>
                      </div>
                      <div class="input-field col s6 m2">                          
                         <input id="aadhar" type="text" name="adhar_card_number">
                        <label for="aadhar">Aadhar Card Number</label>
                      </div>
                      <div class="input-field col s6 m2">                          
                         <input id="pan" type="text" name="pan_card_number">
                        <label for="pan">PAN Card Number</label>
                      </div>
                      <div class="input-field col s12 m2">                          
                         <input id="Voter" type="text" name="voter_id">
                        <label for="Voter">Voter ID Number</label>
                      </div>

                    </div>
                    <div class="row">
                      <div class="input-field col s6 m3">                          
                         <input id="Bank" type="text" name="bank_ac_no">
                        <label for="Bank">Bank Account Number</label>
                      </div>
                      <div class="input-field col s6 m3">                          
                         <input id="IFSC" type="text" name="ifsc">
                        <label for="IFSC">Bank IFSC Code </label>
                      </div> 
                      <div class="input-field col s6 m3">                          
                         <input id="Proposer" type="text" name="proposer_name">
                        <label for="Proposer">Proposer Name</label>
                      </div>
                      <div class="input-field col s6 m3">                          
                         <input id="Cod" type="text" name="code_id">
                        <label for="Cod">Cod / ID Number</label>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="input-field col s6">                          
                         <input id="Donation" type="number" name="donation_amount"  min=600 max=600 required="required">
                        <label for="Donation">Donation Amount *</label>
                      </div>
                      <div class="input-field col s6">
                        <label for="dm" style="margin-top: -20px;">Date Of Membership</label>
                        <input type="date"  name="date_membership">                        
                      </div> 
                                       
                    </div>
                    <div class="row"> 
                      <div class="file-field input-field col s12 m4">
                        <input class="file-path validate" type="text" />
                        <div class="btn">
                          <span>Any Gov.Id </span>
                          <input type="file" name="gov_id" />
                        </div>
                      </div>
                      <div class="file-field input-field col s6 m4">
                        <input class="file-path validate" type="text" />
                        <div class="btn">
                          <span>Member Image</span>
                          <input type="file" name="membr_img" />
                        </div>
                      </div> 
                      <div class="file-field input-field col s6 m4">
                        <input class="file-path validate" type="text" />
                        <div class="btn">
                          <span>Signature Image</span>
                          <input type="file" name="signature_img" />
                        </div>
                      </div>                  
                    </div>
                    <div class="row">                      
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="reg_parnt_mbr">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
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