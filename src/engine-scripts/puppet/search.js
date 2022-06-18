const moduleReady = require( './moduleReady' );
const fastForwardAnimations = require( './fastForwardAnimations' );

/**
 * Focuses the search input and types test
 *
 * @param {import('puppeteer').Page} page
 * @param {string[]} hashtags
 */
module.exports = async ( page, hashtags ) => {
	const isOffline = hashtags.includes( '#search-offline' );
	if ( isOffline ) {
		await page.setOfflineMode( true );
	}

	const isStickyHeaderScenario = hashtags.includes( '#search-sticky' );
	const selectorSearchToggle = isStickyHeaderScenario ?
		'.vector-sticky-header-search-toggle' : '.search-toggle';
	const selectorSearchInput = isStickyHeaderScenario ?
		'#vector-sticky-header input[name="search"]' : 'input[name="search"]';
	const selectorSearchSuggestion = isStickyHeaderScenario ?
		'#vector-sticky-header .vector-search-box-vue li a' : '#searchform li a';

	// Click toggle if necessary to reveal input
	const button = await page.waitForSelector( selectorSearchToggle );
	await button.boxModel().then( async ( box ) => {
		// If bounding box is null then the button is hidden on the page.
		if ( box !== null ) {
			await button.click();
		}
	} );
	// Focus the server side rendered search to trigger the loading of Vue.
	await page.focus( selectorSearchInput );
	if ( isOffline ) {
		// type into the server side rendered input
		page.keyboard.type( 't' );
		// Wait for the loader to display
		await page.waitForSelector( '.search-form__loader', {
			visible: true
		} );
		await fastForwardAnimations( page );
	} else {
		// Wait for Vue to load.
		await moduleReady( page, 'vue' );
		// focus and type into the newly added input
		await page.focus( selectorSearchInput );
		await page.keyboard.type( 't' );
		// Wait for a search result to display.
		await page.waitForSelector( selectorSearchSuggestion, {
			visible: true,
			timeout: 10000
		} );
	}
};
