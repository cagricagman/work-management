<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";
        $this->load->model("users_model");

//        if (!get_active_user()){
//            redirect(base_url("login"));
//        }
    }

    public function index()
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->datas = $this->users_model->getAll();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

    public function add_form()
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

    public function edit_form($id)
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "edit";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
}
