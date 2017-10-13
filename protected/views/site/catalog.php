<?php

	//$this->pageTitle = Yii::app()->name;

	$cat = Category::model()->findByPk($c->category_id);


	function human_filesize($bytes, $decimals = 2) {
 	   $size = array('Б','КБ','МБ','ГБ','ТБ','ПБ','ЕБ','ЗБ','ИБ');
	    $factor = floor((strlen($bytes) - 1) / 3);
	    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
	}
?>

<section class="bread">
	<div class="container">
		<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<li><a href="/<?php echo $cat->alias;?>"><?php echo $cat->title;?></a></li>
				<div class="sprt"></div>
				<li><a href="/<?php echo $cat->alias;?>/<?php echo $c->alias;?>"><?php echo $c->title;?></a></li>
				<div class="sprt"></div>
			</ul>
		</div>
	</div>
</section>
<div class="clearfl"></div>


<?php if ($cat->calc_type == 1):?>

<section class="product_title">
	<div class="container">
		<div class="row">
			<h1><?php echo $c->title;?></h1>
		</div>
	</div>
</section>

<?php elseif ($cat->calc_type == 2 || $cat->calc_type == 3):?>

<div class="block-title">
	<div class="container">
		<h1><?php echo $c->title;?></h1>
	</div>
</div>

<?php endif; ?>





<?php if ($cat->calc_type == 3):?>


<section class="section-gray">
	<div class="container940 boxcol boxcol-flex">
		<div class="row">
			<div class="col-sm-6">
				<div class="imgcol imgcol-center">
					<img src="/uploads/catalog/preview/<?php echo $c->img2;?>" alt="" title="">
				</div>
			</div>
			<div class="col-sm-6 bgf8">
				<?php echo $c->anounce;?>
			</div>
		</div>
	</div>
    <div class="container940">
        <div class="row">
            <div class="col-sm-12">
                <div class="contentbox content-about">
                    <?php echo $c->descr;?>
                </div>
            </div>
        </div>
    </div>
    <div class="container940">
    	<div class="rent-price">
    		<?php echo $c->data1;?>
		</div>
	</div>
</section>



<section class="faqpage">
    <div class="container940">
        <div class="titlesect"><span class="title-h2">Дополнительная комплектация</span></div>
        <div class="row about-equipment ">

        	<?php foreach ($c->catalogItems as $i):?>
            <div class="list-box ">
                <img src="/uploads/catalogItems/<?php echo $i->img;?>" alt="image description">
                <div class="list-box-hide">
                    <div class="list-box-dscr">
                        <p><?php echo $i->title;?></p>
                        <a href="/uploads/catalogFiles/<?php echo $i->file;?>" class="save">Сохранить в PDF <span><?php echo human_filesize(filesize(Yii::getPathOfAlias('webroot')."/uploads/catalogFiles/".$i->file));?></span></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>





<div class="boxproductinfo altproduct">
    <div class="container940">
        <div class="row">
            <div class="col-sm-4">
                <div class="aside">
                    <?php echo StaticBlock::get('phone_block'); ?>
                    <div class="txtaside">
                        <p><?php echo $c->data5;?></p>
                    </div>
                    <div class="ctlnkbox">
                    	<?php foreach ($c->files as $f):?>
                        <a class="ctlnlinf" href="/uploads/files/<?php echo $f->path;?>" target="_blank"><?php echo $f->title;?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php foreach ($c->reviews as $r):?>	
                    <div class="quest_block asd">
                        <div class="row">
                        	<?php if (!empty($r->img)):?>
                            <div class="col-sm-5">
                                <img src="/uploads/reviews/<?php echo $r->img;?>" alt="image description">
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
                    <div class="boxaction">
                        <span class="boxaction-title">Скидки и особые условия</span>
                        <p>При аренде на длительный срок или при заказе большого обьема</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
	            <?php echo $c->data2; ?>
            </div>
        </div>
    </div>

    <?php if ($cat->calc_type == 1):?>
		<?php echo $this->renderPartial('/site/_orderform_catalog'); ?>
	<?php elseif ($cat->calc_type == 2 || $cat->calc_type == 3):?>
		<?php echo $this->renderPartial('/site/_orderform'); ?>
	<?php endif; ?>

</div>


<section class="steps">
    <div class="container">
        <p class="steps-title">Стадии совершения заказа</p>
        <div class="stepsbgbox"></div>
    </div>
</section>


<section class="types-huts">
    <div class="container940">
        <div class="row">
            <div class="types-huts-block">
				<div class="titlesect">
					<span class="title-h2 types-huts__title">Другие типы опалубки</span>
				</div>
                <div class="types-huts-slider">

                	<?php
                		$prods = Catalog::model()->findAll(array(
                			'condition' => 'category_id=:cid and id <> :id',
                			'params' => array(':cid'=>$c->category_id, ':id'=>$c->id),
                		));
                	?>
                	<?php foreach ($prods as $p):?>
                    <div class="types-huts-view__product">
                    	<div class="executed-works__img">
	                        <img src="/uploads/catalog/<?php echo $p->img;?>" alt="">
						</div>
                        <a href="/<?php echo $cat->alias;?>/<?php echo $p->alias;?>"><?php echo $p->title;?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faqpage">
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


