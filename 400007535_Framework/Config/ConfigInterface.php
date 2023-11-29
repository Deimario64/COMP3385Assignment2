<?php

namespace MVCFramework\Config;

interface ConfigInterface
{
    public function load(string $file): array;
}
