<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Classes extends Model
{
    use HasFactory;
    protected $table = "classes";
    protected $fillable = ['name', 'status', 'category_id'];
    // funcation reference to primary key of categories table
    public function category()
    {
        return $this->belongsTo(Category::class); // relationship 1 to many
        // retlurn object of current category
    }
}
