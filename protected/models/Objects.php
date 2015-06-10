<?php

/**
 * This is the model class for table "objects".
 *
 * The followings are the available columns in table 'objects':
 * @property integer $id_object
 * @property integer $id_owner
 * @property integer $id_contractType
 * @property integer $id_objectType
 * @property integer $id_typeRealty
 * @property integer $id_category
 * @property integer $id_condition
 * @property integer $id_district
 * @property integer $id_street
 * @property string $building_number
 * @property string $building_k
 * @property string $address_rest
 * @property string $longitude
 * @property string $latitude
 * @property integer $price
 * @property integer $id_currency
 * @property string $note
 * @property string $source_url
 * @property string $date_add
 * @property string $id_arendap
 * @property string $id_parser
 * @property integer $send
 * @property string $noagent
 * @property integer $status
 * @property string $createdby
 * @property string $updatedby
 * @property integer $id_wherefrom
 * @property integer $who_add
 * @property integer $is_new
 */
class Objects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'objects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_owner, id_contractType, id_objectType, id_typeRealty, id_category, id_condition, id_district, id_street, price, id_currency, date_add, id_arendap, id_parser, noagent, createdby, updatedby', 'required'),
			array('is_new, who_add, id_owner, id_contractType, id_objectType, id_typeRealty, id_category, id_condition, id_district, id_street, price, id_currency, send, status, id_wherefrom', 'numerical', 'integerOnly'=>true),
			array('building_number, building_k, address_rest, longitude, latitude', 'length', 'max'=>50),
			array('source_url', 'length', 'max'=>300),
			array('id_arendap, id_parser', 'length', 'max'=>11),
			array('noagent', 'length', 'max'=>200),
			array('createdby, updatedby', 'length', 'max'=>100),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('is_new, who_add, id_object, id_owner, id_contractType, id_objectType, id_typeRealty, id_category, id_condition, id_district, id_street, building_number, building_k, address_rest, longitude, latitude, price, id_currency, note, source_url, date_add, id_arendap, id_parser, send, noagent, status, createdby, updatedby, id_wherefrom', 'safe', 'on'=>'search'),
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
				'Owners'=>array(self::BELONGS_TO, 'Owners', 'id_owner'),
				'ObjectsAppartment'=>array(self::HAS_ONE, 'ObjectsAppartment', 'id_object'),
				'ObjectsDovType'=>array(self::BELONGS_TO, 'ObjectsDovType', 'id_objectType'),
				'ObjectsDovDistrict'=>array(self::BELONGS_TO, 'ObjectsDovDistrict', 'id_district'),
				'Pictures'=>array(self::HAS_MANY, 'Pictures', 'id_object'),
				'ObjectsMetro'=>array(self::HAS_ONE, 'ObjectsMetro', 'id_object'),
				'ObjectsDovStreets'=>array(self::BELONGS_TO, 'ObjectsDovStreets', 'id_street'),
				'ObjectsMoreinfo'=>array(self::HAS_ONE,'ObjectsMoreinfo', 'id_object')
				
				
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_object' => 'Id Object',
			'id_owner' => 'Id Owner',
			'id_contractType' => 'Id Contract Type',
			'id_objectType' => 'Id Object Type',
			'id_typeRealty' => 'Id Type Realty',
			'id_category' => 'Id Category',
			'id_condition' => 'Id Condition',
			'id_district' => 'Id District',
			'id_street' => 'Id Street',
			'building_number' => 'Building Number',
			'building_k' => 'Building K',
			'address_rest' => 'Address Rest',
			'longitude' => 'Longitude',
			'latitude' => 'Latitude',
			'price' => 'Price',
			'id_currency' => 'Id Currency',
			'note' => 'Note',
			'source_url' => 'Source Url',
			'date_add' => 'Date Add',
			'id_arendap' => 'Id Arendap',
			'id_parser' => 'Id Parser',
			'send' => 'Send',
			'noagent' => 'Noagent',
			'status' => 'Status',
			'createdby' => 'Createdby',
			'updatedby' => 'Updatedby',
			'id_wherefrom' => 'Id Wherefrom',
			'who_add' => 'Кто добавил',
			'is_new' => 'New',
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
		$criteria->compare('id_owner',$this->id_owner);
		$criteria->compare('id_contractType',$this->id_contractType);
		$criteria->compare('id_objectType',$this->id_objectType);
		$criteria->compare('id_typeRealty',$this->id_typeRealty);
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('id_condition',$this->id_condition);
		$criteria->compare('id_district',$this->id_district);
		$criteria->compare('id_street',$this->id_street);
		$criteria->compare('building_number',$this->building_number,true);
		$criteria->compare('building_k',$this->building_k,true);
		$criteria->compare('address_rest',$this->address_rest,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('source_url',$this->source_url,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('id_arendap',$this->id_arendap,true);
		$criteria->compare('id_parser',$this->id_parser,true);
		$criteria->compare('send',$this->send);
		$criteria->compare('noagent',$this->noagent,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('createdby',$this->createdby,true);
		$criteria->compare('updatedby',$this->updatedby,true);
		$criteria->compare('id_wherefrom',$this->id_wherefrom);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Objects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
