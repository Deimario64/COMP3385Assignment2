<?php

namespace MVCFramework\Controller;

interface RouterInterface
{
    public function route($uri): void;
    public function getRequestParams(): array;
}
