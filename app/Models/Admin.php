<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*
    We Will Use Authenticatable Class in the Admin Model 
    Instead of Model Class.
*/
class Admin extends Authenticatable
{
    use HasFactory;
}
