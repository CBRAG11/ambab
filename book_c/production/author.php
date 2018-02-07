<?php 
namespace book\author;
include_once('../user/people.php');
use book_c\b_user\User;

class Author extends User
{
	private $no_of_books_written;
	private $a_book;

	function __construct($no_of_books_written)
	{
		$this->no_of_books_written = $no_of_books_written;
		parent::__construct('cli', 'clinton', 'braganza',['country'=>'India'],9876543210,'c@g.com' );
		$this->a_book 			   = parent::u_details();
	}

	function getAuthor()
	{
		return[$this->no_of_books_written, $this->a_book];
		

	}
}

$author = new Author(10);
echo "<pre>";
print_r($author->getAuthor());
echo "</pre>";


 ?>