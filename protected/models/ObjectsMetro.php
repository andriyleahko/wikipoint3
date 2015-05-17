<?php

/**
 * This is the model class for table "objects_metro".
 *
 * The followings are the available columns in table 'objects_metro':
 * @property integer $id_object
 * @property integer $id_metro
 * @property integer $id_tometro
 * @property integer $time_tometro
 */
class ObjectsMetro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'objects_metro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_object, id_metro, id_tometro, time_tometro', 'required'),
			array('id_object, id_metro, id_tometro, time_tometro', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_object, id_metro, id_tometro, time_tometro', 'safe', 'on'=>'search'),
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
				'Objects'=>array(self::HAS_MANY, 'Objects', 'id_object'),
				'ObjectsDovMetro'=>array(self::HAS_ONE, 'ObjectsDovMetro', 'id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_object' => 'Id Object',
			'id_metro' => 'Id Metro',
			'id_tometro' => 'Id Tometro',
			'time_tometro' => 'Time Tometro',
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
		$criteria->compare('id_metro',$this->id_metro);
		$criteria->compare('id_tometro',$this->id_tometro);
		$criteria->compare('time_tometro',$this->time_tometro);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObjectsMetro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
