<?php
	$this->pageTitle = Yii::app()->name;
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<li><a href="/reviews">Отзывы</a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>

<div class="container">

			<div class="title"><h1>Отзывы о нас</h1></div>

</div>










<section class="bggray">



<section class="reviewbox questions other">
	<div class="container">

		<?php $i = 0; foreach ($reviews as $r):?>

		<?php if ($i == 0 || $i % 2 == 0):?>
		<div class="flex flex-stretch">
		<?php endif; ?>

			<div class="flex2">
				<div class="quest_block">
					<div class="col-sm-3">
					<?php if (!empty($r->img)):?>
					<img src="/uploads/reviews/<?php echo $r->img;?>" alt="" title="" />
					<?php endif; ?>
					</div>
					<div class="col-sm-9">

					<div class="boxheadrev">
					<div class="title_block"><?php echo $r->name;?></div>
					<span><?php echo $r->company;?></span>
					</div>
					<p>“<?php echo $r->text;?>”</p>
					</div>
				</div>
			</div><!-- /flex2 -->

		<?php if ($i == 1 || $i % 2 == 1):?>
		</div>
		<?php endif; ?>

		<?php $i++; endforeach; ?>

	</div>

</section>



</section><!-- /bggray -->
	<section class="address">
		<div class="address_inner">
			<div class="container">
				<span class="address-title"><img src="/assets/img/add.png" alt="img">Адреса офисов и складов</span>
				<div class="row">
					<?php foreach ($addresses as $a):?>
					<div class="col-sm-3">
						<div class="address_fone">
							<span class="premises"><?php echo $a->type;?> <br><span class="city"><?php echo $a->city;?></span></span>
							<a class="address_tel" href="tel: <?php echo $a->phone;?>"><img src="/assets/img/add_phone.png" alt="img"><?php echo $a->phone;?></a>
							<p><?php echo $a->addr;?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>