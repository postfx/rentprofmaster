<?php
	$this->pageTitle = Yii::app()->name;

	$cat = Category::model()->findByPk($c->category_id);
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<li><a href="/category/<?php echo $cat->id;?>"><?php echo $cat->title;?></a></li>
				<div class="sprt"></div>
				<li><a href="/catalog/<?php echo $c->id;?>"><?php echo $c->title;?></a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>



<section class="product_title">
<div class="container">
	<div class="row">
	<h1><?php echo $c->title;?></h1>
	</div>
</div>
</div>

</section>

<section class="bgnimf">
	

<div class="container boxcol">
	<div class="row">

					<div class="col-sm-6">
							<div class="imgcol"><img src="/uploads/catalog/<?php echo $c->img;?>" alt="" title="" /></div>
					</div>

					<div class="col-sm-6 bgf8">
						<?php echo $c->anounce;?>
					</div>

		</div>
	</div>





<div class="container boxproductinfo">
<div class="row">
<div class="col-sm-4 aside">


	<?php echo $c->descr;?>


				<?php foreach ($c->reviews as $r):?>	
				<div class="quest_block">
						<div class="row">
							<?php if (!empty($r->img)):?>
							<div class="col-sm-4">
							<img src="/uploads/reviews/<?php echo $r->img;?>" alt="" title="">
							</div>
							<?php endif; ?>
							<div class="col-sm-8">
							<div class="boxheadrev">
							<div class="title_block"><?php echo $r->name;?></div>
							<span><?php echo $r->company;?></span>
							</div>
							</div>
						</div>
					<p>“ <?php echo $r->text;?> ”</p>
				</div>
				<?php endforeach; ?>



<div class="boxaction">
<h3>Скидки и особые условия</h3>
<p>При аренде на длительный срок или при заказе большого обьема</p>
</div>

</div>

<div class="col-sm-8 contentbox">
	<?php echo $c->data1;?>

</div>



</div>


</div>
</div>

	<?php echo $this->renderPartial('/site/_orderform_catalog'); ?>
		

</section>


<section class="steps">
<div class="container">
<h1>Стадии совершения заказа</h1>
<div class="stepsbgbox"></div>
</div>
</section>














<section class="bggray">

	<div class="container">
		<div class="row">


		<?php echo $c->data2;?>


<div class="boxtwodel">


<div class="col-sm-6  lftdel">
<h3>Доставка</h3>
<p>По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден.</p>
<h4>Вид транспорта для доставки:</h4>
<ul>
<li><span>Газель тент</span></li>
<li><span>Камаз с манипулятором</span></li>
<li><span>Шаланда бортовая</span></li>
<li><span>Фура с тентом</span></li>
</ul>
</div>

<div class="col-sm-6 rghtdel">

				<ul class="tabs-list"> 
					<li class="tabs-list__item tabs-list__item_active"><button type="button" data-content="content1">Москва</button></li> 
					<li class="tabs-list__item"><button type="button" data-content="content2">Санкт Петербург</button></li>
				</ul> 
				<div class="tabs__content tabs__content_active" id="content1">
					<div class="calc__select">
						<select name="delivery" id="delivery">
							<option value="1">Выбор способа доставки</option>
							<option value="1">1</option>
							<option value="1">2</option>
						</select>
					</div>
					<div class="calc__select">
						<select name="city" id="city">
							<option value="1">Населеный пункт доставки</option>
							<option value="1">1</option>
							<option value="1">2</option>
						</select>
					</div>


					<p class="bluetxt">Доставка Камаз до Тихвин</p>
					<p class="pricedel">20 250 <span>рублей</span></p>
				</div>
				<div class="tabs__content" id="content2">
					
					<div class="calc__select">
						<select name="delivery" id="delivery">
							<option value="1">Выбор способа доставки</option>
							<option value="1">1</option>
							<option value="1">2</option>
						</select>
					</div>
					<div class="calc__select">
						<select name="city" id="city">
							<option value="1">Населеный пункт доставки</option>
							<option value="1">1</option>
							<option value="1">2</option>
						</select>
					</div>

					<p class="bluetxt">Доставка Камаз до Тихвин</p>
					<p class="pricedel">30 750 <span>рублей</span></p>
				</div>
