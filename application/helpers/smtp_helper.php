<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function mailer($param) {
    // after prepare library and helper
    // $ci->email->clear();
    // API smtp helper
    $ci=& get_instance();
    $ci->load->library('email');
    $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'anakmascreative@gmail.com',
        'smtp_pass' => 'semangkamerah1',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1',
        'wordwrap'  => TRUE
    );
    $ci->email->initialize($config);
    $message = $ci->load->view('ad-min/email/no-reply-tpl', $param, TRUE);
    $ci->email->set_newline("\r\n");
    // $ci->email->from('no-reply@'.$param['domain'].'', $param['brand']);
    $ci->email->from('anakmascreative@gmail.com');
    $ci->email->to($param['replyTo']);
    $ci->email->subject($param['subject']);
    $ci->email->message($message);
    if ($ci->email->send()){
        $result = array('status' => true, 'message' => 'Berhasil, mengirim pesan');
    } else {
        $result = array('status' => false, 'message' => 'Have problem occoured '.$ci->email->print_debugger());
    }
    return $result;
}