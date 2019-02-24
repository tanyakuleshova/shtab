<?php
class InvestigationsController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Shtab_investigations();
    }

    public function index()
    {
        $this->data['rows'] = $this->model->getInvestigations();
        $this->data['last_row'] = $this->model->getLastInvestigation();
    }

    public function view()
    {
        $params = Dispatcher::$params;
        if ( isset($params[0]) ){
            $id = $params[0];
            $this->data['individual_rows'] = $this->model->getById($id);
        }
        $this->data['rows'] = $this->model->getInvestigations();
    }
}