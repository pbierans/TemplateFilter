<?php

namespace PatrickBierans\TemplateFilter;

class FilenameHyperReference extends ValidAbsolutePath {

    // must be directly injected in your bootstrap.
    protected static $root = '';

    /**
     * @param string $value
     *
     * @return string
     * @throws \UnexpectedValueException
     * @throws \Exception
     */
    public static function apply($value): string {
        $filesource = parent::apply($value);
        if (strpos($filesource, static::$root) === false) {
            throw new \UnexpectedValueException('filename outside allowed path!');
        }
        return substr($filesource, \strlen(static::$root));
    }

    /**
     * @param string $root
     *
     * @throws \UnexpectedValueException
     * @throws \Exception
     */
    public static function setRoot($root): void {
        $root = parent::apply($root);
        if ($root[\strlen($root) - 1] !== '/') {
            $root .= '/';
        }
        static::$root = $root;
    }
}