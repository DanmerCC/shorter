<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = ['to_url','count'];

    protected $appends = ['hexaid','generated_url'];

    public function getHexaidAttribute(){
        return dechex($this->id);
    }

    public function getGeneratedUrlAttribute(){
        return url('/',['hash'=>$this->hexaid]);
    }
}
