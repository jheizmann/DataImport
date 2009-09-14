<?php
/*  Copyright 2009, ontoprise GmbH
 *  This file is part of the Data Import-Extension.
 *
 *   The Data Import-Extension is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   The Data Import-Extension is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Implementation of the Data Access Layer (DAL) that is part of the term import feature.
 * This implementation reads mails from a POP3 mailbox
 * an returns its content in a form
 * appropriate for the creation of articles.
 *
 * @author Ingo Steinbauer
 */

global $smwgDIIP;
require_once($smwgDIIP . '/specials/TermImport/SMW_IDAL.php');

define('DAL_POP3_RET_ERR_START',
			'<?xml version="1.0"?>'."\n".
			'<ReturnValue xmlns="http://www.ontoprise.de/smwplus#">'."\n".
    		'<value>false</value>'."\n".
    		'<message>');

define('DAL_POP3_RET_ERR_END',
			'</message>'."\n".
    		'</ReturnValue>'."\n");


class DALReadPOP3 implements IDAL {

	private $connection = false;
	private $attachmentMP = "";
	private $mailFrom = "";
	private $mailDate = "";
	private $mailId = "";

	private $body;
	private $vCards;
	private $iCals;
	private $attachments;
	private $embeddedMails;
	private $embeddedMailIds;
	
	private $requiredProperties;
	private $requiredTerms;
	private $regularExpressions;
	private $importSets;
	
	private $noCallPartNr = false; //this flag is used to determine when to skip multipart/related

	function __construct() {
		global $wgNamespaceAliases;
		
	}

	public function getSourceSpecification() {
		//todo: language file
		return
			'<?xml version="1.0"?>'."\n".
			'<DataSource xmlns="http://www.ontoprise.de/smwplus#">'."\n".
			' 	<ServerAddress display="'."Server:".'" type="text"></ServerAddress>'."\n".
			' 	<UserName display="'."User:".'" type="text"></UserName>'."\n".
			' 	<Password display="'."Password:".'" type="text"></Password>'."\n".
			'	<SSL display="'."Use SSL:".'" type="checkbox"></SSL>'."\n".
			'	<AttachmentMP autocomplete="true" display="'."Extra Mapping Policy:".'" type="text"></AttachmentMP>'."\n".
			'</DataSource>'."\n";
	}

	public function getImportSets($dataSourceSpec) {
		$connection = $this->getConnection($dataSourceSpec);
		if($connection == false){
			return DAL_POP3_RET_ERR_START.
			wfMsg('smw_ti_pop3error').
			DAL_POP3_RET_ERR_END;
		}

		$check = imap_check($connection);

		$messages = imap_fetch_overview($connection,"1:{$check->Nmsgs}",0);
		$result = "";
		$names = array();
		foreach($messages as $msg){
			if(key_exists("from", $msg)){
				$name = $msg->from;
				$startPos = strpos($name, "<") + 1;
				$endPos = strpos($name, ">") - $startPos;
				$names[substr($name, $startPos, $endPos)] = true;
			}
		}
		foreach($names as $name => $dontCare){
			$result .= '<importSet>'."\n".
				'	<name>'.$name.'</name>'."\n".
				'</importSet>'."\n";
		}
		
		imap_close($connection);
		$this->connection = false;
		
		return
			'<?xml version="1.0"?>'."\n".
			'<ImportSets xmlns="http://www.ontoprise.de/smwplus#">'."\n"
			.$result.
			'</ImportSets>'."\n";
	}

	public function getProperties($dataSourceSpec, $importSet) {
		$result = "";

		//removed: bc, reply_to, sender, return_path
		$properties = array('articleName', 'from', 'to', 'cc', 'date', 'subject',
			'in_reply_to','followup_to', 'references', 'message_id', 'body', 'attachments',
			'vCards', 'iCalendars');
		foreach ($properties as $prop) {
			$properties .=
				'<property>'."\n".
				'	<name>'.$prop.'</name>'."\n".
				'</property>'."\n";
		}

		return
			'<?xml version="1.0"?>'."\n".
			'<Properties xmlns="http://www.ontoprise.de/smwplus#">'."\n".
		$properties.
			'</Properties>'."\n";
	}

