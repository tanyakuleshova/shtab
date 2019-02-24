<?php

class NewsController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new All_news();
    }

    public function index()
    {
        $this->data['rows'] = $this->model->getNews();
        $this->data['last_row'] = $this->model->getLastNews();
    }

    public function view(){
        $params = Dispatcher::$params;

        if ( isset($params[0]) ){
            $id = $params[0];
            $this->data['individual_rows'] = $this->model->getById($id);
        }

        $this->data['rows'] = $this->model->getNews();

    }
}

