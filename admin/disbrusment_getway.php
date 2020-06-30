<?php include_once('main.class.php'); ?>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
       <?php include_once('header.php'); ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include_once('left_asid.php');
      if(isset($_GET['disRotmID']))
      {
        $msg=$object->disbrussmentTheAmountOfRootMbr(base64_decode($_GET['disRotmID']));

      }
      if(isset($_GET['disParmbrAID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrA(base64_decode($_GET['disParmbrAID']));

      }
      if(isset($_GET['disParmbrBID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrB(base64_decode($_GET['disParmbrBID']));

      }
      if(isset($_GET['disParmbrCID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrC(base64_decode($_GET['disParmbrCID']));

      }
      if(isset($_GET['disParmbrDID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrD(base64_decode($_GET['disParmbrDID']));

      }
      if(isset($_GET['disParmbrEID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrE(base64_decode($_GET['disParmbrEID']));

      }
      if(isset($_GET['disParmbrFID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrF(base64_decode($_GET['disParmbrFID']));

      }
      if(isset($_GET['disParmbrGID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrG(base64_decode($_GET['disParmbrGID']));

      }
      if(isset($_GET['disParmbrHID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrH(base64_decode($_GET['disParmbrHID']));

      }
      if(isset($_GET['disParmbrIID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrI(base64_decode($_GET['disParmbrIID']));

      }
      if(isset($_GET['disParmbrJID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrJ(base64_decode($_GET['disParmbrJID']));

      }
      if(isset($_GET['disParmbrKID']))
      {
        $msg=$object->disbrussmentTheAmountOfPareneMbrK(base64_decode($_GET['disParmbrKID']));

      }

      $decodRmId=base64_decode($_GET['rmID']); 
      $specMbrdDtls=$object->singelRootMbrDtls($decodRmId);
      $disbrusment=$object->disbrusmentDonationToHirrkey($decodRmId);
      $hirirChe=$specMbrdDtls['sl_no'];
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <?php if(isset($_GET['msg'])&&($_GET['msg']=='sucess')) 
          {
          ?>
          <h1 style="color: green" >          
          Disbrusment Sucessfully executed from " <?= $specMbrdDtls['name'];?> "
          </h1>
        <?php } else { ?>
          <h1>          
         Disbrus  Of - Name-  <?= $specMbrdDtls['name'];?> ---- 
          </h1>
        <?php } if(isset($_GET['msg'])&&($_GET['msg']=='fail'))  {?>
        <h1 style="color: red" >          
          Disbrusment Data Of " <?= $specMbrdDtls['name'];?> " Alredy Exsist
          </h1>
        <?php }?>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="obycs_vsa">Disbrus Donation to Members</a></li>
            <li class="active"> List of All Donations</li>
          </ol>
        </section>

        <?php

    if(filter_var($hirirChe, FILTER_VALIDATE_INT))
    {
    
      ?>
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Transfer From</th>
                        <th>Sender ID</th>
                        <th>Name</th>
                        <th>Account</th>
                        <th>IFSC</th>
                        <th>Amount</th>
                        <th>Disbruss</th>                                                                     
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($object->disbrusmentDonationToHirrkey($decodRmId) as $rc => $rMbrDisbrusData) {                        
                        $singelRootMbrDtls=$object->singelRootMbrDtls($decodRmId); 
                      ?>          
                      <tr>
                       <td><?= $singelRootMbrDtls['name'];?></td>
                       <td><?= $singelRootMbrDtls['access_id'];?></td>                      
                       <td><?= $rMbrDisbrusData['name'];?></td>
                       <td><?= $rMbrDisbrusData['amounfficeAccountNumber'];?></td>  
                       <td><?= $rMbrDisbrusData['ifsc'];?></td>                        
                       <td><?= $rMbrDisbrusData['amount'];?></td>
                       <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' AND `acess_id`='$acess_id' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                       <td><a href="?disRotmID=<?= base64_encode($decodRmId); ?>" ><img src="dist/img/view.png" width="20" height="20" title="Disbrus The amount" ></a></td>
                     <?php } else { ?>
                      <td style="color:green">Amount Alredy Disbrus</td>
                     <?php } ?>
                    
                      </tr>
                      <?php } ?>

            
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

    <?php
    }
    else
    {
    if(ctype_alnum($hirirChe))
    {     
      $aNSortr = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $hirirChe);
      $split1=$aNSortr[0];
      $split2=$aNSortr[1];
      $split3=$aNSortr[2];
      if($split2=='A')
      {       

      ?>

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
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
	                   <div class="box-footer">
                      <a href="?disParmbrAID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
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
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrBID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
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
                
                <?php 
                       $acess_id="office";;
                       $get_count=$object->db->query("select * from `disbursement` WHERE `transfered_from`='$decodRmId' ");
                          $rowCount=$get_count->rowCount();
                          if($rowCount==0)
                          {
                        ?>
                      <div class="col-md-12">
                     <div class="box-footer">
                      <a href="?disParmbrCID=<?= base64_encode($decodRmId); ?>" style="color: black;" >
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

   <?php
     }
    }

    }
   ?>  

        
      </div><!-- /.content-wrapper -->
      <?php include_once('footer.php');?>
      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      $(document).on('click','.delete',function(){
      var chk= confirm ("Are you sure for deleting ?");
      if(chk)
      {
      var shareId = $(this).children('img').attr('id');
      var id=$(this).attr("href").split("#");
      var row=$(this).parent().parent();
        $.ajax({

        url:'all_delete',       

        data:{shareId:shareId},

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
