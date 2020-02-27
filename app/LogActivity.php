<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class LogActivity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject','user_id', 'causer_id'
    ];
}