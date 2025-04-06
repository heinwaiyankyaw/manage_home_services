<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    //
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'img_path',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
