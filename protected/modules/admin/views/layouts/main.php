<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <?php

    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerPackage('fancybox');

    Yii::app()->clientScript->registerCssFile(
        Yii::app()->assetManager->publish(
            Yii::getPathOfAlias('admin.assets').'/css/admin.css'
        )
    );

    Yii::app()->clientScript->registerScriptFile(
    	Yii::app()->assetManager->publish(
            Yii::getPathOfAlias('admin.assets').'/js/js.js'
        )
    );

    ?>

    <?php

	Yii::app()->clientScript->registerScript('fancybox_init', '
        $(".fancybox").fancybox({
        	helpers:{
				overlay: {
					locked: false
				}
			}
		});
    ');

    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/vendor/ckeditor/ckeditor.js');

	?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <style type="text/css">
        div.top-menus li {
            display: block;
            float: left;
            margin-left: 10px;
            background: none repeat scroll 0 0 #EFFDFF;
            text-align: center;
        }

        #logo img {
            margin-top: 10px;
        }
    </style>

</head>

<body>
<div id="wrap">
    <div class="container" id="page">
        <div id="header">
            <?php
            if(!Yii::app()->user->isGuest)
                $this->widget(
                    'booster.widgets.TbNavbar',
                    array(
                        'brand' => 'RentProf',
                        'fixed' => false,
                        'fluid' => true,
                        'items' => array(
                            array(
                                'class' => 'booster.widgets.TbMenu',
                                'type' => 'navbar',
                                'items' => array(

                                	array('label' => 'Каталог', 'url' => '', 'items' => array(
										array('label' => 'Категории', 'url' => array('category/admin')),
	                                    array('label' => 'Товары', 'url' => array('catalog/admin')),
									)),

									array('label' => 'Главная страница', 'url' => '', 'items' => array(
										array('label' => Yii::t('app', 'Разделы на главной'), 'url' => array('mainsection/admin')),
										array('label' => Yii::t('app', 'Факты на главной'), 'url' => array('mainfact/admin')),
										array('label' => Yii::t('app', 'Наши работы'), 'url' => array('mainwork/admin')),
										array('label' => Yii::t('app', 'Особенности'), 'url' => array('feature/admin')),
									)),

									array('label' => 'Блоки на страницах', 'url' => '', 'items' => array(
										array('label' => Yii::t('app', 'Адреса'), 'url' => array('address/admin')),
										array('label' => Yii::t('app', 'Руководители'), 'url' => array('people/admin')),
									)),
									
									array('label' => Yii::t('app', 'Вопросы и ответы'), 'url' => array('faq/admin')),
									array('label' => Yii::t('app', 'Контент (текстовые блоки)'), 'url' => array('staticBlock/admin')),
									array('label' => Yii::t('app', 'Статьи'), 'url' => array('article/admin')),
									array('label' => Yii::t('app', 'Комплектующие для опалубки'), 'url' => array('item/admin')),
                                    array('label' => Yii::t('app', 'Выйти'), 'url' => array('/site/logout'), 'itemOptions' => array('class'=>'right')),
                                )
                            )
                        )
                    )
                );
            ?>
        </div><!-- header -->

        <?php echo $content; ?>

    </div><!-- page -->
</div>

<br/><br/>

<div id="footer">
    <div class="container">
        &copy; 2017
        Сделано в E-Produce
    </div>
</div><!-- footer -->

<script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	});
</script>

</body>
</html>
