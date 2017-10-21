<section id="cart_items">
	<div class="container">
		s<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td>#</td>
						<td class="description">Gambar</td>
						<td class="quantity">Jumlah</td>
						<td class="description">Nama</td>
						<td class="price">Harga</td>
						<td class="total">Total</td>
					</tr>
				</thead>
				<tbody>
				
<?php 
$i = 1; 
$a = 1;
?>

<?php foreach ($this->cart->contents() as $items): ?>
<?php echo form_open(site_url('Customer_Act/update_cart')); ?>
<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
  <tr>
  <td><?=$a++; ?>
  <td><?=img([
				'src' 		=>'uploads/'.$items['image'],
				'style'		=>'width: 100px; height: 100px'
				])?></td>
  </td>
    <td>
    <?php echo form_submit('kurang','-','class="cart_quantity_down"');?>
    <?php echo form_input(array( 
     'name' => $i.'[qty]', 
     'value' => $items['qty'], 
     'maxlength' => '3', 
     'size' => '5',
     'disabled')); ?>
     <?php echo form_submit('tambah','+','class="cart_quantity_up"');?>
     </td>
    <td>
    <?php echo $items['name']; ?>

      <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

        <p>
          <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

          <?php endforeach; ?>
        </p>

      <?php endif; ?>

    </td>
    <td>Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
    <td>Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
    <td></td>
  </tr>

<?php $i++; ?>

<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<!-- <li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li> -->
							<li>Total <span>Rp.<?=number_format($this->cart->total()) ?></span></li>
						</ul>
						<?= anchor('En', 'Continue Shopping', ['class'=>'btn btn-default update']); ?>
						<?= anchor('Customer_Act/process_order', 'Check Out', ['class'=>'btn btn-default check_out']); ?>
						<?= anchor('Customer_Act/clear_cart', 'Clear Cart', ['class'=>'btn btn-default check_out']); ?>
					</div>
				</div>
			</div>
		</div>
		</section><!--/#do_action-->