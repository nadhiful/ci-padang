		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                <!--Menu tambahan-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($result as $produk) : ?>
						<tr>
							<td><?= $produk->id?></td>
							<td><?= $produk->nama?></td>
							<td><?= $produk->username?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      
    