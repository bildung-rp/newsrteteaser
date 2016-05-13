<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TCA']['tt_news']['columns']['short']['defaultExtras'] = 'richtext:rte_transform[mode=ts_css]';
$GLOBALS['TCA']['tt_news']['columns']['short']['config']['softref'] = 'typolink_tag,images,email[subst],url';
$GLOBALS['TCA']['tt_news']['columns']['short']['config']['wizards'] = array(
    'RTE' => array(
        'notNewRecords' => 1,
        'RTEonly' => 1,
        'type' => 'script',
        'title' => 'LLL:EXT:lang/locallang_general.php:LGL.subheader',
        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_rte.gif',
        'module' => array(
                'name' => 'wizard_rte',
        ),
    ),
);
foreach($GLOBALS['TCA']['tt_news']['types'] as $index => $conf) {
    $GLOBALS['TCA']['tt_news']['types'][$index]['showitem'] = preg_replace('/short([.^,])*,/', 'short;;;richtext:rte_transform[flag=rte_enabled|mode=ts];4-4-4,', $GLOBALS['TCA']['tt_news']['types'][$index]['showitem']);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY,'static/news_with_rte_subheader/', 'News with RTE Subheader');
?>
