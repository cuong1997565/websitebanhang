<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ="products";
    protected $fillable = ['id','name','slug','price','img','warranty','accessories','promotion',
                            'status','description','featured','category_id'
                          ];
}
