<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#row</th>                        
                        <th>Office Account</th>
                        <th>Amount</th>                                                            					
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($object->findAllrMembers() as $rc => $rMbrDta) {  
                            $singelMbrDtls=$object->singelRootMbrDtls($rMbrDta['child_of']);
                        ?>					
                      <tr>
                        <td><?= $rMbrDta['amounfficeAccountNumber'];?></td>                        
                        <td><?= $rMbrDta['amount'];?></td>
										
                      </tr>
                      <?php } ?>

					  
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->