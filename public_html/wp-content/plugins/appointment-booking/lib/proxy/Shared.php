<?php
namespace Bookly\Lib\Proxy;

use Bookly\Lib;

/**
 * Class Shared
 * Invoke shared methods.
 *
 * @package Bookly\Lib\Proxy
 *
 * @method static array handleRequestAction( string $bookly_action ) Handle requests with given action.
 * @method static array preparePaymentOptions( array $options ) Alter payment option names before saving in Bookly Settings.
 * @method static array preparePaymentOptionsData( array $data ) Alter and apply payment options data before saving in Bookly Settings.
 */
abstract class Shared extends Lib\Base\ProxyInvoker
{

}
