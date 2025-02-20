<?php

class Teacher extends Model
{
    public function add($account_id, $name, $phone, $email, $zipcode, $street, $number, $complement, $district, $reference, $state, $city, $descrition, $instagram, $document, $image, $date_birth, $voice_video_authorization)
    {
        $sql = "INSERT INTO teachers (account_id, name, phone, email, zipcode, street, number, complement, district, reference, state, city, descrition, instagram, document, image, date_birth, voice_video_authorization)
        VALUES (:account_id, :name, :phone, :email, :zipcode, :street, :number, :complement, :district, :reference, :state, :city, :descrition, :instagram, :document, :image, :date_birth, :voice_video_authorization)";

               
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":account_id", $account_id);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":zipcode", $zipcode);
        $sql->bindValue(":street", $street);
        $sql->bindValue(":number", $number);
        $sql->bindValue(":complement", $complement);
        $sql->bindValue(":district", $district);
        $sql->bindValue(":reference", $reference);
        $sql->bindValue(":state", $state);
        $sql->bindValue(":city", $city);
        $sql->bindValue(":descrition", $descrition);
        $sql->bindValue(":instagram", $instagram);
        $sql->bindValue(":document", $document);
        $sql->bindValue(":image", $image);
        $sql->bindValue(":date_birth", $date_birth);
        $sql->bindValue(":voice_video_authorization", $voice_video_authorization);
       




        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($name, $phone, $email, $zipcode, $street, $number, $complement, $district, $reference, $state, $city, $descrition, $instagram, $document, $image, $date_birth, $voice_video_authorization, $id)
    {

        $sql = "UPDATE teachers SET name = :name, phone = :phone, email  = :email, zipcode = :zipcode, street = :street, number = :number, complement = :complement, district = :district, reference = :reference, district = :district, state = :state, city = :city, descrition = :descrition, instagram = :instagram,  document = :document, image = :image, date_birth = :date_birth, voice_video_authorization = :voice_video_authorization WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":zipcode", $zipcode);
        $sql->bindValue(":street", $street);
        $sql->bindValue(":number", $number);
        $sql->bindValue(":complement", $complement);
        $sql->bindValue(":district", $district);
        $sql->bindValue(":reference", $reference);
        $sql->bindValue(":state", $state);
        $sql->bindValue(":city", $city);
        $sql->bindValue(":descrition", $descrition);
        $sql->bindValue(":instagram", $instagram);
        $sql->bindValue(":document", $document);
        $sql->bindValue(":image", $image);
        $sql->bindValue(":date_birth", $date_birth);
        $sql->bindValue(":voice_video_authorization", $voice_video_authorization);
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
        $sql = "SELECT * FROM teachers WHERE id = :id";
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
            $order = "teachers.id";
        }

        $sql = "SELECT *
        FROM teachers 
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
        $sql = "DELETE FROM teachers WHERE id = :id";
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
