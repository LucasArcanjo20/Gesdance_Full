<?php

class Presentation extends Model
{
    /*
    * Altere o nome da classe
    * Altere o nome da tabela
    * Altere os campos de acordo com o seu BD
    * Remova esse comentário ao concluir 
    */
    public function add($event_id, $classe_id, $date, $time, $observation)
    {
        $sql = "INSERT INTO presentations (event_id, classe_id, date, time, observation) VALUES (:event_id, :classe_id, :date, :time, observation)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":event_id", $event_id);
        $sql->bindValue(":classe_id", $classe_id);
        $sql->bindValue(":date", $date);
        $sql->bindValue(":time", $time);
        $sql->bindValue(":observation", $observation);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($campo1, $campo2, $campo3, $id)
    {

        $sql = "UPDATE presentations SET campo1 = :campo1, campo2 = :campo2, campo3 = :campo3 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':campo1', $campo1);
        $sql->bindValue(':campo2', $campo2);
        $sql->bindValue(':campo3', $campo3);
        $sql->bindValue(':id', $id);
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
        $sql = "SELECT * FROM presentations WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
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


        if (!empty($filters['category'])) {
            $where[] = "category_id = :category_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "presentations.id";
        }

        $sql = "SELECT *
        FROM presentations 
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['category'])) {
            $sql->bindValue(":category_id", $filters['category']);
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
        FROM presentations
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
        $sql = "DELETE FROM presentations WHERE id = :id";
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
