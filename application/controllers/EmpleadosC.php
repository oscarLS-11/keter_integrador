<?php

class EmpleadosC extends CI_Controller
{
    //Prueva
    public function dinamico(){
        parent::dinamico();
        $this->load->model('EmpleadosM');
    }
    function index(){
        $data['countru'] = $this->EmpleadosM->Dependinamico();
        $this->load->view('dinamico',$data);
    }
    //Prueva
    //vista general
    public function show(){
        $this->load->model('EmpleadosM');
        $data['empleados'] = $this->EmpleadosM->getEmpleados();

        $this->load->view('headers/head.php');
        $this->load->view('headers/menu.php');
        $this->load->view('empleados/listaEmpleados.php', $data);
        $this->load->view('headers/footer.php');
    }
    //funcion del boton ver
    public function detalleEmpleado($id_Empleado ){
        $this->load->model('EmpleadosM');
        $data['empleado'] = $this->EmpleadosM->getEmpleado($id_Empleado);

        $this->load->view('headers/head.php');
        $this->load->view('headers/menu.php');
        $this->load->view('empleados/detalleEmpleado.php', $data);
        $this->load->view('headers/footer.php');
    }
    //funcion del boton de agregar
    public function insertEmpleado(){
        $this->load->model('EmpleadosM');
        $data['puestos'] = $this->EmpleadosM->getPuestos();
        //$data1['plantaId'] = $this->EmpleadosM->getPlantaId();
        
        $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre', 'id_Puesto', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('headers/head.php');
                $this->load->view('headers/menu.php');
                $this->load->view('empleados/insertEmpleado',$data);                
                $this->load->view('headers/footer.php');

            } else{
                $this->EmpleadosM->insertEmpleado();
                redirect(base_url('index.php/EmpleadosC/show'), 'refresh');
            }
    }
    //funcion para borrar un registro
    public function borrarEmpleado($id_Empleado){
        $this->load->model('EmpleadosM');
        if($data['empleado'] = $this->EmpleadosM->deleteEmpleado($id_Empleado)){
            redirect(base_url('index.php/EmpleadosC/show'), 'refresh');
        }
    }
    


    //funcion para actualizar la informacion
    public function updateEmpleado($id_Empleado){
        $this->load->model('EmpleadosM');
        $data['puestos'] = $this->EmpleadosM->getPuestos();
        $data['empleado'] = $this->EmpleadosM->getEmpleado($id_Empleado);
        $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('numTrabajador', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('headers/head.php');
                $this->load->view('headers/menu.php');
                $this->load->view('empleados/updateEmpleado', $data);
                $this->load->view('headers/footer.php');
                
            } else{
                $this->EmpleadosM->updateEmpleado($id_Empleado);
                redirect(base_url('index.php/EmpleadosC/show'), 'refresh');
            }
    }
}
?>