<?php

class TeamStudent extends Model
{
    /*
    * Altere o nome da classe
    * Altere o nome da tabela
    * Altere os campos de acordo com o seu BD
    * Remova esse comentário ao concluir 
    */
    public function add($team_id, $student_id)
    {
        $sql = "INSERT INTO team_students (team_id, student_id) VALUES (:team_id, :student_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":team_id", $team_id);
        $sql->bindValue(":student_id", $student_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($campo1, $campo2, $campo3, $id)
    {

        $sql = "UPDATE team_students SET campo1 = :campo1, campo2 = :campo2, campo3 = :campo3 WHERE id = :id";
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
        $sql = "SELECT * FROM team_students WHERE id = :id";
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


        if (!empty($filters['team_id'])) {
            $where[] = "team_id = :team_id";
        }

        if (!empty($filters['ignore_student_id'])) {
            $where[] = "student_id != :student_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "team_students.id";
        }

        $sql = "SELECT team_students.*, students.*, teams.teacher_id, teams.name as name_teams
        FROM team_students 
        INNER JOIN students on team_students.student_id = students.id
        INNER JOIN teams on team_students.team_id = teams.id
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['team_id'])) {
            $sql->bindValue(":team_id", $filters['team_id']);
        }

        if (!empty($filters['ignore_student_id'])) {
            $sql->bindValue(":student_id", $filters['ignore_student_id']);
        }


        $sql->execute();

        $price = array();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getAllTeam($student_id)
    {

        $data = array();    
        $ids = array();   

        $sql = "SELECT team_id
        FROM team_students 
        WHERE student_id = :student_id";

        $sql = $this->db->prepare($sql);
   
        $sql->bindValue(":student_id", $student_id);
      
        $sql->execute();

        $price = array();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);            
            foreach ($data as $key => $value) {
                $ids[] = $value['team_id'];
            }
        }
        return $ids;
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
        FROM team_students
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
        $sql = "DELETE FROM team_students WHERE id = :id";
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
