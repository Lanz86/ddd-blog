<?php

namespace Blog\DomainBundle\Tests\Utils\Entity;

use Blog\DomainBundle\Entity\Comment;
use Blog\DomainBundle\Entity\Post;
use Blog\DomainBundle\Entity\User;

class EntityIdentityChanger
{
	public static function changeUserId(User $user, $id)
	{
		$reflectionClass = new \ReflectionClass('\Blog\DomainBundle\Entity\User');
		$reflectionProperty = $reflectionClass->getProperty('id');
		$reflectionProperty->setAccessible(true);
		$reflectionProperty->setValue($user, $id);
		return $user;
	}

	public static function changePostId(Post $post, $id)
	{
		$reflectionClass = new \ReflectionClass('\Blog\DomainBundle\Entity\Post');
		$reflectionProperty = $reflectionClass->getProperty('id');
		$reflectionProperty->setAccessible(true);
		$reflectionProperty->setValue($post, $id);
		return $post;
	}

	public static function changeCommentId(Comment $comment, $id)
	{
		$reflectionClass = new \ReflectionClass('\Blog\DomainBundle\Entity\Comment');
		$reflectionProperty = $reflectionClass->getProperty('id');
		$reflectionProperty->setAccessible(true);
		$reflectionProperty->setValue($comment, $id);
		return $comment;
	}
}
