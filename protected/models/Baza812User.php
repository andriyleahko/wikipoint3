<?php

/**
 * This is the model class for table "baza812_user".
 *
 * The followings are the available columns in table 'baza812_user':
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property integer $email
 * @property integer $about_me
 * @property string $ids_object
 */
class Baza812User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'baza812_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone, email, ids_object', 'required'),
			array('email', 'email'),
			array('name', 'length', 'max'=>100),
			array('phone', 'length', 'max'=>50),
			array('about_me', 'length', 'max'=>700),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, phone, email, ids_object', 'safe', 'on'=>'search'),
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
				'Baza812UserAccess'=>array(self::HAS_MANY, 'Baza812UserAccess', 'user_id'),
		);
	}

	/** 
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'phone' => 'телефон',
			'email' => 'email',
			'about_me' => 'описания',
			'ids_object'=>'объекты'
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email);
		$criteria->compare('ids_object',$this->ids_object,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Baza812User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
