<?php

function convertToSEO($text)
{
    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "{", "}", "[", "]");
    $convert = array("c", "C", "g", "G", "u", "U", "o", "O", "i", "I", "s", "S", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}

function get_readable_date($date)
{
    return strftime('%e %B %Y', strtotime($date));
}

function get_active_user()
{
    $t = &get_instance();
    $user = $t->session->userdata("user");
    if ($user)
        return true;
    else
        return false;
}

function get_user(){
    $t = &get_instance();
    $user = $t->session->userdata("user");
    if ($user != null)
        return $user;
    else
        return "Kullanıcı Bilgisi Yok";
}

function send_mail($toEmail = "", $subject = "", $message = ""){
    $t = &get_instance();

    $t->load->model("emailsettings_model");

    $email_setting = $t->emailsettings_model->get(array("isActive" => 1));

    $config = array(
        "protocol" => $email_setting->protocol,
        "smtp_host" => $email_setting->host,
        "smtp_port" => $email_setting->port,
        "smtp_user" => $email_setting->user,
        "smtp_pass" => $email_setting->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );

    $t->load->library("email",$config);

    $t->email->from($email_setting->from,$email_setting->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    return $t->email->send();

}

function dbGetUserInfo($userId)
{
    $t = &get_instance();
    $t->load->model("users_model");

    $user = $t->users_model->get(array("Id" => $userId));

    if($user != null){
        return $user;
    } else {
        return "Kayıtlarda Yok";
    }
}