    <!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <br>
          <br>
          <br> 
                <div class="box-body">
                <?=form_open_multipart('Admin_Act/save_add',['class'=>'form-horizontal'] ); ?>
                   <div>
                      <?=validation_errors() ?>
                  </div>
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-7">
                       <input type="text" required="" name="nama" class="form-control" placeholder="Nama" value="<?php set_value('nama'); ?>">
                      </div>
                    </div>
                   
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-7">
                       <input type="text" required="" name="harga" class="form-control" placeholder="Harga" value="<?php set_value('harga'); ?>">
                      </div>
                    </div>
                   
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-7">
                       <input type="text"  required="" name="stok" class="form-control" placeholder="Stok" value="<?php set_value('stok'); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-7">
                       <select class="form-control" name="kategori">
                            <option selected="">-</option>
                            <?php foreach ($list as $key):?>
                              <option value="<?=$key->id?>"><?=$key->nama?></option>
                            <?php endforeach ?>
                       </select>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-7">
                       <input type="file" name="userfile" class="form-control" placeholder="Gambar" required="">
                      </div>
                    </div>
                   
                    </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Batal</button>
                    <button type="submit" class="btn btn-info">Tambah</button>
                  </div><!-- /.box-footer -->
                  <?php form_close(); ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
    
