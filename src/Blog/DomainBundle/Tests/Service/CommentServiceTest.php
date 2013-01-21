<?php

namespace Blog\DomainBundle\Tests\Service;

use Blog\DomainBundle\Service\CommentService;
use Blog\DomainBundle\Tests\BaseTestCase;
use Blog\DomainBundle\Tests\Fakes\FakeUnitOfWork;
use Blog\DomainBundle\Tests\Fakes\Repository\FakeCommentRepository;
use Blog\DomainBundle\Tests\Utils\Entity\EntityFactory;

class CommentServiceTest extends BaseTestCase
{
	/**
	 * @var CommentService
	 */
	private $service;

	protected function setUp()
	{
		$this->service = new CommentService(new FakeUnitOfWork(), new FakeCommentRepository());
	}

	public function testCreate()
	{
		$author = EntityFactory::createUser();
		$post = EntityFactory::createPost();

		$comment = $this->service->create($author, $post, 'test');

		$this->assertInstanceOf('Blog\\DomainBundle\\Entity\\Comment', $comment);
		$this->assertInstanceOf('\Datetime', $comment->getCreated());
		$this->assertGreaterThanOrEqual(1, $comment->getId());
		$this->assertSame($author, $comment->getAuthor());
		$this->assertSame($post, $comment->getPost());
	}
}
