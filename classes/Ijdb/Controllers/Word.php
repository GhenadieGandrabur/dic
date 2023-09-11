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

	public function list()
	{
		$author = $this->authentication->getUser();
		$authorId = $author->id ?? null;

		if ($authorId) {
			// Assuming your wordsTable returns objects
			$allWords = $this->wordsTable->findAll();
			$words = [];

			foreach ($allWords as $word) {
				if ($word->authorId == $authorId) {
					$words[] = $word;
				}
			}
		} else {
			// Handle the case where the author is not logged in
			$words = [];
		}

		$totalWords = count($words);
		$user = $author->name;

		return [
			'template' => 'words.html.php',
			'title' => 'Dictionary',
			'variables' => [
				'totalWords' => $totalWords,
				'words' => $words,
				'userId' => $authorId,
				'user' => $user
			]
		];
	}






	public function delete() {

		$author = $this->authentication->getUser();

		$word = $this->wordsTable->findById($_POST['id']);

		if ($word->authorId != $author->id) {
			return;
		}
		

		$this->wordsTable->delete($_POST['id']);

		header('location: /'); 
	}

	public function saveEdit() {
		$author = $this->authentication->getUser();

		$word = $_POST['word'];
		
		$wordEntity = $author->addJoke($word);	

		header('location: /'); 
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

	public function search()
	{
		$author = $this->authentication->getUser();
		$allWords = $this->wordsTable->findAll();

		if (isset($_GET['word'])) {
			$words = $this->wordsTable->searchByWord($_GET['word'], $author->id);
		}	

		return [
			'template' => 'wordsearch.html.php',
			'title' => 'Search word',
			'variables' => [
				'words' => $words ?? [],
				'word' => $_GET['word']??"",
				'user' => $author->name ?? "",
				'totalWords' => count($allWords)
			]
		];

	}
	
}