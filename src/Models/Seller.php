<?php

namespace Dealskoo\Seller\Models;

use Dealskoo\Seller\Notifications\ResetSellerPassword;
use Dealskoo\Seller\Notifications\VerifySellerEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use Laravolt\Avatar\Facade as Avatar;

class Seller extends Authentication implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $appends = ['avatar_url'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function getAvatarUrlAttribute()
    {
        return empty($this->avatar) ?
            Avatar::create($this->email)->toGravatar(['d' => 'identicon', 'r' => 'pg', 's' => 100]) :
            $this->avatar;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetSellerPassword($token));
    }

    public function routeNotificationForMail($notification)
    {
        return [$this->email => $this->name];
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifySellerEmail());
    }
}
