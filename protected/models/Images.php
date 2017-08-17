<?php

/**
 * This is the model class for table "images".
 *
 * The followings are the available columns in table 'images':
 * @property integer $id
 * @property string $created
 * @property integer $obj_id
 * @property string $path
 * @property string $type
 * @property string $title
 */
class Images extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('obj_id, path, type', 'required'),
			array('obj_id', 'numerical', 'integerOnly'=>true),
			array('path, type, title', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, obj_id, path, type, title', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created' => 'Created',
			'obj_id' => 'Obj',
			'path' => 'Path',
			'type' => 'Type',
			'title' => 'Title',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('obj_id',$this->obj_id);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Images the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUrlOriginal()
	{
		return Yii::app()->getBaseUrl(true)."/uploads/images/".$this->path;
	}

	public function getPathOriginal()
	{
		return Yii::getPathOfAlias('webroot')."/uploads/images/".$this->path;
	}

	public function getUrlThumb()
	{
		return Yii::app()->getBaseUrl(true)."/uploads/images/thumbs/".$this->path;
	}

	public function getPathThumb()
	{
		return Yii::getPathOfAlias('webroot')."/uploads/images/thumbs/".$this->path;
	}

	public function afterDelete()
	{
		unlink($this->getPathOriginal());

		parent::afterDelete();
	}

	public function saveImage(CUploadedFile $photoFile)
	{
		$this->path = uniqid() . "." . strtolower(pathinfo($photoFile->getName(), PATHINFO_EXTENSION));

		if (!$photoFile->saveAs($this->getPathOriginal()))
			return false;

		try {

			$image = Yii::app()->image->load($this->getPathOriginal());
			if ($image) {

				$w = $image->__get('width');
		        $h = $image->__get('height');

		        if ($w == $h) {
					$image->resize(300, 300)->crop(300, 240);
				} else if ($w / $h > 300 / 240)
					$image->resize(300, 240, ImageConv::HEIGHT)->crop(300, 240);
				else
					$image->resize(300, 240, ImageConv::WIDTH)->crop(300, 240);


		        $upload_directory = Yii::getPathOfAlias('webroot') . '/uploads/images/thumbs/'.$this->path;
				$image->save($upload_directory);
			}

		} catch (Exception $e) {

   		}
	}

	public static function renderImages($type, $obj_id)
	{
		$data = Images::model()->findAllByAttributes(array(
			'type' => $type,
			'obj_id'=> $obj_id,
		));

		$ret = '';

		foreach ($data as $d) {
			$ret .= '<a href="'.$d->getUrlOriginal().'" class="fancybox"><img src="'.$d->getUrlThumb().'" width="150" /></a>&nbsp;&nbsp;';
		}

		return $ret;
	}
}
