<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php foreach ($invoice as $items ): ?>
            Detail Invoice #<?=$items->id ?>
          </h1>
          <ol class="breadcrumb">
          </ol>
        </section>
<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> AdminLTE, Inc.
                <small class="pull-right">Date: <?php echo date('Y-m-d') ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin, Inc.</strong><br>
                Jalan Raya Soekarno Hatta Nomor 9<br>
                Malang,65144<br>
                Phone: 08815091852<br>
                Email: info@padangenak.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong>John Doe</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br>
                Email: john.doe@example.com
              </address>
            </div><!-- /.col -->
          <?php endforeach ?>
            <div class="col-sm-4 invoice-col">
              <b></b><br>
              <br>
              <b>Account:</b> 968-34567
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
              <?php
              $total = 0;
              foreach ($order as $key) :
              $subtotal = $key->harga * $key->jumlah;
              $total += $subtotal;
              ?>
              <tr>
                <td><?=$key->id ?></td>
                <td><?=$key->nama_barang ?></td>
                <td><?=$key->harga ?></td>
                <td><?=$key->jumlah ?></td>
                <td><?=$subtotal ?></td>
              </tr>
            </tbody>
            <?php endforeach; ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="<?php echo base_url('asset/dist/img/credit/visa.png'); ?>" alt="Visa">
              <img src="<?php echo base_url('asset/dist/img/credit/mastercard.png'); ?>" alt="Mastercard">
              <img src="<?php echo base_url('asset/dist/img/credit/american-express.png'); ?>" alt="American Express">
              <img src="<?php echo base_url('asset/dist/img/credit/paypal2.png'); ?>" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div><!-- /.col -->
            <?php foreach ($invoice as $key2): ?>
            <div class="col-xs-6">
            <?php endforeach ?>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Total:</th>
                    <td><?=$total ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <?= anchor('Customer_Act', 'Back Home', ['class'=>'btn btn-success pull-right'],['i'=>'fa fa-download']); ?>
            </div>
          </div>
        </section><!-- /.content -->
        