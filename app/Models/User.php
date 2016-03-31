<?php
namespace AStateForum\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password','first_name','last_name','location'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getName()
    {
        if($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }
        if($this->first_name){
            return $this->first_name;
        }
        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getname() ?: $this->username;
    }

    public function getFirstNameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }

    public function getAvatarUrl()
    {
       $userName = $this->username;
       $filename = "./images/$userName.jpg";

        if (file_exists($filename)) {
          return "/images/$userName.jpg";
        } else {
          return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
        }
       
        /*
        $value = file_exists("/images/$userName.jpg");
        dd($value);
        dd($userName);
        http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
        return "/images/$userName.jpg";*/
    }

    public function posts()
    {
       return $this->hasMany('AStateForum\Models\Post','user_id');
    }

    public function statuses()
    {
        return $this->hasMany('AStateForum\Models\Post', 'user_id');
    }
}