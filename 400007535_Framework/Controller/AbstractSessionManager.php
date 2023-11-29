<?php

namespace MVCFramework\Controller;

abstract class AbstractSessionManager implements SessionManagerInterface
{
    abstract public function start(): void;
    abstract public function get(string $key): mixed;
    abstract public function set(string $key, $value): void;
    abstract public function destroy(): void;
}
