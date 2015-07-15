<?php

interface TmhkConvertInterface
{
	/**
	 * 文字を変換
	 * @param String $str
	 */
	public function convert(String $str);
	
	/**
	 * 機能名
	 */
	public function name();
	
	/**
	 * 説明
	 */
	public function discription();
}