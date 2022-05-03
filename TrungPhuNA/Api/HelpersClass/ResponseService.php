<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 6/7/21 .
 * Time: 1:02 AM .
 */

namespace TrungPhuNA\Api\HelpersClass;


class ResponseService
{
    const SUCCESS = 'success';
    const ERROR   = 'error';
    const FAIL    = 'fail';

    /**
     * Get success
     *
     * @param array $data
     * @return array
     */
    public static function getSuccess($data = [], $objects = null)
    {
        return [
            'status' => ResponseService::SUCCESS,
            'data'   => $data
        ];
    }

    /**
     * Get error
     *
     * @param $message
     * @return array
     */
    public static function getError($message)
    {
        return [
            'status'  => ResponseService::ERROR,
            'message' => "{$message}"
        ];
    }

    /**
     * Get error with messages
     *
     * @param $messages
     * @return array
     */
    public static function getErrorWithMessages($messages)
    {
        return [
            'status' => ResponseService::FAIL,
            /*'data' => [
                'messages' => $messages
            ]*/
            'data'   => $messages
        ];
    }

    /**
     * @param $messages
     * @param int $error_code
     * @return array
     */
    public static function getResponseFail($messages, $data = [])
    {
        return [
            'status'  => ResponseService::FAIL,
            'message' => $messages,
            'data'    => $data
        ];
    }

    /**
     * @param \Exception|RequestException $e
     * @param string $message
     * @return array
     */
    public static function getExceptionError($e, string $message)
    : array
    {
        logger()->debug($message, ['message' => $e->getMessage()]);

        return self::getError($message);
    }
}
