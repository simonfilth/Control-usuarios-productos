<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuarios extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipousuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
