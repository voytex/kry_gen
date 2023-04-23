<?php
class BaseControler
{
    public function __call($name, $arguments)
    {
        $this->sendOutput("", array('HTTP/1.1 404 NotFound'));
    }

    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);

        return $uri;
    }

    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');

        if (is_array($httpHeaders) && count($httpHeaders))
        {
            foreach ($httpHeaders as $header)
            {
                header($header);
            }
        }

        echo $data;
        exit;
    }

    protected function getQueryStringParams()
    {   
        parse_str($_SERVER["QUERY_STRING"], $output);
        return $output;
    }
}