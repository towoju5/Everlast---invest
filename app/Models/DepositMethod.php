<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepositMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "method_name",
        "method_value",
        "network",
        "min_amount",
        "max_amount",
    ];
}
