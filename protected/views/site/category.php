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

<!-- стр arenda-stroitelnyh-lesov Характеристики добавлен вес файлов(size) -->

<section class="bgnimf">
	<div class="container">
		<div class="row">
			<h3>Характеристики</h3>
			<div class="col-sm-6 ctlnkbox ctlnkbox-anothPadding">
				<a class="ctlnlinf_long" href="#">Каталог строительных лесов <span class="size">1,7 Мб</span></a> 
				<a class="ctlnlinf_long" href="#">Комплектация<span class="size">1,7 Мб</span></a> 
				<a class="ctlnlinf_long" href="#">Схемы<span class="size">1,7 Мб</span></a>
			</div>
			<div class="col-sm-6 ctlnkbox ctlnkbox-anothPadding">
				<a class="ctlnlinf_long" href="#">Цены на аренду лесов<span class="size">1,7 Мб</span></a> 
				<a class="ctlnlinf_long" href="#">Виды раскладок<span class="size">1,7 Мб</span></a> 
				<a class="ctlnlinf_long" href="#">Каталог<span class="size">1,7 Мб</span></a>
			</div>
		</div>
	</div>
</section>


	<?php if ($c->id == 1):?>
	<section class="calc">
		<div class="container">
			<div class="calc__left">
				<div class="calc__title">
					<img src="/img/calc-ico.png" alt="calc">
					<span>Калькулятор аренды <br>и доставки</span>
				</div>
				<div class="calc__select">
					<select name="type" id="type">
						<option value="1">Выберите тип бытовки</option>
						<option value="1">1</option>
						<option value="1">2</option>
					</select>
				</div>
				<div class="calc__range">
					<b>Количество</b>
					<div class="wrap-range">
						<input type="text" class="range">
					</div>
				</div>
				<div class="calc__range">
					<b>Срок аренды (мес)</b>
					<div class="wrap-range">
						<input type="text" class="range">
					</div>
				</div>
				<div class="calc__btn">
					<button>Добавить в расчет ></button>
				</div>
				<div class="calc__line mt100">
					<div class="calc__radio">
						<input type="radio" id="r1" class="radio" name="zalog" value="1"><label for="r1">С залогом</label>
					</div>
					<div class="calc__radio">
						<input type="radio" id="r2" class="radio" checked="" name="zalog" value="0"><label for="r2">Без залога</label>
					</div>
				</div>
				<div class="calc__line">
					<div class="calc__radio">
						<input type="radio" id="r3" class="radio" checked="" name="delivery" value="1"><label for="r3">С доставкой</label>
					</div>
					<div class="calc__radio">
						<input type="radio" id="r4" class="radio" name="delivery" value="0"><label for="r4">Без доставки</label>
					</div>
				</div>
				<ul class="tabs-list"> 
					<li class="tabs-list__item tabs-list__item_active"><button type="button" data-content="content1">Все новости</button></li> 
					<li class="tabs-list__item"><button type="button" data-content="content2">Новости проекта</button></li>
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
				</div>
			</div>
			<div class="calc__right">
				<div class="calc__title">Стоимость</div>
				<div class="calc__item">
					<div class="name">Бытовка для строителей</div>
					<div class="quanity">10 шт.</div>
					<div class="cost">25 000 руб.</div>
					<div class="remove"><button><img src="/img/remove.png" alt="ico"></button></div>
				</div>
				<div class="calc__item">
					<div class="name">Бытовка для прорабов</div>
					<div class="quanity">10 шт.</div>
					<div class="cost">25 000 руб.</div>
					<div class="remove"><button><img src="/img/remove.png" alt="ico"></button></div>
				</div>
				<div class="calc__item">
					<div class="name">Морской контейнер</div>
					<div class="quanity">10 шт.</div>
					<div class="cost">25 000 руб.</div>
					<div class="remove"><button><img src="/img/remove.png" alt="ico"></button></div>
				</div>
				<div class="calc__result">
					<p>Срок аренды: <span>6 месяцев (без залога)</span></p>
					<p>Доставка: <span> Шаланда, город Тихвин</span></p>
				</div>
				<div class="calc__cost">
					<div class="row">
						<div class="col-xs-6">
							<p>Стоимость аренды <br>(без доставки)</p>
							<b>20 250 <span>рублей</span></b>
						</div>
						<div class="col-xs-6">
							<p>Стоимость аренды <br>(без доставки)</p>
							<b>42 250 <span>рублей</span></b>
						</div>
					</div>
				</div>
				<div class="calc__buy">
					<button>Заказать</button>
				</div>
				<div class="calc__bonus bonus">
					<div class="bonus__text">
						<img src="/img/star.png" alt="ico">
						<span>Скидки <br>и особые <br>условия</span>
					</div>
					<div class="bonus__info">
						<p>При аренде на длительный <br>срок или при заказе <br>большого обьема</p>
						<p>Узнайте у специалиста <a href="mailto:info@pgm.ru">info@pgm.ru</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="steps">
		<div class="container">
			<h1>Стадии совершения заказа</h1>
			<div class="stepsbgbox"></div>
		</div>
	</section>



	<section class="boxpad">
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

				<?php echo StaticBlock::get('phone_block');?>

					</div>
				</div>
			</div>

	</section>


	<?php elseif ($c->id == 2):?>



	<section class="boxpad">
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

				<div class="bgphonead">
