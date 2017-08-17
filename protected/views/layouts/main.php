<?php
	$this->pageTitle = Yii::app()->name;

	$clientScript = Yii::app()->clientScript;
	$clientScript->registerCoreScript('jquery');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/media.css" />
</head>
<body>
	<section class="header">
		<div class="header_inner">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo">
							<a href="/">rentprof<span>master</span></a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="mob">
							<ul>
								<li><a class="tel" href="tel: 8 (495) 640-59-79"><img src="/assets/img/fone.png" alt="img">8 (495) 640-59-79</a></li>
								<li>|</li>
								<li><a class="tel" href="tel: 8 (495) 640-59-79">8 (495) 640-59-79</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="button">
							<a href="#"><img src="/assets/img/chat.png" alt="img">Написать нам</a>
						</div>
					</div>
				</div>
			</div>
			<div class="header_menu">
				<nav>
					<div class="container">
						<div class="navbar navbar-inverse navbar-right"> 
							<div class="navbar-header"> 
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsiv-menu"> 
									<span class="icon-bar"></span> 
									<span class="icon-bar"></span> 
									<span class="icon-bar"></span> 
								</button> 
							</div> 
							<div class="collapse navbar-collapse" id="responsiv-menu"> 
								<?php echo $this->renderPartial('/site/_topmenu'); ?>
							</div> 
						</div>
					</div>
				</nav>
			</div>
		</div>
	</section>


	<?php echo $content; ?>


	<section class="footer">
		<div class="footer_inner">
			<div class="container">
				<div class="row">
					<?php echo $this->renderPartial('/site/_bottommenu'); ?>
				</div>
			</div>
		</div>
	</section>

	<script src="/assets/js/bootstrap.min.js"></script>	
	<script src="/assets/js/main.js"></script>	

	<link rel="stylesheet" href="/css/slick.css">
	<link rel="stylesheet" href="/libs/ion.rangeSlider.css">
	<link rel="stylesheet" href="/libs/ion.rangeSlider.skinNice.css">
	<link rel="stylesheet" href="/css/jquery.fancybox.css">
	<!--<link rel="stylesheet" href="/fonts/stylesheet.css">
	<link rel="stylesheet" href="/css/main.min.css">-->

	<script src="/js/scripts.min.js"></script>
</body>
</html>