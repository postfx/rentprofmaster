<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Комплектующие для опалубки</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'item-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'title',
		'descr',
		'comment',
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>'$data->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/items/".$data->img, "", array("style" => "width: 100px")),
                array(Yii::app()->request->baseUrl."/uploads/items/".$data->img),
                array("class" => "fancybox")) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
