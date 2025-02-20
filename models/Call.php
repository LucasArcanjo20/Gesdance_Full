<?php

class Call extends Model
{
    /*
    * Altere o nome da classe
    * Altere o nome da tabela
    * Altere os campos de acordo com o seu BD
    * Remova esse comentário ao concluir 
    */
    public function add($team_id, $date, $time)
    {
        $sql = "INSERT INTO calls (team_id, date, time) VALUES (:team_id, :date, :time)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":team_id", $team_id);
        $sql->bindValue(":date", $date);
        $sql->bindValue(":time", $time);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $call_id = $this->db->lastInsertId();

            return $call_id;

           
        } else {
            return false;
        }
    }

    public function update($team_id, $date, $time, $id)
    {

        $sql = "UPDATE call_table SET team_id = :team_id, date = :date, time = :time WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':team_id', $team_id);
        $sql->bindValue(':date', $date);
        $sql->bindValue(':time', $time);
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
        $date = array();
        $sql = "SELECT calls.*, teams.name
        FROM calls 
        INNER JOIN teams ON calls.team_id = teams.id
        WHERE calls.id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $date = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $date;
    }
    public function getAll($limit, $offset, $filters)
    {

        $data = array();
        $where = array(
            '1=1'
        );


        if (!empty($filters['team_id'])) {
            $where[] = "team_id = :team_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "calls.id";
        }

        $sql = "SELECT calls.*, teams.name
        FROM calls 
        INNER JOIN teams ON calls.team_id = teams.id
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['team_id'])) {
            $sql->bindValue(":team_id", $filters['team_id']);
        }

        $sql->execute();

        $price = array();
        if ($sql->rowCount() > 0) {
            $Student = new Student();
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
        FROM calls
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
        $sql = "DELETE FROM calls WHERE id = :id";
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
