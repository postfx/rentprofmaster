<?php
$this->breadcrumbs=array(
	'Peoples'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Руководители подразделений</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'people-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
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
            'value'=>'$data->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/people/".$data->img, "", array("style" => "width: 100px")),
                array(Yii::app()->request->baseUrl."/uploads/people/".$data->img),
                array("class" => "fancybox")) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
