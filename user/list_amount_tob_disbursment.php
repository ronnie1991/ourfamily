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
  <title>List of amount to be disbrusment to Members | OurFamily</title>

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
      <?php include_once("left_sidebar.php");

      $decodRmId=base64_decode($_GET['rmID']); 
      $specMbrdDtls=$object->singelRegisteredParentUsersByAccessLevelId($decodRmId);
      $disbrusment=$object->disbrusmentDonationToHirrkey($decodRmId);
      $hirirChe=$specMbrdDtls['sl_no']; 
      ?>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        <!--end container-->
      <?php   
      	if(ctype_alnum($hirirChe))
         {     
          $aNSortr = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $hirirChe);
          $split1=$aNSortr[0];
          $split2=$aNSortr[1];
          $split3=$aNSortr[2];
          if($split2=='A')
          { 
       ?>
       <!--start container-->
          <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {
                       $singelRootMbrDtls=$object->singelRootMbrDtls($rMbrDisbrusData['parentID']);   
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$singelRootMbrDtls['name'];
                      $parentAccount= $singelRootMbrDtls['bank_ac_number'];
                      $parentIfsc= $singelRootMbrDtls['bank_ifsc_code'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b> </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentName;?></h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      
      <?php  

      }
      if($split2=='B')
      {
      ?>
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $rootName=$rMbrDisbrusData['rootName'];
                      $rootSlNo=$rMbrDisbrusData['rootSlno'];
                      $rootAccount= $rMbrDisbrusData['rootAccount'];
                      $rootIfsc= $rMbrDisbrusData['rootIFSC'];
                      $rootamount= $rMbrDisbrusData['rootAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b> </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentName;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $rootSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $rootSlNo;?></td>
                       <td><?= $rootName;?></td>
                       <td><?= $rootAccount;?></td>  
                       <td><?= $rootIfsc;?></td>                        
                       <td><?= $rootamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>                
                </div><!-- /.box-body -->   
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php

      }
      if($split2=='C')
      {?>
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $ALevelName=$rMbrDisbrusData['ALevelName'];
                      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
                      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
                      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
                      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
                      $rootName=$rMbrDisbrusData['rootName'];
                      $rootSlNo=$rMbrDisbrusData['rootSlno'];
                      $rootAccount= $rMbrDisbrusData['rootAccount'];
                      $rootIfsc= $rMbrDisbrusData['rootIFSC'];
                      $rootamount= $rMbrDisbrusData['rootAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b> </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentName;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ALevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ALevelSlNo;?></td>
                       <td><?= $ALevelName;?></td>
                       <td><?= $ALevelAccount;?></td>  
                       <td><?= $ALevelIfsc;?></td>                        
                       <td><?= $ALevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $rootSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $rootSlNo;?></td>
                       <td><?= $rootName;?></td>
                       <td><?= $rootAccount;?></td>  
                       <td><?= $rootIfsc;?></td>                        
                       <td><?= $rootamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>                
                </div><!-- /.box-body -->  
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php
      }

      if($split2=='D')
      {?>
          <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $BLevelName=$rMbrDisbrusData['BLevelName'];
                      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
                      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
                      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
                      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
                      $ALevelName=$rMbrDisbrusData['ALevelName'];
                      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
                      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
                      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
                      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
                      $rootName=$rMbrDisbrusData['rootName'];
                      $rootSlNo=$rMbrDisbrusData['rootSlno'];
                      $rootAccount= $rMbrDisbrusData['rootAccount'];
                      $rootIfsc= $rMbrDisbrusData['rootIFSC'];
                      $rootamount= $rMbrDisbrusData['rootAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b> </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $BLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $BLevelSlNo;?></td>
                       <td><?= $BLevelName;?></td>
                       <td><?= $BLevelAccount;?></td>  
                       <td><?= $BLevelIfsc;?></td>                        
                       <td><?= $BLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ALevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ALevelSlNo;?></td>
                       <td><?= $ALevelName;?></td>
                       <td><?= $ALevelAccount;?></td>  
                       <td><?= $ALevelIfsc;?></td>                        
                       <td><?= $ALevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $rootSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $rootSlNo;?></td>
                       <td><?= $rootName;?></td>
                       <td><?= $rootAccount;?></td>  
                       <td><?= $rootIfsc;?></td>                        
                       <td><?= $rootamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>                
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrDID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php
      }
      if($split2=='E')
      {?>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $CLevelName=$rMbrDisbrusData['CLevelName'];
                      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
                      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
                      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
                      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
                      $BLevelName=$rMbrDisbrusData['BLevelName'];
                      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
                      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
                      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
                      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
                      $ALevelName=$rMbrDisbrusData['ALevelName'];
                      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
                      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
                      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
                      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
                      $rootName=$rMbrDisbrusData['rootName'];
                      $rootSlNo=$rMbrDisbrusData['rootSlno'];
                      $rootAccount= $rMbrDisbrusData['rootAccount'];
                      $rootIfsc= $rMbrDisbrusData['rootIFSC'];
                      $rootamount= $rMbrDisbrusData['rootAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b> </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $CLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $CLevelSlNo;?></td>
                       <td><?= $CLevelName;?></td>
                       <td><?= $CLevelAccount;?></td>  
                       <td><?= $CLevelIfsc;?></td>                        
                       <td><?= $CLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>  

                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $BLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $BLevelSlNo;?></td>
                       <td><?= $BLevelName;?></td>
                       <td><?= $BLevelAccount;?></td>  
                       <td><?= $BLevelIfsc;?></td>                        
                       <td><?= $BLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ALevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ALevelSlNo;?></td>
                       <td><?= $ALevelName;?></td>
                       <td><?= $ALevelAccount;?></td>  
                       <td><?= $ALevelIfsc;?></td>                        
                       <td><?= $ALevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $rootSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $rootSlNo;?></td>
                       <td><?= $rootName;?></td>
                       <td><?= $rootAccount;?></td>  
                       <td><?= $rootIfsc;?></td>                        
                       <td><?= $rootamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>                
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrEID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php

      }
      if($split2=='F')
      { ?>
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                      $CLevelName=$rMbrDisbrusData['CLevelName'];
                      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
                      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
                      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
                      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
                      $BLevelName=$rMbrDisbrusData['BLevelName'];
                      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
                      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
                      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
                      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
                      $ALevelName=$rMbrDisbrusData['ALevelName'];
                      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
                      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
                      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
                      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
                      $rootName=$rMbrDisbrusData['rootName'];
                      $rootSlNo=$rMbrDisbrusData['rootSlno'];
                      $rootAccount= $rMbrDisbrusData['rootAccount'];
                      $rootIfsc= $rMbrDisbrusData['rootIFSC'];
                      $rootamount= $rMbrDisbrusData['rootAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b> </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $DLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $DLevelSlNo;?></td>
                       <td><?= $DLevelName;?></td>
                       <td><?= $DLevelAccount;?></td>  
                       <td><?= $DLevelIfsc;?></td>                        
                       <td><?= $DLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $CLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $CLevelSlNo;?></td>
                       <td><?= $CLevelName;?></td>
                       <td><?= $CLevelAccount;?></td>  
                       <td><?= $CLevelIfsc;?></td>                        
                       <td><?= $CLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>  

                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $BLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $BLevelSlNo;?></td>
                       <td><?= $BLevelName;?></td>
                       <td><?= $BLevelAccount;?></td>  
                       <td><?= $BLevelIfsc;?></td>                        
                       <td><?= $BLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ALevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ALevelSlNo;?></td>
                       <td><?= $ALevelName;?></td>
                       <td><?= $ALevelAccount;?></td>  
                       <td><?= $ALevelIfsc;?></td>                        
                       <td><?= $ALevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $rootSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $rootSlNo;?></td>
                       <td><?= $rootName;?></td>
                       <td><?= $rootAccount;?></td>  
                       <td><?= $rootIfsc;?></td>                        
                       <td><?= $rootamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>                
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrFID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php
      }
      if($split2=='G')
      { ?>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                      $CLevelName=$rMbrDisbrusData['CLevelName'];
                      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
                      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
                      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
                      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
                      $BLevelName=$rMbrDisbrusData['BLevelName'];
                      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
                      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
                      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
                      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
                      $ALevelName=$rMbrDisbrusData['ALevelName'];
                      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
                      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
                      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
                      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b>
                  &nbsp;&nbsp;&nbsp;&nbsp; Tree Level- <b><?= $transfer_treeLevel;?></b>
                  </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ELevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ELevelSlNo;?></td>
                       <td><?= $ELevelName;?></td>
                       <td><?= $ELevelAccount;?></td>  
                       <td><?= $ELevelIfsc;?></td>                        
                       <td><?= $ELevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $DLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $DLevelSlNo;?></td>
                       <td><?= $DLevelName;?></td>
                       <td><?= $DLevelAccount;?></td>  
                       <td><?= $DLevelIfsc;?></td>                        
                       <td><?= $DLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $CLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $CLevelSlNo;?></td>
                       <td><?= $CLevelName;?></td>
                       <td><?= $CLevelAccount;?></td>  
                       <td><?= $CLevelIfsc;?></td>                        
                       <td><?= $CLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>  

                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $BLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $BLevelSlNo;?></td>
                       <td><?= $BLevelName;?></td>
                       <td><?= $BLevelAccount;?></td>  
                       <td><?= $BLevelIfsc;?></td>                        
                       <td><?= $BLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ALevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ALevelSlNo;?></td>
                       <td><?= $ALevelName;?></td>
                       <td><?= $ALevelAccount;?></td>  
                       <td><?= $ALevelIfsc;?></td>                        
                       <td><?= $ALevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                                  
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrGID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

     <?php  
      }

      if($split2=='H')
      {
      ?>
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                      $CLevelName=$rMbrDisbrusData['CLevelName'];
                      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
                      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
                      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
                      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
                      $BLevelName=$rMbrDisbrusData['BLevelName'];
                      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
                      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
                      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
                      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b>
                  &nbsp;&nbsp;&nbsp;&nbsp; Tree Level- <b><?= $transfer_treeLevel;?></b>
                  </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $FLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $FLevelSlNo;?></td>
                       <td><?= $FLevelName;?></td>
                       <td><?= $FLevelAccount;?></td>  
                       <td><?= $FLevelIfsc;?></td>                        
                       <td><?= $FLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ELevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ELevelSlNo;?></td>
                       <td><?= $ELevelName;?></td>
                       <td><?= $ELevelAccount;?></td>  
                       <td><?= $ELevelIfsc;?></td>                        
                       <td><?= $ELevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $DLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $DLevelSlNo;?></td>
                       <td><?= $DLevelName;?></td>
                       <td><?= $DLevelAccount;?></td>  
                       <td><?= $DLevelIfsc;?></td>                        
                       <td><?= $DLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $CLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $CLevelSlNo;?></td>
                       <td><?= $CLevelName;?></td>
                       <td><?= $CLevelAccount;?></td>  
                       <td><?= $CLevelIfsc;?></td>                        
                       <td><?= $CLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>  

                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $BLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $BLevelSlNo;?></td>
                       <td><?= $BLevelName;?></td>
                       <td><?= $BLevelAccount;?></td>  
                       <td><?= $BLevelIfsc;?></td>                        
                       <td><?= $BLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table> 
                  
                                  
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrHID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php
      }
      if($split2=='I')
      {?>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $GLevelName=$rMbrDisbrusData['GLevelName'];
                      $GLevelSlNo=$rMbrDisbrusData['GLevelSlNo'];
                      $GLevelAccount= $rMbrDisbrusData['GLevelAccount'];
                      $GLevelIfsc= $rMbrDisbrusData['GLevelFSC'];
                      $GLevelamount= $rMbrDisbrusData['GLevelAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                      $CLevelName=$rMbrDisbrusData['CLevelName'];
                      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
                      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
                      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
                      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b>
                  &nbsp;&nbsp;&nbsp;&nbsp; Tree Level- <b><?= $transfer_treeLevel;?></b>
                  </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $GLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $GLevelSlNo;?></td>
                       <td><?= $GLevelName;?></td>
                       <td><?= $GLevelAccount;?></td>  
                       <td><?= $GLevelIfsc;?></td>                        
                       <td><?= $GLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $FLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $FLevelSlNo;?></td>
                       <td><?= $FLevelName;?></td>
                       <td><?= $FLevelAccount;?></td>  
                       <td><?= $FLevelIfsc;?></td>                        
                       <td><?= $FLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ELevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ELevelSlNo;?></td>
                       <td><?= $ELevelName;?></td>
                       <td><?= $ELevelAccount;?></td>  
                       <td><?= $ELevelIfsc;?></td>                        
                       <td><?= $ELevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $DLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $DLevelSlNo;?></td>
                       <td><?= $DLevelName;?></td>
                       <td><?= $DLevelAccount;?></td>  
                       <td><?= $DLevelIfsc;?></td>                        
                       <td><?= $DLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $CLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $CLevelSlNo;?></td>
                       <td><?= $CLevelName;?></td>
                       <td><?= $CLevelAccount;?></td>  
                       <td><?= $CLevelIfsc;?></td>                        
                       <td><?= $CLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>  
                  
                                  
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrIID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php }
      if($split2=='J')
      {?>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $HLevelName=$rMbrDisbrusData['HLevelName'];
                      $HLevelSlNo=$rMbrDisbrusData['HLevelSlNo'];
                      $HLevelAccount= $rMbrDisbrusData['HLevelAccount'];
                      $HLevelIfsc= $rMbrDisbrusData['HLevelFSC'];
                      $HLevelamount= $rMbrDisbrusData['HLevelAmount'];
                      $GLevelName=$rMbrDisbrusData['GLevelName'];
                      $GLevelSlNo=$rMbrDisbrusData['GLevelSlNo'];
                      $GLevelAccount= $rMbrDisbrusData['GLevelAccount'];
                      $GLevelIfsc= $rMbrDisbrusData['GLevelFSC'];
                      $GLevelamount= $rMbrDisbrusData['GLevelAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b>
                  &nbsp;&nbsp;&nbsp;&nbsp; Tree Level- <b><?= $transfer_treeLevel;?></b>
                  </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $HLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $HLevelSlNo;?></td>
                       <td><?= $HLevelName;?></td>
                       <td><?= $HLevelAccount;?></td>  
                       <td><?= $HLevelIfsc;?></td>                        
                       <td><?= $HLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $GLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $GLevelSlNo;?></td>
                       <td><?= $GLevelName;?></td>
                       <td><?= $GLevelAccount;?></td>  
                       <td><?= $GLevelIfsc;?></td>                        
                       <td><?= $GLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $FLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $FLevelSlNo;?></td>
                       <td><?= $FLevelName;?></td>
                       <td><?= $FLevelAccount;?></td>  
                       <td><?= $FLevelIfsc;?></td>                        
                       <td><?= $FLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ELevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ELevelSlNo;?></td>
                       <td><?= $ELevelName;?></td>
                       <td><?= $ELevelAccount;?></td>  
                       <td><?= $ELevelIfsc;?></td>                        
                       <td><?= $ELevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $DLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $DLevelSlNo;?></td>
                       <td><?= $DLevelName;?></td>
                       <td><?= $DLevelAccount;?></td>  
                       <td><?= $DLevelIfsc;?></td>                        
                       <td><?= $DLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  
                  
                                  
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrJID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <?php }
      if($split2=='K')
      {?>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $ILevelName=$rMbrDisbrusData['ILevelName'];
                      $ILevelSlNo=$rMbrDisbrusData['ILevelSlNo'];
                      $ILevelAccount= $rMbrDisbrusData['ILevelAccount'];
                      $ILevelIfsc= $rMbrDisbrusData['ILevelFSC'];
                      $ILevelamount= $rMbrDisbrusData['ILevelAmount'];
                      $HLevelName=$rMbrDisbrusData['HLevelName'];
                      $HLevelSlNo=$rMbrDisbrusData['HLevelSlNo'];
                      $HLevelAccount= $rMbrDisbrusData['HLevelAccount'];
                      $HLevelIfsc= $rMbrDisbrusData['HLevelFSC'];
                      $HLevelamount= $rMbrDisbrusData['HLevelAmount'];
                      $GLevelName=$rMbrDisbrusData['GLevelName'];
                      $GLevelSlNo=$rMbrDisbrusData['GLevelSlNo'];
                      $GLevelAccount= $rMbrDisbrusData['GLevelAccount'];
                      $GLevelIfsc= $rMbrDisbrusData['GLevelFSC'];
                      $GLevelamount= $rMbrDisbrusData['GLevelAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                    }
                 ?> 
                 <h4>Transfer From- <b><?= $transferName?></b>&nbsp;&nbsp;&nbsp;&nbsp; Sender Id- <b><?= $transferForm;?></b>
                  &nbsp;&nbsp;&nbsp;&nbsp; Tree Level- <b><?= $transfer_treeLevel;?></b>
                  </h4>

                  <table class="table table-bordered table-striped">                  
                    <thead>
                     <h5>Tree Level-Office</h5>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                  
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $officeName;?></td>
                       <td><?= $officeAccount;?></td>  
                       <td><?= $officeIfsc;?></td>                        
                       <td><?= $officeamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>

                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Soroj</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SorojName;?></td>
                       <td><?= $SorojAccount;?></td>  
                       <td><?= $SorojIfsc;?></td>                        
                       <td><?= $Sorojamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-Sitaram Dipak</h5>
                    <thead>
                      <tr>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                    
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $SitaramDipakName;?></td>
                       <td><?= $SitaramDipakAccount;?></td>  
                       <td><?= $SitaramDipakIfsc;?></td>                        
                       <td><?= $SitaramDipakamount;?></td>                                     
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $parentSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $parentSlNo;?></td>
                       <td><?= $parentName;?></td>
                       <td><?= $parentAccount;?></td>  
                       <td><?= $parentIfsc;?></td>                        
                       <td><?= $parentamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                   <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ILevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $ILevelSlNo;?></td>
                       <td><?= $ILevelName;?></td>
                       <td><?= $ILevelAccount;?></td>  
                       <td><?= $ILevelIfsc;?></td>                        
                       <td><?= $ILevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>   
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $HLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $HLevelSlNo;?></td>
                       <td><?= $HLevelName;?></td>
                       <td><?= $HLevelAccount;?></td>  
                       <td><?= $HLevelIfsc;?></td>                        
                       <td><?= $HLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $GLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                        
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>

                    
                    <tbody>                     
                      <tr>
                       <td><?= $GLevelSlNo;?></td>
                       <td><?= $GLevelName;?></td>
                       <td><?= $GLevelAccount;?></td>  
                       <td><?= $GLevelIfsc;?></td>                        
                       <td><?= $GLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $FLevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $FLevelSlNo;?></td>
                       <td><?= $FLevelName;?></td>
                       <td><?= $FLevelAccount;?></td>  
                       <td><?= $FLevelIfsc;?></td>                        
                       <td><?= $FLevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  <table class="table table-bordered table-striped">
                    <h5>Tree Level-<?= $ELevelSlNo;?></h5>
                    <thead>
                      <tr>
                        <th>Tree</th>                     
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>                                                                     
                      </tr>
                    </thead>
                    
                    <tbody>                     
                      <tr>
                       <td><?= $ELevelSlNo;?></td>
                       <td><?= $ELevelName;?></td>
                       <td><?= $ELevelAccount;?></td>  
                       <td><?= $ELevelIfsc;?></td>                        
                       <td><?= $ELevelamount;?></td>                                      
                      </tr>     
                    </tbody>
                  </table>
                  
                  
                                  
                </div><!-- /.box-body -->
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrKID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
                      <button id="submt" type="submit" name="disbusAmount" class="btn btn-block btn-primary btn-flat">Disbrus the Amount</button></a>
                    </div>                 
                  </div>
                     <?php } else { ?>
                      <h4 style="color:green;text-align: center;font-weight: 600;font-size: 28px;">Amount Alredy Disbrus</h4>
                     <?php } ?>
                    
                     
                     
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


        
        <!--end container-->
   <?php } }  ?>

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