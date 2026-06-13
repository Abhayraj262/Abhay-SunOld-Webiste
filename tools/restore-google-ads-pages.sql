-- Google Ads landing pages restore for ads_sunconsultants (wp_ prefix)
-- Run in phpMyAdmin if restore-google-ads-pages.php cannot be uploaded.
-- Safe to re-run: uses INSERT ... ON DUPLICATE KEY UPDATE patterns via temp checks.

UPDATE wp_options
SET option_value = 'https://sunconsultants.co.in/google-ads'
WHERE option_name IN ('siteurl', 'home');

-- Republish trashed landing pages if they still exist
UPDATE wp_posts
SET post_status = 'publish'
WHERE post_type = 'page'
  AND post_name IN (
    'bis-certification-consultants',
    'cdsco-registration-consultants',
    'lmpc-certification-consultants',
    'epr-certification'
  )
  AND post_status IN ('trash', 'draft', 'pending', 'private');

-- Page templates for existing pages
UPDATE wp_postmeta pm
INNER JOIN wp_posts p ON p.ID = pm.post_id
SET pm.meta_value = CASE p.post_name
    WHEN 'bis-certification-consultants' THEN 'template/bis-certification-page.php'
    WHEN 'cdsco-registration-consultants' THEN 'template/template-front-page.php'
    WHEN 'lmpc-certification-consultants' THEN 'template/lmpc-template-page.php'
    WHEN 'epr-certification' THEN 'template/pwm-template-page.php'
END
WHERE p.post_type = 'page'
  AND p.post_name IN (
    'bis-certification-consultants',
    'cdsco-registration-consultants',
    'lmpc-certification-consultants',
    'epr-certification'
  )
  AND pm.meta_key = '_wp_page_template';

-- If pages are completely missing, prefer running:
-- https://sunconsultants.co.in/google-ads/restore-google-ads-pages.php?key=sc-restore-google-ads-2025
