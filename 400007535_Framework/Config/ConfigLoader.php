<?php

namespace MVCFramework\Config;

class ConfigLoader implements ConfigInterface
{
    public function load(string $file): array
    {
        $config = [];

        $filePath = __DIR__ . DIRECTORY_SEPARATOR . $file;

        if (file_exists($filePath)) {
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            switch ($extension) {
                case 'ini':
                    $config = parse_ini_file($filePath, true);
                    break;
                case 'php':
                    $config = include $filePath;
                    break;
                default:
                    throw new \InvalidArgumentException("Unsupported configuration file type: $extension");
            }
        } else {
            throw new \InvalidArgumentException("Configuration file not found: $filePath");
        }

        return $config;
    }
}
