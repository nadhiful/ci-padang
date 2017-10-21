    <!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Invoice</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Maksimal Tanggal Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php foreach ($letter as $key) : ?>
            <tr>
              <td><?= $key->id?></td>
              <td><?= $key->tanggal?></td>
              <td><?= $key->due_tanggal?></td>
              <td><?= $key->status?></td>
              <td><?= anchor('Admin_Act/detail_invoice/'.$key->id, 'Detail', ['class'=>'btn btn-info'],['i class'=>'fa fa-align-left']); ?>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
                      <tr>
                        <th>ID Invoice</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Maksimal Tanggal Pembayaran</th>
                        <th>Status</th>
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