	public function getTermList($dataSourceSpec, $importSet, $inputPolicy) {
		$connection = $this->getConnection($dataSourceSpec);
		if($connection == false){
			return DAL_POP3_RET_ERR_START.
			wfMsg('smw_ti_pop3error').
			DAL_POP3_RET_ERR_END;
		}

		$check = imap_check($connection);

		$inputPolicy = $this->parseInputPolicy($inputPolicy);
		$this->requiredProperties = array_flip($inputPolicy["properties"]);
		$this->requiredTerms = array_flip($inputPolicy["terms"]);
		$this->regularExpressions = $inputPolicy["regex"];
		$this->importSets = $this->parseImportSets($importSet);
		
		//$messages = imap_fetch_overview($connection,"1:{$check->Nmsgs}",0);
		$messages = imap_search($connection, 'ALL');
		
		$result = "";
		if($messages){
			$msgNumber = 1;
			foreach($messages as $msg){
				$header = imap_header($connection, $msgNumber);
				$msgNumber += 1;
				if(key_exists("message_id", $header)){
					$importSet = $header->fromaddress;
					$startPos = strpos($importSet, "<") + 1;
					$endPos = strpos($importSet, ">") - $startPos;
					$importSet = substr($importSet, $startPos, $endPos);
				
					if(!$this->termMatchesRules(
							$importSet, $this->replaceAngledBrackets($header->message_id))){
						continue;
					}
				} else {
					continue;
				}
			
			$result .= "<articleName>".$this->replaceAngledBrackets($header->message_id)."</articleName>\n";
		}
		}
		imap_close($connection);

		return
			'<?xml version="1.0"?>'."\n".
			'<terms xmlns="http://www.ontoprise.de/smwplus#">'."\n".
		$result.
			'</terms>'."\n";
	}

	public function getTerms($dataSourceSpec, $importSet, $inputPolicy) {
		$inputPolicy = $this->parseInputPolicy($inputPolicy);
		$this->requiredProperties = array_flip($inputPolicy["properties"]);
		$this->requiredTerms = array_flip($inputPolicy["terms"]);
		$this->regularExpressions = $inputPolicy["regex"];
		$this->importSets = $this->parseImportSets($importSet);
		
		$connection = $this->getConnection($dataSourceSpec);
		if($connection == false){
			return DAL_POP3_RET_ERR_START.
			wfMsg('smw_ti_pop3error').
			DAL_POP3_RET_ERR_END;
		}
		$messages = imap_search($connection, 'UNSEEN');
		
		$this->attachmentMP = $this->getMPFromDataSource($dataSourceSpec, "AttachmentMP");

		$result = "";
		if(is_array($messages)){
			foreach($messages as $msg){
				$headerData = $this->getHeaderData($connection, $msg);
				if($headerData == null){
					continue;
				}
				$result .= $this->getBody($connection, $msg);
				$result .= "\n".$headerData;
				$result .= "</term>\n";
				imap_delete($connection, $msg);
			}
		}
		
		while(count($this->embeddedMails) > 0){
			echo("\nProcess next embedded message:");
			$embeddedMails = $this->embeddedMails;
			$this->embeddedMails = array();
			foreach($embeddedMails as $mail){
				//echo("\nnext embedded message");
				$this->noCallPartNr = true;
				$header = $this->serializeHeaderData($mail["header"]);
				$result = $this->handleBodyParts($connection, $mail["message"], 
					$mail["structure"], $mail["partNr"])
					.$header."</term>".$result;
			}
		}
		
		imap_expunge($connection);
		imap_close($connection);
		
		return
			'<?xml version="1.0"?>'."\n".
			'<terms xmlns="http://www.ontoprise.de/smwplus#">'."\n".
			$result.
			'</terms>'."\n";
	}

	private function getBody($connection, $msg){
		$this->noCallPartNr = false;
		$structure = imap_fetchstructure($connection, $msg);
		return $this->handleBodyParts($connection, $msg, $structure, "");
	}
	
	private function handleBodyParts($connection, $msg, $structure, $basePartNr){
		echo("\nProcess next message body:");
		global $smwgDIIP;
		
		$this->body = '';
		$this->vCards = array();
		$this->iCals = array();
		$this->attachments = array();
		$this->embeddedMailIds = "";

		if($structure->type == 0){ //this is a simple text message
			$encoding = $structure->encoding;
			echo("\nProcess next message part: type: ".$structure->type.
				" subtype: ".$structure->subtype." partNr: 1"." encoding: ".$encoding);
			$this->handleBodyTextPart($connection, $msg, $structure, "", 1, $encoding);
		} else if ($structure->type == 1 || $structure->type == 2){ //this is a multipart message with attachments
			$encoding = $structure->encoding;
			echo("\nProcess next message part: type: ".$structure->type.
				" subtype: ".$structure->subtype." partNr: ".$basePartNr." encoding: ".$encoding);
			$this->handleBodyMultiPart($connection, $msg, $structure, $basePartNr);
		}

		return $this->serializeBodyXML();
	}
	
