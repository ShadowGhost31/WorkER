<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\resumes;
use models\Users;
use models\vacancies;

class VacanciesController extends Controller
{
    public function actionAdd(){
        $logger_user = Core::get()->session->get('user');
        $id = $logger_user['id'];
        if ($this->isPost)
        {
            if (strlen($this->post->title) === 0) {
                $this->addErrorMessage('Назва не вказана');
            } elseif (strlen($this->post->title) > 25) {
                $this->addErrorMessage('Назва занадто довга. Максимальна довжина - 25 символів');
            }
            if (strlen($this->post->text) === 0) {
                $this->addErrorMessage('Текст не вказано');
            }
            if (strlen($this->post->short_text) === 0) {
                $this->addErrorMessage('Короткий текст не вказано');
            } elseif (strlen($this->post->short_text) > 60) {
                $this->addErrorMessage('Короткий текст занадто довгий. Максимальна довжина - 60 символів');
            }
            if (strlen($this->post->address) === 0) {
                $this->addErrorMessage('Адреса не вказана');
            }
            if (strlen($this->post->text) < 50) {
                $this->addErrorMessage('Текст занадто короткий. Мінімальна довжина - 50 символів');
            }
            if (strlen($this->post->salary) === 0) {
                $this->addErrorMessage('Заробітна плата не вказана');
            } elseif (!is_numeric($this->post->salary) || $this->post->salary > 2147483647) {
                $this->addErrorMessage('Некоректне значення для заробітної плати');
            }
            if (strlen($this->post->telephone) === 0) {
                $this->addErrorMessage('Телефон не вказано');
            } elseif (!preg_match('/^\+?\d{10,}$/', $this->post->telephone)) {
                $this->addErrorMessage('Некоректний формат телефону');
            }
            if (!$this->isErrorMessagesExists()){

                Vacancies::AddVacantion(
                    $this->post->title,
                    $this->post->text,
                    $this->post->short_text,
                    $this->post->salary,
                    $this->post->address,
                    $this->post->email,
                    $this->post->telephone,
                    date("Y-m-d H:i:s"),
                    $id
                );
                return $this->redirect('/vacancies/myvacancies');
            }
        }
        return $this->render();

    }
    public function actionEdit($params){
        $logger_user = Core::get()->session->get('user');
        $id = $logger_user['id'];
        if ($this->isPost)
        {
            if (strlen($this->post->title) === 0) {
                $this->addErrorMessage('Назва не вказана');
            } elseif (strlen($this->post->title) > 25) {
                $this->addErrorMessage('Назва занадто довга. Максимальна довжина - 25 символів');
            }
            if (strlen($this->post->text) === 0) {
                $this->addErrorMessage('Текст не вказано');
            }
            if (strlen($this->post->short_text) === 0) {
                $this->addErrorMessage('Короткий текст не вказано');
            } elseif (strlen($this->post->short_text) > 120) {
                $this->addErrorMessage('Короткий текст занадто довгий. Максимальна довжина - 60 символів');
            }
            if (strlen($this->post->address) === 0) {
                $this->addErrorMessage('Адреса не вказана');
            }
            if (strlen($this->post->text) < 50) {
                $this->addErrorMessage('Текст занадто короткий. Мінімальна довжина - 50 символів');
            }
            if (strlen($this->post->salary) === 0) {
                $this->addErrorMessage('Заробітна плата не вказана');
            } elseif (!is_numeric($this->post->salary) || $this->post->salary > 2147483647) {
                $this->addErrorMessage('Некоректне значення для заробітної плати');
            }
            if (strlen($this->post->telephone) === 0) {
                $this->addErrorMessage('Телефон не вказано');
            } elseif (!preg_match('/^\+?\d{10,}$/', $this->post->telephone)) {
                $this->addErrorMessage('Некоректний формат телефону');
            }
            if (!$this->isErrorMessagesExists()){
                vacancies::deleteById($params[0]);

                $ids = $params[0];
                Vacancies::UpdateVacantion(
                    $ids,
                    $this->post->title,
                    $this->post->text,
                    $this->post->short_text,
                    $this->post->salary,
                    $this->post->address,
                    $this->post->email,
                    $this->post->telephone,
                    date("Y-m-d H:i:s"),
                    $id
                );
                return $this->redirect('/vacancies/myvacancies');
            }
        }
        $conf = Vacancies::findById($params[0]);
        $this->template->setParams($conf);
        return $this->render();
    }
    public function actionMyvacancies(){
        $logger_user = Core::get()->session->get('user');
        $id = $logger_user['id'];
        $condition = array('user_id' => $id);
        $resume = vacancies::findByCondition($condition);
        if (!$resume) {
            $this->addErrorMessage('У вас немає створених вакансій');
            return $this->redirect('/vacancies/add');
        }
        $this->template->setParams(vacancies::findByCondition($condition));
        return $this->render();
    }
    public function actionDelete($params)
    {
        $id = $params[0];
        vacancies::deleteById($id);
        $this->addErrorMessage('Вакансія було успішно видалено');
        $logger_user = Core::get()->session->get('user');
        $ids = $logger_user['id'];
        return $this->redirect('/vacancies');
    }
    public function actionIndex(){
        if ($this->isPost){
            $this->template->setParams(vacancies::SortBy($this->post->order,$this->post->sort));
        }
        else
            $this->template->setParams(vacancies::findAll());
            return $this->render();
    }
    public function actionView($params){
        $this->template->setParams(vacancies::findById($params[0]));
          return $this->render();
    }
    public function actionError(){
        echo 'error';
    }
}