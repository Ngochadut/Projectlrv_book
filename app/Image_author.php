<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Image_author extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "image_author";

    protected $fillable = [
        'author_id', 'name','create_by','update_by','delete_at'
    ];

    public function product(){
        return $this->belongsTo(Author::class, 'user_id', 'id');
    }
}
