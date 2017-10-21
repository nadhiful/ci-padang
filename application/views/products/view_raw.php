		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
              <?= anchor('Admin_Act/add_raw/', 'Tambah Data Pembelian', ['class'=>'btn btn-success'],['i class'=>'fa fa-align-left']); ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($barang as $produk) : ?>
						<tr>
							<td><?= $produk->nama_bahan?></td>
							<td><?= $produk->jumlah?></td>
              <td><?= $produk->satuan?></td>
							<td><?= anchor('Admin_Act/edit_raw/'.$produk->id_bahan, 'Edit', ['class'=>'btn btn-info'],['i class'=>'fa fa-align-left']); ?>
								<?= anchor('Admin_Act/delete_raw/'.$produk->id_bahan, 'Delete', ['class'=>'btn btn-danger'],['i class'=>'fa fa-align-right']); ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>
                        <th>Nama Bahan</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
    