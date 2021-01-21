<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    protected $fillable = ['user_id'];

    /**
     * @return HasOne
     */
    public function motorcycles(): HasOne
    {
        return $this->hasOne(Motorcycles::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function toggleUser(User $user): void
    {
        if ($this->isMine()) {
            //On Delete cascade
            $this->users()->detach($user);
            $this->motorcycles->update([
                'actual' => --$this->motorcycles->actual
            ]);
        }
        else {
            if($this->motorcycles->left() == 0) return;
            $this->users()->save($user);
            $this->motorcycles->update([
                'actual' => ++$this->motorcycles->actual
            ]);
        }
    }

    /**
     * @return bool
     */
    public function isMine(): bool
    {
        return $this->users->contains(auth()->user());
    }
}
