<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Borrower;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = ['title', 'summary', 'release_year', 'stock', 'category_id'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function borrowers()
    {
        return $this->hasMany(Borrower::class, 'book_id');
    }
}
