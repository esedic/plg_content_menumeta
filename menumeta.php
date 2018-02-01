<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;

/**
 * Menumeta plugin.
 *
 * @package  Menumeta
 * @since    1.0
 */
class plgContentMenumeta extends CMSPlugin
{
	/**
	 * Application object
	 *
	 * @var    CMSApplication
	 * @since  1.0
	 */
	protected $app;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * This is the first stage in preparing content for output and is the
	 * most common point for content orientated plugins to do their work.
	 *
	 * @param   ???  $form
	 * @param   ???  $data
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onContentPrepareForm($form, $data)
	{

		if (!($form instanceof JForm))
		{
			$this->_subject->setError('JERROR_NOT_A_FORM');
			return false;
		}


		$app    = Factory::getApplication();
		$option = $app->input->get('option');

		switch($option)
		{
			case 'com_menus' :
				if ($app->isAdmin()) {
				
					JForm::addFormPath(__DIR__ . '/forms');
					$form->loadFile('meta', false);
				}
			
			return true;
		}

		return true;
	}
}
