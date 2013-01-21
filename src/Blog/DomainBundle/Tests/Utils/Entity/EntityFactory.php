<?php

namespace Blog\DomainBundle\Tests\Utils\Entity;

use Blog\DomainBundle\Entity\Comment;
use Blog\DomainBundle\Entity\Post;
use Blog\DomainBundle\Entity\User;

class EntityFactory
{
	public static function createUser($login = 'login', $password = 'password')
	{
		return new User($login, $password);
	}

	public static function createPost(User $author = null, $title = 'title', $text = 'text')
	{
		$author = $author ?: static::createUser();
		return new Post($author, $title, $text);
	}

	public static function createComment(User $author = null, Post $post = null, $text = 'text')
	{
		$author = $author ?: static::createUser();
		$post = $post ?: static::createPost();

		return new Comment($author, $post, $text);
	}
}
