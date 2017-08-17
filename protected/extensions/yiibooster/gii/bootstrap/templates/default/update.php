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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

	$this->menu=array(
	array('label'=>'Создать','url'=>array('create')),
	array('label'=>'Просмотр','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Список','url'=>array('admin')),
	);
	?>

	<h1>Редактировать #<?php echo "<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>