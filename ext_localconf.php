<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Pluswerk.Simpleblog',
            'Bloglisting',
            [
                'Blog' => 'list,add,addForm,show,update,updateForm,deleteConfirm,delete',
				'Post' => 'addForm,add,show,updateForm,update,deleteConfirm,delete',
            ],
            // non-cacheable actions
            [
                'Blog' => 'list,add,addForm,show,update,updateForm,deleteConfirm,delete',
                'Post' => 'addForm,add,show,updateForm,update,deleteConfirm,delete',
            ]
        );

    },
    $_EXTKEY
);
