<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/11/2018
 * Time: 4:03 CH
 */

require_once ('model/m_admin.php');

class loginController{
	private $usernameInput;
	private $passwordInput;
	private $allInfo;

	public function getAcc(){
		if (isset($_POST["btn_submit"])){
			$this->usernameInput = $_POST["username"];
			$this->passwordInput = $_POST["pass"];
			$_POST = array();
		}
	}

	public function check(){
		$user = m_admin::getUserByUsername($this->usernameInput);
		if ($user !== null){
			if ($this->passwordInput == $user[0]->password){
				$this->allInfo = $user[0];
				return true;
			}
		}
		return false;
	}


	public function runLogin(){
		session_start();
		$this->getAcc();
		if ($this->check()){
			$_SESSION['username'] = $this->usernameInput;
			if ($this->allInfo->isadmin == 1){
				header('Location: admin/view/dashboard.php');
			}else{
				header('Location: site/view/Home.php');
			}

			$s = "	<div class='alert alert-success myalert'>
					  <strong>Success!</strong> Xin chào $this->usernameInput
					</div>";
			echo $s;
		}else{
			$s = "	<div class='alert alert-danger myalert'>
					  <strong>Haizzz...!</strong> Sai tên đăng nhập hoặc mật khẩu!
					</div>";

		}
		echo $s;
	}
}
