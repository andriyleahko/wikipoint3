<?php

/**
 * This is the model class for table "pictures".
 *
 * The followings are the available columns in table 'pictures':
 * @property integer $id
 * @property integer $user_id
 * @property integer $id_object
 * @property string $file
 * @property string $descr
 * @property string $insert_date
 * @property string $modarated
 * @property string $entity
 * @property integer $entity_pk
 * @property integer $num
 * @property integer $defaultr
 */
class Pictures extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pictures';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, id_object, descr, entity, entity_pk, num, defaultr', 'required'),
			array('user_id, id_object, entity_pk, num, defaultr', 'numerical', 'integerOnly'=>true),
			array('file', 'length', 'max'=>128),
			array('descr', 'length', 'max'=>255),
			array('entity', 'length', 'max'=>15),
			array('insert_date, modarated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, id_object, file, descr, insert_date, modarated, entity, entity_pk, num, defaultr', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'id_object' => 'Id Object',
			'file' => 'File',
			'descr' => 'Descr',
			'insert_date' => 'Insert Date',
			'modarated' => 'Modarated',
			'entity' => 'Entity',
			'entity_pk' => 'Entity Pk',
			'num' => 'Num',
			'defaultr' => 'Defaultr',
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
		$criteria->compare('id_object',$this->id_object);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('descr',$this->descr,true);
		$criteria->compare('insert_date',$this->insert_date,true);
		$criteria->compare('modarated',$this->modarated,true);
		$criteria->compare('entity',$this->entity,true);
		$criteria->compare('entity_pk',$this->entity_pk);
		$criteria->compare('num',$this->num);
		$criteria->compare('defaultr',$this->defaultr);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pictures the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
