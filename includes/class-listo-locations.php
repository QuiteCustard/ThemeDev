<?php
// Add custom locations through Listo to CF7
    add_filter('listo_list_types', 'listo_addLocations');

    function listo_addLocations($list_types) {
        $list_types['locations'] = 'Listo_Locations';
        return $list_types;
    }

    class Listo_Locations implements Listo {

        public static function items() {
            $pageID = "";
            $the_pages = getPropInfo($pageID);
            
            // Loop through pages and add them to list if they are using a specific template set in getPropInfo
            foreach ($the_pages as $id =>$title) {
                $items [$id] = $title;
            }

            return $items;
        }

        public static function groups(){}
    }