	private function handleBodyMultiPart($connection, $msg, $structure, $basePartNr){
		echo("\nprocess next body multipart");
		$partNr = 1;
		foreach($structure->parts as $part){
			$encoding = $part->encoding;
			echo("\nProcess next message part: type: ".$part->type.
				" subtype: ".$part->subtype." partNr: ".$basePartNr.$partNr." encoding ".$encoding);
			if($part->type == 0){ //text
				$this->handleBodyTextPart($connection, $msg, $part, $basePartNr, $partNr, $encoding);
			} else if($part->type == 1) { //multipart
				//this strange distinction below is necesary
				//due to the strange enumeration of php imap
				if(strtoupper($part->subtype) == "ALTERNATIVE"){
					$callPartNr = $partNr.".";
				} else if (strtoupper($part->subtype) == "RELATED"){
					if($this->noCallPartNr){
						$callPartNr = "";
						$this->noCallPartNr = false;
					} else {
						$callPartNr = $partNr.".";
					}
				} else {
					$callPartNr = "";
				}
				$this->handleBodyMultiPart($connection, $msg, $part, 
					$basePartNr.$callPartNr);
			} else if ($part->type == 2 && array_key_exists("attachments", $this->requiredProperties)){ // an attached email message
				$header = imap_rfc822_parse_headers($this->decodeBodyPart(
						imap_fetchbody($connection, $msg, $basePartNr.$partNr.".0"), 
						$encoding));
				if(trim($header->message_id) == ""){
					continue;
				}
				if($this->embeddedMailIds != ""){
					$this->embeddedMailIds .= ",";
				}
				global $wgExtraNamespaces;
				$ns="";
				if(array_key_exists(NS_TI_EMAIL, $wgExtraNamespaces)){
					$ns = $wgExtraNamespaces[NS_TI_EMAIL].":";
				}
				$this->embeddedMailIds .= $ns.$this->replaceAngledBrackets($header->message_id);
				$this->embeddedMails[] = array("header" => $header, "structure" => $part,
					"message" => $msg, "message_id" => $this->mailId, 
					"partNr" => $basePartNr.$partNr.".");
			} else if(array_key_exists("attachments", $this->requiredProperties)){ //an attachment
				$bodyStruct = imap_bodystruct($connection, $msg, $basePartNr.$partNr);
				$this->handleAttachments($bodyStruct, $connection, $msg, 
					$basePartNr.$partNr, $encoding);
			}
			$partNr ++;
		}
	}
	
	private function handleBodyTextPart($connection, $msg, $part, $basePartNr, $partNr, $encoding){
		if($part->ifsubtype){
			if(strtoupper($part->subtype) == "X-VCARD"){
				if(!array_key_exists("vCards", $this->requiredProperties)){
					return;
				}
				$this->serialiseVCard($this->decodeBodyPart(
					imap_fetchbody($connection, $msg, $basePartNr.$partNr), 
						$encoding));
			} else if(strtoupper($part->subtype) == "CALENDAR"){
				if(!array_key_exists("iCalendars", $this->requiredProperties)){
					return;
				}
				$content = $this->decodeBodyPart(
					imap_fetchbody($connection, $msg, $basePartNr.$partNr), $encoding);
				$this->serializeICal($content);
			} else if(array_key_exists("body", $this->requiredProperties)
					&& strtoupper($part->subtype) != "HTML"){
				$body = htmlspecialchars($this->decodeBodyPart(
					imap_fetchbody($connection, $msg, $basePartNr.$partNr), 
					$encoding));
				if(!mb_check_encoding($body, "UTF-8")){
					$body = utf8_encode($body);
				}
				$this->body .= "<pre>".$body."</pre>"; 
			}
		} else if(array_key_exists("body", $this->requiredProperties)){ //text message without subtype
			$this->body .= "<pre>".htmlspecialchars($this->decodeBodyPart(
				imap_fetchbody($connection, $msg, $basePartNr.$partNr), 
				$encoding))."</pre>";
		}
	}

	private function decodeBodyPart($bodyPart, $encoding){
		if ($encoding == 1){
			if(!mb_check_encoding($bodyPart, "UTF-8")){
				$bodyPart = utf8_encode($bodyPart);
			}
		} else if ($encoding == 4){
			$bodyPart = quoted_printable_decode($bodyPart);
			if(!mb_check_encoding($bodyPart, "UTF-8")){
				$bodyPart = utf8_encode($bodyPart);
			}
		}else if ($encoding == 3){
			$bodyPart = base64_decode($bodyPart);
		}
		return $bodyPart;
	}

	private function getMPFromDataSource($dataSourceSpec, $mpName){
		if(strpos($dataSourceSpec, "DATASOURCE") > 0){
			$dataSourceSpec = str_replace('XMLNS="http://www.ontoprise.de/smwplus#"', "", $dataSourceSpec);
			$dataSourceSpec = new SimpleXMLElement(trim($dataSourceSpec));
			$mp = $dataSourceSpec->xpath("//".strtoupper($mpName)."/text()");
		} else {
			$dataSourceSpec = str_replace('xmlns="http://www.ontoprise.de/smwplus#"', "", $dataSourceSpec);
			$dataSourceSpec = new SimpleXMLElement(trim($dataSourceSpec));
			$mp = $dataSourceSpec->xpath("//".$mpName."/text()");
		}
		if($mp){
			return $mp[0];
		} else {
			return "";
		}
	}

