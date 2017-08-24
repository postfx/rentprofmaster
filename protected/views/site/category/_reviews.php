<section class="boxpad txt">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php echo $c->descr;?>
			</div>
			<div class="col-sm-4">
				<?php foreach ($c->reviews as $r):?>
				<div class="quest_block">
					<div class="row">
						<?php if (!empty($r->img)):?>
						<div class="col-sm-5">
						<img src="/uploads/reviews/<?php echo $r->img;?>" alt="image description" title="">
						</div>
						<?php endif; ?>

						<div class="col-sm-7">
							<div class="boxheadrev">
								<div class="title_block"><?php echo $r->name;?></div>
								<span><?php echo $r->company;?></span>
							</div>
						</div>
					</div>
					<p>“ <?php echo $r->text;?> ”</p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>