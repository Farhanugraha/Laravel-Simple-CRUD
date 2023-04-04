<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['items_code','items_name','category_id','price','amount'];
    
    public function category() {
        return $this->belongsTo(category::class,'category_id');
    }
}
