<?php

use Illuminate\Support\Facades\Log;

/**
  * Function is used for logging error
  *
  * @param error message
  * @return void
 */
function errorReporting($error)
{
    Log::error($error);
}