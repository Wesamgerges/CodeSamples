<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of attendance
 *
 * @author WESAM GERGES
 */
class Attendance extends CI_Controller{
    
    function index()
    {
     $this->load->model("attendance_model")   ;
     $data['persons'] = $this->attendance_model->getMembers();
     $this->load->view('easy_attendance',$data);
    }
}

?>
