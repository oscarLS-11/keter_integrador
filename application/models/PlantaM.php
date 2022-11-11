<?php
    class PlantaM extends CI_Model{

        function getPlantas(){
            $query = $this->db->get('planta');
            return $query->result();
        }

        function getAdmin(){
            $query = $this->db->get('userAdmin');
            return $query->result();
        }


        function getPlanta($id_Planta){
            $this->db->where('id_Planta', $id_Planta);
            $query = $this->db->get('planta');
            return $query->result();
        }

        function insertPlanta(){
            $data = array(
                'id_UserAdmin' => $this->input->post('id_UserAdmin'),
                'nombre' => $this->input->post('nombre'),
                'alias' => $this->input->post('alias'),
                'telefono' => $this->input->post('telefono'),
                'domicilio' => $this->input->post('domicilio'),
                );
                $this->db->insert('planta', $data);
        }


/*
       

        function deletePlanta($id_Planta){
            $this->db->where('id_Planta', $id_Planta);
            $this->db->delete('planta');
            return TRUE;
        }

    

        function updatePlanta(){
            $data = array(
                'planta' => $this->input->post('planta'),
                'alias' => $this->input->post('alias'),
                'telefono' => $this->input->post('telefono'),
                'domicilio' => $this->input->post('domicilio'),
                );
                $this->db->where('id_Planta', $this->input->post('id_Planta'));
                $this->db->update('planta', $data);
        }
        */
    }
?>