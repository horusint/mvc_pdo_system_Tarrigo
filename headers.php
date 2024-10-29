<?php
class Security {

    // Método para establecer los encabezados de seguridad
    public function setSecurityHeaders() {
        header("X-Content-Type-Options: nosniff");
        header("X-Frame-Options: SAMEORIGIN");
        header("X-XSS-Protection: 1; mode=block");
        header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
    }

    // Método para manejar sesiones seguras
    public function secureSessionStart() {
        if (!isset($_SESSION)) {
            session_start();
            session_regenerate_id(true);
        }
    }
}