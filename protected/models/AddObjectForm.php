<?php

class AddObjectForm extends CFormModel {

    private static $ALLOW_PHOTO_TYPE = array('image/jpeg', 'image/png', 'image/jpg');
    private static $ALLOW_PHOTO_SIZE = 2;
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
            array('room_flat, address, time_to_metro, metro, floor, floor_max, phone, phone_my, user, area_full, area_kitchen, area_live, price', 'required'), // є ще поле param
            array('rooms, flat, metro_to, area_full, area_kitchen, metro, frige, furniture, washer, net, area_live, floor, floor_max, time_to_metro, price', 'numerical'),
            array('phone, phone_my, address, room_flat, user, photo, about_me', 'length', 'max' => 255), // є ще поле param
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
            'floor' => 'Етаж',
            'floor_max' => 'Количество етажей',
            'phone' => 'Телефон собственика',
            'phone_my' => 'Телефон Ваш',
            'user' => 'Имя владелца',
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
        );
    }
    
    /**
     * 
     * @param array $photoes
     */
    public function validatePhotoes($photoes) {
        
        foreach ($photoes['name']['photoes'] as $key => $value) {
            if (!in_array($photoes['type']['photoes'][$key], self::$ALLOW_PHOTO_TYPE)) {
                $this->addError('photo','Неверный тип фото: ' . $photoes['name']['photoes'][$key]);
            }
            if ($photoes['size']['photoes'][$key] > self::$ALLOW_PHOTO_SIZE * 1024 * 1024) {
                $this->addError('photo','Размер фото больше 2МБ: ' . $photoes['name']['photoes'][$key]);
            }
        }
        
    }
    
    public function uploadPhoto($photoes) {
        
    }

}
