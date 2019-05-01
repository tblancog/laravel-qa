<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user(){
      
      return $this->belongsTo(User::class);
    }
    /**
     * Set title and slug attribute
     * 
     */
    public function setTitleAttribute($value) {

      $this->attributes['title'] = $value;
      $this->attributes['slug'] = str_slug($value);
    }
    
    /**
     * Gets date of creation attribute
     * 
     */
    public function getDateCreatedAttribute(){
      
      return $this->created_at->diffForHumans();
    }
}
