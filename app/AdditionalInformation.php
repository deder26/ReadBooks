<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
    protected $fillable = ['comapanyName','email','contact','address','desscription'];
}
