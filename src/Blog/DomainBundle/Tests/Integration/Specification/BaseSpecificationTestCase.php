<?php

namespace Blog\DomainBundle\Tests\Integration\Specification;

use Blog\DomainBundle\Infrastructure\ICriteriaSpecification;
use Blog\DomainBundle\Infrastructure\ISpecification;
use Blog\DomainBundle\Tests\BaseIntegrationTestCate;

abstract class BaseSpecificationTestCase extends BaseIntegrationTestCate
{
	/**
	 * @var ISpecification|ICriteriaSpecification
	 */
	protected $specification;

	abstract protected function createSpecification();

	public function setUp()
	{
		$this->specification = $this->createSpecification();
	}

	public function testImplements()
	{
		$this->assertInstanceOf('Blog\\DomainBundle\\Infrastructure\\ISpecification', $this->specification);
		$this->assertInstanceOf('Blog\\DomainBundle\\Infrastructure\\ICriteriaSpecification', $this->specification);
	}
}
