<?php

/**
 * Description of BlipTVContentItem
 *
 * @author marcus@silverstripe.com.au
 * @license BSD License http://silverstripe.org/bsd-license/
 */
class BlipTVContentItem extends ExternalContentItem {
	
	public function __construct($source = null, $item = null) {
		if (is_array($item)) {
			$this->item = $item;
			$item = $item['itemId'];
		}

		parent::__construct($source, $item);
	}

	public function init() {
		foreach ($this->item as $key => $value) {
			$this->$key = $value;
		}
		
		$this->Title = $this->item['title'];
		$this->Description = $this->item['description'];
		$this->Link = $this->url;
		
//		$this->Link      = $this->item->get_link();
//		$this->Date      = $this->item->get_date('Y-m-d H:i:s');
//		$this->Content   = $this->item->get_content();
//
//		if ($author = $this->item->get_author()) {
//			$this->AuthorName  = $author->get_name();
//			$this->AuthorEmail = $author->get_email();
//			$this->AuthorLink  = $author->get_link();
//		}
//
//		$this->categories = new DataObjectSet();
//		$categories = @$this->item->get_categories();
//
//		if ($categories) foreach ($categories as $category) {
//			$this->categories->push(new ArrayData(array(
//				'Label'  => $category->get_label(),
//				'Term'   => $category->get_term(),
//				'Scheme' => $category->get_scheme()
//			)));
//		}
//
//		$this->Latitude  = $this->item->get_latitude();
//		$this->Longitude = $this->item->get_longitude();
	}

	public function stageChildren() {
		return new DataObjectSet();
	}

	public function getType() {
		return 'file';
	}
	
	public function numChildren() {
		return 0;
	}
}
