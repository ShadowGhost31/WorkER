<?php

namespace controllers;

use core\Controller;
use core\Template;
use models\resumes;
use models\vacancies;

class SiteController extends Controller
{

    public function actionIndex(){
        $this->template->setParams(vacancies::findAll());
        return $this->render();
    }
    public function actionError(){
        echo 'error';
    }
}