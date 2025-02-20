<?php

class Event extends Model
{
    /*
    * Altere o nome da classe
    * Altere o nome da tabela
    * Altere os campos de acordo com o seu BD
    * Remova esse comentário ao concluir 
    */
    public function add($name, $description, $date,$time,$local,$image, $frame_map)
    {
        $sql = "INSERT INTO events (name, description, date, time, local, image, frame_map)
        VALUES (:name, :description, :date, :time, :local, :image, :frame_map)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":date", $date);
        $sql->bindValue(":time", $time);
        $sql->bindValue(":local", $local);
        $sql->bindValue(":image", $image);
        $sql->bindValue(":frame_map", $frame_map);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($name, $description, $date,$time,$local,$image,$frame_map, $id)
    {

        
        $sql = "UPDATE events SET name = :name, description = :description, date = :date, time = :time, local = :local, image = :image, frame_map = :frame_map WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":date", $date);
        $sql->bindValue(":time", $time);
        $sql->bindValue(":local", $local);
        $sql->bindValue(":image", $image);
        $sql->bindValue(":frame_map", $frame_map);
        $sql->bindValue(":id", $id);

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
        $sql = "SELECT * FROM events WHERE id = :id";
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
            $order = "events.id";
        }

        $sql = "SELECT *
        FROM events 
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

    public function getAllStudent($limit, $offset, $filters)
    {

        $data = array();
        $where = array(
            '1=1'
        );


        if (!empty($filters['event_id'])) {
            $where[] = "event_students.event_id = :event_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "event_students.id";
        }

        $sql = "SELECT event_students.*, students.name, students.document
        FROM events
        INNER JOIN event_students ON events.id = event_students.event_id
        INNER JOIN students ON event_students.student_id = students.id
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        

        $sql = $this->db->prepare($sql);



        if (!empty($filters['event_id'])) {
            $sql->bindValue(":event_id", $filters['event_id']);
        }

        $sql->execute();

        $price = array();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    

    public function getAllTeacher($limit, $offset, $filters)
    {

        $data = array();
        $where = array(
            '1=1'
        );


        if (!empty($filters['event_id'])) {
            $where[] = "event_teachers.event_id = :event_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "event_teachers.id";
        }

        $sql = "SELECT event_teachers.*, teachers.name, teachers.document
        FROM events
        INNER JOIN event_teachers ON events.id = event_teachers.event_id
        INNER JOIN teachers ON event_teachers.teacher_id = teachers.id
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        

        $sql = $this->db->prepare($sql);



        if (!empty($filters['event_id'])) {
            $sql->bindValue(":event_id", $filters['event_id']);
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
        FROM events
        WHERE " . implode(' AND ', $where) . "";

        $sql = $this->db->prepare($sql);

        if (!empty($filters['category'])) {
            $sql->bindValue(":category_id", $filters['category']);
        }     


        $sql->execute();
        $array = $sql->fetch();
        return $array['total'];
    }   

    

    public function addTeacherInEvent($event_id, $teacher_id, $observation)
    {
        $sql = "INSERT INTO event_teachers (event_id, teacher_id, observation)
        VALUES (:event_id, :teacher_id, :observation)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":event_id", $event_id);
        $sql->bindValue(":teacher_id", $teacher_id);
        $sql->bindValue(":observation", $observation);
       
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addStudentInEvent($event_id, $student_id, $observation)
    {
        $sql = "INSERT INTO event_students (event_id, student_id, observation)
        VALUES (:event_id, :student_id, :observation)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":event_id", $event_id);
        $sql->bindValue(":student_id", $student_id);
        $sql->bindValue(":observation", $observation);
       
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addAuthorization($attachments_authorization, $id)
    {

        
        $sql = "UPDATE event_students SET attachments_authorization = :attachments_authorization WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":attachments_authorization", $attachments_authorization);
        $sql->bindValue(":id", $id);

        $sql->execute();
      
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($id)
    {
        $sql = "DELETE FROM events WHERE id = :id";
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

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM event_students WHERE id = :id";
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

    public function deleteTeacher($id)
    {
        $sql = "DELETE FROM event_teachers WHERE id = :id";
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
