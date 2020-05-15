<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['absolute_path','relative_path','title','tag'];

    public function store($file)
    {
        $folder_name = 'upload/images/'.date('Ym/d',time());
        $extension=$file->getClientOriginalExtension();
        $file_name='test.'.$extension;
        $file->move($folder_name,$file_name);
        return $folder_name.'/'.$file_name;
    }

    public function setRelativePathAttribute($value)
    {
        $this->attributes['relative_path']='/upload/images/'.date('Ym/d',time()).'/'.$value;
        $this->attributes['absolute_path']=public_path().'/'.$this->attributes['relative_path'];
    }
}
