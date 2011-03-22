<?php

require_once dirname(dirname(dirname(__FILE__))) . '/thirdparty/BlipTV-API/bliptv_api.php';

/**
 * Description of BlipTVContentSource
 *
 * @author marcus@silverstripe.com.au
 * @license BSD License http://silverstripe.org/bsd-license/
 */
class BlipTVContentSource extends ExternalContentSource {

	public static $db = array(
		'BlipUser' => 'Varchar(64)',
	);

	public function getObject($id) {
		$item = $this->getClient()->get_video_info($id);
		return new BlipTVContentItem($this, $item[0]);
	}

	public function getRoot() {
		return $this;
	}

	/**
	 * Gets the children of this content source
	 * 
	 * @TODO Change this to return a fixed list of categories / tags, from which the
	 * children are subsequently retrieved
	 *
	 * @return DataObjectSet 
	 */
	public function stageChildren() {
		$children = new DataObjectSet();
		if ($this->BlipUser) {
			$items = $this->getClient()->get_videos('posts', $this->BlipUser, array('count' => 100));
			foreach ($items as $item) {
				$children->push(new BlipTVContentItem($this, $item));
			}
		}

		return $children;
	}

	public function getClient() {
		static $client;
		if (!$client) {
			$client = new BlipTV_API('json', 3);
		}

		return $client;
	}

	public function encodeId($id) {
		return $id;
	}

	public function decodeId($id) {
		return $id;
	}

}
