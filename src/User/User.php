<?php namespace Faiz\Cms\User;

use Faiz\Cms\Core\EloquentBaseModel;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

/**
 * Faiz\Cms\User\User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $confirmation_code
 * @property string $remember_token
 * @property boolean $confirmed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereConfirmationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereRememberToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereConfirmed($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\User\User whereUpdatedAt($value) 
 */
class User extends EloquentBaseModel implements ConfideUserInterface
{
	use ConfideUser;
	use HasRole;
}