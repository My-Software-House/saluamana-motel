<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $guarded = [];

    public $incrementing = false;

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function roomType() {
        return $this->belongsTo(RoomType::class);
    }

    public function bookingStatus() {
        return $this->belongsTo(BookingStatus::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_booking')->withPivot('id');
    }
}
