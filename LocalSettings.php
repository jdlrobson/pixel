<?php
# This file was automatically generated by the MediaWiki 1.39.0-alpha
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See docs/Configuration.md for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Include platform/distribution defaults
require_once "$IP/includes/PlatformSettings.php";

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "mediawiki";
$wgMetaNamespace = "Mediawiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = getenv('PIXEL_MW_SCRIPT_PATH');

$PORT = getenv('PIXEL_MW_DOCKER_PORT');

## The protocol and server name to use in fully-qualified URLs
$wgServer = getenv('PIXEL_MW_SERVER');

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [
	'1x' => "$wgResourceBasePath/resources/assets/change-your-logo.svg",
	
	
	'icon' => "$wgResourceBasePath/resources/assets/change-your-logo-icon.svg",
];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@localhost";
$wgPasswordSender = "apache@localhost";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "database";
$wgDBname = "my_wiki";
$wgDBuser = "root";
$wgDBpassword = "";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = false;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

# Time zone
$wgLocaltimezone = "UTC";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgSecretKey = "101e9701ee95eb75c39ef96751bf33cb6606618027cb38d5a1bcc0fc7aa4e3fc";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "c45b66eebd1ce91d";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, e.g. 'vector' or 'monobook':
$wgDefaultSkin = "vector-2022";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'MinervaNeue' );
wfLoadSkin( 'Vector' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );


# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtension( 'ExtensionName' );
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension( 'BetaFeatures' );
wfLoadExtension( 'CampaignEvents' );
wfLoadExtension( 'Cite' );
wfLoadExtension( 'Echo' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'GlobalPreferences' );
wfLoadExtension( 'QuickSurveys' );
wfLoadExtension( 'MobileFrontend' );
wfLoadExtension( 'NearbyPages' );
wfLoadExtension( 'Popups' );
wfLoadExtension( 'RelatedArticles' );
wfLoadExtension( 'SandboxLink' );
wfLoadExtension( 'Thanks' );
wfLoadExtension( 'UniversalLanguageSelector' );
wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'GrowthExperiments' );
wfLoadExtension( 'VueTest' );
if ( getenv('ENABLE_WIKILAMBDA') == 'true' ) {
	wfLoadExtension( 'WikiLambda' );
}
wfLoadExtension( 'WikimediaMessages' );

// Make extended cookies (e.g. when logging in with "Keep me logged in" option)
// last indefinitely.
$wgExtendedLoginCookieExpiration = 0;

// Use same localisation cache settings as production. This also seems to get
// rid of localisation errors associated with the `array` store (set by
// PlatformSettings.php) when checking out patches/release branches.
$wgLocalisationCacheConf = [
	'class' => LocalisationCache::class,
	'store' => 'detect',
	'storeClass' => false,
	'storeDirectory' => false,
	'storeServer' => [],
	'forceRecache' => false,
	'manualRecache' => false,
];

// Shortcut for thanking.
$wgThanksSendToBots = true;

# Content Provider used to show articles from enwiki. Can be helpful when trying to see how
# production articles look locally, but be aware that there are some gotchas
# with using this that don't perfectly match the production environment. Use at
# your own discretion!
// $wgMFContentProviderClass = "MobileFrontendContentProviders\\MwApiContentProvider";
// wfLoadExtension( 'MobileFrontendContentProvider' );

# Show the enwiki logo.
$wgLogos = [
	'icon' => 'https://en.wikipedia.org/static/images/icons/wikipedia.png',
	'tagline' => [
		'src' => 'https://en.wikipedia.org/static/images/mobile/copyright/wikipedia-tagline-en.svg',
		'width' => 117,
		'height' => 13,
	],
	'1x' => 'https://en.wikipedia.org/static/images/project-logos/enwiki.png',
	'2x' => 'https://en.wikipedia.org/static/images/project-logos/enwiki-2x.png',
	'wordmark' => [
		'src' => 'https://en.wikipedia.org/static/images/mobile/copyright/wikipedia-wordmark-en.svg',
		'width' => 119,
		'height' => 18,
	],
];

// T152540: Dictates how the parser escapes section ids. Mirrors how it works
// on enwiki.
$wgFragmentMode = [ 'html5', 'legacy' ];

# Popups
$wgPopupsGateway = 'restbaseHTML';
$wgPopupsRestGatewayEndpoint = 'https://en.wikipedia.org/api/rest_v1/page/summary/';
$wgArticlePath = "/wiki/$1";

# Universal Language Selector
$wgULSPosition = 'interlanguage';
$wgULSCompactLanguageLinksBetaFeature = false;

# Useful when testing language variants
$wgUsePigLatinVariant = true;

# GlobalPreferences
$wgSharedTables = [ 'user' ]; // Note that 'user_properties' is not included.

# Visual Editor
$PARSOID_INSTALL_DIR = 'vendor/wikimedia/parsoid'; # bundled copy

