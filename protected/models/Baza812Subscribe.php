<?php

/**
 * This is the model class for table "baza812_subscribe".
 *
 * The followings are the available columns in table 'baza812_subscribe':
 * @property integer $id
 * @property string $subscriber_name
 * @property string $subscriber_email
 * @property string $variant
 * @property string $rooms_amount
 * @property integer $price_max
 * @property string $metro
 * @property string $subscriber_phone
 * @property string $people
 * @property integer $animals
 * @property integer $kids
 * @property string $about_me
 * @property string $param
 */
class Baza812Subscribe extends CActiveRecord
{
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'baza812_subscribe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subscriber_name, subscriber_email, rooms_amount, price_max, subscriber_phone, animals, kids', 'required'), // є ще поле param
			array('subscriber_email', 'email'),
			array('subscriber_email, subscriber_phone', 'unique'),
			array('price_max, animals, kids', 'numerical', 'integerOnly'=>true),
			array('subscriber_name, subscriber_email, variant, rooms_amount, metro, subscriber_phone, people', 'length', 'max'=>50),
			array('about_me', 'length', 'max'=>250), // є ще поле param
			array('animals, kids', 'in','range'=>array('1','2'),'allowEmpty'=>false),
			//***************** перевірити
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			//*******************	
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subscriber_name, subscriber_email, variant, rooms_amount, price_max, metro, subscriber_phone, people, animals, kids, about_me', 'safe', 'on'=>'search'), // є ще поле param
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
			'subscriber_name' => 'Ваше имя',
			'subscriber_email' => 'Электронная почта',
			'variant' => 'Вариант',
			'rooms_amount' => 'Комнаты',
			'price_max' => 'Максимальная цена',
			'metro' => 'Метро',
			'subscriber_phone' => 'Телефон',
			'people' => 'Кто будет проживать',
			'animals' => 'Домашние животные',
			'kids' => 'Дети до 7лет',
			'about_me' => 'Расскажите о себе',
			'param' => 'Param',
			'verifyCode' => 'Код проверки',
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
		$criteria->compare('subscriber_name',$this->subscriber_name,true);
		$criteria->compare('subscriber_email',$this->subscriber_email,true);
		$criteria->compare('variant',$this->variant,true);
		$criteria->compare('rooms_amount',$this->rooms_amount,true);
		$criteria->compare('price_max',$this->price_max);
		$criteria->compare('metro',$this->metro,true);
		$criteria->compare('subscriber_phone',$this->subscriber_phone,true);
		$criteria->compare('people',$this->people,true);
		$criteria->compare('animals',$this->animals);
		$criteria->compare('kids',$this->kids);
		$criteria->compare('about_me',$this->about_me,true);
		$criteria->compare('param',$this->param,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Baza812Subscribe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
