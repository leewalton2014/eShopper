<?php

namespace App\Models;

use App\Models\User;
use App\Models\Favourite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'category',
        'price',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function favouriteBy(User $user)
    {
        return $this->favourites->contains('user_id', $user->id);
    }

    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }
}
