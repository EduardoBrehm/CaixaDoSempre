<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Capsule;

class Photos extends Model
{
    protected $table = 'photos';
    protected $primaryKey = 'photo_id';
    
    protected $fillable = [
        'capsule_id',
        'name',
        'path'
    ];

    public function capsule()
    {
        return $this->belongsTo(Capsule::class, 'capsule_id', 'capsule_id');
    }
}
