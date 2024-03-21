<?php namespace Tradeup\App\Support\Response;

use stdClass;

class HttpResponse
{
    private static HttpResponse | null $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new HttpResponse();
        }
        return self::$instance;
    }

    public static function success($data, $message = '', $code = 200)
    {
        self::getInstance();
        return self::response($data, [], $code);
    }

    public static function error($errors, $message = '', $code = 500)
    {
        self::getInstance();
        return self::response(null, $errors, $message, $code);
    }

    private static function response($data = null, $errors = [], $message = '', $code = 200)
    {
        http_response_code($code);

        $response = new stdClass;

        $response->data = $data;
        $response->errors = $errors;
        $response->message = $message;
        $response->code = $code;

        return json_encode($response);
    }
}
