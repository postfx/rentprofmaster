<?php

/**
 * This is the model class for table "reviews".
 *
 * The followings are the available columns in table 'reviews':
 * @property integer $id
 * @property string $created
 * @property string $name
 * @property string $text
 * @property string $company
 * @property string $img
 */
class Review extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, text, company', 'required'),
			array('name, company, img', 'length', 'max'=>256),
			array('img', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, name, text, company, img', 'safe', 'on'=>'search'),
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
			'created' => 'Дата создания',
			'name' => 'Имя',
			'text' => 'Текст',
			'company' => 'Компания',
			'img' => 'Изображение',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Review the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
