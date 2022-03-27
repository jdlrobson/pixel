module.exports = {
  "id": "MediaWiki",
  "viewports": [
    {
      "label": "phone",
      "width": 320,
      "height": 480
    },
    {
      "label": "tablet",
      "width": 720,
      "height": 768
    },
    {
      "label": "desktop",
      "width": 1000,
      "height": 900
    },
    {
      "label": "desktop-wide",
      "width": 1792,
      "height": 900 
    }
  ],
  "onBeforeScript": "puppet/onBefore.js",
  "onReadyScript": "puppet/onReady.js",
  "scenarios": [
    {
      "label": "Main_Page",
      "url": "http://mediawiki-web:8080/wiki/Main_Page"
    },
    {
      "label": "Test",
      "url": "http://mediawiki-web:8080/wiki/Test"
    },
    {
      "label": "Tree",
      "url": "http://mediawiki-web:8080/wiki/Tree"
    },
  ],
  "paths": {
    "bitmaps_reference": "backstop_data/bitmaps_reference",
    "bitmaps_test": "backstop_data/bitmaps_test",
    "engine_scripts": "backstop_data/engine_scripts",
    "html_report": "backstop_data/html_report",
    "ci_report": "backstop_data/ci_report"
  },
  "report": [
    "browser"
  ],
  "engine": "puppeteer",
  "engineOptions": {
    "args": [
      "--no-sandbox"
    ]
  },
  "asyncCaptureLimit": 5,
  "asyncCompareLimit": 50,
  "debug": false,
  "debugWindow": false
}
