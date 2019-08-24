<?php

namespace Rdtsas\Multiclient;

class Facade extends \Illuminate\Support\Facades\Facade
{
  /**
   * {@inheritDoc}
   */
  protected static function getFacadeAccessor()
  {
    return Multiclient::class;
  }
}
