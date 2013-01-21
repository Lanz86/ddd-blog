<?php

namespace Blog\DomainBundle\Tests\Fakes\Repository;

use Blog\DomainBundle\Infrastructure\IEntity;
use Blog\DomainBundle\Tests\Utils\Entity\EntityFactory;
use Blog\DomainBundle\Tests\Utils\Entity\EntityIdentityChanger;

class FakeCommentRepository extends BaseFakeRepository
{
	public function __construct()
	{
		$this->add(EntityFactory::createComment());
	}

	protected function getEntityType()
	{
		return 'Blog\DomainBundle\Entity\Comment';
	}

	protected function changeIdentifier(IEntity $object)
	{
		EntityIdentityChanger::changeCommentId($object, $this->generateId());
	}
}
