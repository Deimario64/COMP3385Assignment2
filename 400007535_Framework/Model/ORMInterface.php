<?php

namespace MVCFramework\Model;

interface ORMInterface
{
    public function find(int $id): array;
    public function save(array $data): void;
}
