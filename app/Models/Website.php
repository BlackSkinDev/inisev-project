<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

     /**
     * The users that have subscribed to this website.
     */

    public function posts()
    {
        return $this->HasMany(Post::class);
    }

  
}
