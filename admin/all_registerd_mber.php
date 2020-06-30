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
      <?php include_once('left_asid.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          All Registered Member List            
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="obycs_vsa">Registered Member</a></li>
            <li class="active">View All Registered Member List </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">				  

                       <div class="col-sm-3 pull-right">
                     <a class="btn" style="padding: 0px 12px;background:#dddddd;color: #080808;" href="exclAllShareMoney"><i style="font-weight: 400;    font-size: 16px;" class="fa fa-file-excel-o"></i>&nbsp;&nbsp;<b>Excel ?</b></a>

                      &nbsp;&nbsp;<a class="btn" style="padding:  0px 1px;background:#dddddd;color: #080808; " href="printAllShareLdgrList" target="_blank"><i style="font-weight: 400;    font-size: 16px;" class="fa fa-print"></i>&nbsp;&nbsp;<b>Print-Out?</b></a>                     
                   </div>

                    <thead>
                      <tr>
                        <th>#row</th>
                        <th>Name</th>
                        <th>Sl. No.</th>
                        <th>User Level</th>
                        <th>Parent ID</th>                       
                        <th>Mother`s Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
						<th>Adhar</th>
                        <th>Donation</th>
						<th>Action</th>                                                             					
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($object->findAllrMembers() as $rc => $rMbrDta) {  ?>					
                      <tr>

                        <td><?= ($rc+1);?></td>
                        <td><a href="view_detials_parent_mbr?rmID=<?= base64_encode($rMbrDta['sl_no']); ?>" style="color: #000;" >
                        	<?= $rMbrDta['name'];?></a></td>
                        <td><?= $rMbrDta['sl_no'];?></td>
                        <td><?= $rMbrDta['user_level'];?></td>
                        <td><?= $rMbrDta['child_of'];?></td>
                        <td><?= $rMbrDta['mother_name'];?></td>
                        <td><?= $rMbrDta['mobile_number'];?></td>
                        <td><?= $rMbrDta['email_id'];?></td>
                        <td><?= $rMbrDta['adhar_card_number'];?></td>
                        <td><?= $rMbrDta['donation_amount'];?></td>
                        <td><a href="view_detials_parent_mbr?rmID=<?= base64_encode($rMbrDta['access_id']); ?>" ><img src="dist/img/view.png" width="20" height="20" title="Viw all Data" ></a><a href="update_root_mbr?rmID=<?= base64_encode($rMbrDta['access_id']); ?>" ><img src="dist/img/pencil.png" width="20" height="20" title="Edit" ></a><a href="#" title="Delete" class="delete" onClick="return false" ><img src="dist/img/remove-icon.png" id="<?= $row['id']; ?>" height="20" width="20"></a></td>
										
                      </tr>
                      <?php } ?>

					  
                    </tbody>
                    <tfoot>
                       <tr>
                        <th>#row</th>
                        <th>Name</th>
                        <th>Sl. No.</th>
                        <th>User Level</th>
                        <th>Parent ID</th>
                        <th>Mother`s Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Adhar</th>
                        <th>Donation</th>
                        <th>Action</th>                                                                       
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
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
