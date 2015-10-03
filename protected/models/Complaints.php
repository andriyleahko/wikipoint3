<?php

/**
 * This is the model class for table "complaints".
 *
 * The followings are the available columns in table 'complaints':
 * @property integer $id
 * @property integer $id_object
 * @property integer $id_user
 * @property integer $id_type
 * @property string $date_add
 * @property integer $status
 * @property string $note
 *
 * The followings are the available model relations:
 * @property Complaints $idType
 * @property Complaints[] $complaints
 * @property Objects $idObject
 * @property Users $idUser
 */
class Complaints extends CActiveRecord
{
        // Most used - aGetComplainTypes(); // which does the same thing as aComplainTypes();
        public static $aComplainType = array(
            1=>'Недействителен номер телефона',
            'Продан',
            'Ошибка в описании',
            'Перенести в архив',
            'Не хочу его видеть',
            'Иное',
            // from other logic (near complaint button)
            'Сдано',
        );
        public static $sdanoLimit = 10;
        
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Complaints the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'complaints';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_object, id_user, id_type, date_add', 'required'),
			array('id_object, id_user, id_type, status, id_user_baza812', 'numerical', 'integerOnly'=>true),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_object, id_user, id_type, date_add, status, note, id_user_baza812', 'safe', 'on'=>'search'),
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
			'idType' => array(self::BELONGS_TO, 'Complaints', 'id_type'),
			'complaints' => array(self::HAS_MANY, 'Complaints', 'id_type'),
			'idObject' => array(self::BELONGS_TO, 'Objects', 'id_object'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_object' => 'Id Object',
			'id_user' => 'Id User',
			'id_type' => 'Id Type',
			'date_add' => 'Date Add',
			'status' => 'Status',
			'note' => 'Note',
			'id_user_baza812'=>'User baza812'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_object',$this->id_object);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('status',$this->status);		
		$criteria->compare('note',$this->note,true);
		$criteria->compare('id_user_baza812',$this->id_user_baza812);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static  function sdanoCheckToRemoveTheseComplaints($id_object){
            if(!$id_object) return false;
            $aSdanoByObject = fetchRows('SELECT id FROM complaints WHERE id_object='.(int)$id_object);
            if(!$aSdanoByObject) return false;
            $amount = sizeof($aSdanoByObject);
            // Remove from DB
            if(self::$sdanoLimit <= $amount){
                Complaints::model()->deleteAll(array('condition'=>'id_object='.(int)$id_object));
                // put this object to Archive
                $Object = Objects::model()->findByPk((int)$id_object);
                $archiveTime = strtotime('-1 week', strtotime($Object->date_add));
                $date_add =  date('Y-m-d H:i:s',$archiveTime);
                $Object->date_add = $date_add;
                return (bool)$Object->save(false);
            }
        }
        
        // Most used - aGetComplainTypes(); // which does the same thing as aComplainTypes();
        public static function aComplainTypes($key = 0, $reverse = false){

            if($reverse){
                $aComplainType2 = array_flip(slef::$aComplainType);
                if($key){
                    if(!isset($aComplainType2[$key])) return 0;
                    return $aComplainType2[$key];
                }
            } else {
                if($key){
                    if(!isset(self::$aComplainType[$key])) return 0;
                    return self::$aComplainType[$key];
                } else {
                    return self::$aComplainType;
                }
            }
        }

}