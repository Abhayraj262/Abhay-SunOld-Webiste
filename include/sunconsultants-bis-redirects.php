<?php
/**
 * PHP 301 fallback: sunconsultants.co.in → bis-certifications.com
 * Loaded via auto_prepend_file. Unmapped URLs return immediately (no redirect).
 */
if (defined('SC_BIS_REDIRECT_LOADED')) {
    return;
}
define('SC_BIS_REDIRECT_LOADED', true);

if (!isset($_SERVER['HTTP_HOST']) || !preg_match('/^(www\.)?sunconsultants\.co\.in$/i', $_SERVER['HTTP_HOST'])) {
    return;
}

$scBisRequestPath = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if (preg_match('#^/google-ads(?:/|$)#i', $scBisRequestPath)) {
    return;
}
if (!empty($_SERVER['SCRIPT_FILENAME']) && stripos($_SERVER['SCRIPT_FILENAME'], '/google-ads/') !== false) {
    return;
}

$scBisRedirects = [
    '__homepage__' => 'https://bis-certifications.com/',
    'exhibitions-and-seminar' => 'https://bis-certifications.com/seminars-and-exhibitions',
    'cdsco-registration-certification' => 'https://bis-certifications.com/cdsco-registration-certification',
    'fmcs-certification-consultants' => 'https://bis-certifications.com/a-guide-to-bis-certification-for-foreign-manufacturers-indian-bis',
    'isi-mark-registration-certification' => 'https://bis-certifications.com/a-guide-to-bis-certification-indian-bis',
    'isi-and-bis-cert-on-toys' => 'https://bis-certifications.com/blogs/isi-products/bis-license-for-toys',
    'epr-certification-consultants' => 'https://bis-certifications.com/a-guide-on-how-to-obtain-epr-certificate',
    'lmpc-certification-consultants' => 'https://bis-certifications.com/a-guide-on-how-to-obtain-lmpc-certificate',
    'plastic-waste-management-registration' => 'https://bis-certifications.com/epr-certificate-for-plastic-waste-management-pwm',
    'legal-metrology-certification-consultants' => 'https://bis-certifications.com/what-is-legal-metrology-or-lmpc-certificate',
    'bis-registration-certification' => 'https://bis-certifications.com/what-is-bis-certificate-indian-bis',
    'bis-crs-registration-for-electronic' => 'https://bis-certifications.com/what-is-crs-bis-or-crs-registration',
    'peso-certification-consultants' => 'https://bis-certifications.com/information-about-peso-certification-peso-license-india',
    'tec-certification-consultants' => 'https://bis-certifications.com/information-about-tec-certificate-mtcte',
    'wpc-certification-consultants' => 'https://bis-certifications.com/information-about-wpc-certificate-eta-approval',
    'eta-certification-consultants' => 'https://bis-certifications.com/information-about-wpc-certificate-eta-approval',
    'apeda-registration-india' => 'https://bis-certifications.com/apeda-registration-india',
    'erda-certificate-india' => 'https://bis-certifications.com/erda-certificate-india',
    'icat-certificate-india' => 'https://bis-certifications.com/icat-certificate-india',
    'saso-saber-certification' => 'https://bis-certifications.com/saso-saber-certification',
    'stqc-certificate-india' => 'https://bis-certifications.com/stqc-certificate-india',
    'tac-certificate-india' => 'https://bis-certifications.com/tac-certificate-india',
    'rohs-certification-consultants' => 'https://bis-certifications.com/restriction-of-hazardous-substance-rohs-certificate',
    'bee-registration-certification' => 'https://bis-certifications.com/bee-certification',
    'ce-certification-consultants' => 'https://bis-certifications.com/ce-certification',
    'emi-emc-certification-consultants' => 'https://bis-certifications.com/emi-emc-certification',
    'cb-certification-consultants' => 'https://bis-certifications.com/cb-certification',
    'latest-notifications' => 'https://bis-certifications.com/bis-qco-updates',
    'contact-us' => 'https://bis-certifications.com/contact',
    'terms-condition' => 'https://bis-certifications.com/terms-and-conditions',
    'privacy-policy' => 'https://bis-certifications.com/privacy-policy',
    'about-us' => 'https://bis-certifications.com/about',
    'bis-crs-registration-certification' => 'https://bis-certifications.com/what-is-crs-bis-or-crs-registration',
    'peso-approval' => 'https://bis-certifications.com/information-about-peso-certification-peso-license-india',
    'plastic-waste-management-authorization' => 'https://bis-certifications.com/epr-certificate-for-plastic-waste-management-pwm',
    'notifications/wrought-aluminium-alloys-forging-stock' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloys-forging-stock-and-forgings',
    'notifications/h-acid' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-h-acid',
    'notifications/k-acid' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-k-acid',
    'notifications/vinyl-sulphone' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-vinyl-sulphone',
    'notifications/electric-fence-energizers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electric-fence-energizers',
    'notifications/clothes-washing-machines' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-clothes-washing-machines',
    'notifications/gypsum-plaster-boards' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-gypsum-plaster-boards',
    'notifications/aluminium-alloy-irrigation-tubes-welded' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-alloy-tubes-for-irrigation-purposes-welded-tubes',
    'notifications/bis-aluminium-alloy-tubes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-alloy-tube-for-irrigation-purposes-extruded-tube',
    'notifications/aluminium-alloy-tube-irrigation-purposes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-alloy-tube-for-irrigation-purposes-extruded-tube',
    'notifications/ec-grade-aluminium-rod' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-ec-grade-aluminium-rod-produced-by-continuous-casting-and-rolling',
    'notifications/wrought-aluminium-bars-rods-sections' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloy-bars-rods-and-sections',
    'notifications/wrought-aluminium-alloys-forging-stock-and-forging' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloys-forging-stock-and-forgings',
    'notifications/wrought-aluminium-alloy-plate-engineering' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloy-plate-for-general-engineering-purposes',
    'notifications/wrought-aluminium-alloy-sheet-strip' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloy-sheet-and-strip',
    'notifications/wrought-aluminium-alloy-wire' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloy-wire',
    'notifications/wrought-aluminium-alloy-rivet-stock' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloy-rivet-stock',
    'notifications/wrought-aluminium-alloy-electrical-applications' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloy-for-electrical-applications',
    'notifications/aluminium-and-aluminium-alloy-foil' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-and-aluminium-alloy-foil',
    'notifications/aluminium-composite-panel' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-composite-panel',
    'notifications/wrought-aluminium-extruded-round-tube-hollow' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloys-extruded-round-tube-and-hollow',
    'notifications/aluminium-tubes-and-hollows' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-wire-for-electrical-purposes',
    'notifications/aluminium-utensils' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wrought-aluminium-and-aluminium-alloys-for-manufacture-of-utensils',
    'notifications/corrugated-aluminium-sheet' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-corrugated-aluminium-sheet',
    'notifications/alloy-forging-stock-and-forgings' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminium-alloy-forging-stock-and-forgings-alloy-24345-for-aerospace-applications',
    'notifications/solar-flat-plate-collector' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-solar-flat-plate-collector',
    'notifications/solar-water-heating-system' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-solar-water-heating-system',
    'notifications/storage-water-tank' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-storage-water-tank',
    'notifications/flat-woven-webbing-slings' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-flat-woven-webbing-slings',
    'notifications/textiles-manila-ropes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-textiles-manila-ropes',
    'notifications/fibre-ropes-polyester' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fibre-ropes-polyester',
    'notifications/synthetic-fibre-ropes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-synthetic-fibre-ropes',
    'notifications/mixe-polyolefin-fibre-ropes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-mixed-polyolefin-fibre-ropes',
    'notifications/steel-wire-ropes-fibre-main-cores' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-steel-wire-ropes-fibre-main-cores',
    'notifications/fibre-ropes-polyamide' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fibre-ropes-polyamide',
    'notifications/fibre-ropes-polypropylene' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fibre-ropes-polypropylene',
    'notifications/fibre-ropes-and-polyester' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fibre-ropes-polyethylene',
    'notifications/fibre-ropes-dual-fibres' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fibre-ropes-dual-fibres',
    'notifications/countersunk-flat-head-screws-gradeA-part2' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-countersunk-flat-head-screws-common-head-style-with-type-h-or-type-z-cross-recess-product-grade-a-part-2-steel-screws-of-property-class-88-stainless-steel-screws-and-non-ferrous-metal-screws',
    'notifications/wrapped-steel-cylinder-pipes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bar-or-wire-wrapped-steel-cylinder-pipes-with-mortar-lining-and-coating-including-specials',
    'notifications/deformed-stainless-steel-bars-wires' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-high-strength-deformed-stainless-steel-bars-and-wires',
    'notifications/steel-ipe-flanges' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-steel-pipe-flanges',
    'notifications/stainless-steel-tubes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-stainless-steel-tubes-for-the-food-and-beverage-industry',
    'notifications/chipboard-screws' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-chipboard-screws-specification',
    'notifications/cross-recessed-countersunk-wood-screws' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-cross-recessed-countersunk-head-wood-screws-specification',
    'notifications/cross-recessed-pan-head-screws' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fasteners-cross-recessed-drilling-screws-with-tapping-screw-thread-part-1-pan-head',
    'notifications/cross-recessed-screws-raised-countersunk' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fasteners-cross-recessed-drilling-screws-with-tapping-screw-thread-part-3-raised-countersunk-head',
    'notifications/cross-recessed-tapping-screw-part-3-raised-countersunk-oval-head' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-cross-recessed-tapping-screw-part-3-raised-countersunk-oval-head',
    'notifications/cross-recessed-tapping-screws-flat-head' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-cross-recessed-tapping-screws-part-2-countersunk-flat-head',
    'notifications/cross-recessed-tapping-screws-pan-head' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-cross-recessed-tapping-screws-part-1-pan-head',
    'notifications/drywall-screws-specification' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-drywall-screws-specification',
    'notifications/fasteners-cross-recessed-drilling-screws-countersunk-head' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fasteners-cross-recessed-drilling-screws-with-tapping-screw-thread-part-2-countersunk-head',
    'notifications/fasteners-hexagon-washer-head' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fasteners-hexagon-washer-head-drilling-screws-with-tapping-screw-thread',
    'notifications/flat-head-HZ-screws-part1' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-countersunk-flat-head-screws-common-head-style-with-type-h-or-type-z-cross-recess-product-grade-a-part-1-steel-screws-of-property-class-48',
    'notifications/gypsum-based-building-materials' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-gypsum-based-building-materials',
    'notifications/raised-countersunk-flat-head-screws-type-hz-grade-a' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-raised-countersunk-head-screws-common-head-style-with-type-h-or-type-z-cross-recess-product-grade-a',
    'notifications/type-h-z-cross-recess' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-pan-head-screws-with-type-h-or-type-z-cross-recess-product-grade-a',
    'notifications/flux-cored-solder-wire' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-flux-cored-solder-wire',
    'notifications/chain-pipe-wrenches' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-chain-pipe-wrenches',
    'notifications/open-ended-slugging-wrenches-spanners' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-open-ended-slugging-wrenches-spanners',
    'notifications/slugging-wrenches' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-ring-slugging-wrenches-spanners',
    'notifications/single-ended-open-jaw-adjustable-wrenches' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-single-ended-open-jaw-adjustable-wrenches',
    'notifications/open-jaw-wrenches' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-open-jaw-wrenches',
    'notifications/ring-wrenches' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-ring-wrenches',
    'notifications/pipe-wrenches-general-purpose' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-pipe-wrenches-general-purpose',
    'notifications/pipe-wrenches-heavy-duty' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-pipe-wrenches-heavy-duty',
    'notifications/combination-side-cutting-pliers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-combination-side-cutting-pliers',
    'notifications/safety-household-commercial-electrical-appliances' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-safety-of-household-commercial-and-similar-electrical-appliances',
    'notifications/hinges' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-hinges',
    'notifications/steel-wires-strands-nylonn-wire-ropes-wire-mesh' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-steel-wires-or-strands-nylon-or-wire-ropes-and-wire-mesh',
    'notifications/hdpe-pp-woven-sacks-for-packaging-fertilizers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-hdpe-pp-woven-sacks-for-packaging-fertilizers',
    'notifications/pp-hdpe-laminated-woven-sacks-mail-sorting-storage-transport-distribution' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-pp-hdpe-laminated-woven-sacks-for-mail-sorting-storage-transport-and-distribution',
    'notifications/pp-woven-laminated-block-bottom-valve-sacks-cement' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-polypropylene-pp-woven-laminated-block-bottom-valve-sacks-for-packaging-of-50-kg-cement',
    'notifications/chains-sprockets' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-precision-roller-and-bush-chains-attachments-and-associated-chains-sprockets',
    'notifications/nickel-powder' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-nickel-powder',
    'notifications/qco-copper' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-copper',
    'notifications/cast-aluminium-and-alloys' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-cast-aluminium-and-its-alloys',
    'notifications/high-purity-primary-aluminum-ingot' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-high-purity-primary-aluminum-ingot',
    'notifications/aluminum-alloy-ingots-remelting' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminum-alloy-ingots-for-remelting',
    'notifications/primary-aluminium-ingots-remelting' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-primary-aluminium-ingots-for-remelting',
    'notifications/aluminum-ingots-billets-wire-bars' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-aluminum-ingots-billets-and-wire-bars',
    'notifications/telescopic-ball-bearing-drawer-slide' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-telescopic-ball-bearing-drawer-slides',
    'notifications/copper-products' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-copper-products',
    'notifications/agro-textiles' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-agro-textiles',
    'notifications/plywood-for-general-purposes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-plywood-for-general-purposes',
    'notifications/flush-door-shutters' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-wooden-flush-door-shutters-solid-core-type-plywood-face-panels',
    'notifications/marine-plywood' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-marine-plywood',
    'notifications/fire-retardant-plywood' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fire-retardant-plywood',
    'notifications/Veneered-decorative-plywood' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-veneered-decorative-plywood',
    'notifications/particle-board-hardboard-panels' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-particle-board-and-hardboard-face-panels',
    'notifications/plywood-face-panels' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-plywood-face-panels',
    'notifications/fibre-hardboard-face-panels' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-fibre-hardboard-face-panels',
    'notifications/plywood-for-concrete-shuttering-works' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-plywood-for-concrete-shuttering-works',
    'notifications/structural-plywood' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-structural-plywood',
    'notifications/v-belt-order' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-v-belts',
    'notifications/glass-fibre-reinforced-gypsum-panels' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-glass-fibre-reinforced-gypsum-panels',
    'notifications/reinforced-gypsum-plaster-boards-tiles' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-reinforced-gypsum-plaster-boards-and-ceiling-tiles',
    'notifications/air-cooler-and-air-filters' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-evaporative-air-coolers-desert-coolers',
    'notifications/asbestos-fibre-cement-based-products' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-asbestos-or-fibre-cement-based-products',
    'notifications/diesel-engines-nox-reduction-agenta' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-diesel-engines-nox-reduction-agent-aus-32-specification',
    'notifications/electrical-appliance-commerial-dispensing-and-vending' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electrical-appliance-for-commercial-dispensing-and-vending',
    'notifications/electrical-appliance-domestic-clothes-washing' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electrical-appliance-for-domestic-clothes-washing',
    'notifications/electrical-appliance-fans' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electrical-appliance-fans',
    'notifications/electrical-appliances-for-domestic-water-heating' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electric-water-heaters',
    'notifications/electrical-appliances-for-skin-hair-care' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electrical-appliances-for-skin-or-hair-care',
    'notifications/electrical-appliances-kitchen' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electrical-appliances-for-kitchen',
    'notifications/water-meters-accessories' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-water-meter-and-accessories',
    'notifications/poly-vinyl-chloride-homopolymers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-poly-vinyl-chloride-pvc-homopolymers-specification',
    'notifications/specification-for-polypropylene-materials-moulding-extrusion' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-polypropylene-pp-materials-for-moulding-and-extrusion',
    'notifications/baby-diaper' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-baby-diaper',
    'notifications/bedsheet-and-pillow-cover' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bedsheet-and-pillow-cover',
    'notifications/dental-bib-napkin' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-dental-bib-napkins',
    'notifications/drinking-water-cooler' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-self-contained-drinking-water-cooler',
    'notifications/reusable-sanitary-pad-sanitary-napkin-period-panties' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-reusable-sanitary-pad-sanitary-napkin-period-panties',
    'notifications/sanitary-napkins' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-sanitary-napkins',
    'notifications/shoe-covers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-shoe-covers',
    'notifications/electrical-accessories' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electrical-accessories',
    'notifications/laboratory-glassware' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-laboratory-glassware',
    'notifications/cycle-and-rickshaw-tyres-and-tubes' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-cycle-and-rickshaw-tyres-tubes',
    'notifications/safe-deposit-locker-cabinets-key-locks' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-safe-deposit-locker-cabinets',
    'notifications/woven-sacks-packaging-Polymer-material' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-hdpe-pp-woven-sacks-for-packaging-of-25-kg-polymer-materials',
    'notifications/legal-Metrology-material-measures-Length' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-legal-metrology-material-measures-of-length',
    'notifications/door-Fittings' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-door-fittings',
    'notifications/drums-and-Tins' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-drums-and-tins',
    'notifications/helmet-Police-Force-Civil-Defence-personnel' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-helmets-for-police-force-civil-defence-and-personal-protection',
    'notifications/bottled-water-despensers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bottled-water-dispensers',
    'notifications/implementation-tables-and-desk-specification' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-implementation-of-is-17633-2022-specification-for-tables-and-desks',
    'notifications/rubber-gskets-pressure-cookers' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-rubber-gaskets-for-pressure-cookers',
    'notifications/electric-cable-photovoltic' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-electric-cable-for-photovoltaic',
    'notifications/primary-lead' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bis-qco-notification-for-primary-lead',
    'notifications/refined-nickel' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bis-qco-notification-for-refined-nickel',
    'notifications/tin-Ingot' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bis-qco-notification-for-tin-ingot',
    'notifications/refined-zinc' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bis-qco-notification-for-refined-zinc',
    'notifications/teel-and-steel-products' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-bis-qco-notification-for-steel-and-steel-products',
    'bis-licence-consultants' => 'https://bis-certifications.com/what-is-bis-certificate-indian-bis',
    'bis-certification' => 'https://bis-certifications.com/what-is-bis-certificate-indian-bis',
    'cdsco' => 'https://bis-certifications.com/cdsco-registration-certification',
    'bis-(crs)-registration-for-elect' => 'https://bis-certifications.com/what-is-crs-bis-or-crs-registration',
    'lmpc-certification' => 'https://bis-certifications.com/a-guide-on-how-to-obtain-lmpc-certificate',
    'impc-certification-consultants' => 'https://bis-certifications.com/a-guide-on-how-to-obtain-lmpc-certificate',
    'peso-certification' => 'https://bis-certifications.com/information-about-peso-certification-peso-license-india',
    'notifications/solar-power-dc-cable' => 'https://bis-certifications.com/bis-qco-updates/bis-certificate-for-solar-dc-cable-and-fire-survival-cable',
];

$scBisUri = strtolower(trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/'));
$scBisKey = $scBisUri === '' ? '__homepage__' : $scBisUri;
$scBisTarget = $scBisRedirects[$scBisKey] ?? null;

if ($scBisTarget === null && !empty($_SERVER['SCRIPT_FILENAME'])) {
    $scBisScript = strtolower(basename($_SERVER['SCRIPT_FILENAME'], '.php'));
    if (isset($scBisRedirects[$scBisScript])) {
        $scBisTarget = $scBisRedirects[$scBisScript];
    }
}

if ($scBisTarget === null && isset($_GET['path']) && is_string($_GET['path']) && $_GET['path'] !== '') {
    $scBisNotifKey = 'notifications/' . strtolower(trim($_GET['path'], '/'));
    if (isset($scBisRedirects[$scBisNotifKey])) {
        $scBisTarget = $scBisRedirects[$scBisNotifKey];
    }
}

if ($scBisTarget === null) {
    return;
}

header('Location: ' . $scBisTarget, true, 301);
exit;
