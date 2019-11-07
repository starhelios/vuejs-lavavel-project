<?php
namespace App;

abstract class Model extends \Illuminate\Database\Eloquent\Model {
    protected $guarded = ['id'];
}