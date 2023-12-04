<?php

/*
    Asatru PHP - Example controller

    Add here all your needed routes implementations related to 'index'.
*/

/**
 * Example index controller
 */
class IndexController extends BaseController {
	const INDEX_LAYOUT = 'layout';

	/**
	 * Perform base initialization
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct(self::INDEX_LAYOUT);
	}

	/**
	 * Handles URL: /
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		return parent::view(['content', 'index']);
	}

	/**
	 * Handles URL: /nonfollowers
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\RedirectHandler|Asatru\View\ViewHandler
	 */
	public function nonfollowers($request)
	{
		try {
			if ((!isset($_FILES['archive'])) || ($_FILES['archive']['error'] !== UPLOAD_ERR_OK) || ($_FILES['archive']['type'] !== 'application/x-zip-compressed')) {
				throw new \Exception('Failed to upload file or invalid file uploaded');
			}
			
			$tmpname = md5(random_bytes(55) . date('Y-m-d H:i:s'));

			move_uploaded_file($_FILES['archive']['tmp_name'], public_path() . '/archives/' . $tmpname . '.zip');

			ZipModule::extract(public_path() . '/archives/' . $tmpname . '.zip', $tmpname);
			FollowerModule::generate(public_path() . '/archives/' . $tmpname);

			unlink(public_path() . '/archives/' . $tmpname . '.zip');

			DirModule::clearFolder(public_path() . '/archives/' . $tmpname);

			return parent::view(['content', 'data'], ['list' => FollowerModule::getNonfollowers()]);
		} catch (\Exception $e) {
			FlashMessage::setMsg('error', $e->getMessage());
			var_dump($e->getMessage());exit();
			return back();
		}
	}
}
