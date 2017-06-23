<?php

namespace App\Helper;
use App\Notify;

class NotifyHelper
{
  public static function getcount() {
    return Notify::join('users','users.id','=','notify_users.user_id')->select('users.*')->get();
  }
}
