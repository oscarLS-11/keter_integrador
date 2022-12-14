<?php

    class QuimicoColorC extends CI_Controller
    {
        public function show($id_Color){
            $this->load->model('QuimicoColorM');
            $data['quimicos'] = $this->QuimicoColorM->getQuimicoColores($id_Color);
            $this->load->view('headers/head.php');
            $this->load->view('headers/menu.php');
            $this->load->view('quimicoColor/listaQuimicoColor.php', $data);
            $this->load->view('headers/footer.php');
        }

        //inserción de quimicoColor
        public function insertQuimicoColor(){
            $this->load->model('QuimicoColorM');
            $data['colores'] = $this->QuimicoColorM->getColores();
            $data['quimicos'] = $this->QuimicoColorM->getQuimicos();

            $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('cantidadUsar', 'cantidadUsar', 'required');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('headers/head.php');
                    $this->load->view('headers/menu.php');
                    $this->load->view('quimicoColor/insertQuimicoColor', $data);
                    $this->load->view('headers/footer.php');
                } else{
                    $this->QuimicoColorM->insertQuimicoColor();
                    redirect(base_url('index.php/ColoresC/show'), 'refresh');
                }
        }

        //borrar quimico
        public function borrarQuimicoColor($id_Quimico){
            $this->load->model('QuimicoColorM');
            if($data['quimicos'] = $this->QuimicoColorM->deleteQuimicoColor($id_Quimico)){
                redirect(base_url('index.php/QuimicoColorC/show'), 'refresh');
            }
        }
    }

?>