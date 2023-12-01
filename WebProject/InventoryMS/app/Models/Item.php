<?php

// app/Models/Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'title', 'description', 'price', 'quantity', 'SKU', 'picture'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}