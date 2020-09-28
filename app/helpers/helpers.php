<?php

    /**
     * @param string $routeName
     * @return string
     */
    if (!function_exists('is_active')) {
        function is_active($routename) {
            $class = 'active';
            if(request()->segment(2) == null)
                if($routename == false ) 
                    return $class ;
            
            $class = request()->segment(2) == $routename ? $class : '';
            return $class;
        }
    }


    function getYoutubeId($url){
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        return isset($match[1]) ? $match[1] :null;
    }

    function slug($name){
        return strtolower(trim(str_replace(' ', '_', $name)));
    }