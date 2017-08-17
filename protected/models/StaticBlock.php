<?php

/**
 * This is the model class for table "static_blocks".
 *
 * The followings are the available columns in table 'static_blocks':
 * @property integer $id
 * @property string $date
 * @property string $title
 * @property string $altname
 * @property string $data
 * @property string $data_stripped
 * @property integer $type
 */
class StaticBlock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'static_blocks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, altname', 'required'),
			array('data, data_stripped', 'safe'),
			array('altname','match', 'pattern'=>'#^[0-9A-Za-z\-\_]+$#', 'message'=>'Идентификатор: разрешены только символы 0-9,A-Z,a-z'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('title, altname', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, title, altname, data, data_stripped, type', 'safe', 'on'=>'search'),
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
			'title' => 'Заголовок',
			'altname' => 'Идентификатор',
			'data' => 'Текст',
			'data_stripped' => 'Текст',
			'type' => 'Тип',
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
		$criteria->compare('altname',$this->altname,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('data_stripped',$this->data_stripped,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StaticBlock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function get($altname)
	{
		$item = StaticBlock::model()->find('altname=:altname', array(':altname'=>$altname));
		if ($item->type == 0)
			return $item->data_stripped;
		else
			return $item->data;
	}
	public static function strip($string, $len = 200)
    {
    	if (strlen($string) < $len)
    		return strip_tags($string);

    	$string = strip_tags($string);
    	$string = substr($string, 0, $len);
		$string = rtrim($string, "!,.-");
		$string = substr($string, 0, strrpos($string, ' '));

		return $string." ...";
    }
}
