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
  <title>Login Page | OurFamily</title>

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
      <?php $singelMbrDtls=$object->singelRegisteredParentUsersByAccessLevelId($_SESSION['sl_no']);         ?>
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Lis of all Disbrusment of Donation</h5>
                
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

        
        

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
                            <th>Amount</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Tree Level</th>
                            <th>Child Of</th>
                            <th>Amount</th>
                        </tr>
                    </tfoot>
                 
                    <tbody>
                      <?php foreach ($object->findAllDonationDisbusmentBySpecAcessID($singelMbrDtls['access_id']) as $key => $allDonationList) {
                         $singelMbrDtls=$object->singelRegisteredParentUsersByAccessLevelId($allDonationList['transfered_from']);
                        ?>
                        <tr>
                            <td><?= $singelMbrDtls['name'];?></td>
                            <td><?= $singelMbrDtls['sl_no'];?></td>
                            <td><?= $singelMbrDtls['child_of'];?></td>
                            <td><?= $allDonationList['amount'];?></td>  
                        </tr>
                       <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--end container-->
      

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
    <script>
      $(function () {
      $(document).on('click','.delete',function(){
      var chk= confirm ("Are you sure for deleting ?");
      if(chk)
      {
      var memRegisId = $(this).children('img').attr('id');
      var id=$(this).attr("href").split("#");
      var row=$(this).parent().parent();
        $.ajax({

        url:'all_delete',       

        data:{memRegisId:memRegisId},

        type:'POST',

        cache:false,

        success:function(data)

        {

           row.html("<h5 style='width:200%;color:#585F23 ;margin-left:90%'>Successfully Deleted</h5>");
           row.fadeOut(4000).remove; 
        }

      });  

      }

    });
      });
    </script>  
</body>

</html>