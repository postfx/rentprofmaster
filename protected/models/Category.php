<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $created
 * @property string $title
 * @property string $anounce
 * @property string $data1
 * @property string $data2
 * @property string $data3
 * @property string $descr
 * @property integer $parent_id
 * @property string $img
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, anounce, data1, descr, active, alias', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('img, data2, data3, reviews, tags', 'safe'),
			array('title, img', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, title, anounce, data1, data2, data3, descr, parent_id, img', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Category', 'parent_id'),
			'reviews' => array(self::MANY_MANY, 'Review', 'categories_reviews(category_id, review_id)'),
			'faqs' => array(self::MANY_MANY, 'Faq', 'categories_faqs(category_id, faq_id)'),

			'images' => array(
				self::HAS_MANY,
				'Images',
				'obj_id',
				'on' => 'images.type = :type',
				'params' => array(':type'=>'category')
		   	),
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
			'title' => 'Заголовок',
			'anounce' => 'Анонс',
			'data1' => 'Характеристики и параметры',
			'descr' => 'Описание',
			'parent_id' => 'Родительская категория',
			'img' => 'Изображение',
			'reviews' => 'Отзывы',
			'faqs' => 'Вопросы и ответы',
			'images' => 'Фотогалерея',
			'alias' => 'Идентификатор (ЧПУ)',
			'active' => 'Активно',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('anounce',$this->anounce,true);
		$criteria->compare('data1',$this->data1,true);
		$criteria->compare('data2',$this->data2,true);
		$criteria->compare('data3',$this->data3,true);
		$criteria->compare('descr',$this->descr,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
