<?php

/**
 * This is the model class for table "owners".
 *
 * The followings are the available columns in table 'owners':
 * @property integer $id_owner
 * @property integer $id_owner_type
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $phone_1
 * @property string $phone_2
 * @property string $email
 * @property string $date_add
 */
class Owners extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'owners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_owner_type, surname, name, patronymic, phone_1, phone_2, email, date_add', 'required'),
			array('id_owner_type', 'numerical', 'integerOnly'=>true),
			array('surname, name, patronymic, phone_1, phone_2', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_owner, id_owner_type, surname, name, patronymic, phone_1, phone_2, email, date_add', 'safe', 'on'=>'search'),
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
					
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_owner' => 'Id Owner',
			'id_owner_type' => 'Id Owner Type',
			'surname' => 'Surname',
			'name' => 'Name',
			'patronymic' => 'Patronymic',
			'phone_1' => 'Phone 1',
			'phone_2' => 'Phone 2',
			'email' => 'Email',
			'date_add' => 'Date Add',
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

		$criteria->compare('id_owner',$this->id_owner);
		$criteria->compare('id_owner_type',$this->id_owner_type);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('patronymic',$this->patronymic,true);
		$criteria->compare('phone_1',$this->phone_1,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_add',$this->date_add,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Owners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
