<?php
$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Отзывы</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'review-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'name',
		'company',
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>'$data->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/reviews/".$data->img, "", array("style" => "width: 70px")),
                array(Yii::app()->request->baseUrl."/uploads/reviews/".$data->img),
                array("class" => "fancybox")) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
