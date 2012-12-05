<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of send_email
 *
 * @author Wesam Gerges
 */
class Send_email extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("send_email_model");
    }

    function index() 
    {
        $data['Meetings'] = $this->send_email_model->getAllMeetings();
        $data['weeklyMeetings'] = $this->send_email_model->getWeeklyMeetings($data['Meetings'][0]->Id);
        $this->load->view("sendemail", $data);
    }

    function getMembers() {
       
        switch ($this->input->post("group")) {
            case 'Members':
                if (isset($_POST["subgroup"]["absence"])) {
                    $data['Members'] = $this->send_email_model->getabsence();
                    $this->load->view("build_list", $data);
                }

                if (isset($_POST["subgroup"]["Attenance"])) {
                    $data['Members'] = $this->send_email_model->getAttendees();
                    $this->load->view("build_list", $data);
                }

                break;
            case 'Servants':
                $data['Members'] = $this->send_email_model->getServants();
                $this->load->view("build_list", $data);
                break;
        }
    }
}

?>
