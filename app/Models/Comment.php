<?php
namespace AStateForum\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
   
{
   
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','post_id','userComment'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function post()
    {
         return $this->belongsTo('AStateForum\Models\Post','post_id');
    }

    public function replies()
    {
        return $this->hasMany('AStateForum\Models\Post','post_id');
    }
    
    public function user()
    {
         return $this->belongsTo('AStateForum\Models\User','user_id');
    }


}