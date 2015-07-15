<?php
class DakutenConcat implements TmhkConvertInterface
{
	public function convert($str) {
		return $str;
	}

	public function discription() {
		return 'サンプルの変換機能です。なにも変換しません。';
	}

	public function name() {
		return 'サンプルプログラム';
	}

}
