<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\resumes;
use models\Users;
use core\Template;

class UsersController extends Controller
{
    public function actionLogin()
    {
        if (Users::IsUserLogged())
            return $this->redirect('/');
        if ($this->isPost){
            $user = Users::FindByLoginAndPassword($this->post->login,$this->post->password);
            if (!empty($user)){
                Users::LoginUser($user);
                return $this->redirect('/');
            } else
                $this->addErrorMessage('Неправильний логін та/або пароль');

        }
        return $this->render();
    }
    public function actionRegister()
    {
        if ($this->isPost){
            $user = Users::FindByLogin($this->post->login);
            if (!empty($user)){
                $this->addErrorMessage('Користувач з таким логіном вже існує');
            }
            if ($this->post->password != $this->post->password2){
                $this->addErrorMessage('Паролі не співпадають');
            }
            if (strlen($this->post->login)=== 0){
                $this->addErrorMessage('Логін не вказано');
            }
            if (strlen($this->post->password) === 0){
                $this->addErrorMessage('Пароль не вказано');
            }
            if (strlen($this->post->password) < 6) {
                $this->addErrorMessage('Пароль повинен містити принаймні 6 символів');
            }
            if (strlen($this->post->password2)=== 0){
                $this->addErrorMessage('Пароль (Ще раз) не вказано');
            }
            if (strlen($this->post->lastname)=== 0){
                $this->addErrorMessage('Прізвище не вказано');
            }
            if (strlen($this->post->firstname)=== 0){
                $this->addErrorMessage('Ім\' не вказано');
            }
            if (!$this->isErrorMessagesExists()){
                Users::RegisterUser($this->post->login,$this->post->password,$this->post->firstname,$this->post->lastname);
                return $this->redirect('/users/registersuccess');
            }
        }
        return $this->render();
    }
    public function actionRegistersuccess(){
        return $this->render();
    }
    public function actionLogout(){
        Users::LogoutUser();
        return $this->redirect('/users/login');
    }

}