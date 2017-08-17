<?php

/**
 * This is the model class for table "people".
 *
 * The followings are the available columns in table 'people':
 * @property integer $id
 * @property string $created
 * @property string $name
 * @property string $prof
 * @property string $phone
 * @property string $email
 * @property string $skype
 */
class People extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'people';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, prof, phone', 'required'),
			array('img, email, skype', 'safe'),
			array('name, prof, phone, email, skype', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, name, prof, phone, email, skype', 'safe', 'on'=>'search'),
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
			'prof' => 'Должность',
			'phone' => 'Телефон',
			'email' => 'E-mail',
			'skype' => 'Скайп',
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
		$criteria->compare('prof',$this->prof,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype',$this->skype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return People the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
