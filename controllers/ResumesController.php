<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\resumes;
use models\vacancies;

class ResumesController extends Controller
{

    public function actionAdd(){
        $logger_user = Core::get()->session->get('user');
        $id = $logger_user['id'];
        if ($this->isPost)
        {
            if (strlen($this->post->title) === 0) {
                $this->addErrorMessage('Професія/Назва резюме не вказана');
            } elseif (strlen($this->post->title) > 25) {
                $this->addErrorMessage('Професія/Назва занадто довга. Максимальна довжина - 25 символів');
            }
            if (strlen($this->post->text) === 0) {
                $this->addErrorMessage('Текст не вказано');
            }
            if (strlen($this->post->short_text) === 0) {
                $this->addErrorMessage('Короткий опис не вказано');
            } elseif (strlen($this->post->short_text) > 60) {
                $this->addErrorMessage('Короткий опис занадто довгий. Максимальна довжина - 60 символів');
            }
            if (strlen($this->post->text) < 50) {
                $this->addErrorMessage('Текст занадто короткий. Мінімальна довжина - 50 символів');
            }
            if (strlen($this->post->telephone) === 0) {
                $this->addErrorMessage('Телефон не вказано');
            } elseif (!preg_match('/^\+?\d{10,}$/', $this->post->telephone)) {
                $this->addErrorMessage('Некоректний формат телефону');
            }
            if (!$this->isErrorMessagesExists()){

                resumes::AddResumes(
                    $this->post->title,
                    $this->post->text,
                    $this->post->short_text,
                    $this->post->email,
                    $this->post->telephone,
                    date("Y-m-d H:i:s"),
                    $id
                );
                return $this->redirect('/resumes/myresume');
            }
        }

        return $this->render();
    }

    public function actionMyresume(){
        $logger_user = Core::get()->session->get('user');
        $id = $logger_user['id'];
        $resume = resumes::findByUId($id);
        if (!$resume) {
            return $this->redirect('/resumes/add');
        }
        if ($this->isPost)
        {
            if (strlen($this->post->title) === 0) {
                $this->addErrorMessage('Професія/Назва резюме не вказана');
            } elseif (strlen($this->post->title) > 25) {
                $this->addErrorMessage('Професія/Назва занадто довга. Максимальна довжина - 25 символів');
            }
            if (strlen($this->post->text) === 0) {
                $this->addErrorMessage('Текст не вказано');
            }
            if (strlen($this->post->short_text) === 0) {
                $this->addErrorMessage('Короткий опис не вказано');
            } elseif (strlen($this->post->short_text) > 60) {
                $this->addErrorMessage('Короткий опис занадто довгий. Максимальна довжина - 60 символів');
            }
            if (strlen($this->post->text) < 50) {
                $this->addErrorMessage('Текст занадто короткий. Мінімальна довжина - 50 символів');
            }
            if (strlen($this->post->telephone) === 0) {
                $this->addErrorMessage('Телефон не вказано');
            } elseif (!preg_match('/^\+?\d{10,}$/', $this->post->telephone)) {
                $this->addErrorMessage('Некоректний формат телефону');
            }
            if (!$this->isErrorMessagesExists()){
                resumes::deleteByUId($id);

                $ids = '0';
                resumes::UpdateResume(
                    $ids,
                    $this->post->title,
                    $this->post->text,
                    $this->post->short_text,
                    $this->post->email,
                    $this->post->telephone,
                    date("Y-m-d H:i:s"),
                    $id
                );
                return $this->redirect('/resumes/myresume');
            }
        }
        $conf = resumes::findByUId($id);
        $this->template->setParams($conf);
        return $this->render();
    }
    public function actionDelete($params)
    {
        $id = $params[0];
        resumes::deleteById($id);
        $this->addErrorMessage('Резюме було успішно видалено');
        $logger_user = Core::get()->session->get('user');
        $ids = $logger_user['id'];
        return $this->redirect('/resumes');
    }
    public function actionIndex(){
        $this->template->setParams(resumes::findAll());
        return $this->render();
    }
    public function actionView($params){
        $this->template->setParams(resumes::findById($params[0]));
        return $this->render();
    }
}