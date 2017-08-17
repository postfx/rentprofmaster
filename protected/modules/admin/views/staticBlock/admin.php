<?php
$this->breadcrumbs=array(
	'Static Blocks'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('static-block-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Менеджер текстовых блоков</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'static-block-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			'name'=>'id',
            'value'=>'CHtml::encode($data->id)',
            'htmlOptions'=>array('width'=>'50'),
		),
		'title',
		'altname',
		array(
			'name'=>'data',
			'type'=>'html',
            'value'=> '($data->type == 0 ? StaticBlock::strip($data->data_stripped) : StaticBlock::strip($data->data))',
		),
		array(
			'name'=>'created',
            'value'=>'CHtml::encode($data->created)',
            'htmlOptions'=>array('width'=>'150'),
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