	private function getConnection($dataSourceSpec){
		if($this->connection == false){
			if(strpos($dataSourceSpec, "DATASOURCE") > 0){
				
				$dataSourceSpec = str_replace('XMLNS="http://www.ontoprise.de/smwplus#"', "", $dataSourceSpec);
				$dataSourceSpec = new SimpleXMLElement(trim($dataSourceSpec));
				$serverAddress = $dataSourceSpec->xpath("//SERVERADDRESS/text()");
				$userName = $dataSourceSpec->xpath("//USERNAME/text()");
				$password = $dataSourceSpec->xpath("//PASSWORD/text()");
				$ssl = $dataSourceSpec->xpath("//SSL/text()");
			} else {
				$dataSourceSpec = str_replace('xmlns="http://www.ontoprise.de/smwplus#"', "", $dataSourceSpec);
				$dataSourceSpec = new SimpleXMLElement(trim($dataSourceSpec));
				$serverAddress = $dataSourceSpec->xpath("//ServerAddress/text()");
				$userName = $dataSourceSpec->xpath("//UserName/text()");
				$password = $dataSourceSpec->xpath("//Password/text()");
				$ssl = $dataSourceSpec->xpath("//SSL/text()");
			}
			if($serverAddress){
				$serverAddress = $serverAddress[0];
			} else {
				$serverAddress = "";
			}

			if($ssl){
				if($ssl[0] == "true" || $ssl[0] == "on"){
					$serverAddress .= ":995/pop3/ssl}INBOX";
				} else {
					$serverAddress .= ":110/pop3}INBOX";
				}
			} else {
				$serverAddress .= ":110/pop3}INBOX";
			}
			if($userName){
				$userName = $userName[0];
			} else {
				$userName = "";
			}
			if($password){
				$password = $password[0];
			} else {
				$password = "";
			}

			$this->connection = @ imap_open ("{".$serverAddress,
			$userName, $password);

			$check = @imap_check($this->connection);
			if(!$check){
				return false;
			}
		}
		return $this->connection;
	}

	private function getHeaderData($mbox, $msgNumber){
		$header = imap_header($mbox, $msgNumber);
		return $this->serializeHeaderData($header, true);
	}
	
	private function serializeHeaderData($header, $matchRules=false){
		global $wgExtraNamespaces;
		$ns="";
		if(array_key_exists(NS_TI_EMAIL, $wgExtraNamespaces)){
			$ns = $wgExtraNamespaces[NS_TI_EMAIL].":";
		}
		
		if($matchRules){
			if(key_exists("message_id", $header)){
				$importSet = $header->fromaddress;
				$startPos = strpos($importSet, "<") + 1;
				$endPos = strpos($importSet, ">") - $startPos;
				$importSet = substr($importSet, $startPos, $endPos);
				if(!$this->termMatchesRules($importSet, $this->replaceAngledBrackets($header->message_id))){
					return null;
				}
			} else {
				return null;
			}
		}
		
		$result = "";
		$result .= "<articleName>".$ns.
			$this->replaceAngledBrackets($header->message_id)."</articleName>\n";

		//removed: bc, sender, return_path, reply_to
		$addressTypes = array('from', 'to', 'cc');
		
		foreach($addressTypes as $type){
			if(!array_key_exists($type, $this->requiredProperties)){
				continue;
			}
			
			//todo: replace , and ; by something else
			if(key_exists($type, $header)){
				$result .= "\n<".$type.">";
				$first = true;
				foreach($header->$type as $obj){
					if(!$first){
						$result.= ";";
					}
					$first = false;
					if(key_exists('personal', $obj)){
						$result .= htmlspecialchars($obj->personal);
					}
					$result.= ",";
					if(key_exists('mailbox', $obj)){
						//this is necessary for being able to later pass
						// the from attribute to the createAttachments callback
						//todo: find better solution
						if($type == "from"){
							$this->mailFrom = htmlspecialchars($obj->mailbox);
						}
						$result .= htmlspecialchars($obj->mailbox);
					}
					if(key_exists('host', $obj)){
						if($type == "from"){
							$this->mailFrom .= "@".htmlspecialchars($obj->host);
						}
						$result .= "@".htmlspecialchars($obj->host);
					}
				}
				$result .= "\n</".$type.">";
			}
		}

		if(array_key_exists("date", $this->requiredProperties)){
			if(key_exists('date', $header)){
				$this->mailDate = htmlspecialchars($this->formatDate($header->date));
				$result .= "\n<date>".htmlspecialchars($this->formatDate($header->date))."</date>";
			} else if(key_exists('Date', $header)){
				$result .= "\n<date>".htmlspecialchars($this->formatDate($header->Date))."</date>";
			} else if(key_exists('MailDate', $header)){
				$result .= "\n<date>".htmlspecialchars($this->formatDate($header->MailDate))."</date>";
			}
		}

		if(array_key_exists("subject", $this->requiredProperties)){
			if(key_exists('subject', $header)){
				$result .= "\n<subject>".htmlspecialchars($header->subject)."</subject>";
			} else if(key_exists('Subject', $header)){
				$result .= "\n<subject>".htmlspecialchars($header->Subject)."</subject>";
			}
		}
		
		global $wgExtraNamespaces;
		$ns="";
		if(array_key_exists(NS_TI_EMAIL, $wgExtraNamespaces)){
			$ns = $wgExtraNamespaces[NS_TI_EMAIL].":";
		}

		if(array_key_exists("in_reply_to", $this->requiredProperties)){
			if(key_exists('in_reply_to', $header)){
				$result .= "\n<in_reply_to>".$ns.htmlspecialchars($this->replaceAngledBrackets($header->in_reply_to))."</in_reply_to>";
			}
		}

		if(array_key_exists("followup_to", $this->requiredProperties)){
			if(key_exists('followup_to', $header)){
				$result .= "\n<followup_to>".htmlspecialchars($header->followup_to)."</followup_to>";
			}
		}
		
		if(array_key_exists("references", $this->requiredProperties)){
			if(key_exists('references', $header)){
				$result .= "\n<references>".$ns.htmlspecialchars($this->replaceAngledBrackets($header->references))."</references>";
			}
		}
		
		if(array_key_exists("message_id", $this->requiredProperties)){
			if(key_exists('message_id', $header)){
				$this->mailId = $ns.htmlspecialchars($this->replaceAngledBrackets($header->message_id));
				$result .= "\n<message_id>".htmlspecialchars($this->replaceAngledBrackets($header->message_id))."</message_id>";
			}
		}
		return $result;
	}

