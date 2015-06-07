<?php

/**
 * This is the model class for table "baza812_user_access".
 *
 * The followings are the available columns in table 'baza812_user_access':
 * @property integer $id
 * @property integer $user_id
 * @property string $pasword
 * @property integer $when_get_pasword
 * @property integer $type_pasword
 * @property integer $number_opened_phone_allowed
 * @property string $ids_object
 */
class Baza812UserAccess extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'baza812_user_access';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, pasword, when_get_pasword, type_pasword, number_opened_phone_allowed, ids_object', 'required'),
			array('user_id, when_get_pasword, type_pasword, number_opened_phone_allowed', 'numerical', 'integerOnly'=>true),
			array('pasword', 'length', 'max'=>15),
			array('pasword', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, pasword, when_get_pasword, type_pasword, number_opened_phone_allowed, ids_object', 'safe', 'on'=>'search'),
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
				'Baza812User'=>array(self::BELONGS_TO, 'Baza812UserAccess', 'user_id'),
				'Baza812TypePasword'=>array(self::BELONGS_TO, 'Baza812TypePasword', 'type_pasword'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'pasword' => 'Pasword',
			'when_get_pasword' => 'When Get Pasword',
			'type_pasword' => 'Type Pasword',
			'number_opened_phone_allowed' => 'Number Opened Phone Allowed',
			'ids_object' => 'Ids Object',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('pasword',$this->pasword,true);
		$criteria->compare('when_get_pasword',$this->when_get_pasword);
		$criteria->compare('type_pasword',$this->type_pasword);
		$criteria->compare('number_opened_phone_allowed',$this->number_opened_phone_allowed);
		$criteria->compare('ids_object',$this->ids_object,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Baza812UserAccess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
