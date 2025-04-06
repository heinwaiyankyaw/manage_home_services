<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'booking_date',
        'payment_status',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
    ];

    public function getBookingDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setBookingDateAttribute($value)
    {
        $this->attributes['booking_date'] = \Carbon\Carbon::parse($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function scopeWithRelations($query)
    {
        return $query->with(['user', 'service', 'payment', 'review', 'complaint', 'wallet']);
    }

    public function scopeWithUser($query)
    {
        return $query->with('user');
    }

    public function scopeWithService($query)
    {
        return $query->with('service');
    }

    public function scopeWithPayment($query)
    {
        return $query->with('payment');
    }

    public function scopeWithReview($query)
    {
        return $query->with('review');
    }

    public function scopeWithComplaint($query)
    {
        return $query->with('complaint');
    }

    public function scopeWithWallet($query)
    {
        return $query->with('wallet');
    }

    public function scopeWithAll($query)
    {
        return $query->with(['user', 'service', 'payment', 'review', 'complaint', 'wallet']);
    }
}
