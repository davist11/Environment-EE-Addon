<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------
 
/**
 * Environment Accessory
 *
 * @package		ExpressionEngine
 * @subpackage		Addons
 * @category		Accessory
 * @author		Trevor Davis
 * @link		http://trevordavis.net
 */
 
class Environment_acc {

	public $name			= 'Environment';
	public $id			= 'environment';
	public $version			= '1.0';
	public $description		= 'Display which environment you are on at all times in the CP.';
	public $sections		= array();

	/**
	 * Set Sections
	 */
	public function set_sections()
	{
		$EE =& get_instance();
		$js = '';

		if ($EE->session->userdata('group_id') == 1 && defined('ENV') OR defined('ENV_FULL')) {

			if (defined('ENV_FULL'))
			{
				$env = ENV_FULL;
			}
			else
			{
				$env = ENV;
			}

			$js = 'var $body = $("body");
				var $siteName = $("#navigationTabs").find(".msm_sites");
				var siteNameOffset = $siteName.offset();
				var rightPos = $body.width() - siteNameOffset.left + 20;
				
				$body.append("<div class=\"environment-label\" style=\"right: " + rightPos + "px;\">' . $env . '</div>");';

			$css = '<style type="text/css" media="screen">
						.environment-label {
							background: #1f2b33;
							-moz-border-radius-bottomleft: 3px;
							-webkit-border-bottom-left-radius: 3px;
							border-bottom-left-radius: 3px;
							-moz-border-radius-bottomright: 3px;
							-webkit-border-bottom-right-radius: 3px;
							border-bottom-right-radius: 3px;
							color: #fff;
							font-size: 150%;
							padding: 20px 20px 10px;
							position: fixed;
							text-transform: uppercase;
							top: 0;
							z-index: 100;
						}
					</style>';

			$EE->cp->add_to_head($css);
		}

		$this->sections[] = '<script type="text/javascript">$("#accessoryTabs a.' . $this->id . '").parent().remove();' . $js . '</script>';

	}

	// ----------------------------------------------------------------

}
 
/* End of file acc.environment.php */
/* Location: /system/expressionengine/third_party/environment/acc.environment.php */