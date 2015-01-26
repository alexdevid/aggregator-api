<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Description of index
 *
 * @author alexdevid
 */
class index
{

	public $action = null;
	public $postData = null;
	public $requestAction = null;
	public $config = null;

	public function __construct($config)
	{
		header("Access-Control-Allow-Origin: *");
		$this->config = json_decode(json_encode($config), FALSE);
		$this->configure()->router();
	}

	private function configure()
	{
		$username = $this->config->db->username;
		$password = ($this->config->db->password) ? ':' . $this->config->db->password : '';
		$dbname = $this->config->db->dbname;

		ActiveRecord\Config::initialize(function($cfg) use ($username, $password, $dbname) {
			$cfg->set_model_directory(__DIR__ . '/models/');
			$cfg->set_connections(
					array(
						'development' => 'mysql://' . $username . $password . '@localhost/' . $dbname . '?charset=utf8',
						'test' => 'mysql://' . $username . $password . '@localhost/' . $dbname . '?charset=utf8',
						'production' => 'mysql://' . $username . $password . '@localhost/' . $dbname . '?charset=utf8',
					)
			);
		});
		return $this;
	}

	public function router()
	{
		if (isset($_GET) && isset($_GET['action'])) {
			$method = 'action' . ucfirst($_GET['action']);
			$this->requestAction = ucfirst($_GET['action']);

			if (method_exists($this, $method)) {
				$this->action = $_GET['action'];
				$this->postData = isset($_POST) ? $_POST : null;
				$this->$method($this->postData);
			} else {
				$this->actionError();
			}
		}
	}

	public function actionCategory($data = null)
	{
		$model = Category::create($data);
		echo $model->to_json();
	}

	public function actionPicture($data = null)
	{
		$model = Picture::create($data);
		echo $model->to_json();
	}

	public function actionCategories($data = NULL)
	{
		$models = Category::find('all');
		$response = "[";
		$counter = 0;
		foreach ($models as $model) {
			$response .= $model->to_json();
			$counter++;
			$response .= ($counter == count($models)) ? "" : ",";
		}
		$response .= "]";
		echo $response;
	}

	public function actionError($data = null)
	{
		http_response_code(404);
		echo json_encode([
			'error' => 'No such action - ' . $this->requestAction,
			'status' => 404
		]);
	}

}

$config = require_once __DIR__ . DIRECTORY_SEPARATOR . 'config/main.php';
$index = new index($config);
