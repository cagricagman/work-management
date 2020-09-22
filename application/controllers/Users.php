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
    
    public function save()
    {
        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim|is_unique[users.username]");
        $this->form_validation->set_rules("fullname", "Ad Soyad", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Parola", "required|trim|min_length[6]|max_length[25]");
        $this->form_validation->set_rules("re_password", "Parola Tekrar", "required|trim|min_length[6]|max_length[25]|matches[password]");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
            "valid_email" => "<strong>{field}</strong> Geçerli Şekilde Girilmedi.",
            "is_unique" => "<strong>{field}</strong> Alanı Sistemde Kayıtlı.",
            "matches" => "Şifreler Uyuşmamaktadır. Lütfen Kontrol Edip Tekrar Giriniz.",
            "min_length" => "Lütfen En Az 6 Karakter Giriniz.",
            "max_length" => "Lütfen En Fazla 25 Karakter Giriniz."
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "username" => $this->input->post("username"),
                "fullname" => $this->input->post("fullname"),
                "email" => $this->input->post("email"),
                "password" => md5($this->input->post("password")),
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:m:s"),
            );

            $insert = $this->users_model->add($data);

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
            redirect(base_url("users"));

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
        $item = $this->users_model->get(array("id" => $id));

        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        if ($item->username != $this->input->post("username")) $this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim|is_unique[users.username]");

        if ($item->email != $this->input->post("email")) $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email|is_unique[users.email]");

        $this->form_validation->set_rules("fullname", "Ad Soyad", "required|trim");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
            "valid_email" => "<strong>{field}</strong> Geçerli Şekilde Girilmedi.",
            "is_unique" => "<strong>{field}</strong> Alanı Sistemde Kayıtlı."
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "username" => $this->input->post("username"),
                "email" => $this->input->post("email"),
                "fullname" => $this->input->post("fullname")
            );

            $update = $this->users_model->update(
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

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->users_model->get(array("Id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_password($id)
    {
        $item = $this->users_model->get(array("Id" => $id));

        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("password", "Parola", "required|trim|min_length[6]|max_length[25]");
        $this->form_validation->set_rules("re_password", "Parola Tekrar", "required|trim|min_length[6]|max_length[25]|matches[password]");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
            "matches" => "Şifreler Uyuşmamaktadır. Lütfen Kontrol Edip Tekrar Giriniz.",
            "min_length" => "Lütfen En Az 6 Karakter Giriniz.",
            "max_length" => "Lütfen En Fazla 25 Karakter Giriniz."
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "password" => md5($this->input->post("password"))
            );

            $update = $this->users_model->update(
                array(
                    "Id" => $id
                ),
                $data);

            if ($update) {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Şifre Başarılı Bir Şekilde Güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Şifre Güncelleme Sırasında Hata Meydana Geldi.",
                    "type" => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $this->users_model->get(array("Id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {
        $delete = $this->users_model->delete(array(
            "Id" => $id
        ));

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
        redirect(base_url("users"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $update = $this->users_model->update(
                array("Id" => $id),
                array("isActive" => $isActive)
            );

            echo $isActive;
        }
    }
}
