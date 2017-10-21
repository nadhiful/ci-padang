		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
              <?= anchor('Admin_Act/view_add/', 'Tambah Produk', ['class'=>'btn btn-success'],['i class'=>'fa fa-align-left']); ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($barang as $produk) : ?>
						<tr>
							<td><?= $produk->nama?></td>
							<td><?= $produk->harga?></td>
							<td><?= $produk->stok?></td>
							<td>
                  <?php $product_image=['src' => 'uploads/'.$produk->gambar, 'width' => '100'];
                  echo img($product_image);
                  ?>
              </td>
							<td><?= anchor('Admin_Act/view_edit/'.$produk->id, 'Edit', ['class'=>'btn btn-info'],['i class'=>'fa fa-align-left']); ?>
								<?= anchor('Admin_Act/hapus/'.$produk->id, 'Delete', ['class'=>'btn btn-danger'],['i class'=>'fa fa-align-right']); ?>
                <?= anchor('Admin_Act/detail_product/'.$produk->id, 'Detail', ['class'=>'btn btn-warning'],['i class'=>'fa fa-align-right']); ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      
    