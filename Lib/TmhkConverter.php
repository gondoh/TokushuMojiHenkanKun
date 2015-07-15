<?php
class TmhkConverter {
	public $conveters;
	
	public function __construct() {
		// インターフェース読み込み
		require_once dirname(__FILE__) . DS . 'TmhkConvertInterface.php';
		
		// コンバータ一覧を取得する
		$converterDir = dirname(__FILE__) . DS . 'adapter';
		// ファイル操作クラスのインスタンス生成
		$iterator = new RecursiveDirectoryIterator($converterDir);
		$iterator = new RecursiveIteratorIterator($iterator);
		
		foreach ($iterator as $fileinfo) {
			if ($fileinfo->isFile()) {
				$filePaht = $fileinfo->getPathname();
				$fileName = $fileinfo->getFilename();
				$className = preg_replace("/\.php$/i", "", $fileName);
				require_once $filePaht;
				if (class_exists($className)) {
					$adapter = new $className;
					$priority = 0;
					if (isset($adapter->priority)) {
						$priority = $adapter->priority;
					}
					while(isset($this->conveters[$priority])) {
						$priority++;
					}
					if (class_exists("ReflectionClass")) {
						$ref = new ReflectionClass($className);
						if (in_array("TmhkConvertInterface", $ref->getInterfaceNames())) {
							$this->conveters[$priority] = $adapter;
						}
						$ref = null;
					} else {
						$this->conveters[$priority] = $adapter;
					}
				}
			}
		}
	}
	
	public function convert($str) {
		foreach($this->conveters as $converterInstance){
			$str = $converterInstance->convert($str);
		}
		return $str;
	}
}