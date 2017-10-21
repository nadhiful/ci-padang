<section id="form-horizontal"><!--form-->
<div class="container">
	
	<div class="row">
		<h3>Input Pembayaran</h3>
			<div class="col-sm-9"><!--login form-->
			<?=form_open('Customer_Act/show_payment',['class'=>'form-horizontal'] ); ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Invoice ID</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" name="invoice_id" value="<?=($invoice_id != 0?$invoice_id:'') ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Total Pembayaran</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inputPassword3" name="amount">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			<?= form_close(); ?>
			</div><!--/login form-->
		</div>
	</div>
</div>
</section><!--/form-->