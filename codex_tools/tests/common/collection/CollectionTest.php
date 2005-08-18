<?php
if (! defined('CODEX_RUNNER')) {
    define('CODEX_RUNNER', __FILE__);
    require_once('tests/CodexReporter.class');
}

require_once('CollectionTestCase.class');
require_once('common/collection/Collection.class');

/**
 * Copyright (c) Xerox Corporation, CodeX Team, 2001-2005. All rights reserved
 * 
 * $Id: CollectionTest.php,v 1.1 2005/05/10 09:48:10 nterray Exp $
 *
 * Test the class Collection
 */
class CollectionTest extends CollectionTestCase {
    /**
     * Constructor of the test. Can be ommitted.
     * Usefull to set the name of the test
     */
    function CollectionTest($name = 'Collection test') {
        $this->CollectionTestCase($name);
        $this->collection_class_name = 'Collection';
    }
}

//We want to be able to run one test AND many tests
if (CODEX_RUNNER === __FILE__) {
    $test = &new CollectionTest();
    $test->run(new CodexReporter());
 }
?>
