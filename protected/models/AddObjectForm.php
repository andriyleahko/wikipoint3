<?php

class AddObjectForm extends CFormModel {

    private static $ALLOW_PHOTO_TYPE = array('image/jpeg', 'image/png', 'image/jpg');
    private static $ALLOW_PHOTO_SIZE = 2;
    private static $UPLOAD_DIR = '../images/temp/';
    public $room_flat;
    public $address;
    public $time_to_metro;
    public $metro;
    public $floor;
    public $floor_max;
    public $phone;
    public $phone_my;
    public $user;
    public $area_full;
    public $area_kitchen;
    public $area_live;
    public $price;
    public $verifyCode;
    public $furniture;
    public $washer;
    public $net;
    public $about_me;
    public $frige;
    public $rooms;
    public $flat;
    public $metro_to;
    public $photo;
    public $house_no;
    public $district;
    public $street;
    public $email;
    public $about_object;
    public $from_baza812;

    /**
     * @todo must be attributes
     */

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('house_no, room_flat, district, street, time_to_metro, metro, floor, floor_max, phone, user, area_full, area_kitchen, area_live, price, email', 'required'), // є ще поле param
            array('district, street, rooms, flat, metro_to, area_full, area_kitchen, metro, frige, furniture, washer, net, area_live, floor, floor_max, time_to_metro, price, from_baza812', 'numerical'),
      		array('time_to_metro', 'numerical', 'min'=>0, 'max'=>60),
            array('phone, phone_my, house_no, address, room_flat, user, photo, about_me, about_object, email', 'length', 'max' => 255), // є ще поле param
       		array('email', 'email'), // є ще поле param
        	array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'room_flat' => 'Комната / квартира',
            'address' => 'Адресс',
            'time_to_metro' => 'Количество время до метро',
            'metro' => 'Метро',
            'floor' => 'Этаж',
            'floor_max' => 'Количество этажей',
            'phone' => 'Телефон собственника',
            'phone_my' => 'Телефон Ваш',
            'user' => 'Имя владельца',
            'area_full' => 'Общая площадь',
            'area_kitchen' => 'Площадь кухни',
            'area_live' => 'Жилая площадь',
            'price' => 'Цена',
            'verifyCode' => 'Код проверки',
            'furniture' => 'Мебель',
            'washer' => 'Пралка',
            'net' => 'Интернет',
            'about_me' => 'Про меня',
            'frige' => 'Холодильник',
            'rooms' => 'Квартира',
            'flat' => 'Комнота',
            'metro_to' => 'Пешком Транспортом',
            'photo' => 'Фото',
            'house_no' => 'Номер дома',
            'district' => 'Район',
            'street' => 'Улиця',
        	'email' =>'email',
        	'about_object' => 'Об объекте'
        );
    }

    /**
     * 
     * @param array $photoes
     */
    public function validatePhotoes($photoes) {

        if ($photoes['name']['photoes'][0]) {
            foreach ($photoes['name']['photoes'] as $key => $value) {
                if (!in_array($photoes['type']['photoes'][$key], self::$ALLOW_PHOTO_TYPE)) {
                    $this->addError('photo', 'Неверный тип фото: ' . $photoes['name']['photoes'][$key]);
                }
                if ($photoes['size']['photoes'][$key] > self::$ALLOW_PHOTO_SIZE * 1024 * 1024) {
                    $this->addError('photo', 'Размер фото больше 2МБ: ' . $photoes['name']['photoes'][$key]);
                }
            }
        }
    }

    public function uploadPhoto($photoes) {

        if ($photoes['name']['photoes'][0]) {
            foreach ($photoes['name']['photoes'] as $key => $value) {
                $ext = end(explode('.', $photoes['name']['photoes'][$key]));
                $name = md5($photoes['name']['photoes'][$key]);
                move_uploaded_file($photoes['tmp_name']['photoes'][$key], self::$UPLOAD_DIR . $name . '.' . $ext);
                $this->photo[] =  'images/temp/' . $name . '.' . $ext;
            }
        }
    }

}
