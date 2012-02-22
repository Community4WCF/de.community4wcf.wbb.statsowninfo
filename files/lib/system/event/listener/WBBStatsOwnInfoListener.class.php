<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Add StatsOwnInfo
 * 
 * @svn			$Id: WBBStatsOwnInfoListener.class.php 1658 2011-01-08 15:31:14Z TobiasH87 $
 * @package		de.community4wcf.wbb.statsowninfo
 */
class WBBStatsOwnInfoListener implements EventListener
{
	/**
	 * @see		EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName)
	{
		//requirements for StatsInfo
		if (INDEX_STATSOWNINFO_ENABLE && WCF::getUser()->getPermission('user.board.canViewStatsOwnInfo')) {
		// parse
		WCF::getTPL()->assign(array('message' => MessageParser::getInstance()->parse(INDEX_STATSOWNINFO_CONTENT, INDEX_STATSOWNINFO_ENABLE_SMILEY, INDEX_STATSOWNINFO_ENABLE_HTML, INDEX_STATSOWNINFO_ENABLE_BBCODES)));
		// show
		WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('statsOwnInfo'));
		}
	}        
}
?>