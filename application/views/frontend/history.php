<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">History Shopping</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
	<?php echo $this->session->flashdata('sukses'); ?>
	<?php echo $this->session->flashdata('gagal'); ?>
		<?php if ($history != FALSE) : ?>
			<table id="example1" class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td>Invoice ID</td>
						<td>Date</td>
						<td>Deadline Payment</td>
						<td>Total</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<?php  
					foreach($history as $items ): 		
					?>
					<tr>
						<td><?= $items->id ?></td>
						<td><?= $items->tanggal ?></td>
						<td><?= $items->due_tanggal ?></td>
						<td><?= $items->total?></td>
						<td>
						<?= $items->status;?>
						<?=anchor ('Customer_Act/show_payment/'.$items->id,'Confirm Payment',array('class'=>'btn btn-danger')); ?>
					</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>Your history is null Go back <?=anchor('Customer_Act', 'here'); ?></p>
		<?php endif; ?>
		</div>
	</div>
	</section> <!--/#cart_items-->
	<!--/#do_action-->