<p>Есть вопросы по аренде?</p>
<h4>Звоните</h4>
<div class="phone_ic">8 (495) 640-59-79</div>
<a class="lnkgreen" href="#">Отправить заявку</a>
</div>

					</div>
				</div>
			</div>

	</section>


	<section class="calc">
		<div class="container">
			<div class="calc__left">
				<div class="calc__title">
					<img src="/img/calc-ico.png" alt="calc">
					<span>Калькулятор аренды <br>и доставки</span>
				</div>
				<div class="calc__range">
					<b class="sm">Высота, м</b>
					<div class="wrap-range">
						<input type="text" class="range">
					</div>
				</div>
				<div class="calc__range">
					<b class="sm">Длина, м</b>
					<div class="wrap-range">
						<input type="text" class="range">
					</div>
				</div>

				<div class="calc__range">
					<b class="sm wdt">Кол-во лестничных подьемов</b>
					<div class="wrap-smlinp">
						<input type="text" class="smlinp" placeholder="0"> 
					</div>
				</div>

			<div class="calc__range">
					<b class="sm wdt">Кол-во ярусов с настилами</b>
					<div class="wrap-smlinp">
						<input type="text" class="smlinp"  placeholder="0">
					</div>
				</div>


				<div class="calc__line">
					<div class="calc__radio">
						<input type="radio" id="r1" class="radio" name="zalog" value="1"><label for="r1">С залогом</label>
					</div>
					<div class="calc__radio">
						<input type="radio" id="r2" class="radio" checked="" name="zalog" value="0"><label for="r2">Без залога</label>
					</div>
				</div>
				<div class="calc__line">
					<div class="calc__radio">
						<input type="radio" id="r3" class="radio" checked="" name="delivery" value="1"><label for="r3">С доставкой</label>
					</div>
					<div class="calc__radio">
						<input type="radio" id="r4" class="radio" name="delivery" value="0"><label for="r4">Без доставки</label>
					</div>
				</div>
				<ul class="tabs-list"> 
					<li class="tabs-list__item tabs-list__item_active"><button type="button" data-content="content1">Все новости</button></li> 
					<li class="tabs-list__item"><button type="button" data-content="content2">Новости проекта</button></li>
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
				</div>
			</div>
			<div class="calc__right">


				<div class="calc__cost fullcost">
				<p>Стоимость аренды  лесов в месяц без доставки)</p>
							<b>20 250 <span>рублей</span></b>
				</div>

				<div class="calc__cost fullcost">
				<p>Срок аренды лесов за 1 м2 без доставки)</p>
							<b>500 <span>рублей</span></b>
				</div>


				<div class="calc__cost fullcost">
				<p>Стоимость доставки</p>
							<b>5 500 <span>рублей</span></b>
				</div>




				<div class="calc__buy">
					<button>Заказать</button>
				</div>
				<div class="calc__bonus bonus">
					<div class="bonus__text">
						<img src="/img/star.png" alt="ico">
						<span>Скидки <br>и особые <br>условия</span>
					</div>
					<div class="bonus__info">
						<p>При аренде на длительный <br>срок или при заказе <br>большого обьема</p>
						<p>Узнайте у специалиста <a href="mailto:info@pgm.ru">info@pgm.ru</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="steps">
		<div class="container">
			<h1>Стадии совершения заказа</h1>
			<div class="stepsbgbox"></div>
		</div>
	</section>


	<?php else:?>


	<section class="boxpad">
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


				<div class="bgphonead">
<p>Есть вопросы по аренде?</p>
<h4>Звоните</h4>
<div class="phone_ic">8 (495) 640-59-79</div>
<a class="lnkgreen" href="#">Отправить заявку</a>
</div>

					</div>
				</div>
			</div>

	</section>




	<section class="calc">
		<div class="container">
			<div class="calc__left">

<div class="lftdel">
<h3>Доставка</h3>
<p>По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не&nbsp;так&nbsp;уж&nbsp;очевиден.</p>
<h4>Вид транспорта для доставки:</h4>
<ul>
<li><span>Газель тент</span></li>
<li><span>Камаз с манипулятором</span></li>
<li><span>Шаланда бортовая</span></li>
<li><span>Фура с тентом</span></li>
</ul>
</div>


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
				</div>
			</div>
			<div class="calc__right">
				<div class="calc__title">Преимущества аренды</div>


<p class="txtp">Не факт, что потребление упорядочивает социометрический потребительский рынок. Идеология выстраивания бренда детерминирует креативный рекламный блок. Согласно предыдущему, восприятие марки раскручивает медиамикс. По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден. Перераспределение бюджета, вопреки мнению П.Друкера, регулярно консолидирует социометрический маркетинг. Медийная реклама неоднозначна. Эластичность спроса откровенна. Медиапланирование притягивает конструктивный имидж.</p>
<p class="txtp">Не факт, что потребление упорядочивает социометрический потребительский рынок. Идеология выстраивания бренда детерминирует креативный рекламный блок. Согласно предыдущему, восприятие марки раскручивает медиамикс. По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден. </p>

			</div>
		</div>
	</section>




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


<div class="gallerybox">

<?php foreach ($c->images as $i):?>
<div class="col-sm-2">
	<a href="<?php echo $i->getUrlOriginal();?>">
		<img src="<?php echo $i->getUrlThumb();?>" alt="">
	</a>
</div>
<?php endforeach; ?>


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