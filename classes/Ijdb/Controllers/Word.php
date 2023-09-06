<?php
namespace Ijdb\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Word {
	private $authorsTable;
	private $wordsTable;
	private $categoriesTable;
	private $authentication;

	public function __construct(DatabaseTable $wordsTable, DatabaseTable $authorsTable, Authentication $authentication) {
		$this->wordsTable = $wordsTable;
		$this->authorsTable = $authorsTable;		
		$this->authentication = $authentication;
	}

	public function list() {

	
		$words = $this->wordsTable->findAll(); 		

		$totalWords = $this->wordsTable->total();

		$author = $this->authentication->getUser();

		return ['template' => 'words.html.php', 
				'title' => 'Dictionary', 
				'variables' => [
						'totalWords' => $totalWords,
						'words' => $words,
						'userId' => $author->id ?? null,					
					]
				];
	}

	public function home() {
		$title = 'Dictionary';

		return ['template' => 'home.html.php', 'title' => $title];
	}

	public function delete() {

		$author = $this->authentication->getUser();

		$word = $this->wordsTable->findById($_POST['id']);

		if ($word->authorId != $author->id) {
			return;
		}
		

		$this->wordsTable->delete($_POST['id']);

		header('location: /word/list'); 
	}

	public function saveEdit() {
		$author = $this->authentication->getUser();

		$word = $_POST['word'];
		
		$wordEntity = $author->addJoke($word);	

		header('location: /word/list'); 
	}

	public function edit() {
		$author = $this->authentication->getUser();
	

		if (isset($_GET['id'])) {
			$word = $this->wordsTable->findById($_GET['id']);
		}

		$title = 'Edit word';

		return ['template' => 'wordedit.html.php',
				'title' => $title,
				'variables' => [
						'word' => $word ?? null,
						'userId' => $author->id ?? null,
					
					]
				];
	}
	
}