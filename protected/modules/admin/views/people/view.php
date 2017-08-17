<?php
$this->breadcrumbs=array(
	'Peoples'=>array('index'),
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
		'prof',
		'phone',
		'email',
		'skype',
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>$model->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/people/".$model->img, "", array("style" => "width: 100px")),
                array(Yii::app()->request->baseUrl."/uploads/people/".$model->img),
                array("class" => "fancybox")) : "",
		),
),
)); ?>
