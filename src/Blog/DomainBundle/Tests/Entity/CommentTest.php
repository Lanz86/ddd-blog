<?php

namespace Blog\DomainBundle\Tests\Entity;

use Blog\DomainBundle\Entity\Comment;
use Blog\DomainBundle\Entity\User;
use Blog\DomainBundle\Tests\BaseTestCase;
use Blog\DomainBundle\Tests\Utils\Entity\EntityFactory;

class CommentTest extends BaseTestCase
{
	/**
	 * @var Comment
	 */
	private $comment;

	protected function setUp()
	{
		$user = EntityFactory::createUser();
		$post = EntityFactory::createPost($user);

		$this->comment = new Comment($user, $post, 'some text');
	}

	public function testConstructor()
	{
		$author = EntityFactory::createUser();
		$post = EntityFactory::createPost($author);

		$comment = new Comment($author, $post, 'some text of the comment');

		// assert
		$this->assertSame($author, $comment->getAuthor());
		$this->assertSame($post, $comment->getPost());
		$this->assertEquals('some text of the comment', $comment->getText());
	}
}
