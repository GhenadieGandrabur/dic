<?php
namespace Ijdb\Entity;

class Word {
	public $id;
	public $authorId;	
	public $first_language;
	public $second_language;
	private $authorsTable;
	private $author;


	public function __construct(\Ninja\DatabaseTable $authorsTable) {
		$this->authorsTable = $authorsTable;
	}

	public function getAuthor() {
		if (empty($this->author)) {
			$this->author = $this->authorsTable->findById($this->authorId);
		}		
		return $this->author;
	}	
}