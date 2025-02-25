<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Photos;
use App\Models\User;

class Capsule extends Model
{
    protected $table = 'capsules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'title',
        'opening_date',
        'plan',
        'music',
        'counter_style'
    ];

    public function photos()
    {
        return $this->hasMany(Photos::class, 'capsule_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
