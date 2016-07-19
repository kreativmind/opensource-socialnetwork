<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014-2016 SOFTLAB24 LIMITED
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
$settings = input('settings');
if (empty($settings)) {
    $settings = 'list';
}
switch ($settings) {
    case 'list':
        echo ossn_plugin_view('ads/pages/list');
        break;
    case 'add':
        echo ossn_plugin_view('ads/pages/add');
        break;
    case 'edit':
	    $id = input('id');
		if(!empty($id)){
			$ads = new OssnAds;
			$params['entity'] = $ads->getAd($id);
            echo ossn_plugin_view('ads/pages/edit', $params);
		}
        break;	
	//missing 'view' case - 'Browse' didn't work #233
    case 'view':
	    $id = input('id');
		if(!empty($id)){
			$ads = new OssnAds;
			$params['entity'] = $ads->getAd($id);
            echo ossn_plugin_view('ads/pages/view', $params);
		}
        break;			
    default:
        break;

}
?>
