<?php

/**
 * This is the model class for table "objects_appartment".
 *
 * The followings are the available columns in table 'objects_appartment':
 * @property integer $id_object
 * @property integer $id_app_type
 * @property string $building_num
 * @property string $app_num
 * @property integer $new_building
 * @property integer $floors
 * @property integer $floor
 * @property integer $rooms
 * @property integer $roomsleased
 * @property string $area_total
 * @property string $area_living
 * @property string $area_kitchen
 * @property integer $count_views
 */
class ObjectsAppartment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'objects_appartment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_object, building_num, app_num, new_building, floors, floor, rooms, roomsleased, area_total, area_living, area_kitchen, count_views', 'required'),
			array('id_object, id_app_type, new_building, floors, floor, rooms, roomsleased, count_views', 'numerical', 'integerOnly'=>true),
			array('building_num, app_num, area_total, area_living, area_kitchen', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_object, id_app_type, building_num, app_num, new_building, floors, floor, rooms, roomsleased, area_total, area_living, area_kitchen, count_views', 'safe', 'on'=>'search'),
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
			'id_object' => 'Id Object',
			'id_app_type' => 'Id App Type',
			'building_num' => 'Building Num',
			'app_num' => 'App Num',
			'new_building' => 'New Building',
			'floors' => 'Floors',
			'floor' => 'Floor',
			'rooms' => 'Rooms',
			'roomsleased' => 'Roomsleased',
			'area_total' => 'Area Total',
			'area_living' => 'Area Living',
			'area_kitchen' => 'Area Kitchen',
			'count_views' => 'Count Views',
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
		$criteria->compare('id_app_type',$this->id_app_type);
		$criteria->compare('building_num',$this->building_num,true);
		$criteria->compare('app_num',$this->app_num,true);
		$criteria->compare('new_building',$this->new_building);
		$criteria->compare('floors',$this->floors);
		$criteria->compare('floor',$this->floor);
		$criteria->compare('rooms',$this->rooms);
		$criteria->compare('roomsleased',$this->roomsleased);
		$criteria->compare('area_total',$this->area_total,true);
		$criteria->compare('area_living',$this->area_living,true);
		$criteria->compare('area_kitchen',$this->area_kitchen,true);
		$criteria->compare('count_views',$this->count_views);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObjectsAppartment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
