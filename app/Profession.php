<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //
    protected $fillable = [
        'title',
    ];

    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}
