<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property string $title Заголовок Резюме
 * @property string $text Текст Резюме
 * @property string $short_text Текст Резюме
 * @property string $address Адресса
 * @property string $Email емейл
 * @property string $Telephone телефон
 * @property string $data Дата Резюме
 * @property string $user_id кто создал
 * @property int $id айді Резюме
 */
class resumes extends Model
{
    public static $tableName = 'resumes';
    public static function AddResumes($title, $text, $short_text, $email, $telephone, $data, $user_id) {
        $resume = new resumes();
        $resume->title = $title;
        $resume->text = $text;
        $resume->short_text = $short_text;
        $resume->Email = $email;
        $resume->Telephone = $telephone;
        $resume->data = $data;
        $resume->user_id = $user_id;
        $resume->save();
    }
    public static function UpdateResume($id,$title, $text, $short_text, $email, $telephone, $data, $user_id) {
        $resume = new resumes();
        $resume->id = $id;
        $resume->title = $title;
        $resume->text = $text;
        $resume->short_text = $short_text;
        $resume->Email = $email;
        $resume->Telephone = $telephone;
        $resume->data = $data;
        $resume->user_id = $user_id;
        $resume->save();
    }

}