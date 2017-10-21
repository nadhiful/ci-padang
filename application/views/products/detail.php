<?php
      $id           = $result->id;
      $nama         = $result->nama;
      $harga        = $result->harga;
      $stok         = $result->stok;
?>
    <!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="row">
                <div class="box-body">
                   <div class="col-md-12">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                </div>
                <div class="widget-user-image">
                  <img class="img-rectangle" src="<?php echo base_url('asset/dist/img/user1-128x128.jpg'); ?>" alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Nama</h5>
                        <span class="description-text"><?= $nama ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Harga</h5>
                        <span class="description-text"><?= $harga ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Stok</h5>
                        <span class="description-text"><?= $stok ?></span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
                    </div><!-- /.box-body -->
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
    
