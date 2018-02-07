<?php

namespace App;

class Survey extends BaseModel
{
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'tools',
      'offers',
      'city_type_text',
      'city',
      'facebook',
      'skype',
      'role',
      'resume',
      'languages',
      'description',
      'weakness',
      'strength',
      'why_angry',
      'why_laugh',
      'interests',
    ];

}
