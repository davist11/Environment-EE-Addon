Display which environment you are on **at all times** in the CP so you don't accidentally do something bad on the production environment. In your config.php, set an ENV variable like so:

<pre>if(!defined('ENV')) {
	switch ($_SERVER['SERVER_NAME']) {
		case 'site.com':
			define('ENV', 'prod');
		break;

		case 'stage.site.com':
			define('ENV', 'staging');
		break;

		default:
			define('ENV', 'local');
		break;
	}
}</pre>

The value of ENV will be injected into the header of the CP and fixed to the screen as you scroll.

You can also change the color of the environment label using a config variable named **environment_color**, just pass in a valid CSS color.

<pre>if(!defined('ENV')) {
	switch ($_SERVER['SERVER_NAME']) {
		case 'site.com':
			define('ENV', 'prod');
			$config['environment_color'] = 'green';
		break;

		default:
			define('ENV', 'local');
			$config['environment_color'] = '#f00';
		break;
	}
}</pre>

You can customize which member groups see the label by using a config variable named **environment_member_groups** and assigning it to an array of member group IDs.

<pre>$config['environment_member_groups'] = array(1, 6);</pre>

By default, it is visible to the Super Admin member group.