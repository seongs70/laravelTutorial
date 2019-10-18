<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable; //$user->notify(new SubscriptionRenewalFailed); Mail::to($user)->send()
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasmany(Project::class, 'owner_id'); // select * from projects where owner_id = 1
    }

    public function isVerified()
    {
        return (bool) $this->email_verified_at;
    }

    public function isNotVerified()
    {
        return !$this->isVerified();
    }
}
