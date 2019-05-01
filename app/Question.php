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

    /**
     * Gets status as string, can be answered, unanswered and answer-accepted
     * 
     */
    public function getStatusAttribute(){
      
      if($this->answers > 0){
        if($this->best_answer_id){
          return 'answer-accepted';
        }
        return 'answered';
      }
      return 'unanswered';
    }
}
