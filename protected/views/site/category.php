<?php
	$this->pageTitle = Yii::app()->name;

	$childs = Category::model()->findAllByAttributes(array(
		'parent_id' => $c->id,
	));
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<?php if ($c->parent_id > 0):?>
				<li><a href="/category/<?php echo $c->parent_id;?>"><?php echo $c->parent->title;?></a></li>
				<div class="sprt"></div>
				<?php endif; ?>
				<li><a href="/category/<?php echo $c->id;?>"><?php echo $c->title;?></a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>



<section class="arend_b">

<div class="container">
	<div class="row">


			<div class="col-sm-6">
				<div class="boximg_a_b"><img src="/uploads/categories/<?php echo $c->img;?>" alt="" title="" /></div>
			</div>

			<div class="col-sm-6">
				<div class="boxtxt_a_b">
				<h2><?php echo $c->title;?></h2>
				<a href="#"  class="morelnk">Узнайте больше</a>
				</div>
			</div>


	</div>
</div>


</section>

<section class="aboutbox">
	<div class="container">
		<div class="row">
			<?php echo $c->anounce;?>
		</div>
	</div>
</section>


<?php if (!empty($childs) && count($childs)):?>
<section class="bitboxtwo">

	<div class="container">
		<div class="row">

				<?php foreach ($childs as $ch):?>
				<a href="/category/<?php echo $ch->id;?>">
				<div class="col-sm-6 bgforest">
					<div class="txtboxq">
						<h2><?php echo $ch->title;?></h2>
						<!--<p>Приступая к выбору бытовки, необходимо учитывать климатические условия района, где она будет использоваться, ее назначение, вместимость</p>-->
					</div>

					<div class="boxq">
							<div class="imgboxq"><img src="/uploads/categories/<?php echo $ch->img;?>" alt="" title="" /></div>
					</div>

					<!--<div class="lnkbox">
						<div class="priceq col-sm-6">
						от <b>4500</b> руб/мес
						</div>
						<a class="lnkq col-sm-6" href="#">Заказать</a>
					</div>-->

				</div>
				</a>
				<?php endforeach; ?>

		</div>
	</div>

</section>
<?php endif; ?>





<section class="bitboxtwo biruz">

	<div class="container">
		<div class="row">

				<?php foreach ($catalog as $ca):?>
				<a href="/catalog/<?php echo $ca->id;?>">
				<div class="col-sm-6 bgforest">
					<div class="txtboxq">
						<h2><?php echo $ca->title;?></h2>
						<!--<p>Приступая к выбору бытовки, необходимо учитывать климатические условия района, где она будет использоваться, ее назначение, вместимость</p>-->
					</div>

					<div class="boxq">
							<div class="imgboxq"><img src="/uploads/catalog/<?php echo $ca->img;?>" alt="" title="" /></div>
					</div>

				</div>
				</a>
				<?php endforeach; ?>

		</div>
	</div>

</section>




<section class="bgnimf">
	<?php echo $c->data1; ?>
</section>


	<?php if ($c->calc_type == 1):?>
	
		<?php echo $this->renderPartial('/site/category/_calculator1'); ?>

		<section class="steps">
			<div class="container">
				<h1>Стадии совершения заказа</h1>
				<div class="stepsbgbox"></div>
			</div>
		</section>


		<?php echo $this->renderPartial('/site/category/_reviews', array('c'=>$c)); ?>

	<?php elseif ($c->calc_type == 2):?>

		<?php echo $this->renderPartial('/site/category/_calculator2'); ?>

		<?php echo $this->renderPartial('/site/category/_reviews', array('c'=>$c)); ?>


		<section class="steps">
			<div class="container">
				<h1>Стадии совершения заказа</h1>
				<div class="stepsbgbox"></div>
			</div>
		</section>


	<?php elseif ($c->calc_type == 3):?>


		<?php echo $this->renderPartial('/site/category/_reviews', array('c'=>$c)); ?>

		<?php echo $this->renderPartial('/site/category/_calculator3'); ?>


		<section class="steps">
			<div class="container">
				<h1>Стадии совершения заказа</h1>
				<div class="stepsbgbox"></div>
			</div>
		</section>

	<?php endif; ?>



<section class="photogal">
	<div class="container">
		<div class="titlesect"><h2>Фотогалерея</h2></div>
		<div class="gallerybox row-flex">
			<div class="col-sm-5">
				<?php if (!empty($c->images[0])):?>

				<?php $im = $c->images[0]; ?>

				<a href="<?php echo $im->getUrlOriginal();?>">
					<img src="<?php echo $im->getUrlOriginal();?>" alt="">
				</a>
				<?php endif; ?>
			</div>
			<div class="col-sm-7 gallerybox-contain">
				<?php for ($i = 1; $i < count($c->images); $i++) { ?>

				<?php $k=$i-1; $im = $c->images[$i]; ?>

				<?php if ($k == 0 || $k % 3 == 0):?>
				<div class="gallerybox row">
				<?php endif; ?>
					<div class="col-sm-4">
						<div class="img-box">
							<a href="<?php echo $im->getUrlOriginal();?>">
								<img src="<?php echo $im->getUrlThumb();?>" alt="">
							</a>
						</div>
					</div>
				<?php if ($k == 2 || $k % 3 == 2):?>
				</div>
				<?php endif; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</section>


<section class="faqpage">
	<div class="container">
		<div class="titlesect"><h2>Ответы на распространенные вопросы</h2></div>
	</div>
	<div class="container">
		<?php $i = 0; foreach ($c->faqs as $f):?>
		<?php if ($i == 0 || $i % 3 == 0):?>
		<div class="flex flex-stretch">
		<?php endif; ?>
			<div class="flex3">
				<div class="title_block"><?php echo $f->question;?></div>
				<div class="linefbg"></div>
				<div class="quest_block">
					<?php echo $f->answer;?>
				</div>
			</div><!-- /flex3 -->
		<?php if ($i == 2 || $i % 3 == 2):?>
		</div>
		<?php endif; ?>
		<?php $i++; endforeach; ?>
	</div>
</section>


<section class="bggray">

	<?php echo $this->renderPartial('/site/_orderform_catalog'); ?>


</section><!-- /bggray -->
	<section class="address">
		<div class="address_inner">
			<div class="container">
				<h2><img src="/assets/img/add.png" alt="img">Адреса офисов и складов</h2>
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

	<link rel="stylesheet" href="/css/main.min.css">