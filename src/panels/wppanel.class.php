<?php

namespace WpTracy;

use Tracy\Debugger;

/**
 * Custom panel based on global $wp variable + other global (versions) variables
 *
 * @author Martin Hlaváč
 */
class WpPanel extends WpPanelBase
{
    public function getTab()
    {
        return parent::getSimpleTab(__("WP"), null);
    }

    public function getPanel()
    {
        /* @var $wpdb \WP */
        global $wp;
        global $wp_version;
        global $wp_db_version;
        global $tinymce_version;
        global $required_php_version;
        global $required_mysql_version;
        global $pagenow;
        $output = parent::getTablePanel([
            __("WP Version") => $wp_version,
            __("WP DB Version ") => $wp_db_version,
            __("TinyMCE Version ") => $tinymce_version,
            __("Required PHP Version") => $required_php_version,
            __("Required MySQL Version") => $required_mysql_version,
            __("Page Now") => $pagenow,
            __("WP") => Debugger::dump($wp, true),
        ]);
        return $output;
    }
}
