<?php

declare(strict_types=1);

/**
 * Resolve navbar Services href relative to site root (slug basename → slug.php).
 */
function nav_services_resolve_href(string $slug): string
{
    $slug = preg_replace('/[^a-z0-9\-]/i', '', trim($slug));

    return $slug === '' ? '#' : $slug . '.php';
}
