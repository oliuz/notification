<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Message extends Model
{
    public function sender(){

        return $this->belongsTo(User::class, 'sender_id');

    }
    //
    protected $fillable = [
        'sender_id', 'recipient_id', 'body',
    ];

    protected $guarder = [
        'id'
    ];

}
