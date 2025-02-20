<?php

class Presence extends Model
{
    public function add($call_id, $student_id, $observation, $presence)
    {
       
        $sql = "INSERT INTO presences (call_id, student_id, observation, presence)
        VALUES (:call_id,:student_id, :observation, :presence)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":call_id", $call_id);
        $sql->bindValue(":student_id", $student_id);
        $sql->bindValue(":observation", $observation);        
        $sql->bindValue(":presence", $presence);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get($id)
    {
        $data = array();
        $sql = "SELECT * FROM presences WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getStudent($id, $call_id)
    {
        $data = array();
        $sql = "SELECT * FROM presences WHERE student_id = :id AND call_id = :call_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":call_id", $call_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getAll($limit, $offset, $filters)
    {

        $data = array();
        $where = array(
            '1=1'
        );


        if (!empty($filters['call_id'])) {
            $where[] = "call_id = :call_id";
        }

        
        if (!empty($filters['ignore_student_id'])) {
            $where[] = "id NOT IN (" . implode(", ", $filters['ignore_student_id']) . ")";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "presences.id";
        }

        $sql = "SELECT presences.*
        FROM presences 
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['call_id'])) {
            $sql->bindValue(":call_id", $filters['call_id']);
        }

        $sql->execute();

        $price = array();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }


    public function getTotal($filters)
    {
        $array = array();

        $where = array(
            '1=1'
        );


        if (!empty($filters['category'])) { //repito esse processo para todos os filtros
            $where[] = "category_id = :category_id";
        }      

        $sql = "SELECT 
        COUNT(*) as total 
        FROM presences
        WHERE " . implode(' AND ', $where) . "";

        $sql = $this->db->prepare($sql);

        if (!empty($filters['category'])) {
            $sql->bindValue(":category_id", $filters['category']);
        }     


        $sql->execute();
        $array = $sql->fetch();
        return $array['total'];
    }   


    public function delete($id)
    {
        $sql = "DELETE FROM presences WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        //fim apagando anúncio
    }

    public function deleteCall($id)
    {
        $sql = "DELETE FROM presences WHERE call_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        //fim apagando anúncio
    }
}
