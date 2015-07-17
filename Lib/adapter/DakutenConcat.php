<?php
class DakutenConcat implements TmhkConvertInterface
{
	public $priority = 50;
	public function convert($str) {
		// TODO バイナリ変換したほうがいい
		$convertList = array(
			'か゛' => 'が',
			'き゛' => 'ぎ',
			'く゛' => 'ぐ',
			'け゛' => 'げ',
			'こ゛' => 'ご',
			'は゛' => 'ば',
			'ひ゛' => 'び',
			'ふ゛' => 'ぶ',
			'へ゛' => 'べ',
			'ほ゛' => 'ぼ',
			'ぱ゜' => 'ぱ',
			'ひ゜' => 'ぴ',
			'ふ゜' => 'ぷ',
			'へ゜' => 'ぺ',
			'ほ゜' => 'ぽ',
			
			'カ゛' => 'ガ',
			'キ゛' => 'ギ',
			'ク゛' => 'グ',
			'ケ゛' => 'ゲ',
			'コ゛' => 'ゴ',
			'ハ゛' => 'バ',
			'ヒ゛' => 'ビ',
			'フ゛' => 'ブ',
			'ヘ゛' => 'ベ',
			'ホ゛' => 'ボ',
			'ハ゜' => 'パ',
			'ヒ゜' => 'ピ',
			'フ゜' => 'プ',
			'ヘ゜' => 'ペ',
			'ホ゜' => 'ポ',
			'ウ゛' => 'ヴ',
		);
		return str_replace(array_keys($convertList), array_values($convertList), $str);
	}

	public function discription() {
		return '２文字にて入力された濁点・半濁点を１文字に変換します（か゛→が, ぱ゜→ぱ）';
	}

	public function name() {
		return '濁点結合';
	}

}
