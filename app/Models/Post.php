<?php
namespace AStateForum\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
   
{
   
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','title', 'category', 'body'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
         return $this->belongsTo('AStateForum\Models\User','user_id');
    }

    public function replies()
    {
        return $this->hasMany('AStateForum\Models\Post','post_id');
    }


}