<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class User
{
    public $name;
    public $age;
}



class UserRegisteredEvent extends Event
{
    const Name = 'user.registered';
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}


class UserListener
{
    public function onUserRegistrationAction(Event $event)
    {
        $user = $event->getUser();
        echo $user->name . '\r\n';
        echo $user->age . '\r\n';
    }
}


$user = new User();
$user->name = "John";
$user->age = 30;
$event = new UserRegisteredEvent($user);
$listener = new UserListener();


$dispatcher = new EventDispatcher();
$dispatcher
    ->addListener(
        UserRegisteredEvent::Name,
        function (Event $event) {
            $user = $event->getUser();
            echo $user->name . '\r\n';
        }
    );

$dispatcher->dispatch(UserRegisteredEvent::Name, $event);
