<?php

namespace App;

class Inquiry extends BaseModel
{
    protected $fillable = [
      'name',
      'email',
      'subject',
      'message',
    ];

}
