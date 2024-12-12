<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomType extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function amenities() {
        return $this->belongsToMany(Amenities::class, "amenity_room_type")->withPivot('amenity_type');
    }

    public function images() {
        return $this->hasMany(ImageRoomType::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
