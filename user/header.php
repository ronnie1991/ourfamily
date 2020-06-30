<?php 
error_reporting(0);
include_once("main.class.php");
ob_start();
session_start();
if(!isset($_SESSION['sl_no']))
{
?>
<script type="text/javascript">
window.location='index';
</script>
<?php }
$singelMbrDtls=$object->singelRegisteredParentUsersByAccessLevelId($_SESSION['sl_no']); 
$TreeSlNo=$singelMbrDtls['sl_no'];
if(ctype_alnum($TreeSlNo))
    {     
      $aNSortr = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $TreeSlNo);
      $split1=$aNSortr[0];
      $split2=$aNSortr[1];
      $split3=$aNSortr[2];
      if($split2=='K')
      {
        $treeLevel='K';   
      }
  }
 ?>
 <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="dashboard" class="brand-logo darken-1"><img src="" alt="OurFamily"></a> <span class="logo-text">OurFamily</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <li>    
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i class="mdi-action-search"></i></a>                              
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li>
                        <!-- Dropdown Trigger -->                        
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->