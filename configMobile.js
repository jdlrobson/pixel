const configDesktop = require( './configDesktop.js' );
const PIXEL_HTML_OUTPUT_DIRECTORY = process.env.PIXEL_HTML_OUTPUT_DIRECTORY;

const BASE_URL = process.env.MW_SERVER;
const tests = [
	{
		label: 'Tree (#minerva #mobile)',
		path: '/wiki/Tree?useskin=minerva&useformat=mobile'
	},
	{
		label: 'Test (#minerva #mobile)',
		path: '/wiki/Test?useskin=minerva&useformat=mobile'
	},
	{
		label: 'Test (#minerva #mobile #logged-in)',
		path: '/wiki/Test?useskin=minerva&useformat=mobile'
	},
	{
		label: 'Test (#minerva #mobile #mainmenu-open)',
		path: '/wiki/Test?useskin=minerva&useformat=mobile'
	},
	{
		label: 'Test (#minerva #mobile #logged-in #mainmenu-open)',
		path: '/wiki/Test?useskin=minerva&useformat=mobile'
	}
];

const scenarios = tests.map( ( test ) => {
	return Object.assign( {
		selectors: [ 'viewport' ]
	}, test, {
		url: `${BASE_URL}${test.path}`
	} );
} );

module.exports = Object.assign( {}, configDesktop, {
	scenarios,
	paths: Object.assign( {}, configDesktop.paths, {
		// eslint-disable-next-line camelcase
		bitmaps_reference: `${PIXEL_HTML_OUTPUT_DIRECTORY}reference-screenshots-mobile`,
		// eslint-disable-next-line camelcase
		bitmaps_test: `${PIXEL_HTML_OUTPUT_DIRECTORY}/test-screenshots-mobile`,
		// eslint-disable-next-line camelcase
		html_report: `${PIXEL_HTML_OUTPUT_DIRECTORY}/mobile`
	} )
} );
