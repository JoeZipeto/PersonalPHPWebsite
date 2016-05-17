<?php
	$url = 'http://www.digitaljournal.com/user/801330/rss';
	$rss = new DOMDocument;
	$rss -> load($url);
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node)
	{
		$item = array(
					'title' => $node -> getElementsByTagName('title')->item(0) -> nodeValue,
					'link' => $node -> getElementsByTagName('link')->item(0)-> nodeValue,
					'date' => $node -> getElementsByTagName('pubDate')->item(0)-> nodeValue,
					'image' => $node -> getElementsByTagName('enclosure') -> item(0) -> getAttribute('url'),
					'desc' => $node -> getElementsByTagName('description')->item(0) -> nodeValue,
						);
		array_push($feed,$item);	
	}
	$limit = 5;
?>
