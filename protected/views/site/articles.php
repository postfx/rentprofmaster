<?php
	$this->pageTitle = Yii::app()->name;
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<li><a href="/articles">Статьи</a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>

<div class="container">

			<div class="title"><h1>Список статей</h1></div>

</div>



<section class="bggray">



<section class="articlesbox ">
<div class="container">

<?php foreach ($articles as $a):?>
<div class="boxcomplbox">
<div class="col-sm-4">
<img src="/uploads/articles/<?php echo $a->img;?>" alt="" title="" />
</div>
<div class="col-sm-8">
<h3><a href="<?php echo Yii::app()->createUrl('site/article', array('id'=>$a->id));?>"><?php echo $a->title;?></a></h3>
<p><?php echo $a->anounce;?></p>
<a href="<?php echo Yii::app()->createUrl('site/article', array('id'=>$a->id));?>" class="readm">Подробнее</a>
</div>
</div>
<?php endforeach; ?>


</div>
</section>


<!--<section class="paginationbox">
<div class="container">

<ul>
<li class="active"><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
</ul>

</div>
</section>-->


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