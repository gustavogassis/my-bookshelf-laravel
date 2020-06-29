<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function books() {

        return $this->belongsToMany(Book::class);
    }
}
