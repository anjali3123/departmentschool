<?php

namespace App\Library;

use Illuminate\Support\Facades\Crypt as FacadesCrypt;

class Crypt {
  public static function encrypt($string)
  {
    try {
        return FacadesCrypt::encryptString($string);
    } catch(\RuntimeException $e) {
        return false;
    }
  }
  public static function decrypt($string)
  {
    try {
        return FacadesCrypt::decryptString($string);
    } catch(\RuntimeException $e) {
        return false;
    }
  }
  public static function dbformate($date)
  {
    try {
     
      $date = date_create($date);
      $dateformat = date_format($date,"Y-m-d H:i:s");

      return $dateformat;

    } catch(\RuntimeException $e) {
        return false;
    }
  }

  public static function viewformat($date)
  {
    try {
     
      $date = date_create($date);
      $dateformat = date_format($date,"m/d/Y H:i:s");
      return $dateformat;

    } catch(\RuntimeException $e) {
        return false;
    }
  }
}
