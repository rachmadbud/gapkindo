<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class Helper
{
  public function enkrip($id)
  {
    $enkripString = Crypt::encryptString($id);
    return $enkripString;
  }

  public function dekrip($id)
  {
    $dekripString = Crypt::decryptString($id);
    return $dekripString;
  }
}
