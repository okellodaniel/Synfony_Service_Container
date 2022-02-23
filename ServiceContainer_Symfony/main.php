<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

$container = new ContainerBuilder();
$container
	->register('greeter' . 'Greeter')
	->addArgument('%greeter.text%');
$container->setParameter('greeter.text', 'Hi');

class Greeter
{
	private $greetingText;

	public function __construct($greetingText)
	{
		$this->greetingText = $greetingText;
	}

	public function greet($name)
	{
		return $this->greetingText . " " . $name;
	}
}

$greeter = $container->get('greeter');
$greeter->greet('Daniel');
