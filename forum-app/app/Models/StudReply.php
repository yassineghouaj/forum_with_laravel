<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudReply extends Model
{
	protected $table = 'replys';
	public $timestamps = true;
	protected $fillable = [
		'reply',
		'user_id',
		'post_id'
	];
}