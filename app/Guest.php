<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['guest_name','guest_type','guest_need','guest_picture','guest_phone','guest_status'];
}
