<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'type', 'farm_id', 'latitude', 'longitude', 'grade'];
    protected $with = ['farm', 'components'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCreatedByDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function components()
    {
        return $this->belongsToMany(Component::class, 'turbines_components');
    }


}
