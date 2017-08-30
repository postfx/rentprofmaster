<?php

class ReviewController extends AdminController
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
	$model=new Review;

	if(isset($_POST['Review']))
	{
		$model->attributes=$_POST['Review'];
		if($model->save()) {

			$this->saveImages($model);

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

	if(isset($_POST['Review']))
	{
		$model->attributes=$_POST['Review'];
		$model->img = $img;

		if($model->save()) {

			$this->saveImages($model);

			if ($model->save()) {

				if (isset($_POST['yt2']))
					$this->redirect(array('update','id'=>$model->id));
				else
					$this->redirect(array('view','id'=>$model->id));
			}
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
$dataProvider=new CActiveDataProvider('Review');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Review('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Review']))
$model->attributes=$_GET['Review'];

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
$model=Review::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='review-form')
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
        $upload_directory = Yii::getPathOfAlias('webroot') . '/uploads/reviews/';

        if (!file_exists($upload_directory))
        {
		    mkdir($upload_directory, 0, true);
			chmod($upload_directory, 0755);
		}
		
        $upload_directory .= $image_name;

        if (!$imgfile->saveAs($upload_directory))
            $model->addError('img', 'Изображение не может быть сохранено');

		$image = Yii::app()->image->load($upload_directory);

		$image->resize(77, 77)->crop(77, 77);

		$upload_directory2 = Yii::getPathOfAlias('webroot') . '/uploads/reviews/'.$image_name;
		$image->save($upload_directory2);

        $model->img = $image_name;
    }
}

}
