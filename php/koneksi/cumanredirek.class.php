<?php

/**
 * Class cumanRedirek
 * @author John Doe
 */
class cumanRedirek
{
    public function redirek($url)
    {
        header('Location: ' . $url);
        exit();
    }
}

