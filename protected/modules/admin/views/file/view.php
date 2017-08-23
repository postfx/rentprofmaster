<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
array('label'=>'Редактировать','url'=>array('update','id'=>$model->id)),
array('label'=>'Удалить','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
array('label'=>'Список','url'=>array('admin')),
);
?>

<h1>Просмотр #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'created',
		'name',
		'title',
		'alt',
		array(
			'name'=>'path',
			'type'=>'html',
            'value'=>$model->path ? CHtml::link(
                'Скачать',
                array(Yii::app()->request->baseUrl."/uploads/files/".$model->path),
                array()) : "",
		),
),
)); ?>
