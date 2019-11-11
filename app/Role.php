<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  /**
  * The permissions that belong to the role.
  */
  public function permissions()
  {
    return $this->belongsToMany('App\Permission', 'role_has_permissions');
  }
}
