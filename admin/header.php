<?php 
include_once("main.class.php");
ob_start();
session_start();
if(!isset($_SESSION['user_id']))
{
?>
<script type="text/javascript">
window.location='index';
</script>
<?php } ?>
<header class="main-header">

        <!-- Logo -->
        <a href="dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Fam</b>ily</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Our<b>Fa</b>mily</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/boy.png" class="user-image" alt="">

                  <span class="hidden-xs">Name</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/boy.png" class="img-circle" alt="">
                    
                    <p>
                      Name - Name   
                      <small>Member since - Date</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">SN.-9999</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Mobile-</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">99999999</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="update_member?memberId=<?= base64_encode($_SESSION['sl_no'])?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>