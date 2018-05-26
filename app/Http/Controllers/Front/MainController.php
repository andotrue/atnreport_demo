<?php
namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Information;
use App\Store;
use App\ImageMst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {

	public $data = array();

	public function __construct()
	{
	}

	public function index($dir = null, $subdir = null, $page = "index")
	{
		$path = \Request::path();

		 /*
		//GA関連処理
		$gaData = $this->getGaResult();
		if(is_null($gaData)) $gaData = array();
		$searchpath = ($path != "/")? "/".$path : $path;
		$pvCount = 0;
		$pvCount = @$gaData[$searchpath];
        */

		$message = "(DEBUG!)" . __CLASS__ . "---->" . __FUNCTION__ . ":" . __LINE__;
		$message .= "$dir/$subdir/$page  $path";
		logger($message);

//		\DB::enableQueryLog();

		//TOPページ
		if($path == "/"){
			$stores_imgd = Store::orderBy('id')->pluck('imagedetail','id');
			//echo "<pre>"; var_dump(\DB::getQueryLog()); echo "</pre>";
			$img_bnrs = array();
			$this->data = compact('informations','stores_imgd','img_bnrs');
		}
		//お知らせ　TOPページ
		elseif($path == "information"){
			$informations = Information::where([
											['open_flg', '=', 1],
											['open_date', '<=', date('Y/m/d H:i:s')],
										])
										->where(function($query){
											$query->where('close_date', '>=', date('Y/m/d H:i:s'))
											->orWhereNull('close_date');
										})
							->orderBy('open_date', 'desc')
							->orderBy('id', 'desc')
							->paginate(10);

			$stores_imgd = Store::orderBy('id')->pluck('imagedetail','id');

			$this->data = compact('informations','stores_imgd');
		}
		//お知らせ 詳細ページ
		elseif(preg_match('/information\/detail\/[0-9]+$/', $path)){
			$preview = isset($_REQUEST['preview'])? $_REQUEST['preview'] : 0;
			$param1 = isset($_REQUEST['param1'])? $_REQUEST['param1'] : 0;

			//プレビューの場合フリー閲覧期限2時間設ける
			if($preview && ($param1+(60*60*2) > time())){
				$information = Information::where([
												['id', '=', $page],
											])
								->simplePaginate(1);
			}
			else
			{
				$information = Information::where([
												['id', '=', $page],
												['open_flg', '=', 1],
												['open_date', '<=', date('Y/m/d H:i:s')],
											])
											->where(function($query){
												$query->where('close_date', '>=', date('Y/m/d H:i:s'))
												->orWhereNull('close_date');
											})
								->simplePaginate(1);
			}

			$prev_info = Information::where([
										['id', '<', $page],
										['open_flg', '=', 1],
										['open_date', '<=', date('Y/m/d H:i:s')],
									])
									->where(function($query){
										$query->where('close_date', '>=', date('Y/m/d H:i:s'))
										->orWhereNull('close_date');
									})
									->orderBy('open_date', 'desc')
									->orderBy('id', 'desc')
									->limit('1')
									->first();
			$next_info = Information::where([
										['id', '>', $page],
										['open_flg', '=', 1],
										['open_date', '<=', date('Y/m/d H:i:s')],
									])
									->where(function($query){
										$query->where('close_date', '>=', date('Y/m/d H:i:s'))
										->orWhereNull('close_date');
									})
									->orderBy('open_date', 'desc')
									->orderBy('id', 'desc')
									->limit('1')
									->first();

			$stores_imgd = Store::orderBy('id')->pluck('imagedetail','id');

			$store_name = Store::where('id',$information[0]->store_id)->pluck('storename','id');
			//echo "<pre>"; var_dump(\DB::getQueryLog()); echo "</pre>";

			$this->data = compact('information','stores_imgd', 'prev_info', 'next_info', 'store_name');

			////$this->data['pvCount'] = $pvCount;
			return view("front.$dir.$subdir", $this->data);
			exit;
		}
		elseif(preg_match("/^card.*/", $path)){
			//echo "card";
		}

		//GA関連処理
		////$this->data['pvCount'] = $pvCount;

		return view("front.$dir.$subdir.$page", $this->data);
	}


	/*
	*
	*/
	/*
	public function getGaResult()
	{
		$key_name = date("Ymd").'ga_total_result';
		if (\Cache::has($key_name)) {
			$value = \Cache::get($key_name);
			//echo "exist cache data!\r\n";
			//var_dump($value);
			$value = json_decode($value, true);
			return @array_column($value, 1, 0);
		}

		$ga_root_dir = base_path() . "/ga";

		//echo env("GA_SERVICE_ACCOUNT_EMAIL","")."\r\n";
		//echo env("GA_KEY_FILE","")."\r\n";

		// サービスアカウントのメールアドレス
		$service_account_email = env("GA_SERVICE_ACCOUNT_EMAIL","");

		// 秘密キーファイルの読み込み
		$key = file_get_contents($ga_root_dir.'/'.env("GA_KEY_FILE",""));

		// プロファイル(ビュー)ID
		$profile = env("GA_PROFILE","");

		// Googleクライアントのインスタンスを作成
		$client = new \Google_Client();
		$analytics = new \Google_Service_Analytics($client);

		// クレデンシャルの作成
		$cred = new \Google_Auth_AssertionCredentials(
				$service_account_email,
				array(\Google_Service_Analytics::ANALYTICS_READONLY),
				$key
		);
		$client->setAssertionCredentials($cred);
		if($client->getAuth()->isAccessTokenExpired()) {
			$client->getAuth()->refreshTokenWithAssertion($cred);
		}

		$result = $analytics->data_ga->get(
				'ga:' . $profile // アナリティクス ビュー ID
				//,'7daysAgo'       // データの取得を開始する日付は7日前
				,'2016-10-01'       // データの取得を開始する日付は7日前
				,'yesterday'      // データの取得を終了する日付は昨日
				//'ga:sessions'     // セッション数を取得する
				,'ga:pageviews'
				//,array('dimensions'=>'ga:browser,ga:city')
				,array('dimensions'=>'ga:pagePath')
		);
		$resultJ = json_encode($result -> rows);

		// 結果を出力
		//var_dump($result);
		//var_dump($result -> rows);
		//var_dump($resultJ);
		//var_dump($result -> rows[0]);
		//echo $result -> rows[0][0];

		$value = $resultJ;
		$minutes = 60 * 60;

		\Cache::put($key_name, $value, $minutes);
		$value = json_decode($value, true);
		return @array_column($value, 1, 0);

	}
	*/

}
