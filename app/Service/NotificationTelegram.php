<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 1/9/22 .
 * Time: 9:35 AM .
 */

namespace App\Service;


class NotificationTelegram
{
    public static function sendNotificationTelegram($content, $options = [])
    {
        $message = urlencode("Có KH đặt mua nhanh trên Tailieu247.Net:");
        $telegram = file_get_contents("https://api.telegram.org/bot1357857207:AAHIaL6cJ9wxcexI3FKks7SlUDDLKF-0sSg/sendMessage?chat_id=-347260350&text=$content");
    }
}
