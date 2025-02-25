<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Support\Str;

class Capsule extends Model
{
    protected $table = 'capsules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'opening_date',
        'plan',
        'music',
        'counter_style'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($capsule) {
            $capsule->slug = self::generateUniqueSlug($capsule->title);
        });
    }

    private static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function photos()
    {
        return $this->hasMany(Photos::class, 'capsule_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
