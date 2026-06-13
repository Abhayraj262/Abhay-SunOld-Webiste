<?php
/**
 * One-time restore for Google Ads landing pages on sunconsultants.co.in/google-ads/
 *
 * Usage (browser): /google-ads/restore-google-ads-pages.php?key=sc-restore-google-ads-2025
 * Usage (CLI):     php restore-google-ads-pages.php
 *
 * Delete this file after a successful run.
 */

declare(strict_types=1);

const SC_RESTORE_KEY = 'sc-restore-google-ads-2025';

$isCli = PHP_SAPI === 'cli';
if (!$isCli) {
    $key = isset($_GET['key']) ? (string) $_GET['key'] : '';
    if (!hash_equals(SC_RESTORE_KEY, $key)) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Forbidden. Pass ?key=" . SC_RESTORE_KEY . " or run via CLI.\n";
        exit;
    }
    header('Content-Type: application/json; charset=utf-8');
}

require __DIR__ . '/wp-load.php';

if (!function_exists('wp_insert_post')) {
    $message = ['ok' => false, 'error' => 'WordPress failed to load. Check database connection and wp_posts table.'];
    echo $isCli ? json_encode($message, JSON_PRETTY_PRINT) . PHP_EOL : json_encode($message);
    exit($isCli ? 1 : 0);
}

$targetHome = 'https://sunconsultants.co.in/google-ads';

$pages = [
    [
        'slug'     => 'bis-certification-consultants',
        'title'    => 'bis certification consultants',
        'template' => 'template/bis-certification-page.php',
    ],
    [
        'slug'     => 'cdsco-registration-consultants',
        'title'    => 'cdsco registration consultants',
        'template' => 'template/template-front-page.php',
    ],
    [
        'slug'     => 'lmpc-certification-consultants',
        'title'    => 'lmpc certification',
        'template' => 'template/lmpc-template-page.php',
    ],
    [
        'slug'     => 'epr-certification',
        'title'    => 'plastic waste management',
        'template' => 'template/pwm-template-page.php',
    ],
];

$report = [
    'ok'      => true,
    'urls'    => ['home' => $targetHome, 'siteurl' => $targetHome],
    'pages'   => [],
    'cache'   => [],
    'rewrite' => false,
];

update_option('home', $targetHome);
update_option('siteurl', $targetHome);

foreach ($pages as $pageDef) {
    $slug = $pageDef['slug'];
    $existing = get_page_by_path($slug, OBJECT, 'page');

    if (!$existing) {
        global $wpdb;
        $trashed = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT ID, post_status FROM {$wpdb->posts}
                 WHERE post_type = 'page' AND post_name = %s
                 ORDER BY ID DESC LIMIT 1",
                $slug
            )
        );

        if ($trashed && $trashed->post_status === 'trash') {
            wp_untrash_post((int) $trashed->ID);
            wp_update_post([
                'ID'          => (int) $trashed->ID,
                'post_status' => 'publish',
                'post_title'  => $pageDef['title'],
            ]);
            $pageId = (int) $trashed->ID;
            $action = 'restored_from_trash';
        } else {
            $pageId = wp_insert_post([
                'post_title'   => $pageDef['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ], true);

            if (is_wp_error($pageId)) {
                $report['pages'][$slug] = [
                    'ok'    => false,
                    'error' => $pageId->get_error_message(),
                ];
                $report['ok'] = false;
                continue;
            }
            $action = 'created';
        }
    } else {
        $pageId = (int) $existing->ID;
        if ($existing->post_status !== 'publish') {
            wp_update_post([
                'ID'          => $pageId,
                'post_status' => 'publish',
                'post_title'  => $pageDef['title'],
            ]);
            $action = 'republished';
        } else {
            $action = 'exists';
        }
    }

    update_post_meta($pageId, '_wp_page_template', $pageDef['template']);

    $report['pages'][$slug] = [
        'ok'       => true,
        'id'       => $pageId,
        'action'   => $action,
        'template' => $pageDef['template'],
        'url'      => get_permalink($pageId),
    ];
}

flush_rewrite_rules(true);
$report['rewrite'] = true;

$cacheDir = WP_CONTENT_DIR . '/cache/wpo-cache';
if (is_dir($cacheDir)) {
    sc_restore_delete_dir($cacheDir);
    $report['cache']['wpo-cache'] = 'cleared';
}

$minifyDir = WP_CONTENT_DIR . '/cache/wpo-minify';
if (is_dir($minifyDir)) {
    sc_restore_delete_dir($minifyDir);
    $report['cache']['wpo-minify'] = 'cleared';
}

if (function_exists('wpo_cache_flush')) {
    wpo_cache_flush();
    $report['cache']['wpo_cache_flush'] = true;
}

echo json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ($isCli ? PHP_EOL : '');
exit($report['ok'] ? 0 : 1);

/**
 * @param string $dir
 */
function sc_restore_delete_dir(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }

    $items = scandir($dir);
    if ($items === false) {
        return;
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            sc_restore_delete_dir($path);
            @rmdir($path);
        } else {
            @unlink($path);
        }
    }
}
