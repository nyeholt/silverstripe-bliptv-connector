<?php

/**
 * Controller used by the bliptv connector to return data about a video
 *
 * @author marcus@silverstripe.com.au
 * @license BSD License http://silverstripe.org/bsd-license/
 */
class BlipTVController extends Controller {
	
	public static $allowed_actions = array(
		'embedUrl'
	);

	public function embedUrl() {
		$id = $this->request->param('ID');
		if ($id) {
			$remoteItem = ExternalContent::getDataObjectFor($id);
			if ($remoteItem) {
				return $remoteItem->embedUrl;
			}
		}
	}
}
