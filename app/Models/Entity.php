<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Entity extends Model
{
    use HasFactory;

    protected $primaryKey = 'entity_id';

    protected $fillable = [
        'nameEntity'
    ];

    public function activities():BelongsToMany
    {
       return $this->belongsToMany(
        Activity::class,
        'activity_entities',
        'activity_id',
        'entity_id',
        );
    }

}
