<?php
	//$this->pageTitle = Yii::app()->name;

	function human_filesize($bytes, $decimals = 2) {
 	   $size = array('Б','КБ','МБ','ГБ','ТБ','ПБ','ЕБ','ЗБ','ИБ');
	    $factor = floor((strlen($bytes) - 1) / 3);
	    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
	}

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
				<li><a href="/<?php echo $c->parent->alias;?>"><?php echo $c->parent->title;?></a></li>
				<div class="sprt"></div>
				<li><a href="/<?php echo $c->parent->alias;?>/<?php echo $c->alias;?>"><?php echo $c->title;?></a></li>
				<div class="sprt"></div>
				<?php else: ?>
				<li><a href="/<?php echo $c->alias;?>"><?php echo $c->title;?></a></li>
				<div class="sprt"></div>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>
<div class="clearfl"></div>

<section class="arend_b">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="boximg_a_b"><img src="/uploads/categories/preview/<?php echo $c->img2;?>" alt="" title="" /></div>
			</div>

			<div class="col-sm-6">
				<div class="boxtxt_a_b">
				<h1><?php echo $c->title;?></h1>
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

<div class="gallery photogal">
	<div class="container940">
		<div class=" gallery-two-coloms opalubki-grid">
			<?php foreach ($childs as $ch):?>
			<div class="gallery-grid">
				<div class="gallery-item">
					<div class="block-title">
						<a href="/<?php echo $c->alias;?>/<?php echo $ch->alias;?>" class="title"><strong class="title"><?php echo $ch->title;?></strong></a><p class="title-dscr"><?php echo $ch->title2;?></p>
					</div>
					<img src="/uploads/categories/<?php echo $ch->img;?>" alt="image description" title="">
					<div class="block-btn">
						<span class="price"><?php echo $ch->price;?></span>
						<a href="javascript:void(0)" class="btn" data-toggle="modal" data-target=".modal-form">Заказать</a>
					</div>
					<div class="gallery-hide">
						<div class="item-dscr">
							<a href="/<?php echo $c->alias;?>/<?php echo $ch->alias;?>"><strong class="title"><?php echo $ch->title;?></strong></a><?php echo $ch->descr;?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
	
<?php endif; ?>


<?php if ($c->calc_type == 1): ?>
        
