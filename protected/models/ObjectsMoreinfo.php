<?php

/**
 * This is the model class for table "objects_moreinfo".
 *
 * The followings are the available columns in table 'objects_moreinfo':
 * @property integer $id_object
 * @property integer $id_security
 * @property integer $id_parking
 * @property integer $id_sewerage
 * @property integer $id_heating
 * @property integer $id_water
 * @property integer $id_wc
 * @property integer $id_concierge
 * @property integer $id_video
 * @property integer $id_balcony
 * @property integer $internet
 * @property integer $tv
 * @property integer $conditioner
 * @property integer $fridge
 * @property integer $washer
 * @property integer $telephone
 * @property integer $furniture
 * @property integer $rate
 */
class ObjectsMoreinfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'objects_moreinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_object, id_security, id_parking, id_sewerage, id_heating, id_water, id_wc, id_concierge, id_video, id_balcony, internet, tv, conditioner, fridge, washer, telephone, furniture, rate', 'required'),
			array('id_object, id_security, id_parking, id_sewerage, id_heating, id_water, id_wc, id_concierge, id_video, id_balcony, internet, tv, conditioner, fridge, washer, telephone, furniture, rate', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_object, id_security, id_parking, id_sewerage, id_heating, id_water, id_wc, id_concierge, id_video, id_balcony, internet, tv, conditioner, fridge, washer, telephone, furniture, rate', 'safe', 'on'=>'search'),
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
				'Objects'=>array(self::HAS_ONE, 'Objects', 'id_object'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_object' => 'Id Object',
			'id_security' => 'Id Security',
			'id_parking' => 'Id Parking',
			'id_sewerage' => 'Id Sewerage',
			'id_heating' => 'Id Heating',
			'id_water' => 'Id Water',
			'id_wc' => 'Id Wc',
			'id_concierge' => 'Id Concierge',
			'id_video' => 'Id Video',
			'id_balcony' => 'Id Balcony',
			'internet' => 'Internet',
			'tv' => 'Tv',
			'conditioner' => 'Conditioner',
			'fridge' => 'Fridge',
			'washer' => 'Washer',
			'telephone' => 'Telephone',
			'furniture' => 'Furniture',
			'rate' => 'Rate',
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

		$criteria->compare('id_object',$this->id_object);
		$criteria->compare('id_security',$this->id_security);
		$criteria->compare('id_parking',$this->id_parking);
		$criteria->compare('id_sewerage',$this->id_sewerage);
		$criteria->compare('id_heating',$this->id_heating);
		$criteria->compare('id_water',$this->id_water);
		$criteria->compare('id_wc',$this->id_wc);
		$criteria->compare('id_concierge',$this->id_concierge);
		$criteria->compare('id_video',$this->id_video);
		$criteria->compare('id_balcony',$this->id_balcony);
		$criteria->compare('internet',$this->internet);
		$criteria->compare('tv',$this->tv);
		$criteria->compare('conditioner',$this->conditioner);
		$criteria->compare('fridge',$this->fridge);
		$criteria->compare('washer',$this->washer);
		$criteria->compare('telephone',$this->telephone);
		$criteria->compare('furniture',$this->furniture);
		$criteria->compare('rate',$this->rate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObjectsMoreinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
