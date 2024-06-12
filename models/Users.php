<?php

namespace models;

use core\Core;
use core\Model;
use Couchbase\User;

/**
 * @property string $login Логін
 * @property string $password Пароль
 * @property string $firstname Ім'я
 * @property string $lastname Прізвище
 * @property int $id айді оголошення
 */
class Users extends Model
{
    public static $tableName = 'users';
    public static function FindByLoginAndPassword($login, $password){
        $rows = self::findByCondition(['login' => $login, 'password' => $password]);
        if (!empty($rows)){
            return $rows[0];
        } else
            return null;

    }
    public static function FindByLogin($login){
        $rows = self::findByCondition(['login' => $login]);
        if (!empty($rows)){
            return $rows[0];
        } else
            return null;

    }
    public static function IsUserLogged()
    {
        return !empty(Core::get()->session->get('user'));
    }
    public static function LoginUser($user){
        Core::get()->session->set('user',$user);
    }
    public static function LogoutUser(){
        Core::get()->session->remove('user');
    }
    public static function hashPassword($password)
    {
        return md5($password);
    }

    public static function RegisterUser($login,$password,$firstname,$lastname){
        $user = new Users();
        $user->login = $login;
        $user->password = self::hashPassword($password);
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->save();
    }
}
