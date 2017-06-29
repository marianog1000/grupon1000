<?php
namespace Bookly\Lib\Proxy;

use Bookly\Lib;

/**
 * Class PaypalPaymentsStandard
 * Invoke local methods from PayPal Payments Standard add-on.
 *
 * @package Bookly\Lib\Proxy
 *
 * @method static array prepareToggleOptions( array $options ) returns option to enable PayPal Payments Standard
 * @see \BooklyPaypalPaymentsStandard\Lib\Proxy\Export\Local::prepareToggleOptions()
 *
 * @method static string renderSetUpOptions() prints list of options to set up PayPal Payments Standard
 * @see \BooklyPaypalPaymentsStandard\Lib\Proxy\Export\Local::renderSetUpOptions()
 *
 * @method static string renderPaymentForm( string $form_id, string $page_url ) outputs HTML form for PayPal Payments Standard.
 * @see \BooklyPaypalPaymentsStandard\Lib\Proxy\Export\Local::renderPaymentForm()
 */
abstract class PaypalPaymentsStandard extends Lib\Base\ProxyInvoker
{

}
