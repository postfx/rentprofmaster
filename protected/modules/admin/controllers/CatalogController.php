<?php

class CatalogController extends AdminController
{
public $layout='/layouts/column2';

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new Catalog;

	$model->active = 1;

	if(isset($_POST['Catalog']))
	{
		if (!empty($_POST['Catalog']['reviews'])) {
			$reviews = $_POST['Catalog']['reviews'];
			unset($_POST['Catalog']['reviews']);
		} else
			$reviews = array();

		if (!empty($_POST['Catalog']['faqs'])) {
			$faqs = $_POST['Catalog']['faqs'];
			unset($_POST['Catalog']['faqs']);
		} else
			$faqs = array();

		$model->attributes=$_POST['Catalog'];
		if($model->save()) {

			$this->saveImages($model);

			if (is_array($reviews))
				foreach ($reviews as $ns)
				{
					$p = new CatalogReviews;
					$p->catalog_id = $model->id;
					$p->review_id = $ns;
					$p->save();
				}

			if (is_array($faqs))
				foreach ($faqs as $ns)
				{
					$p = new CatalogFaqs;
					$p->catalog_id = $model->id;
					$p->faq_id = $ns;
					$p->save();
				}


			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	}

	$this->render('create',array(
		'model'=>$model,
	));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
	$model=$this->loadModel($id);
	$img = $model->img;

	if(isset($_POST['Catalog']))
	{
		if (!empty($_POST['Catalog']['reviews'])) {
			$reviews = $_POST['Catalog']['reviews'];
			unset($_POST['Catalog']['reviews']);
		} else
			$reviews = array();

		if (!empty($_POST['Catalog']['faqs'])) {
			$faqs = $_POST['Catalog']['faqs'];
			unset($_POST['Catalog']['faqs']);
		} else
			$faqs = array();

		$model->attributes=$_POST['Catalog'];
		$model->img = $img;

		if($model->save()) {

			$this->saveImages($model);


			$nws = CatalogReviews::model()->findAll('catalog_id=:catalog_id', array(':catalog_id'=>$id));
			foreach ($nws as $p)
				$p->delete();
			$model->reviews = NULL;


			$nws = CatalogFaqs::model()->findAll('catalog_id=:catalog_id', array(':catalog_id'=>$id));
			foreach ($nws as $p)
				$p->delete();
			$model->faqs = NULL;


			if (is_array($reviews))
				foreach ($reviews as $ns)
				{
					$p = new CatalogReviews;
					$p->catalog_id = $model->id;
					$p->review_id = $ns;
					$p->save();
				}

			if (is_array($faqs))
				foreach ($faqs as $ns)
				{
					$p = new CatalogFaqs;
					$p->catalog_id = $model->id;
					$p->faq_id = $ns;
					$p->save();
				}


			if ($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	}

	$this->render('update',array(
		'model'=>$model,
	));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Catalog');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Catalog('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Catalog']))
$model->attributes=$_GET['Catalog'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Catalog::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='catalog-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}


public function saveImages($model)
{
	if (CUploadedFile::getInstance($model, 'img'))
	{
		$imgfile = CUploadedFile::getInstance($model, 'img');

        $image_name = uniqid() . "." . pathinfo($imgfile, PATHINFO_EXTENSION);
        $upload_directory = Yii::getPathOfAlias('webroot') . '/uploads/catalog/';

        if (!file_exists($upload_directory))
        {
		    mkdir($upload_directory, 0, true);
			chmod($upload_directory, 0755);
		}
		
        $upload_directory .= $image_name;

        if (!$imgfile->saveAs($upload_directory))
            $model->addError('img', 'Изображение не может быть сохранено');

        $model->img = $image_name;
    }




	    $images = CUploadedFile::getInstancesByName('images');
		if (!empty($images))
		{
			foreach ($images as $i)
			{
				$im = new Images();
				$im->obj_id = $model->id;
				$im->type = 'catalog';
				$im->saveImage($i);

				$im->save();
			}
		}
}

}
