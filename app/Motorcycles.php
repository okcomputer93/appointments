<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Motorcycles extends Model
{
    protected $fillable = ['actual'];

    /**
     * @return BelongsToMany
     */
    public function appointment() : BelongsToMany
    {
        return $this->belongsToMany(Appointment::class);
    }

    /**
     * @return int
     */
    public function left() : int
    {
        return $this->max - $this->actual;
    }
}
