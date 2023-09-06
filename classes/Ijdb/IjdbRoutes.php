<?php
namespace Ijdb;

class IjdbRoutes implements \Ninja\Routes {
	private $authorsTable;
	private $jokesTable;
	private $wordsTable;
	private $categoriesTable;
	private $jokeCategoriesTable;
	private $authentication;

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		$this->jokesTable = new \Ninja\DatabaseTable($pdo, 'joke', 'id', '\Ijdb\Entity\Joke', [&$this->authorsTable, &$this->jokeCategoriesTable]);
		$this->wordsTable = new \Ninja\DatabaseTable($pdo, 'word', 'id', '\Ijdb\Entity\Word', [&$this->authorsTable]);
 		$this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id', '\Ijdb\Entity\Author', [&$this->wordsTable]);
 		$this->categoriesTable = new \Ninja\DatabaseTable($pdo, 'category', 'id', '\Ijdb\Entity\Category', [&$this->jokesTable, &$this->jokeCategoriesTable]);
 		$this->jokeCategoriesTable = new \Ninja\DatabaseTable($pdo, 'joke_category', 'categoryId');
		$this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
	}

	public function getRoutes(): array {
		$jokeController = new \Ijdb\Controllers\Joke($this->jokesTable, $this->authorsTable, $this->categoriesTable, $this->authentication);
		$wordController = new \Ijdb\Controllers\Word($this->wordsTable, $this->authorsTable, $this->authentication);
		$authorController = new \Ijdb\Controllers\Register($this->authorsTable);
		$loginController = new \Ijdb\Controllers\Login($this->authentication);
		$categoryController = new \Ijdb\Controllers\Category($this->categoriesTable);

		$routes = [
			'author/register' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'registerUser'
				]
			],
			'author/success' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],
			'author/permissions' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'permissions'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'savePermissions'
				],
				'login' => true
			],
			'author/list' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'list'
				],
				'login' => true
			],
			'joke/edit' => [
				'POST' => [
					'controller' => $jokeController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $jokeController,
					'action' => 'edit'
				],
				'login' => true
			],
			'joke/delete' => [
				'POST' => [
					'controller' => $jokeController,
					'action' => 'delete'
				],
				'login' => true
			],
			'joke/list' => [
				'GET' => [
					'controller' => $jokeController,
					'action' => 'list'
				],
				'login' => true
			],
			'word/edit' => [
				'POST' => [
					'controller' => $wordController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $wordController,
					'action' => 'edit'
				],
				'login' => true
			],
			'word/delete' => [
				'POST' => [
					'controller' => $wordController,
					'action' => 'delete'
				],
				'login' => true
			],
			'word/list' => [
				'GET' => [
					'controller' => $wordController,
					'action' => 'list'
				],
				'login' => true
			],
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'login/permissionserror' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'permissionsError'
				]
			],
			'login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
			],
			'category/edit' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $categoryController,
					'action' => 'edit'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\Author::EDIT_CATEGORIES
			],
			'category/delete' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'delete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\Author::REMOVE_CATEGORIES
			],
			'category/list' => [
				'GET' => [
					'controller' => $categoryController,
					'action' => 'list'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\Author::EDIT_CATEGORIES
			],
			'' => [
				'GET' => [
					'controller' => $jokeController,
					'action' => 'home'
				],
				'login' => true
			]
		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}

	public function checkPermission($permission): bool {
		$user = $this->authentication->getUser();

		if ($user && $user->hasPermission($permission)) {
			return true;
		} else {
			return false;
		}
	}

}