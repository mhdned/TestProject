<?php 

namespace Application\Model;

class User extends Model{


    public function find($username){
        $query = "SELECT * FROM `user` WHERE user = ? ";
        $result = $this->query($query, array($username))->fetch();
        $this->closeConnection();
        return $result;
    }

    public function login($user){
        $query = "SELECT * FROM `user` WHERE user = ? ";
        $result = $this->query($query, array($user))->fetch();
        $this->closeConnection();
        return $result;
    }

    public function getUserJobs($id){
        $query = "SELECT * FROM `tasks` WHERE user_id = ? ";
        $result = $this->query($query, [$id])->fetchAll();
        $this->closeConnection();
        return $result;
    }

    public function register($values)
    {
        unset($values['repassword']);

        $query = "INSERT INTO `user` ( `user`, `password`, `create_time`) VALUES ( ?, ?, current_timestamp());";
        $this->executeMethod($query, array_values($values));
        $this->closeConnection();
    }

    public function addContent($content,$id){
        $query = "INSERT INTO `tasks` ( `content`, `user_id`) VALUES ( ?, ?);";
        $this->executeMethod($query, array_values(array($content,$id)));
        $this->closeConnection();
    }

    public function removeTasks($id){
        $query = "UPDATE `tasks` SET `deleted`= 1 WHERE `id` = ? ;";
        $this->executeMethod($query, array($id));
        $this->closeConnection();
    }

    public function findTask($id){
        $query = "SELECT * FROM `tasks` WHERE id = ? ";
        $result = $this->query($query, array($id))->fetch();
        $this->closeConnection();
        return $result;
    }

    public function checkTasks($check,$id){
        $query = "UPDATE `tasks` SET `checked`= ? WHERE `id` = ? ;";
        $this->executeMethod($query, array($check,$id));
        $this->closeConnection();
    }

}