<div class="gallery photogal">
	<div class="container940">
	<div class="gallery-two-coloms">
		<?php for ($i = 0; $i < 2; $i++) { ?>
		<?php $ca = $catalog[$i]; ?>
		<div class="gallery-grid">
			<div class="gallery-item">
				<div class="block-title">
					<a href="<?php echo $c->alias;?>/<?php echo $ca->alias;?>" class="title"><?php echo $ca->title;?></a><p class="title-dscr"><?php echo $ca->title2;?></p>
				</div>
				<img src="/uploads/catalog/<?php echo $ca->img;?>" alt="" title="" />
				<div class="block-btn">
					<span class="price"><?php echo $ca->price;?></span>
					<a href="javascript:void(0)" class="btn" data-toggle="modal" data-target=".modal-form">Заказать</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	</div>
</div>

<section class="gallery">
	<div class="container940">
		<div class="row">
			<div class="multiple-items">
				<?php for ($i = 2; $i < count($catalog); $i++) { ?>
				<?php $ca = $catalog[$i]; ?>
				<div class="gallery-item">
					<div class="block-title">
						<a href="<?php echo $c->alias;?>/<?php echo $ca->alias;?>" class="title"><span class="title"><?php echo $ca->title;?></span></a><p class="title-dscr"><?php echo $ca->title2;?></p>
					</div>
					<img src="/uploads/catalog/<?php echo $ca->img;?>" alt="" title="" />
					<div class="block-btn">
						<span class="price"><?php echo $ca->price;?></span>
						<button type="submit" class="btn" data-toggle="modal" data-target=".modal-form">Заказать</button>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php elseif ($c->calc_type == 2): ?>

<div class="gallery photogal">
	<div class="container940">
	<div class="gallery-two-coloms">
		<?php for ($i = 0; $i < count($catalog); $i++) { ?>
		<?php $ca = $catalog[$i]; ?>
		<div class="gallery-grid">
			<div class="gallery-item">
				<div class="block-title">
					<a href="<?php echo $c->alias;?>/<?php echo $ca->alias;?>" class="title"><?php echo $ca->title;?></a>
					<p class="title-dscr"><?php echo $ca->title2;?></p>
				</div>
				<img src="/uploads/catalog/<?php echo $ca->img;?>" alt="" title="" />
				<div class="block-btn">
					<span class="price"><?php echo $ca->price;?></span>
					<a href="javascript:void(0)" class="btn" data-toggle="modal" data-target=".modal-form">Заказать</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	</div>
</div>

<?php elseif ($c->calc_type == 3): ?>

<div class="gallery photogal">
	<div class="container940">
	<div class=" gallery-two-coloms opalubki-grid subsection">
		<?php for ($i = 0; $i < count($catalog); $i++) { ?>
		<?php $ca = $catalog[$i]; ?>
		<div class="gallery-grid">
			<div class="gallery-item">
				<div class="block-title">
					<a href="<?php echo $c->alias;?>/<?php echo $ca->alias;?>" class="title"><?php echo $ca->title;?></a>
					<p class="title-dscr"><?php echo $ca->title2;?></p>
				</div>
				<?php if (!empty($ca->img)):?>
				<img src="/uploads/catalog/<?php echo $ca->img;?>" alt="" title="" />
				<?php endif; ?>
				<div class="block-btn">
					<span class="price"><?php echo $ca->price;?></span>
					<a href="javascript:void(0)" class="btn" data-toggle="modal" data-target=".modal-form">Заказать</a>
				</div>
				<div class="gallery-hide">
					<div class="item-dscr">
						<a href="/<?php echo $c->alias;?>/<?php echo $ca->alias;?>"><strong class="title"><?php echo $ca->title;?></strong>Б.фЮ
						<?php echo $ca->data4;?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	</div>
</div>

<?php endif; ?>


<?php if ($c->calc_type == 1): ?>

<section class="bgnimf">
<div class="container940">
	<div class="row">
		<div class="catinfo bgblock">
			<div class="row-flex">
				<div class="col-sm-4 ctlnkbox">
					<?php foreach ($c->files as $f):?>
                    <a class="ctlnlinf" href="/uploads/files/<?php echo $f->path;?>" target="_blank"><?php echo $f->title;?></a>
                    <?php endforeach; ?>
				</div>

				<div class="col-sm-4 complinfbox">
					<?php echo $c->data3;?>
				</div>

				<div class="col-sm-4 informbox">
					<?php echo StaticBlock::get('phone_block'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<?php echo $c->data1; ?>

<?php echo $c->descr;?>

<?php elseif ($c->calc_type == 2): ?>

<section class="bgnimf">
    <div class="container">
        <h3>Характеристики</h3>
        <div class="row">
        	<?php $i = 0; foreach ($c->files as $f):?>
        	<?php if ($i == 0 || $i % 3 == 0):?>
            <div class="col-sm-6 ctlnkbox ctlnkbox-anothPadding">
            <?php endif; ?>
                <a class="ctlnlinf_long" href="/uploads/files/<?php echo $f->path;?>" target="_blank"><?php echo $f->title;?> <span class="size"><?php echo human_filesize(filesize(Yii::getPathOfAlias('webroot')."/uploads/files/".$f->path));?></span></a>
			<?php if ($i == 2 || $i % 3 == 2):?>
			</div>
			<?php endif; ?>
			<?php $i++; endforeach; ?>
        </div>
    </div>
</section>


<section class="boxpad txt">
    <div class="container940">
        <div class="row">
            <div class="col-sm-8">
                <?php echo $c->data2;?>
            </div>
            <div class="col-sm-4">
            	<?php foreach ($c->reviews as $r):?>
                <div class="quest_block quest_block__mg">
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
               	<?php echo StaticBlock::get('phone_block'); ?>
            </div>
        </div>
    </div>
</section>


<?php elseif ($c->calc_type == 3): ?>

<section class="bgnimf">
    <div class="container">
        <h3>Характеристики</h3>
        <div class="row">
        	<?php $i = 0; foreach ($c->files as $f):?>
        	<?php if ($i == 0 || $i % 3 == 0):?>
            <div class="col-sm-6 ctlnkbox ctlnkbox-anothPadding">
            <?php endif; ?>
                <a class="ctlnlinf_long" href="/uploads/files/<?php echo $f->path;?>" target="_blank"><?php echo $f->title;?> <span class="size"><?php echo human_filesize(filesize(Yii::getPathOfAlias('webroot')."/uploads/files/".$f->path));?></span></a>
			<?php if ($i == 2 || $i % 3 == 2):?>
			</div>
			<?php endif; ?>
			<?php $i++; endforeach; ?>
        </div>
    </div>
</section>


<section class="boxpad txt">
    <div class="container940">
        <div class="row">
            <div class="col-sm-8">
                <?php echo $c->data2;?>
            </div>
            <div class="col-sm-4">
            	<?php foreach ($c->reviews as $r):?>
                <div class="quest_block asd">
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
               	<?php echo StaticBlock::get('phone_block'); ?>
            </div>
        </div>
    </div>
</section>


<?php endif; ?>



	<?php if ($c->calc_type == 1):?>
	
		<?php /*echo $this->renderPartial('/site/category/_calculator1');*/ ?>

		<section class="steps">
			<div class="container">
				<p class="steps-title">Стадии совершения заказа</p>
				<div class="stepsbgbox"></div>
			</div>
		</section>


		<section class="boxpad txt">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<?php echo $c->data2;?>
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

	<?php elseif ($c->calc_type == 2):?>

		<?php /*echo $this->renderPartial('/site/category/_calculator2');*/ ?>

		<?php /*echo $this->renderPartial('/site/category/_reviews', array('c'=>$c)); */?>


		<section class="steps">
			<div class="container">
				<p class="steps-title">Стадии совершения заказа</p>
				<div class="stepsbgbox"></div>
			</div>
		</section>


	<?php elseif ($c->calc_type == 3):?>


		<?php /*echo $this->renderPartial('/site/category/_reviews', array('c'=>$c)); */?>

		<?php echo $this->renderPartial('/site/category/_calculator3', array('c'=>$c)); ?>


		<section class="steps">
			<div class="container">
				<p class="steps-title">Стадии совершения заказа</p>
				<div class="stepsbgbox"></div>
			</div>
		</section>

	<?php endif; ?>



<section class="photogal">
	<div class="container940">
		<div class="titlesect"><span class="title-h2">Фотогалерея</span></div>
		<div class="gallerybox">
			<div class="gallerybox-large">

				<?php if (!empty($c->images[0])):?>

				<?php $im = $c->images[0]; ?>
				<a class="img-box bg-stretch" href="<?php echo $im->getUrlOriginal();?>" rel="lightbox1">
					<img src="<?php echo $im->getUrlOriginal();?>" alt="">
				</a>
				<?php endif; ?>
			</div>
			<div class="gallerybox-small">
				<?php for ($i = 1; $i < count($c->images); $i++) { ?>

				<?php $k=$i-1; $im = $c->images[$i]; ?>

				<?php if ($k == 0 || $k % 3 == 0):?>
				<div class="gallerybox-row">
				<?php endif; ?>
					<a class="img-box bg-stretch" href="<?php echo $im->getUrlOriginal();?>" rel="lightbox1">
						<img src="<?php echo $im->getUrlThumb();?>" alt="">
					</a>
				<?php if ($k == 2 || $k % 3 == 2):?>
				</div>
				<?php endif; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="faqpage <?php if ($c->calc_type == 2):?>faqpage__arenda_lesov<?php endif; ?>">
	<div class="container940">
		<span class="title-h2">Ответы на распространенные вопросы</span>
		<div class="faq-list">
			<?php $i = 0; foreach ($c->faqs as $f):?>
			<div class="faq-item">
				<div class="title_block"><?php echo $f->question;?></div>
				<div class="quest_block">
					<?php echo $f->answer;?>
				</div>
			</div>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</section>


<section class="bggray">
	<?php if ($c->calc_type == 1):?>
		<?php echo $this->renderPartial('/site/_orderform_catalog'); ?>
	<?php elseif ($c->calc_type == 2 || $c->calc_type == 3):?>
		<?php echo $this->renderPartial('/site/_orderform'); ?>
	<?php endif; ?>
</section>
<!-- /bggray -->


	<section class="address">
		<div class="address_inner">
			<div class="container940">
				<span class="address-title"><img src="/assets/img/add.png" alt="img">Адреса офисов и складов</span>
				<div class="row address-list">
					<?php foreach ($addresses as $a):?>
					<div class="col-sm-3 address-list-item">
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

	<!-- <link rel="stylesheet" href="/css/main.min.css"> -->