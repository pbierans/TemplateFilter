<?php

namespace PatrickBierans\TemplateFilter;

class ValidAbsolutePath {

    /**
     * @param $path
     *
     * @return string
     * @throws \Exception
     * @throws \UnexpectedValueException
     */
    public static function apply($path): string {
        $path = trim($path);

        $root = ($path[0] === '/') ? '/' : '';

        if ($root !== '/') {
            throw new \UnexpectedValueException('path not absolute!');
        }

        $segments = explode('/', trim($path, '/'));
        $ret = [];
        foreach ($segments as $segment) {
            if (($segment === '.') || $segment === '') {
                continue;
            }

            if ($segment === '..') {
                array_pop($ret);
            } else {
                $ret[] = $segment;
            }
        }
        return $root . implode('/', $ret);
    }
}