	private function replaceAngledBrackets($inputString){
		$inputString = str_replace("<", "", $inputString);
		$inputString = str_replace(">", "", $inputString);
		return $inputString;
	}

	private function formatDate($dateString){
		$date = strtotime($dateString);
		$date = getdate($date);
		$mon = $date["mon"]<10 ? "0".$date["mon"] : $date["mon"];
		$mday = $date["mday"]<10 ? "0".$date["mday"] : $date["mday"];
		$hours = $date["hours"]<10 ? "0".$date["hours"] : $date["hours"];
		$minutes = $date["minutes"]<10 ? "0".$date["minutes"] : $date["minutes"];
		$seconds = $date["seconds"]<10 ? "0".$date["seconds"] : $date["seconds"];

		$dateString = $date["year"]."/".$mon."/".$mday." ".$hours.":".$minutes.":".$seconds;
		return $dateString;
	}

	private function serialiseVCard($vCardString){
		require_once('SMW_VCardParser.php');
		
		$result = "";
		$vCardParser = new VCard();
		$vCardParser->parse(explode("\n", $vCardString));

		$attributes = array(
			'N','FN', 'TITLE', 'ORG', 'NICKNAME','TEL', 'EMAIL', 'URL', 'ADR', 'BDAY', 'NOTE', 'CATEGORIES');

		foreach ($attributes as $attribute) {
			$values = $vCardParser->getProperties($attribute);
			if ($values) {
				$result .= "<VC-".$attribute."><![CDATA[";
				$first = true;
				foreach ($values as $value) {
					if(!$first){
						$result .= "; ";
					}
					$first = false;
					$components = $value->getComponents();
					$lines = array();
					foreach ($components as $component) {
						if ($component) {
							$lines[] = $component;
						}
					}
					$result .= join(",", $lines);
					$types = $value->params['TYPE'];
					if ($types) {
						$type = join(", ", $types);
						$result .= " (" . ucwords(strtolower($type)) . ")";
					}
				}
				$result .= "]]></VC-".$attribute.">";
			}
		}

		$vCardXML = new SimpleXMLElement(trim("<vcard>".$result."</vcard>"), LIBXML_NOCDATA);
		$fn = $vCardXML->xpath("//VC-FN/text()");
		$fn = "".$fn[0];
		if($fn != ""){
			global $wgExtraNamespaces;
			$ns="";
			if(array_key_exists(NS_TI_VCARD, $wgExtraNamespaces)){
				$ns = $wgExtraNamespaces[NS_TI_VCARD].":";
			}	

			$this->createAttachmentTerm($vCardString, $fn.".vcf", $result);
		}
	}

	private function serializeICal($iCalString){
		require_once('SMW_ICalParser.php');
		
		$result = "";
		$iCalParser = new ICalParser();
		$iCals = $iCalParser->parse($iCalString);

		foreach($iCals as $iCalArray){
			$result = "";
			foreach ($iCalArray as $attribute => $value) {
				$result .= "<".$attribute."><![CDATA[".htmlspecialchars($value)."]]></".$attribute.">";
			}
		
			$iCalXML = new SimpleXMLElement("<ic>".trim($result)."</ic>", LIBXML_NOCDATA);
			$title = $iCalXML->xpath("//ic-uid/text()");
			$title = "".$title[0];

			if($title != ""){
				echo("\n\n".$title);
				$this->createAttachmentTerm($iCalString, $title.".ics", $result);
			}
		}
	}

