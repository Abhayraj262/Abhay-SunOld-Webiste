import csv
from pathlib import Path
from urllib.parse import urlparse

ROOT = Path(__file__).resolve().parents[1]
CSV = Path(r"C:\Users\Dell\Downloads\Website Links - Sheet2.csv")
PHP = ROOT / "include" / "sunconsultants-bis-redirects.php"
USER_INI = ROOT / ".user.ini"


def normalize_dest(url: str) -> str:
    url = url.strip().replace("http://", "https://")
    parsed = urlparse(url)
    if not parsed.netloc:
        return url
    path = parsed.path or "/"
    if parsed.query:
        path += "?" + parsed.query
    return f"https://{parsed.netloc}{path}"


def load_rows():
    rows = []
    with CSV.open(newline="", encoding="utf-8") as handle:
        for row in csv.DictReader(handle):
            old = row.get("Old Website", "").strip()
            new = row.get("New Website", "").strip()
            if not old:
                continue
            path = urlparse(old).path.strip("/")
            rows.append((path, normalize_dest(new)))

    legacy = [
        ("bis-crs-registration-for-electronic", "https://bis-certifications.com/what-is-crs-bis-or-crs-registration"),
        ("plastic-waste-management-registration", "https://bis-certifications.com/epr-certificate-for-plastic-waste-management-pwm"),
        ("bis-licence-consultants", "https://bis-certifications.com/what-is-bis-certificate-indian-bis"),
        ("bis-certification", "https://bis-certifications.com/what-is-bis-certificate-indian-bis"),
        ("cdsco", "https://bis-certifications.com/cdsco-registration-certification"),
        ("bis-(crs)-registration-for-elect", "https://bis-certifications.com/what-is-crs-bis-or-crs-registration"),
        ("lmpc-certification", "https://bis-certifications.com/a-guide-on-how-to-obtain-lmpc-certificate"),
        ("impc-certification-consultants", "https://bis-certifications.com/a-guide-on-how-to-obtain-lmpc-certificate"),
        ("peso-certification", "https://bis-certifications.com/information-about-peso-certification-peso-license-india"),
        ("isi-and-bis-cert-on-toys", "https://bis-certifications.com/blogs/isi-products/bis-license-for-toys"),
        ("eta-certification-consultants", "https://bis-certifications.com/information-about-wpc-certificate-eta-approval"),
        ("apeda-registration-india", "https://bis-certifications.com/apeda-registration-india"),
        ("erda-certificate-india", "https://bis-certifications.com/erda-certificate-india"),
        ("icat-certificate-india", "https://bis-certifications.com/icat-certificate-india"),
        ("saso-saber-certification", "https://bis-certifications.com/saso-saber-certification"),
        ("stqc-certificate-india", "https://bis-certifications.com/stqc-certificate-india"),
        ("tac-certificate-india", "https://bis-certifications.com/tac-certificate-india"),
        ("notifications/bis-aluminium-alloy-tubes", "https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-alloy-tube-for-irrigation-purposes-extruded-tube"),
        ("notifications/solar-power-dc-cable", "https://bis-certifications.com/bis-qco-updates/bis-certificate-for-solar-dc-cable-and-fire-survival-cable"),
    ]
    existing = {path.lower() for path, _ in rows}
    for path, dest in legacy:
        if path.lower() not in existing:
            rows.append((path, dest))
    return rows


def build_php(rows):
    mapping_lines = []
    for path, dest in rows:
        key = "__homepage__" if path == "" else path
        mapping_lines.append(f"    {key!r} => {dest!r},")

    return (
        "<?php\n"
        "/**\n"
        " * PHP 301 fallback: sunconsultants.co.in → bis-certifications.com\n"
        " * Loaded via auto_prepend_file. Unmapped URLs return immediately (no redirect).\n"
        " */\n"
        "if (defined('SC_BIS_REDIRECT_LOADED')) {\n"
        "    return;\n"
        "}\n"
        "define('SC_BIS_REDIRECT_LOADED', true);\n\n"
        "if (!isset($_SERVER['HTTP_HOST']) || !preg_match('/^(www\\.)?sunconsultants\\.co\\.in$/i', $_SERVER['HTTP_HOST'])) {\n"
        "    return;\n"
        "}\n\n"
        "$scBisRedirects = [\n"
        + "\n".join(mapping_lines)
        + "\n];\n\n"
        "$scBisUri = strtolower(trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/'));\n"
        "$scBisKey = $scBisUri === '' ? '__homepage__' : $scBisUri;\n"
        "$scBisTarget = $scBisRedirects[$scBisKey] ?? null;\n\n"
        "if ($scBisTarget === null && !empty($_SERVER['SCRIPT_FILENAME'])) {\n"
        "    $scBisScript = strtolower(basename($_SERVER['SCRIPT_FILENAME'], '.php'));\n"
        "    if (isset($scBisRedirects[$scBisScript])) {\n"
        "        $scBisTarget = $scBisRedirects[$scBisScript];\n"
        "    }\n"
        "}\n\n"
        "if ($scBisTarget === null && isset($_GET['path']) && is_string($_GET['path']) && $_GET['path'] !== '') {\n"
        "    $scBisNotifKey = 'notifications/' . strtolower(trim($_GET['path'], '/'));\n"
        "    if (isset($scBisRedirects[$scBisNotifKey])) {\n"
        "        $scBisTarget = $scBisRedirects[$scBisNotifKey];\n"
        "    }\n"
        "}\n\n"
        "if ($scBisTarget === null) {\n"
        "    return;\n"
        "}\n\n"
        "header('Location: ' . $scBisTarget, true, 301);\n"
        "exit;\n"
    )


def main():
    rows = load_rows()
    PHP.parent.mkdir(parents=True, exist_ok=True)
    PHP.write_text(build_php(rows), encoding="utf-8", newline="\n")
    USER_INI.write_text('auto_prepend_file = "include/sunconsultants-bis-redirects.php"\n', encoding="utf-8", newline="\n")
    print(f"Generated {PHP} with {len(rows)} redirect mappings")
    print(f"Generated {USER_INI}")


if __name__ == "__main__":
    main()
