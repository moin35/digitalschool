<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountFeeType extends Model
{
    protected $table='tbl_ac_fee_type';
    protected $fillable = ['fee_type','note'];
}
