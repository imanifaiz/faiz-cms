<?php namespace Faiz\Cms\Users;

use Faiz\Cms\Core\EloquentBaseModel;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class Users extends EloquentBaseModel implements ConfideUserInterface
{
	use ConfideUser;
}