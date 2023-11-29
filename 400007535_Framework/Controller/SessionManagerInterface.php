<?php

namespace MVCFramework\Controller;

interface SessionManagerInterface
{
    public function start(): void;
    public function get(string $key): mixed;
    public function set(string $key, $value): void;
    public function destroy(): void;
}
