		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
              <?= anchor('Admin_Act/view_add_kategori/', 'Tambah Kategori Baru', ['class'=>'btn btn-success'],['i class'=>'fa fa-align-left']); ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($list as $produk) : ?>
						<tr>
              <td><?= $produk->id?></td>
							<td><?= $produk->nama?></td>
              <td><?= anchor('Admin_Act/view_edit_kategori/'.$produk->id, 'Edit', ['class'=>'btn btn-info'],['i class'=>'fa fa-align-left']); ?>
								<?= anchor('Admin_Act/hapus_kategori/'.$produk->id, 'Delete', ['class'=>'btn btn-danger'],['i class'=>'fa fa-align-right']); ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>
                        <th>Nama Makanan</th>
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
      