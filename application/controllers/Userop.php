<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userop extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "userop_v";
        $this->load->model("users_model");

    }

    public function login()
	{
        if (get_active_user()) {
            redirect(base_url());
        }
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

    public function edit_form($id)
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $this->users_model->get(array("Id" => $id));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function password_form($id)
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $this->users_model->get(array("Id" => $id));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    
    public function do_login()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("password", "Parola", "required|trim");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $user = $this->users_model->get(array(
                "username" => $this->input->post("username"),
                "password" => md5($this->input->post("password")),
                "isActive" => 1,
            ));

            if ($user) {

                $alert = array(
                    "title" => "Giriş Başarılı",
                    "text" => "Sayın $user->fullname Hoşgeldiniz.",
                    "type" => "success"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url());

            } else {

                $alert = array(
                    "title" => "Giriş Başarısız",
                    "text" => "Kullanıcı Adı Ya da Parola Hatalı. Bilgilerinizi Kontrol Edip Tekrar Deneyin.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }


        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user");

        redirect(base_url("login"));
    }
}
