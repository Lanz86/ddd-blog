<?php

namespace Blog\DomainBundle\Tests\Integration\Specification\User;

use Blog\DomainBundle\Entity\User;
use Blog\DomainBundle\Specification\User\LoginSpecification;
use Blog\DomainBundle\Tests\Integration\Specification\BaseSpecificationTestCase;

class LoginSpecificationTest extends BaseSpecificationTestCase
{
	protected function createSpecification()
	{
		return new LoginSpecification('Tester');
	}

	public function testSatisfiedIsShouldBeTrue()
	{
		$result = $this->specification->isSatisfiedBy(new User('Tester', ''));

		$this->assertTrue($result);
	}

	public function testSatisfiedIsShouldBeFalse()
	{
		$result = $this->specification->isSatisfiedBy(new User('Yet another tester', ''));

		$this->assertFalse($result);
	}

	public function testSatisfiedIsShouldBeRaiseException()
	{
		$this->setExpectedException('\\BadMethodCallException');

		$this->specification->isSatisfiedBy(new \stdClass());
	}

	public function testRepositoryShouldFindUser()
	{
		$result = $this->getRepository('User')->findOneBySpecification($this->specification);

		$this->assertInstanceOf('Blog\\DomainBundle\\Entity\\User', $result);
	}
}
