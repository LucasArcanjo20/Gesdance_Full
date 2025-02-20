<?php

class Account extends Model
{
    public function add($login, $password, $name, $phone, $email, $zipcode, $street, $number, $complement, $district, $reference, $state, $city, $descrition, $instagram, $document, $image, $date_birth, $voice_video_authorization)
    {
        $sql = "INSERT INTO accounts (login, password) VALUES (:login, :password)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->bindValue(":password", $password);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $account_id = $this->db->lastInsertId(); //pega a última ID inserida e vamos armazenar em outra tabela como chave estrangeira
            $_SESSION['gesdance_online'] = $account_id;
            $Teacher = new Teacher();
            $Teacher->add($account_id, $name, $phone, $email, $zipcode, $street, $number, $complement, $district, $reference, $state, $city, $descrition, $instagram, $document, $image, $date_birth, $voice_video_authorization);
            return true;
        } else {
            return false;
        }
    }

    public function checkLogin($login, $password)
    {
       
        $sql = "SELECT password, id FROM accounts WHERE login = :login"; //remova os campos não usados como login
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->execute();
      
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $data['password'])) {
                $_SESSION['gesdance_online'] = $data['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get($id)
    {
        $data = array();
        $sql = "SELECT * FROM accounts WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }


    public function update($login, $password, $id)
    {

        $sql = "UPDATE accounts SET login = :login, password = :password WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->bindValue(":password", $password);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            return true;
        } else {
            return false;
        }
    }


}
