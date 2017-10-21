		<!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                <!-- tambahan -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Invoice</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Pelanggan</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach ($result as $produk) : ?>
						<tr>
							<td><?= $produk->id?></td>
							<td><?= $produk->barang?></td>
							<td><?= $produk->jumlah?></td>
              <td><?= $produk->pelanggan?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
                      <tr>                        
                        <th>ID Invoice</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Pelanggan</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      
    