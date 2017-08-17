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
				<li><a href="<?php echo Yii::app()->createUrl('site/article', array('id'=>$a->id));?>"><?php echo $a->title;?></a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>

<div class="container">

			<div class="title"><h1><?php echo $a->title;?></h1></div>

</div>






<section class="paybox">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 contenttext">
							
				<?php echo $a->body;?>

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