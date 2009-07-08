<?php

$meta['google_analytics_code'] = array('string');
$meta['sidebar'] = array('multichoice',
	'_choices' => array(
		'off',
		'left',
		'right'
	)
);
$meta['pagename'] = array('string', '_pattern' => '#[a-z0-9]*#');
$meta['trace'] = array('multichoice',
	'_choices' => array(
		'off',
		'breadcrumbs',
		'you are here'
	)
);
$meta['left_sidebar_order'] = array('string',
	'_pattern' => '#[a-z0-9,]*#'
);
$meta['left_sidebar_content'] = array('multicheckbox',
	'_choices' => array(
		'main',
		'toc',
		'user',
		'group',
		'namespace',
		'toolbox',
		'index',
		'trace',
		'extra'
	)
);
$meta['right_sidebar_order'] = array('string',
	'_pattern' => '#[a-z0-9,]*#'
);
$meta['right_sidebar_content'] = array('multicheckbox',
	'_choices' => array(
		'main',
		'toc',
		'user',
		'group',
		'namespace',
		'toolbox',
		'index',
		'trace',
		'extra'
	)
);