<?php
$this->breadcrumbs=array(
	'Catalogs'=>array('index'),
	$model->title,
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
		'title',
		array(
			'name'=>'active',
			'type'=>'html',
            'value'=> $model->active ? 'да':'нет',
		),
		'alias',
		'anounce:raw',
		'data1:raw',
		'data2:raw',
		'descr:raw',

		array(
			'name'=>'category_id',
			'type'=>'html',
            'value'=>$model->category->title,
		),
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>$model->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/catalog/".$model->img, "", array("style" => "width: 100px")),
                array(Yii::app()->request->baseUrl."/uploads/catalog/".$model->img),
                array("class" => "fancybox")) : "",
		),
		array(
			'name'=>'images',
			'type'=>'html',
            'value'=> Images::renderImages('catalog', $model->id),
		),
),
)); ?>
