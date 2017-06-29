<?php

namespace Bookly\Lib\Proxy;

use Bookly\Lib\Base\ProxyInvoker;

/**
 * Class RecurringAppointments
 * Invoke local methods from Recurring Appointments add-on.
 *
 * @package Bookly\Lib\Proxy
 *
 * @method static void cancelPayment( int $payment_id ) cancel payment for whole series
 * @see \BooklyRecurringAppointments\Lib\Proxy\Export\Local::cancelPayment()
 *
 * @method static array buildSchedule( \Bookly\Lib\UserBookingData $userData, string $start_time, string $end_time, string $repeat, array $params, int[] $slots ) build schedule with passed slots
 * @see \BooklyRecurringAppointments\Lib\Proxy\Export\Local::buildSchedule()
 */
class RecurringAppointments extends ProxyInvoker
{

}