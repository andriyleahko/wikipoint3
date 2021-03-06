<?php

/**
 * This is the model class for table "baza812_user_buy_orders".
 *
 * The followings are the available columns in table 'baza812_user_buy_orders':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_user_access
 * @property integer $id_type_pasword
 * @property integer $status
 */
class Baza812UserBuyOrders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'baza812_user_buy_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_user_access, id_type_pasword, status', 'required'),
			array('id_user, id_user_access, id_type_pasword, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, id_user_access, id_type_pasword, status', 'safe', 'on'=>'search'),
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
				'Baza812TypePasword'=>array(self::BELONGS_TO, 'Baza812TypePasword', 'id_type_pasword'),
				'Baza812User' => array(self::BELONGS_TO, 'Baza812User', 'id_user'),
		);	
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'id_user_access' => 'Id User Access',
			'id_type_pasword' => 'Id Type Pasword',
			'status' => 'Status',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_user_access',$this->id_user_access);
		$criteria->compare('id_type_pasword',$this->id_type_pasword);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Baza812UserBuyOrders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
