<?php

class AddObjectForm extends CFormModel {

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
            array('rooms, flat, area_full, area_kitchen, metro, frige, furniture, washer, net, about_me, area_live, floor, floor_max, time_to_metro, price', 'numerical'),
            array('phone, phone_my, address, room_flat, user', 'length', 'max' => 250), // є ще поле param
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
        );
    }

}
