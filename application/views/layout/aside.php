<aside class="main-sidebar">
      <?php if($this->session->userdata('username')): ?>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('username'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <?php 
                $data = array(
                                  'i'     => 'fa fa-dashboard',
                                  'span'  =>  'label label-primary pull-right'
                             );
                echo anchor('Admin_Act', 'Dashboard', $data);
            ?>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-files-o"></i>
                <span>Data Produk</span>
                <span class="label label-primary pull-right"></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
              <?php 
                $text_url = '<i class="fa fa-circle-o"></i>';
                $text_url = 'Produk Jadi';
              ?>
              <?=anchor('Admin_Act/view_product', $text_url); ?>
                </li>
                <li>
               <?php 
                $text_url = ' <i class="fa fa-circle-o"></i>';
                $text_url = ' Kategori Produk';
              ?>
              <?=anchor('Admin_Act/list_kategori', $text_url); ?>
                </li>
              </ul>
            </li>
            <li>
              <a href="">
                <i class="fa fa-th"></i> 
                <span>Data Bahan Baku</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                <?php 
                    $text_url = '<i class="fa fa-circle-o"></i>';
                    $text_url = 'Data Pemakaian';
                ?>
                <?=anchor('Admin_Act/view_use', $text_url); ?>
                </li>
                <li>
                <?php 
                    $text_url = '<i class="fa fa-circle-o"></i>';
                    $text_url = 'Data Pembelian';
                ?>
                <?=anchor('Admin_Act/view_raw', $text_url); ?>
                </li>
              </ul>
            </li>
            <li>
              <a href="">
                <i class="fa fa-th"></i> 
                <span>Data Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                <?php 
                    $text_url = '<i class="fa fa-envelope-o"></i>';
                    $text_url = 'Data Invoice';
                ?>
                <?=anchor('Admin_Act/show_invoice', $text_url); ?>
                </li>
                <li>
                <?php 
                    $text_url = '<i class="fa fa-circle-o"></i>';
                    $text_url = 'Data Order';
                ?>
                <?=anchor('Admin_Act/show_pesanan', $text_url); ?>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-edit"></i> <span>Data User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                <?php 
                    $text_url = '<i class="fa fa-envelope-o"></i>';
                    $text_url = 'Data User Admin';
                ?>
                <?=anchor('Admin_Act/view_user_admin', $text_url); ?>
                </li>
                <li>
                <?php 
                    $text_url = '<i class="fa fa-circle-o"></i>';
                    $text_url = 'Data Order';
                ?>
                <?=anchor('Admin_Act/show_user_customer', $text_url); ?>
                </li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      <?php endif; ?>
      </aside>
