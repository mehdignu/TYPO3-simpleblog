<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "simpleblog"
 *
 * Auto generated by Extension Builder 2017-02-11
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Simple Blog extension',
    'description' => 'this is a exempl',
    'category' => 'plugin',
    'author' => 'Patrick Lobacher',
    'author_email' => 'patrick@lobacher.de',
    'state' => 'alpha',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-7.6.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    
    	'autoload' => [
		'psr-4' => ['Pluswerk\\Simpleblog\\' => 'Classes'],
	],
];
