<?php
class AboutController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Team();
        $this->news_model = new All_news();
    }

    public function index()
    {
        $this->data['members_rows'] = $this->model->get_members_info();
        $this->data['volunteers_rows'] = $this->model->get_volunteers_info();
        $this->data['news_rows'] = $this->news_model->getNews();

    }
}