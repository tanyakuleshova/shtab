<?php

class MainController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Main_page();
    }

    public function index()
    {
        // $this->data['rows'] = $this->model->get_last_news();
        $this->data['last_news'] = $this->model->get_last_news();
        $this->data['all_news'] = $this->model->getNews();
        $this->data['all_investigation'] = $this->model->getInvestigations();
        $this->data['last_investigation'] = $this->model->get_last_investigation();
    }

}