<section class="executed-works">
    <div class="container940">
        <div class="row">
            <div class="executed-works-block">
                <span class="title-h2 executed-works__title">Выполненные работы</span>
                <div class="executed-works-slider">
                	<?php foreach ($c->works as $w):?>
                    <div class="executed-works__product">
                    	<div class="executed-works__img">
	                        <img src="/uploads/works/<?php echo $w->img;?>" alt="">
                        </div>
                        <a href="javascript:void(0)"><?php echo $w->title;?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video-block">
    <div class="container940">
        <ul class="video-list">
        	<?php foreach ($c->video as $v):?>
            <li class="video-list-item">
            	<iframe id="ytplayer<?php echo $v->id;?>" type="text/html" src="http://www.youtube.com/embed/<?php echo $v->ytid;?>?rel=0&showinfo=0" frameborder="0" allowfullscreen='true'></iframe>
                <div class="video-list-img">
                    <img src="https://img.youtube.com/vi/<?php echo $v->ytid;?>/0.jpg" alt="image description">
                </div>
                <div class="video-list-link">
                    <span class="video-list-title"><?php echo $v->title;?></span>
                    <a href="javascript:void(0)" class="to-play-video" data-id="<?php echo $v->id;?>">play</a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

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





<?php else: ?>




<?php if ($cat->calc_type == 2):?>
<div class="section-bg">
<?php endif; ?>

<div class="container boxcol ">
    <div class="boxcol-two">
        <div class="imgcol">
            <img src="/uploads/catalog/preview/<?php echo $c->img2;?>" alt="" title="">            
        </div>
        <div class="bgf8">
        	<?php echo $c->anounce;?>
        </div>
    </div>
</div>


<?php if ($cat->calc_type == 1):?>
<div class="boxproductinfo">
    <div class="container940">
        <div class="row">
            <div class="col-sm-4">
                <div class="aside">
                	<?php echo StaticBlock::get('phone_block'); ?>
                    <div class="txtaside">
                        <?php echo $c->descr;?>
                    </div>
                    <div class="ctlnkbox">
                    	<?php foreach ($c->files as $f):?>
                        <a class="ctlnlinf" href="/uploads/files/<?php echo $f->path;?>" target="_blank"><?php echo $f->title;?></a>
                        <?php endforeach; ?>
                    </div>

					<?php foreach ($c->reviews as $r):?>	
                    <div class="quest_block">
                        <div class="row">
                        	<?php if (!empty($r->img)):?>
                            <div class="col-sm-5">
                                <img src="/uploads/reviews/<?php echo $r->img;?>" alt="image description">
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

                    <div class="boxaction">
                        <span class="boxaction-title">Скидки и особые условия</span>
                        <p>При аренде на длительный срок или при заказе большого обьема</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="contentbox content-about">
                    <?php echo $c->data1;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php elseif ($cat->calc_type == 2):?>

	<div class="boxproductinfo">
        <div class="container940">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $c->descr;?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>



	<?php if ($cat->calc_type == 1):?>
		<?php echo $this->renderPartial('/site/_orderform_catalog'); ?>
	<?php elseif ($cat->calc_type == 2 || $cat->calc_type == 3):?>
		<?php echo $this->renderPartial('/site/_orderform'); ?>
	<?php endif; ?>


<?php if ($cat->calc_type == 2):?>
</div>
<?php endif; ?>






<?php if ($cat->calc_type == 2):?>

<?php echo $this->renderPartial('/site/catalog/_calculator2'); ?>

<section class="characteristic-info">
    <div class="container940">
        <div class="row">
            <div class="col-sm-4">
                <div class="col-mg-left">
                	<?php echo StaticBlock::get('phone_block'); ?>
                    <div class="ctlnkbox">
                    	<?php foreach ($c->files as $f):?>
                        <a class="ctlnlinf" href="/uploads/files/<?php echo $f->path;?>" target="_blank"><?php echo $f->title;?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php foreach ($c->reviews as $r):?>	
                    <div class="quest_block asd">
                        <div class="row">
                        	<?php if (!empty($r->img)):?>
                            <div class="col-sm-5">
                                <img src="/uploads/reviews/<?php echo $r->img;?>" alt="image description">
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
                    <div class="discount-conditions discount-conditions-borrad-bottom">
                        <div class="discount-conditions-title">
                            <span>Скидки и особые условия</span>
                        </div>
                        <div class="discount-conditions-text">
                            <p>
                                При аренде на длительный срок или при заказе большого обьема
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="col-mg-right">
                	<?php echo $c->data4;?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php endif; ?>


<section class="steps">
    <div class="container">
        <p class="steps-title">Стадии совершения заказа</p>
        <div class="stepsbgbox"></div>
    </div>
</section>


<?php if ($cat->calc_type == 1):?>

