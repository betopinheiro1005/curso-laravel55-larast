<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
 	// protected $table = 'anotacoes';

    protected $fillable = [
        // 'title', 'body', 'important', 'group_id', 'user_id'
        'title', 'body', 'important', 'group_id'
    ];

    public function isImportant()
    {
    	return $this->important == 1;
    }

    public function group(){
    	return $this->belongsTo(Group::class); // group_id
    }

    public function scopeWithoutGroup($query){
        return $query->whereNull('group_id');
    }

    // public function scopeOrdemDesc($query){
    //     return $query->orderBy('created_at', 'DESC');
    // }

    public function scopeBelongsToGroup($query, $group){
        return $query->where('group_id', $group->id);
    }


}
