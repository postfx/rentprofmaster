<?php
$this->breadcrumbs=array(
	'Mainsections'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Секции на главной</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'mainsection-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'title',
		'price',
		'url',
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>'$data->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/mainsections/".$data->img, "", array("style" => "width: 70px")),
                array(Yii::app()->request->baseUrl."/uploads/mainsections/".$data->img),
                array("class" => "fancybox")) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
