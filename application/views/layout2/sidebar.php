	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<?php foreach ($list as $key ): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><?= anchor('En/l/'.$key->id, $key->nama); ?></h4>
								</div>
							</div>
						<?php endforeach ?>
						</div><!--/category-products-->										
					</div>
				</div>