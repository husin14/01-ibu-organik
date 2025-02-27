<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

  protected $fillable = [
    'name',
    'phone',
    'email',
    'gender',
    'address',
    'patokan',
  ];

  public function purchases() {
    return $this->hasMany(Purchase::class);
  }
}
