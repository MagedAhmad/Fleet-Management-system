<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\Translations\StationTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'name'
    ];

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * page translation model.
     * @var string
     */
    public $translationModel= StationTranslation::class;
}
