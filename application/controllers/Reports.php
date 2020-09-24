<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "reports_v";
        $this->load->model("reports_model");
        $this->load->model("users_model");

       if (!get_active_user()){
           redirect(base_url("login"));
       }
    }

    public function index()
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $user = $this->session->userdata("user");
        $viewData->datas = $this->reports_model->getAll(array("userId" => $user->Id));
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
        $viewData->subViewFolder = "update";
        $viewData->item = $this->reports_model->get(array("Id" => $id));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    
    public function save()
    {
        $user = $this->session->userdata("user");
        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("report_detail", "Detay", "required|trim");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "userId" => $user->Id,
                "report_detail" => $this->input->post("report_detail"),
                "title" => $this->input->post("title"),
                "isActive" => 1,
                "createdAt" => date("Y-m-d"),
            );

            $insert = $this->reports_model->add($data);

            if ($insert) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt Başarılı Bir Şekilde Eklendi.",
                    "type" => "success"
                );

            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme Sırasında Hata Meydana Geldi.",
                    "type" => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("reports"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }
    }

    public function update($id)
    {
        $item = $this->reports_model->get(array("Id" => $id));
        $user = $this->session->userdata("user");
        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("report_detail", "Detay", "required|trim");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "userId" => $user->Id,
                "report_detail" => $this->input->post("report_detail"),
                "title" => $this->input->post("title"),
                "isActive" => 1,
                "updatedAt" => date("Y-m-d"),
            );

            $update = $this->reports_model->update(
                array(
                    "Id" => $id
                ),
                $data);

            if ($update) {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt Başarılı Bir Şekilde Güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme Sırasında Hata Meydana Geldi.",
                    "type" => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("reports"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->reports_model->get(array("Id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {
        $delete = $this->reports_model->update(array(
            "Id" => $id
        ),array("isActive" => 0));

        if ($delete) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt Başarılı Bir Şekilde Sistemden Kaldırıldı.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Silme Sırasında Hata Meydana Geldi.",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("reports"));
    }
}