	public function executeCallBack($signature, $mappingPolicy, $conflictPolicy, $termImportName){
		return eval("return \$this->".$signature.",\$conflictPolicy, \$termImportName);");
	}

	private function handleVCardAndICalCallBacks($entityType, $entity, $mp, $conflictPolicy, $termImportName){
		$success = true;
		$logMsgs = array();
		$tiBot = new TermImportBot();
		$entity = new SimpleXMLElement(htmlspecialchars_decode($entity), $termSXE);

		global $wgExtraNamespaces;
		$ns="";
		if($entityType == "vCard"){
			if(array_key_exists(NS_TI_VCARD, $wgExtraNamespaces)){
				$ns = $wgExtraNamespaces[NS_TI_VCARD].":";
			}
			$title = $ns."".$entity->VC-FN;
		} else if($entityType == "iCal"){
			if(array_key_exists(NS_TI_ICALENDAR, $wgExtraNamespaces)){
				$ns = $wgExtraNamespaces[NS_TI_ICALENDAR].":";
			}
			$title = $ns."".$entity->ic-uid;
		}

		$title = Title::newFromText($title);
		if($title == null){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_MISSING_ARTICLE_NAME,
				'title' => wfMsg('smw_ti_import_error'))));
		}

		$termAnnotations = $tiBot->getExistingTermAnnotations($title);

		if($title->exists() && !$conflictPolicy){
			echo wfMsg('smw_ti_articleNotUpdated', $title->getFullText())."\n";
			$article = new Article($title);
			$article->doEdit(
			$article->getContent()
			."\n[[WasIgnoredDuringTermImport::".$termImportName."| ]]",
			wfMsg('smw_ti_creationComment'));
			return $this->createCallBackResult(true,
			array(array('id' => SMW_GARDISSUE_UPDATE_SKIPPED,
				'title' => $title->getFullText())));
		} else if($title->exists()){
			$termAnnotations['updated'][] = $termImportName;
			$updated = true;
		} else {
			$termAnnotations['added'][] = $termImportName;
			$updated = false;
		}

		$article = new Article($title);

		$mappingPolicy = Title::newFromText($mp);
		if(!$mappingPolicy->exists()){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_MAPPINGPOLICY_MISSING,
				'title' => $mp)));
		}
		$mappingPolicy = new Article($mappingPolicy);
		$mappingPolicy = $mappingPolicy->getContent();

		$term = array();
		foreach($entity->children() as $name => $value){
			$name = strtoupper($name);
			if(!array_key_exists("".$name, $term)){
				$term["".$name] = array();
			}
			$term["".$name][] = array("value" => "".$value);
		}

		$content = $tiBot->createContent($term, $mappingPolicy);

		$termAnnotations = "\n\n\n"
		.$tiBot->createTermAnnotations($termAnnotations);
		$created = $article->doEdit(
		$content.$termAnnotations, wfMsg('smw_ti_creationComment'));
		if(!$created){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_CREATION_FAILED,
				'title' => $title)));
		}

		echo "Article ".$title->getFullText();
		echo $updated==true ? " updated\n" : " created.\n";

		if($updated){
			return $this->createCallBackResult(true,
			array(array('id' => SMW_GARDISSUE_UPDATED_ARTICLE,
				'title' => $title->getFullText())));
		} else {
			return $this->createCallBackResult(true,
			array(array('id' => SMW_GARDISSUE_ADDED_ARTICLE,
				'title' => $title->getFullText())));
		}
	}

	private function handleAttachmentCallBack($fileName, $attachmentMP,
			$mailFrom, $mailId, $mailDate, $extraContent, $conflictPolicy, $termImportName){
		global $smwgDIIP;
		$success = true;
		$logMsgs = array();
		$tiBot = new TermImportBot();

		global $smwgEnableRichMedia; 
		if($smwgEnableRichMedia){
			global $wgNamespaceByExtension;
			$fileNameArray = split("\.", $fileName);
			$ext = $fileNameArray[count($fileNameArray)-1];
			if(array_key_exists($ext, $wgNamespaceByExtension)){
				$ns = $wgNamespaceByExtension[$ext];
			} else {
				$ns = NS_IMAGE;
			}
		} else {
			$ns = NS_IMAGE;
		}
		$fileArticleTitle = Title::makeTitleSafe($ns, $fileName );

		if($fileArticleTitle == null){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_CREATION_FAILED,
				'title' => wfMsg('smw_ti_import_error'))));
		}

		$termAnnotations = $tiBot->getExistingTermAnnotations($fileArticleTitle);
		if($fileArticleTitle->exists() && !conflictPolicy){
			echo wfMsg('smw_ti_articleNotUpdated', $fileArticleTitle->getFullText())."\n";
			$article = new Article($fileArticleTitle);
			$article->doEdit(
			$article->getContent()
			."\n[[WasIgnoredDuringTermImport::".$termImportName."| ]]",
			wfMsg('smw_ti_creationComment'));
			return $this->createCallBackResult(true,
			array(array('id' => SMW_GARDISSUE_UPDATE_SKIPPED,
				'title' => $fileArticleTitle->getFullText())));
		} else if($fileArticleTitle->exists()) {
			$termAnnotations['updated'][] = $termImportName;
			$updated = true;
		} else {
			$termAnnotations['added'][] = $termImportName;
			$updated = false;
		}

		$mappingPolicy = Title::newFromText($attachmentMP);
		if(!$mappingPolicy->exists()){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_MAPPINGPOLICY_MISSING,
				'title' => $attachmentMP)));
		}
		
		$fileNameArray = split("\.", $fileName);
		$ext = $fileNameArray[count($fileNameArray)-1];
		$fileFullPath =
			$smwgDIIP.'/specials/TermImport/DAL/attachments/'.$fileName;
			$mFileProps = File::getPropsFromPath($fileFullPath, $ext );
		$local = wfLocalFile($fileName);
		if($local == null){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_CREATION_FAILED,
				'title' => $fileArticleTitle->getFullText())));
		}
		$termAnnotations = "\n\n\n"
		.$tiBot->createTermAnnotations($termAnnotations);
			
		$status = $local->upload(
			$fileFullPath, wfMsg('smw_ti_creationComment'), "",
			File::DELETE_SOURCE, $mFileProps );
		if($status->failureCount > 0){
			return $this->createCallBackResult(false,
			array(array('id' => SMW_GARDISSUE_CREATION_FAILED,
				'title' => $fileArticleTitle->getFullText())));
		}

		$mappingPolicy = new Article($mappingPolicy);
		$mappingPolicy = $mappingPolicy->getContent();

		$term = array();
		if(trim($mailFrom != "")){
			$term["FROM"] = array();
			$term["FROM"][] = array("value" => $mailFrom);
		}
		if(trim($mailId != "")){
			$term["MESSAGE_ID"] = array();
			$term["MESSAGE_ID"][] = array("value" => $mailId);
		}
		if(trim($mailDate != "")){
			$term["DATE"] = array();
			$term["DATE"][] = array("value" => $mailDate);
		}
		
		if($extraContent != ""){
			$sxe = new SimpleXMLElement("<vc>".
				htmlspecialchars_decode($extraContent)."</vc>", LIBXML_NOCDATA);
			foreach($sxe->children() as $property => $value){
				$term[strtoupper($property)] = array();
				$term[strtoupper($property)][] = array("value" => $value);
			} 
		}
		
		$local->load();
		global $smwgEnableUploadConverter;
		if($smwgEnableUploadConverter){
			$fileContent = UploadConverter::getFileContent($local);
			if(trim($fileContent) != ""){
				$term["CONTENT"] = array();
				$term["CONTENT"][] = array("value" => $fileContent);
			}
		}

		$content = $tiBot->createContent($term, $mappingPolicy);
			
		$article = new Article($fileArticleTitle);
		$result = $article->doEdit(
			$content.$termAnnotations, wfMsg('smw_ti_creationComment'));

		echo "Article ".$fileArticleTitle->getFullText();
		echo $updated==true ? " updated\n" : " created.\n";

		if($updated){
			return $this->createCallBackResult(true,
			array(array('id' => SMW_GARDISSUE_UPDATED_ARTICLE,
				'title' => $fileArticleTitle->getFullText())));
		} else {
			return $this->createCallBackResult(true,
			array(array('id' => SMW_GARDISSUE_ADDED_ARTICLE,
				'title' => $fileArticleTitle->getFullText())));
		}
	}


	private function createCallBackResult($success, $logMsgs){
		$result = '<CallBackResult xmlns="http://www.ontoprise.de/smwplus#"><success>';
		$result .= $success ? 'true' : 'false';
		$result .= '</success>';
		foreach($logMsgs as $logMsg){
			$result .= '<logMessage><id>'.$logMsg['id']."</id>";
			$result .= '<title>'.$logMsg['title']."</title></logMessage>";
		}
		$result .= '</CallBackResult>';
		return $result;
	}
	
	private function createAttachmentTerm($fileContent, $fileName, $extraContent=""){
		global $smwgDIIP;
		
		$fileFullPath =
			$smwgDIIP.'/specials/TermImport/DAL/attachments/'.$fileName;
		$file = @ fopen($fileFullPath, 'w');
		if($file){
			fwrite($file, $fileContent);
			fclose($file);
			
			$this->attachments[$fileName] = $extraContent;
		}
	}

	private function handleAttachments($bodyStruct, $connection, $msg, $partNr, $encoding){
		$params = array();
		if ($bodyStruct->ifparameters){
			foreach ($bodyStruct->parameters as $p){
				$params[ strtolower( $p->attribute) ] = mb_decode_mimeheader($p->value);
			}
		}
		if ($bodyStruct->ifdparameters){
			foreach ($bodyStruct->dparameters as $p){
				$params[ strtolower( $p->attribute) ] = mb_decode_mimeheader($p->value);
			}
		}

		$fileName = ($params['filename'])? $params['filename'] : $params['name'];
		
		$fileContent = $this->decodeBodyPart(
			imap_fetchbody($connection, $msg, $partNr), $encoding);
		
		if($this->isVCardAttachment($fileName)){
			$this->serialiseVCard(utf8_encode($fileContent));
			return;
		} else if($this->isICalAttachment($fileName)){
			$this->serializeICal($fileContent);
			return;
		}	
		
		$this->createAttachmentTerm($fileContent, $fileName);
	}
	
	private function parseInputPolicy($inputPolicy) {
    	global $smwgDIIP;
		require_once($smwgDIIP . '/specials/TermImport/SMW_XMLParser.php');

		$parser = new XMLParser($inputPolicy);
		
		$result = $parser->parse();
		
		if ($result !== TRUE) {
			return $result;
    	}
    	
    	$policy = array();
    	$policy['terms'] = $parser->getValuesOfElement(array('terms', 'term'));
    	$policy['regex'] = $parser->getValuesOfElement(array('terms', 'regex'));
    	$policy['properties'] = $parser->getValuesOfElement(array('properties', 'property'));
    	return $policy;
		
	}
	
	private function termMatchesRules($importSet, $term) { 
		// Check import set
		if ($importSet != null && count($this->importSets) > 0) {
			if (@!in_array($importSet, $this->importSets)) {
		//		// Term belongs to the wrong import set.
				return false;	                          	
			}
		}

		// Check term policy
		if (array_key_exists($term, $this->requiredTerms)) {
			return true;
		}
		
		// Check regex policy
		foreach ($this->regularExpressions as $regEx) {
			$regEx = trim($regEx);
			if (preg_match('/'.$regEx.'/', $term)) {
				return true;
			}
		}
		return false;          	
			                          	
	}
	
	private function parseImportSets(&$importSets) {
    	global $smwgDIIP;
		require_once($smwgDIIP . '/specials/TermImport/SMW_XMLParser.php');

		$parser = new XMLParser($importSets);
		$result = $parser->parse();
    	
		if ($result !== TRUE) {
			return $result;
    	}
    	
    	return $parser->getValuesOfElement(array('importSet','name'));
	}
	
	private function serializeBodyXML(){
		global $smwgEnableRichMedia, $wgExtraNamespaces, $wgNamespaceByExtension, $wgCanonicalNamespaceNames;
		$attachmentTerms = "";
		$firstOne = true;
		$attachmentFNs = "";
		foreach($this->attachments as $fn => $extraContent){
			if($smwgEnableRichMedia){
				$fileNameArray = split("\.", $fn);
				$ext = $fileNameArray[count($fileNameArray)-1];
				if(array_key_exists($ext, $wgNamespaceByExtension)){
					$ns = $wgNamespaceByExtension[$ext];
					$ns = $wgExtraNamespaces[$ns].":";
				} 
				if($ns == ":" || $ns == "") {
					$ns = $wgCanonicalNamespaceNames[NS_IMAGE].":";
				}
			} else {
				$ns = $wgCanonicalNamespaceNames[NS_IMAGE].":";
			}
			if($firstOne){
				$attachmentFNs = "\n<attachments>".$ns.$fn;
				$firstOne = false;
			} else {
				$attachmentFNs .= ",".$ns.$fn;
			}
			$attachmentTerms .= "\n\n<term callback='true'>".
			"handleAttachmentCallBack(\"".
				htmlspecialchars($fn)."\",\"".$this->attachmentMP."\",\""
				.$this->mailFrom."\",\"".
				$this->mailId."\",\"".$this->mailDate."\",\"".
				htmlspecialchars($extraContent)."\""
				."</term>";
		}
		
		if($attachmentFNs == "" && $this->embeddedMailIds != ""){
			$attachmentFNs = "<attachments>".$this->embeddedMailIds."</attachments>\n";	
		} else if($attachmentFNs != ""){
			if($this->embeddedMailIds != ""){
				$attachmentFNs .= ",".$this->embeddedMailIds;
			}
			$attachmentFNs .= "</attachments>\n";
		}
		
		if(trim($this->body) == ""){
			$body = "";
		} else {
			$body = "<body><![CDATA[".$this->body."]]></body>";
		}
		
		return $attachmentTerms."<term>"
			.$attachmentFNs.$body;
	}
	
	private function isVCardAttachment($fileName){
		$fileNameArray = split("\.", $fileName);
		$ext = $fileNameArray[count($fileNameArray)-1];
		
		if($ext == "vcf"){
			return true;
		}
		return false;
	}
	
	private function isICalAttachment($fileName){
		$fileNameArray = split("\.", $fileName);
		$ext = $fileNameArray[count($fileNameArray)-1];
		
		if($ext == "ics"){
			return true;
		}
		return false;
	}
}