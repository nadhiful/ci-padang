<div class="features_items"><!--features_items-->
<h2 class="title text-center">Features Items</h2>
<div>
	
	<?php echo $this->session->flashdata('error')?>
	
</div> 
<?php foreach ($barang as $product ): ?>
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<?=img([
				'src' 		=>'uploads/'.$product->gambar,
				'style'		=>'width: 203px; height: 190px'
				])?>
				<h2>Rp.<?=$product->harga?></h2>
				<p><?=$product->nama?></p>
			</div>
			<div class="product-overlay">
				<div class="overlay-content">
					<h2>Rp.<?=$product->harga?></h2>
					<p><?=$product->nama?></p>
					<?=anchor('Customer_Act/add_cart/'.$product->id, 'Add to cart',[
						'class' 	=> 'btn btn-default add-to-cart'
					])?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php endforeach; ?>
<!--  -->
</div><!--features_items-->