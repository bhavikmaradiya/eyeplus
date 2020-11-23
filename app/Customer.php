<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;
    protected $primaryKey = 'cust_id';
}
