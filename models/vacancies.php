<?php

namespace models;

use core\Model;

/**
 * @property string $title Заголовок Оголошення
 * @property string $text Тексь Оголошення
 * @property string $short_text Короткий опис
 * @property int $salary Зарплата
 * @property string $address Адресса
 * @property string $Email емейл
 * @property string $Telephone телефон
 * @property string $data Дата оголошення
 * @property string $user_id кто создал
 * @property int $id айді оголошення
 */
class vacancies extends Model
{
    public static $tableName = 'vacancies';
    public static function AddVacantion($title, $text, $short_text,$salary, $address, $email, $telephone, $data, $user_id) {
        $vacancy = new vacancies();
        $vacancy->title = $title;
        $vacancy->text = $text;
        $vacancy->short_text = $short_text;
        $vacancy->salary= $salary;
        $vacancy->address = $address;
        $vacancy->Email = $email;
        $vacancy->Telephone = $telephone;
        $vacancy->data = $data;
        $vacancy->user_id = $user_id;
        $vacancy->save();
    }
    public static function UpdateVacantion($id , $title, $text, $short_text,$salary, $address, $email, $telephone, $data, $user_id) {
        $vacancy = new vacancies();
        $vacancy->id =$id;
        $vacancy->title = $title;
        $vacancy->text = $text;
        $vacancy->short_text = $short_text;
        $vacancy->salary= $salary;
        $vacancy->address = $address;
        $vacancy->Email = $email;
        $vacancy->Telephone = $telephone;
        $vacancy->data = $data;
        $vacancy->user_id = $user_id;
        $vacancy->save();
    }
}
