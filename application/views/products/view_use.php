		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
              <?= anchor('Admin_Act/add_use/', 'Tambah Data Pemakaian', ['class'=>'btn btn-success'],['i class'=>'fa fa-align-left']); ?>
              
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php echo $this->session->flashdata('success'); ?>
                <?php echo $this->session->flashdata('error'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($result as $produk) : ?>
						<tr>
              <td><?= $produk->id?></td>
							<td><?= $produk->nama?></td>
							<td><?= $produk->jumlah?></td>
              <td><?= $produk->tanggal_added?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>
                         <th>ID</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
    