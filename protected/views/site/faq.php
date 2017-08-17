<?php
	$this->pageTitle = Yii::app()->name;
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<li><a href="/faq">Вопросы и ответы</a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>

<div class="container">

			<div class="title"><h1>Ответы на вопросы</h1></div>

</div>










<section class="bggray">



<section class="faqbox questions other">
	<div class="container">

		<?php $i = 0; foreach ($faq as $f):?>

		<?php if ($i == 0 || $i % 3 == 0):?>
		<div class="flex flex-stretch">
		<?php endif; ?>
			
			<div class="flex3">
				<div class="quest_block">
					<div class="title_block"><?php echo $f->question;?></div>
					<?php echo $f->answer;?>
				</div>
			</div><!-- /flex3 -->
			
		<?php if ($i == 2 || $i % 3 == 2):?>
		</div>
		<?php endif; ?>

		<?php $i++; endforeach; ?>
		
	</div>

</section>


	<?php echo $this->renderPartial('/site/_orderform'); ?>

</section><!-- /bggray -->
	<section class="address">
		<div class="address_inner">
			<div class="container">
				<h2><img src="assets/img/add.png" alt="img">Адреса офисов и складов</h2>
				<div class="row">
					<?php foreach ($addresses as $a):?>
					<div class="col-sm-3">
						<div class="address_fone">
							<h3><?php echo $a->type;?> <br><span><?php echo $a->city;?></span></h3>
							<a class="address_tel" href="tel: <?php echo $a->phone;?>"><img src="/assets/img/add_phone.png" alt="img"><?php echo $a->phone;?></a>
							<p><?php echo $a->addr;?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>