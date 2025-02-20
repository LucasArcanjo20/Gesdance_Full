<?php

class Team extends Model
{
    public function add($name, $teacher_id, $days, $schedules)
    {
       
        $sql = "INSERT INTO teams (name, teacher_id, days, schedules)
        VALUES (:name, :teacher_id, :days, :schedules)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":teacher_id", $teacher_id);
        $sql->bindValue(":days", $days);
        $sql->bindValue(":schedules", $schedules);


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
        $sql = "SELECT * FROM teams WHERE id = :id";
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

        
        if (!empty($filters['ignore_student_id'])) {
            $where[] = "id NOT IN (" . implode(", ", $filters['ignore_student_id']) . ")";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "teams.id";
        }

        $sql = "SELECT teams.*, teachers.name as name_teacher
        FROM teams 
        INNER JOIN teachers ON teams.teacher_id = teachers.id;
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


    public function delete($id)
    {
        $sql = "DELETE FROM teams WHERE id = :id";
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
