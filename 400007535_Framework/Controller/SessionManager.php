<?php

namespace MVCFramework\Controller;

class SessionManager extends AbstractSessionManager
{
    public function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get(string $key): mixed
    {
        $this->start();
        return $_SESSION[$key] ?? null;
    }

    public function set(string $key, $value): void
    {
        $this->start();
        $_SESSION[$key] = $value;
    }

    public function destroy(): void
    {
        $this->start();
        session_destroy();
    }
}
