<?php
namespace Ijdb\Controllers;

class Login {
	private $authentication;

	public function __construct(\Ninja\Authentication $authentication) {
		$this->authentication = $authentication;
	}

	public function loginForm() {
		return ['template' => 'login.html.php', 'title' => 'Log In'];
	}

	public function processLogin() {
		if ($this->authentication->login($_POST['email'], $_POST['password'])) {
			header('location: /');
		}
		else {
			return ['template' => 'login.html.php',
					'title' => 'Log In',
					'variables' => [
							'error' => 'Invalid username/password.'
						]
					];
		}
	}

	public function success() {
		return ['template' => 'login.html.php', 'title' => 'Login Successful'];
	}

	public function error() {
		return ['template' => 'loginerror.html.php', 'title' => 'Languages open door!!!'];
	}

	public function permissionsError() {
		return ['template' => 'permissionserror.html.php', 'title' => 'Access Denied'];
	}

	public function logout() {
	
		session_destroy();
		
		header('Location: /');
		exit;
	
	}
}
