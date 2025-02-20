<?php

class Student extends Model
{
    /*
    * Altere o nome da classe
    * Altere o nome da tabela
    * Altere os campos de acordo com o seu BD
    * Remova esse comentário ao concluir 
    */
    public function add($name, $document, $date_birth,$phone,$email,$zipcode,$street,$number,$complement,$district,$state,$city,$reference,$observation, $responsible_name_1, $telephone_number_of_the_representative_1, $responsible_name_2, $telephone_number_of_the_representative_2, $image, $image_voice_authorization_attachment)
    {
        $sql = "INSERT INTO students (name, document, date_birth, phone, email, zipcode, street, number, complement, district, state, city, reference, observation, responsible_name_1, telephone_number_of_the_representative_1, responsible_name_2, telephone_number_of_the_representative_2, image, image_voice_authorization_attachment)
        VALUES (:name, :document, :date_birth, :phone, :email, :zipcode, :street, :number, :complement, :district, :state, :city, :reference, :observation, :responsible_name_1, :telephone_number_of_the_representative_1, :responsible_name_2, :telephone_number_of_the_representative_2, :image, :image_voice_authorization_attachment)";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":document", $document);
        $sql->bindValue(":date_birth", $date_birth);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":zipcode", $zipcode);
        $sql->bindValue(":street", $street);
        $sql->bindValue(":number", $number);
        $sql->bindValue(":complement", $complement);
        $sql->bindValue(":district", $district);
        $sql->bindValue(":state", $state);
        $sql->bindValue(":city", $city);
        $sql->bindValue(":reference", $reference);
        $sql->bindValue(":observation", $observation);
        $sql->bindValue(":responsible_name_1", $responsible_name_1);
        $sql->bindValue(":telephone_number_of_the_representative_1", $telephone_number_of_the_representative_1);
        $sql->bindValue(":responsible_name_2", $responsible_name_2);
        $sql->bindValue(":telephone_number_of_the_representative_2", $telephone_number_of_the_representative_2);
        $sql->bindValue(":image", $image);
        $sql->bindValue(":image_voice_authorization_attachment", $image_voice_authorization_attachment);
    

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($name, $document, $date_birth,$phone,$email,$zipcode,$street,$number,$complement,$district,$state,$city,$reference, $observation, $responsible_name_1, $telephone_number_of_the_representative_1, $responsible_name_2, $telephone_number_of_the_representative_2, $image, $image_voice_authorization_attachment, $id)
    {

        $sql = "UPDATE students SET name = :name, document = :document, date_birth  = :date_birth, phone = :phone, email = :email, zipcode = :zipcode, street = :street, number = :number, complement = :complement, district = :district, state = :state, city = :city, reference = :reference, observation = :observation, responsible_name_1 = :responsible_name_1, telephone_number_of_the_representative_1 = :telephone_number_of_the_representative_1, responsible_name_2 = :responsible_name_2, telephone_number_of_the_representative_2 = :telephone_number_of_the_representative_2, image = :image, image_voice_authorization_attachment = :image_voice_authorization_attachment WHERE id = :id";


        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":document", $document);
        $sql->bindValue(":date_birth", $date_birth);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":zipcode", $zipcode);
        $sql->bindValue(":street", $street);
        $sql->bindValue(":number", $number);
        $sql->bindValue(":complement", $complement);
        $sql->bindValue(":district", $district);
        $sql->bindValue(":state", $state);
        $sql->bindValue(":city", $city);
        $sql->bindValue(":reference", $reference);
        $sql->bindValue(":observation", $observation);
        $sql->bindValue(":responsible_name_1", $responsible_name_1);
        $sql->bindValue(":telephone_number_of_the_representative_1", $telephone_number_of_the_representative_1);
        $sql->bindValue(":responsible_name_2", $responsible_name_2);
        $sql->bindValue(":telephone_number_of_the_representative_2", $telephone_number_of_the_representative_2);
        $sql->bindValue(":image", $image);
        $sql->bindValue(":image_voice_authorization_attachment", $image_voice_authorization_attachment);
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
        $sql = "SELECT * FROM students WHERE id = :id";
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
            $order = "students.id";
        }

        $sql = "SELECT *
        FROM students 
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
        FROM students
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
        $sql = "DELETE FROM students WHERE id = :id";
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
