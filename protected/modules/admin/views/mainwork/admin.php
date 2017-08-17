<?php
$this->breadcrumbs=array(
	'Mainworks'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Выполненные работы</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'mainwork-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'title',
		'descr',
		'url',
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>'$data->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/mainworks/hor/".$data->img, "", array("style" => "width: 100px")),
                array(Yii::app()->request->baseUrl."/uploads/mainworks/hor/".$data->img),
                array("class" => "fancybox")) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
