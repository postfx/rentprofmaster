<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Файлы</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'file-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'name',
		'title',
		'alt',
		array(
			'name'=>'path',
			'type'=>'html',
            'value'=>'$data->path ? CHtml::link(
				"Скачать",
                array(Yii::app()->request->baseUrl."/uploads/files/".$data->path),
                array()) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
