<?php
class Evaluate extends Controller {
    public $model_evaluate;

    public function __construct(){
        $this->model_evaluate = $this->model("EvaluateModel");
    }

    public function getLastestEvaluate(){
        $lastestEvaluate = $this->model_evaluate-> getLastest();
        $this->data['sub_content']['title']='List Lastest Answers';
        $this->data['sub_content']['lastest_evaluate'] = $lastestEvaluate;
        $this->data['content'] ='evaluate/evaluate';
        $this->render('layouts/client_layout', $this->data);
    }
}