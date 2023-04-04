<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name'];

    public function items() {
        return $this->hasMany(items::class,'category_id');
    }
}
