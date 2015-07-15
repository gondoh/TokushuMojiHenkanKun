<?php
class TokushuMojiHenkanKunModelEventListener extends BcModelEventListener {
	
/**
 * 登録イベント
 * 
 * @var array
 */
	public $events = array(
		'Page.beforeSave',
		'Blog.BlogPost.beforeSave',
	);
	
/**
 * コンストラクタ
 */
	public function __construct() {
		parent::__construct();
		APP::uses("TmhkConverter", "TokushuMojiHenkanKun.Lib");
	}
	
/**
 * ブログデータ保存前イベント
 * 
 * @param CakeEvent $event
 */
	public function blogBlogPostBeforeSave(CakeEvent $event) {
		$BlogPost = $event->subject();
		$tmhkConverter = new TmhkConverter();
		$targetColums = array(
			'name',
			'content',
			'detail',
			'detail_draft'
		);
		foreach ($BlogPost->data['BlogPost'] as $k => $v) {
			if (in_array($k, $targetColums) && is_string($v)) {
				$BlogPost->data['BlogPost'][$k] = $tmhkConverter->convert($v);
			}
		}
		return true;
	}
	
	
	public function pageBeforeSave(CakeEvent $event) {
		$Page = $event->subject();
		exit;
		$tmhkConverter = new TmhkConverter();
		$targetColums = array(
			'title',
			'contents',
			'draft',
		);
		foreach ($Page->data['Page'] as $k => $v) {
			if (in_array($k, $targetColums) && is_string($v)) {
				$Page->data['Page'][$k] = $tmhkConverter->convert($v);
			}
		}
		return true;
	}
	
	// $dependents = '①②③④⑤⑥⑦⑧⑨⑩⑪⑫⑬⑭⑯⑰⑱⑲⑳ⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ㍉㌔㌢㍍㌘㌧㌃㌶㍑㍗㌍㌦㌣㌫㍊㌻㎜㎝㎞㎎㎏㏄㎡㍻〝〟№㏍℡㊤㊥㊦㊧㊨㈱㈲㈹㍾㍽㍼∮∟⊿纊褜鍈銈蓜炻昱棈鋹曻彅仡仼伀伹佖侒侊侚侔俍偀倢俿倞偆偰偂傔僴僘兊兤冝冾凬刕劜劦勀勛匀匇匤卲厓厲叝﨎咜咊咩哿喆坙坥垬埈埇﨏增墲夋奓奛奝奣妤孖寀甯寘尞岦岺峵崧嵓嵂嵭嶸嶹巐弡弴彧德忞恝悅悊惞惕愠惲愑愷愰憘抦揵摠撝擎敎昀昕昉昮昞昤晗晙晳暙暠暲暿曺朎杦枻桒柀栁桄棏﨓楨﨔榘槢樰橫橆橳橾櫢櫤毖氿汜沆汯涇浯涖涬淏淸淲淼渹湜渧渼溿澈澵濵瀅瀇瀨炅炫焏焄煜煆燾犱犾猤獷玽珣珒琇珵琦琪琩琮瑢璉璟甁畯皂皜皞皛皦睆劯砡硎硤礰禔禛竑竧靖竫箞絈綷綠緖繒罇羡茁荢荿菇菶葈蒴蕓蕙蕫﨟薰蠇裵訒訷詹誧誾諟諶譓譿賰賴贒赶﨣軏﨤遧鄕鄧釚釗釞釭釮釤釥鈆鈐鈊鈺鉀鈼鉎鉙鉑鈹鉧銧鉷鉸鋧鋗鋙鋐﨧鋕鋠鋓錥錡鋻﨨錞鋿錝錂鍰鍗鎤鏆鏞鏸鐱鑅鑈閒﨩隝隯霳霻靃靍靏靑靕顗顥餧馞驎髜魵魲鮏鮱鮻鰀鵰鵫鸙黑';
}
