		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
              <?= anchor('Admin_Act/add_user_admin/', 'Tambah Admin Baru', ['class'=>'btn btn-success'],['i class'=>'fa fa-align-left']); ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($list as $key) : ?>
						<tr>
							<td><?= $key->id?></td>
							<td><?= $key->username?></td>
							<td><?= anchor('Admin_Act/edit_user_admin/'.$key->id, 'Edit', ['class'=>'btn btn-info'],['i class'=>'fa fa-align-left']); ?>
								<?= anchor('Admin_Act/delete_user_admin/'.$key->id, 'Delete', ['class'=>'btn btn-danger'],['i class'=>'fa fa-align-right']); ?>
  						</td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>
                        <th>ID User</th>
                        <th>Nama</th>
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
      
      
    