</div>

</div>

<div class="boxtwodel">


<div class="col-sm-6  lftdel">
<h3 class="pay">Оплата</h3>
<p>По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден.</p>

</div>

<div class="col-sm-6 rghtdel">

<a class="linkpay" id="paycardic" href="#">Оплата на карту</a>
<a class="linkpay" id="payrubic" href="#">Наличный расчет</a>
<a class="linkpay" id="paybankic" href="#">Безналичный расчет (с НДС)</a>
</div>

</div>





</div>





	</div>
		</div>

</section>



<!--<section class="bgnimf">

	<div class="container">
		<div class="row">
			<div class="titleslidbox"><h2>Дополнительная комплектация</h2></div>


<div class="col-sm-4 boxdopcompl">
<a href="#"></a>
</div>
<div class="col-sm-4 boxdopcompl">
<a href="#"></a>
</div>
<div class="col-sm-4 boxdopcompl">
<a href="#"></a>
</div>

<div class="col-sm-4 boxdopcompl">
<a href="#"></a>
</div>
<div class="col-sm-4 boxdopcompl">
<a href="#"></a>
</div>
<div class="col-sm-4 boxdopcompl">
<a href="#"></a>
</div>



			</div>
			</div>
</section>-->





<!--<section class="bitboxtwo sliderbox">

	<div class="container">
		<div class="row">
			<div class="titleslidbox"><h2>Другие типы бытовок</h2></div>

				<div class="col-sm-6">

					<div class="boxq">
							<div class="imgboxq"><a href="#"><img src="assets/img/work_3.png" alt="" title="" /></a></div>
							<p><a href="#">Бытовки в поселке Фрезино</a></p>
					</div>
						
				</div>



				<div class="col-sm-6">

					<div class="boxq">
							<div class="imgboxq"><a href="#"><img src="assets/img/work_4.png" alt="" title="" /></a></div>
							<p><a href="#">Контейнеры на стройке Газпрома</a></p>
					</div>

				</div>



		</div>
	</div>

</section>-->













<section class="faqpage">

<div class="container">
			<div class="titlesect"><h2>Ответы на распространенные вопросы</h2></div>
</div>


<div class="container">

		<?php $i = 0; foreach ($c->faqs as $f):?>
		<?php if ($i == 0 || $i % 3 == 0):?>
		<div class="flex flex-stretch">
		<?php endif; ?>
			<div class="flex3"><div class="title_block"><?php echo $f->question;?></div>
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






<section class="bitboxtwo sliderbox">

	<div class="container">
		<div class="row">
			<div class="titleslidbox"><h2>Выполненные работы</h2></div>

				<div class="col-sm-6">

					<div class="boxq">
							<div class="imgboxq"><a href=""><img src="/assets/img/work_3.png" alt="" title="" /></a></div>
							<p><a href="#">Бытовки в поселке Фрезино</a></p>
					</div>
						
				</div>



				<div class="col-sm-6">

					<div class="boxq">
							<div class="imgboxq"><a href=""><img src="/assets/img/work_4.png" alt="" title="" /></a></div>
							<p><a href="#">Контейнеры на стройке Газпрома</a></p>
					</div>

				</div>



		</div>
	</div>

</section>


<section class="photogal">

<div class="container">

			<div class="titlesect"><h2>Фотогалерея</h2></div>

<div class="done_inner">
			<div class="container">

				<div class="row">


					<?php foreach ($c->images as $i):?>
					<div class="col-sm-4 ">
						<div class="block_inner">
							<img src="<?php echo $i->getUrlThumb();?>" alt="img">
						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>


</div>


</section>



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