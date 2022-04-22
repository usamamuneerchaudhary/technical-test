<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable=['uuid'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function turbines()
    {
        return $this->hasMany(Turbine::class);
    }
}
