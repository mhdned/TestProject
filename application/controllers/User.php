<?php

namespace Application\Controllers;

use Application\Model\User as UserModel;


class User extends Controller{

    private $statusArray = [
        'message' => null,
        'status' => null,
        'error' => false
    ];

    public function index(){
        return $this->view('app.index');
    }

    public function login()
    {
        $user = $_POST;

        $userModel = new UserModel();
        $currentUser = $userModel->login($user['name']);

        if (empty($currentUser)) {
            $this->statusArray['message'] = 'this user is not exist';
            $this->statusArray['status'] = '1';
            $this->statusArray['error'] = true;
        }else{
            if($currentUser['password'] != $user['password']) {
                $this->statusArray['message'] = 'password is wrong';
                $this->statusArray['status'] = '2';
                $this->statusArray['error'] = true;
            }else {
                $name = $currentUser['user'];
                $_SESSION['user'] = $currentUser['id'];

                $userModel = new UserModel();
                $jobs = $userModel->getUserJobs($currentUser['id']);

                return $this->view('panel.userPanel',compact('name','jobs'));
            }
        }
    }

    public function registerPage(){
        return $this->view('app.register');
    }

    public function register(){
        $user = $_POST;
        $userModel = new UserModel();

        if (empty($user['name']) || empty($user['password']) || empty($user['repassword'])) {
            $this->statusArray['message'] = 'please fill in all fields';
            $this->statusArray['status'] = '1';
            $this->statusArray['error'] = true;
            echo "1";
        }else
        {
            if(!empty($userModel->find($user['name']))){
                $this->statusArray['message'] = 'this username has already been used';
                $this->statusArray['status'] = '2';
                $this->statusArray['error'] = true;
                echo "2";   
            }else{
                $userModel = new UserModel();
                $userModel->register($user);
                return $this->view('app.index');
            }
        }

    }

    public function setTask(){
        $content = $_POST['content'];

        $userModel = new UserModel();
        $userModel->addContent($content,$_SESSION['user']);
    }

    public function removeTask(){
        $task = $_POST['id'];

        $userModel = new UserModel();
        $userModel->removeTasks($task);
    }

    public function checkTask(){
        $task = $_POST['id'];

        $userModel = new UserModel();
        $currentTask = $userModel->findTask($task);

        $check = null;

        if ($currentTask['checked']) {
            $check = false;
        }else{
            $check = true;
        }

        $userModel = new UserModel();
        $userModel->checkTasks($check,$task);
    }


}