<section class="bggray">
    <div class="container940">
        <?php echo $c->data2;?>
    </div>
</section>

<?php elseif ($cat->calc_type == 2):?>

<?php echo $c->data1;?>
<?php echo $c->data2;?>

<?php endif; ?>



<?php if ($cat->calc_type == 1):?>

<section class="faqpage">
    <div class="container940">
        <div class="titlesect"><span class="title-h2">Дополнительная комплектация</span></div>
        <div class="row about-equipment ">

        	<?php foreach ($c->catalogItems as $i):?>
            <div class="list-box ">
                <img src="/uploads/catalogItems/<?php echo $i->img;?>" alt="image description">
                <div class="list-box-hide">
                    <div class="list-box-dscr">
                        <p><?php echo $i->title;?></p>
                        <a href="/uploads/catalogFiles/<?php echo $i->file;?>" class="save">Сохранить в PDF <span><?php echo human_filesize(filesize(Yii::getPathOfAlias('webroot')."/uploads/catalogFiles/".$i->file));?></span></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="types-huts">
    <div class="container940">
        <div class="row">
            <div class="types-huts-block">
				<div class="titlesect">
					<span class="title-h2 types-huts__title">Другие типы бытовок</span>
				</div>
                <div class="types-huts-slider">

                	<?php
                		$prods = Catalog::model()->findAll(array(
                			'condition' => 'category_id=:cid and id <> :id',
                			'params' => array(':cid'=>$c->category_id, ':id'=>$c->id),
                		));
                	?>
                	<?php foreach ($prods as $p):?>
                    <div class="types-huts-view__product">
                    	<div class="executed-works__img">
	                        <img src="/uploads/catalog/<?php echo $p->img;?>" alt="">
						</div>
                        <a href="/<?php echo $cat->alias;?>/<?php echo $p->alias;?>"><?php echo $p->title;?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="faqpage <?php if ($cat->calc_type == 2):?>faqpage__arenda_lesov<?php endif; ?>">
    <div class="container940">
        <div class="titlesect titlesect-line-decore"><span class="title-h2">Ответы на распространенные вопросы</span></div>
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


<?php if ($cat->calc_type == 1):?>


<section class="executed-works">
    <div class="container940">
        <div class="row">
            <div class="executed-works-block">
				<div class="titlesect">
					<span class="title-h2 executed-works__title">Выполненые работы</span>
				</div>	
                <div class="executed-works-slider">
                	<?php foreach ($c->works as $w):?>
                    <div class="executed-works__product">
                    	<div class="executed-works__img">
	                        <img src="/uploads/works/<?php echo $w->img;?>" alt="">
						</div>
                        <a href="javascript:void(0)"><?php echo $w->title;?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video-block">
    <div class="container940">
        <ul class="video-list">
        	<?php foreach ($c->video as $v):?>
            <li class="video-list-item">
            	<iframe id="ytplayer<?php echo $v->id;?>" type="text/html" src="http://www.youtube.com/embed/<?php echo $v->ytid;?>?rel=0&showinfo=0" frameborder="0" allowfullscreen='true'></iframe>
                <div class="video-list-img">
                    <img src="https://img.youtube.com/vi/<?php echo $v->ytid;?>/0.jpg" alt="image description">
                </div>
                <div class="video-list-link">
                    <span class="video-list-title"><?php echo $v->title;?></span>
                    <a href="javascript:void(0)" class="to-play-video" data-id="<?php echo $v->id;?>">play</a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

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


<?php elseif ($cat->calc_type == 2):?>


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


<section class="executed-works">
    <div class="container940">
        <div class="row">
            <div class="executed-works-block">
				<div class="titlesect">
					<span class="title-h2 executed-works__title">Выполненые работы</span>
				</div>
			   <div class="executed-works-slider">
                	<?php foreach ($c->works as $w):?>
                    <div class="executed-works__product">
                    	<div class="executed-works__img">
	                        <img src="/uploads/works/<?php echo $w->img;?>" alt="">
						</div>
                        <a href="javascript:void(0)"><?php echo $w->title;?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video-block">
    <div class="container940">
        <ul class="video-list">
        	<?php foreach ($c->video as $v):?>
            <li class="video-list-item">
            	<iframe id="ytplayer<?php echo $v->id;?>" type="text/html" src="http://www.youtube.com/embed/<?php echo $v->ytid;?>?rel=0&showinfo=0" frameborder="0" allowfullscreen='true'></iframe>
                <div class="video-list-img">
                    <img src="https://img.youtube.com/vi/<?php echo $v->ytid;?>/0.jpg" alt="image description">
                </div>
                <div class="video-list-link">
                    <span class="video-list-title"><?php echo $v->title;?></span>
                    <a href="javascript:void(0)" class="to-play-video" data-id="<?php echo $v->id;?>">play</a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>


<?php endif; ?>

<?php endif; ?>


<section class="description-section">
    <div class="container940">
        <div class="section-info">
            <?php echo $c->data3;?>
        </div>
    </div>
</section>

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

<link rel="stylesheet" href="/css/main.min.css">