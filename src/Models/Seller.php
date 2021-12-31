<?php

namespace Dealskoo\Seller\Models;

use Dealskoo\Seller\Notifications\ResetSellerPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;

class Seller extends Authentication implements MustVerifyEmail
{
    use HasFactory, Notifiable;

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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetSellerPassword($token));
    }
}
