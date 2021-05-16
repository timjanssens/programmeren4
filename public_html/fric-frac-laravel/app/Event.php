<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'id',
        'name',
        'location',
        'starts',
        'ends',
        'image',
        'description',
        'organiserName',
        'organiserDescription',
        'eventCategoryId',
        'eventTopicId'
    ];
}
