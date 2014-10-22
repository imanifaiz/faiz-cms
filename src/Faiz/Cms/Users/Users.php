<?php namespace Faiz\Cms\Users;

use Faiz\Cms\Core\EloquentBaseModel;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

/**
 * Faiz\Cms\Users\Users
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
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereConfirmationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereRememberToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereConfirmed($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Users\Users whereUpdatedAt($value) 
 */
class Users extends EloquentBaseModel implements ConfideUserInterface
{
	use ConfideUser;
	use HasRole;
}