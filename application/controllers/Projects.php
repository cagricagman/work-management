<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public $viewFolder = "";

    //TODO PROJE KLASÖR ADINI DEĞİŞTİRMESİYLE İLGİLİ UPLOAD KISMINDA ONU GÖNDERMEMEK LAZIM
	public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "projects_v";
        $this->load->model("projects_model");
        $this->load->model("notes_model");
        $this->load->model("images_model");
        $this->load->model("files_model");
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
        $viewData->datas = $this->projects_model->getAll(array("isActive" => 1));
        $viewData->users = $this->users_model->getAll(array("isActive" => 1));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

    public function add_form()
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->users = $this->users_model->getAll(array("isActive" => 1));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

    public function edit_form($id)
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $this->projects_model->get(array("Id" => $id));
        $viewData->users = $this->users_model->getAll(array("isActive" => 1));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function detail_form($project_Id)
	{
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "detail";
        $viewData->project = $this->projects_model->get(array("Id" => $project_Id));
        $images = $this->images_model->getAll(array("project_Id" => $project_Id));
        $files = $this->files_model->getAll(array("project_Id" => $project_Id));

        $fileUploadDatas = array();
        foreach($images as $image){
            $fileUploadData = array(
                "Id" => $image->Id,
                "url" => $image->url,
                "project_Id" => $image->project_Id,
                "createdUserId" => $image->createdUserId,
                "createdAt" => $image->createdAt,
                "type" => "image"
            );
            array_push($fileUploadDatas,$fileUploadData);
        }

        foreach($files as $files){
            $fileUploadData = array(
                "Id" => $files->Id,
                "url" => $files->url,
                "project_Id" => $files->project_Id,
                "createdUserId" => $files->createdUserId,
                "createdAt" => $files->createdAt,
                "type" => "file"
            );
            array_push($fileUploadDatas,$fileUploadData);
        }

        $viewData->uploads = $fileUploadDatas;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    
    public function save()
    {
        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("title", "Proje Başlığı", "required|trim");
        $this->form_validation->set_rules("start_date", "Başlama Tarihi", "required|trim");
        $this->form_validation->set_rules("title", "Proje Başlığı", "required|trim|is_unique[projects.title]");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "title" => $this->input->post("title"),
                "start_date" => ($this->input->post("start_date") != null) ?  date("Y-m-d H:i:s",strtotime($this->input->post("start_date"))) : null,
                "finish_date" => ($this->input->post("finish_date") != null) ?  date("Y-m-d H:i:s",strtotime($this->input->post("finish_date"))) : null,
                "incumbents" => json_encode($this->input->post("incumbents")),
                "priority_status" => $this->input->post("priority_status"),
                "status" => $this->input->post("status"),
                "folder_name" => convertToSEO($this->input->post("title")),
                "note" => $this->input->post("note"),
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:m:s"),
            );

            $insert = $this->projects_model->add($data);

            if ($insert) {

                $path = "uploads/projects/".convertToSEO($this->input->post("title"));
                mkdir($path, 0755);
                
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
            redirect(base_url("projects"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->users = $this->users_model->getAll(array("isActive" => 1));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }
    }

    public function update($id)
    {
        $item = $this->projects_model->get(array("Id" => $id));
        $this->load->library("form_validation");

        //Kurallar Tanımlanıyor.

        $this->form_validation->set_rules("title", "Proje Başlığı", "required|trim");
        $this->form_validation->set_rules("start_date", "Başlama Tarihi", "required|trim");
        if($item->title != $this->input->post("title")) $this->form_validation->set_rules("title", "Proje Başlığı", "required|trim|is_unique[projects.title]");

        $this->form_validation->set_message(array(
            "required" => "<strong>{field}</strong> Alanı Boş Geçilemez.",
        ));

        $validate = $this->form_validation->run();

        if ($validate) {

            if($item->title != $this->input->post("title")){
                $data = array(
                    "title" => $this->input->post("title"),
                    "start_date" => ($this->input->post("start_date") != null) ?  date("Y-m-d H:i:s",strtotime($this->input->post("start_date"))) : null,
                    "finish_date" => ($this->input->post("finish_date") != null) ?  date("Y-m-d H:i:s",strtotime($this->input->post("finish_date"))) : null,
                    "incumbents" => json_encode($this->input->post("incumbents")),
                    "priority_status" => $this->input->post("priority_status"),
                    "status" => $this->input->post("status"),
                    "folder_name" => convertToSEO($this->input->post("title")),
                    "note" => $this->input->post("note"),
                    "updatedAt" => date("Y-m-d H:m:s"),
                );
                $folderPath = "uploads/projects";
                rename($folderPath . "/" . $item->folder_name,$folderPath . "/". convertToSEO($this->input->post("title")));
            } else {
                $data = array(
                    "start_date" => ($this->input->post("start_date") != null) ?  date("Y-m-d H:i:s",strtotime($this->input->post("start_date"))) : null,
                    "finish_date" => ($this->input->post("finish_date") != null) ?  date("Y-m-d H:i:s",strtotime($this->input->post("finish_date"))) : null,
                    "incumbents" => json_encode($this->input->post("incumbents")),
                    "priority_status" => $this->input->post("priority_status"),
                    "status" => $this->input->post("status"),
                    "note" => $this->input->post("note"),
                    "updatedAt" => date("Y-m-d H:m:s"),
                );
            }

            $update = $this->projects_model->update(
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

            redirect(base_url("projects"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->users = $this->users_model->getAll(array("isActive" => 1));
            $viewData->item = $this->projects_model->get(array("Id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {
        $delete = $this->projects_model->update(array(
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
        redirect(base_url("projects"));
    }

    /**FILE UPLOAD İŞLEMLERİ BAŞLANGIÇ**/

    public function file_upload($project_Id)
    {
        $user = get_user();

        $project = $this->projects_model->get(array("Id" => $project_Id));

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        
        $fileType = getFileType(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        $path = "uploads/projects/$project->folder_name";

        $config["allowed_types"] = "*";
        $config["upload_path"] = $path;
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if ($upload) {

            $uploaded_file = $this->upload->data("file_name");

            $modelName = ($fileType == "image") ? "images_model" : "files_model";

            $this->$modelName->add(array(
                "url" => "{$config["upload_path"]}/$uploaded_file",
                "project_Id" => $project_Id,
                "createdUserId" => $user->Id,
                "createdAt" => date("Y-m-d H:i:s")
            ));


        } else {

            echo "İşlem Başarısız";

        }
    }

    public function refresh_file_list($project_Id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "detail";

        $viewData->project = $this->projects_model->get(array("Id" => $project_Id));
        $images = $this->images_model->getAll(array("project_Id" => $project_Id));
        $files = $this->files_model->getAll(array("project_Id" => $project_Id));

        $fileUploadDatas = array();
        foreach($images as $image){
            $fileUploadData = array(
                "Id" => $image->Id,
                "url" => $image->url,
                "project_Id" => $image->project_Id,
                "createdUserId" => $image->createdUserId,
                "createdAt" => $image->createdAt,
                "type" => "image"
            );
            array_push($fileUploadDatas,$fileUploadData);
        }

        foreach($files as $files){
            $fileUploadData = array(
                "Id" => $files->Id,
                "url" => $files->url,
                "project_Id" => $files->project_Id,
                "createdUserId" => $files->createdUserId,
                "createdAt" => $files->createdAt,
                "type" => "file"
            );
            array_push($fileUploadDatas,$fileUploadData);
        }

        $viewData->uploads = $fileUploadDatas;

        $render = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list_v", $viewData, true);
        echo $render;
    }

    public function fileDelete($project_Id,$Id,$type)
    {
        $modelName = ($type == "image") ? "images_model" : "files_model";

        $delete = $this->$modelName->delete(array(
            "Id" => $id,
            "project_Id" => $project_Id
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
        redirect(base_url("projects/detail_form/$project_Id"));
    }

    /**FILE UPLOAD İŞLEMLERİ BİTİŞ**/
}
