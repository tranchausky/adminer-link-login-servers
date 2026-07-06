<?php

class AdminerPlugin extends Adminer\Adminer {
    private $plugins = [];

    function __construct($plugins) {
        $this->plugins = $plugins;
    }

    private function applyPlugin($function, $args) {
        foreach ($this->plugins as $plugin) {
            if (method_exists($plugin, $function)) {
                $return = call_user_func_array([$plugin, $function], $args);

                if ($return !== null) {
                    return $return;
                }
            }
        }

        return call_user_func_array(["parent", $function], $args);
    }

    function loginFormField($name, $heading, $value) {
        return $this->applyPlugin(__FUNCTION__, func_get_args());
    }

    function loginForm() {
        return $this->applyPlugin(__FUNCTION__, func_get_args());
    }

    function credentials() {
        return $this->applyPlugin(__FUNCTION__, func_get_args());
    }

    function name() {
        return $this->applyPlugin(__FUNCTION__, func_get_args());
    }

    function __call($function, $args) {
        return $this->applyPlugin($function, $args);
    }
}