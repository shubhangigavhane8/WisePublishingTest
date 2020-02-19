<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tvShowDetails extends Model
{
    protected $fillable = [
        'season', 'episode', 'quote' 
      ];
}
