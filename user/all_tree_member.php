<?php include_once("main.class.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Our Family,A crowd funding. ">
  <meta name="keywords" content="crowd funding , funding, top crowd funding, reliable crowd funding, our family,">
  <title>Members | OurFamily</title>

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
  <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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
  <?php include_once("header.php"); ?>
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
                <h5 class="breadcrumbs-title">Member`s Enrolled By You</h5>
                
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

         <?php
         $singelMbrDtls=$object->singelRegisteredParentUsersByAccessLevelId($_SESSION['sl_no']);

          if(filter_var($singelMbrDtls['sl_no'], FILTER_VALIDATE_INT))
          {

          ?>
        

        <!--start container-->
        <div class="container">
          <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
              
              <div class="row">
                
                <div class="col s12 ">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tree Level</th>
                            <th>Child Of</th>
                            <th>Money Disbursment</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Tree Level</th>
                            <th>Cahild Of</th>
                            <th>Money Disbursment</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                      <?php foreach ($object->findAllSupremRootUsers($singelMbrDtls['suprem_parent']) as $key => $suprimroodDta) {
                        ?>
                        <tr>
                            <td><?= $suprimroodDta['name'];?></td>
                            <td><?= $suprimroodDta['sl_no'];?></td>
                            <td><?= $suprimroodDta['child_of'];?></td>
                            <td>
                              <a href="list_amount_tob_disbursment?rmID=<?= base64_encode($suprimroodDta['access_id']); ?>" >
                                <img src="images/disbursement.png" width="50" height="44" title="Disbursment List" >
                              </a>
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
            <br>
            
            


           
          </div>

        </div>
        <!--end container-->
      <?php } else { 
      	if(ctype_alnum($singelMbrDtls['sl_no']))
    	{ 
       ?>
       <!--start container-->
        <div class="container">
          <div class="section">
            <!--DataTables example-->
            <div id="table-datatables">
              
              <div class="row">
                
                <div class="col s12 ">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tree Level</th>
                            <th>Child Of</th>
                            <th>Money Disbursment</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Tree Level</th>
                            <th>Child Of</th>
                            <th>Money Disbursment</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                      <?php foreach ($object->findAllParentUsers($singelMbrDtls['access_id']) as $key => $suprimroodDta) {
                        ?>
                        <tr>
                            <td><?= $suprimroodDta['name'];?></td>
                            <td><?= $suprimroodDta['sl_no'];?></td>
                            <td><?= $suprimroodDta['child_of'];?></td>
                            <td>
                              <a href="list_amount_tob_disbursment?rmID=<?= base64_encode($suprimroodDta['access_id']); ?>" >
                                <img src="images/disbursement.png" width="50" height="44" title="Disbursment List" >
                              </a>
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
            <br>
            
            


           
          </div>

        </div>
        <!--end container-->
   <?php } } ?>

      </section>
      <!-- END CONTENT -->

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
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>  
    
</body>

</html>