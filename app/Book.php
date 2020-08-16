<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function genres() {

        return $this->belongsToMany(Genre::class);
    }

    public function getShortDescriptionAttribute() {

        return substr($this->description, 0, 50) . "...";
    }

    public function getGenreInStringAttribute() {

        $arrayGenre = $this->getGenreInArrayAttribute();

        return implode(', ', $arrayGenre );
    }

    public function getGenreInArrayAttribute() {

        return $this->genres->pluck('name')->toArray();

    }

    public function setNacionalAttribute($value) {

        $this->attributes['nacional'] = $value !== null ? 'S' : 'N';
    }

}