// For developers: ensure Parsoid is executed from $PARSOID_INSTALL_DIR,
// (not the version included in mediawiki-core by default)
// Must occur *before* wfLoadExtension()
if ( $PARSOID_INSTALL_DIR !== 'vendor/wikimedia/parsoid' ) {
    AutoLoader::$psr4Namespaces += [
        // Keep this in sync with the "autoload" clause in
        // $PARSOID_INSTALL_DIR/composer.json
        'Wikimedia\\Parsoid\\' => "$PARSOID_INSTALL_DIR/src",
    ];
}

wfLoadExtension( 'Parsoid', "$PARSOID_INSTALL_DIR/extension.json" );

# Manually configure Parsoid
$wgVisualEditorParsoidAutoConfig = false;
$wgParsoidSettings = [
    'useSelser' => true,
    'rtTestMode' => false,
    'linting' => false,
];

$wgVirtualRestConfig['modules']['parsoid'] = [
    'url' => "http://mediawiki-web:8080" . $wgScriptPath . '/rest.php',
];

// Show new sidebar table of contents.
$wgVectorTableOfContents = [
	"default" => true,
];

// For origin/wmf/1.39.0-wmf.14 against master.
// https://phabricator.wikimedia.org/T308675
// Can be removed when comparing wmf.15
$wgMinervaOverflowInPageActions = [
	"base" => false,
	"beta" => false,
	"amc" => true,
	"loggedin" => true
];

// Disable ULS IME keyboard tool.
// This leads to false positives in tests and is not a feature maintained by web team.
$wgULSIMEEnabled = false;

const QS_ANSWERS_MULTI_CHOICE =  [
	'ext-quicksurveys-example-internal-survey-answer-positive',
	'ext-quicksurveys-example-internal-survey-answer-neutral',
	'ext-quicksurveys-example-internal-survey-answer-negative'
];

// Applies to all surveys
const QS_DEFAULTS = [
	// Who is the survey for? All fields are optional.
	'audience' => [
		'minEdits' => 0,
		'anons' => false,
		'maxEdits' => 500,
		'registrationStart' => '2018-01-01',
		'registrationEnd' => '2080-01-31',
		// You must have CentralNotice extension installed in order to limit audience by country
		// 'countries' => [ 'US', 'UK' ]
	],
	// The i18n key of the privacy policy text
	'privacyPolicy' => 'ext-quicksurveys-example-external-survey-privacy-policy',
	// Whether the survey is enabled
	'enabled' => true,
	'shuffleAnswersDisplay' => false,
	// Percentage of users that will see the survey
	'coverage' => 0,
	// For each platform (desktop, mobile), which version of it is targeted
	'platforms' => [
		'desktop' => [ 'stable' ],
		'mobile' => [ 'stable' ]
	],
];

$wgQuickSurveysConfig = [
	// Example of an internal survey
	[
		// Survey name
		'name' => 'internal example survey',
		// Internal or external link survey?
		'type' => 'internal',
		// The respondent can choose one answer from a list.
		'layout' => 'single-answer',
		// Survey question message key
		'question' => 'ext-quicksurveys-example-internal-survey-question',
		// The message key of the description of the survey. Displayed immediately below the survey question.
		//'description' => 'ext-quicksurveys-example-internal-survey-description',
		// Possible answer message keys for positive, neutral, and negative
		'answers' => QS_ANSWERS_MULTI_CHOICE,
		// Label for the optional free form text answer
		'freeformTextLabel' => 'ext-quicksurveys-example-internal-survey-freeform-text-label',
	] + QS_DEFAULTS,

	[
		// Survey name
		'name' => 'internal multi answer example survey',
		// Internal or external link survey?
		'type' => 'internal',
		// The respondent can choose one answer from a list.
		'layout' => 'multiple-answer',
		// Survey question message key
		'question' => 'ext-quicksurveys-example-internal-survey-question',
		// The message key of the description of the survey. Displayed immediately below the survey question.
		//'description' => 'ext-quicksurveys-example-internal-survey-description',
		// Possible answer message keys for positive, neutral, and negative
		'answers' => QS_ANSWERS_MULTI_CHOICE,
		// Label for the optional free form text answer
		'freeformTextLabel' => 'ext-quicksurveys-example-internal-survey-freeform-text-label',
	] + QS_DEFAULTS,
	// Example of an external survey
	[
		'name' => 'external example survey',
		// Internal or external link survey
		'type' => 'external',
		// Survey question message key
		'question' => 'ext-quicksurveys-example-external-survey-question',
		// The i18n key of the description of the survey
		'description' => 'ext-quicksurveys-example-external-survey-description',
		// External link to the survey
		'link' => 'ext-quicksurveys-example-external-survey-link',
		// Parameter to add to external link
		'instanceTokenParameterName' => 'parameterName',
	] + QS_DEFAULTS,
];


// The following CSS overrides can be used to "vet" changes by forcing Pixel to
// apply additional styles to match expectations.
$wgHooks['BeforePageDisplay'][] = function ( $out ) {
	$css = <<<HTML
<style type="text/css">
</style>
HTML;
	$out->addHTML( $css );
};

// Use production bundle of Vue to silence noisy warnings in console.
$wgVueDevelopmentMode = false;

$wgVectorLanguageAlertInSidebar = [
	"logged_in" => true,
	"logged_out" => true
];

$wgVectorPageTools = [
	'logged_in' => true,
	'logged_out' => true
];
