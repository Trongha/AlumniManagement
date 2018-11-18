<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/11/2018
 * Time: 8:59 CH
 */
require_once ('m_admin.php');

class mySession{
	static $userInSession;

	public static function startSession(){
		session_start();
	}

	public static function issetSession(){
		if (isset($_SESSION['username'])){
			$getUser = m_admin::getUserByUsername($_SESSION['username']);
			if ($getUser !== null){
				self::$userInSession = $getUser[0];
				return true;
			}
		}
		return false;
	}

	public static function checkLogin(){
		self::startSession();
		if (!self::issetSession()){
			header('Location: https://localhost/AlumniManagement/');
		}else{
			if(self::$userInSession->isadmin == 1){
				$_SESSION['isadmin'] = 1;
			}
			if (self::$userInSession->isuser == 1){
				self::setAlumniSession();
			}
		}
	}

	public static function checkAdmin(){
		self::checkLogin();
		if ($_SESSION['isadmin'] != 1){
			header('Location: https://localhost/AlumniManagement/');
		}
	}

	public static function setAlumniSession(){
		if (self::$userInSession->isuser == 1){
			$_SESSION['isuser'] = 1;
			$info = m_admin::getAlumniInfoByUserID(self::$userInSession->userID)[0];
			$_SESSION['hoten'] = $info->hoten;
		}
	}

}