<?php
/**
 * Copyright (c) Xerox Corporation, CodeX, Codendi 2007-2008.
 * This file is licensed under the GNU General Public License version 2. See the file COPYING.
 *
 * @author Marc Nazarian <marc.nazarian@xrce.xerox.com> 
 *
 * IMMucConversationLog
 */
      
class IMMucConversationLog {

	private $_date;
	private $_nickname;
	private $_message;

	function IMMucConversationLog($date, $nickname, $message) {
		$this->_date = $date;
		$this->_nickname = $nickname;
		$this->_message = $message;
    }
    
	function getDate() {
		return util_timestamp_to_userdateformat($this->_date / 1000);
	}
	
	function getDay() {
		return util_timestamp_to_userdateformat($this->_date / 1000, true);
	}
	
	function getTime() {
		return format_date("H:m:i", $this->_date / 1000, true);
	}
		
	
	function getNickname() {
		return $this->_nickname;
	}
	
	function getMessage() {
		return $this->_message;
	}
    
}

?>