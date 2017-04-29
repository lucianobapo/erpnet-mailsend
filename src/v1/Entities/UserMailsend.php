<?php

namespace ErpNET\Mailsend\v1\Entities;

use Illuminate\Database\Eloquent\Model;

class UserMailsend extends Model
{
    protected $connection = 'mysql-mailsend';
    protected $table = 'users';
    protected $fillable = [
        'username',
        'email',
        'status',
        'facebook_id',
    ];

}
