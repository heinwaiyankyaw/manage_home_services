<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'images',
        'description',
        'price',
        'duration',
        'status',
    ];

    protected $casts = [
        'images' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wallet()
    {
        return $this->hasMany(Wallet::class);
    }

}
