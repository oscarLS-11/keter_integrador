<?php
class PlantaC extends CI_Controller{

    //funcion ver pantalla principal
    public function show(){
       $this->load->model('PlantaM');
        $data['plantas'] = $this->PlantaM->getPlantas();
        
        $this->load->view('headersAdmin/head.php');
        $this->load->view('headersAdmin/menu.php');
        $this->load->view('plantas/listaPlanta.php', $data);
        $this->load->view('headersAdmin/footer.php');
    }


//funcion agregar planta
public function insertPlanta(){
    $this->load->model('PlantaM');
    //informacion de otra tabla linea 20
    $data['administradores'] = $this->PlantaM->getAdmin();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nombre', 'nombre', 'required');
    
    if ($this->form_validation->run() == FALSE){
        $this->load->view('headersAdmin/head.php');
        $this->load->view('headersAdmin/menu.php');
        $this->load->view('plantas/insertPlanta.php', $data);
        $this->load->view('headersAdmin/footer.php');
}
else{
    $this->PlantaM->insertPlanta();
    redirect(base_url('index.php/PlantaC/show'), 'refresh');
    }
}

//funcion borrar Planta
    public function borrarPlanta($id_Planta){
        $this->load->model('PlantaM');
        if($data['planta'] = $this->PlantaM->deletePlanta($id_Planta)){
            redirect(base_url('index.php/PlantaC/show'), 'refresh');
        }
    }           
        //$data['administradores'] = $this->PlantaM->getAdmin();

    public function updatePlanta($id_Planta){
        $this->load->model('PlantaM');
        $data['planta'] = $this->PlantaM->getPlanta($id_Planta);
        $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre', 'nombre', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('headersAdmin/head.php');
            $this->load->view('headersAdmin/menu.php');
            $this->load->view('plantas/updatePlanta',$data);
            $this->load->view('headersAdmin/footer.php');
        } else{
            $this->PlantaM->updatePlanta($id_Planta);
            redirect(base_url('index.php/PlantaC/show'), 'refresh');
        }
    }
}
?>