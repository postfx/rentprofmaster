<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
array('label'=>'Редактировать','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
array('label'=>'Удалить','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Вы уверены?')),
array('label'=>'Список','url'=>array('admin')),
);
?>

<h1>Просмотр #<?php echo "<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
	echo "\t\t'" . $column->name . "',\n";
}
?>
),
)); ?>
