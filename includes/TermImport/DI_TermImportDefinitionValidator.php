<?php
/*
 * Copyright (C) Vulcan Inc.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program.If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * @file
 * @ingroup DITermImport
 * 
 * @author Ingo Steinbauer
 */


/*
 * This class is responsible for validating Term Import definitions
 */
class DITermImportDefinitionValidator {
	private $tiDefinition = null;
	
	public function __construct($tiDefinition){
		try {
			$this->tiDefinition = @new SimpleXMLElement($tiDefinition);
		} catch (Exception $e){
			$this->tiDefinition = null;
		}
	}
	
	public function validate(){
		$valid = true;
		if(!$this->isValidXML()){
			return false;
		}
		$valid &= $this->isValidConflictPolicy();
		$valid &= $this->isValidDataSource();
		$valid &= $this->isValidImportSet();
		$valid &= $this->isValidInputPolicy();
		$valid &= $this->isValidCreationPattern();
		$valid &= $this->isValidModuleConfiguration();
		$valid &= $this->isValidUpdatePolicy();
		
		return $valid;
	}
	
	public function isValidXML(){
		return $this->tiDefinition == null ? false : true;
	}
	
	public function isValidModuleConfiguration(){
		$node = $this->tiDefinition->xpath("
			/ImportSettings/ModuleConfiguration/DALModule/id");
		if(count($node) != 1) return false;
		return true;
	}
	
	public function isValidDataSource(){
		$node = $this->tiDefinition->xpath("/ImportSettings/DataSource");
		if(count($node) != 1) return false;
		return true;
	}
	
	public function isValidCreationPattern(){
		$node = $this->tiDefinition->xpath("/ImportSettings/CreationPattern");
		if(count($node) != 1) return false;
		return true;
	}
	
	public function isValidConflictPolicy(){
		$node = $this->tiDefinition->xpath("
			/ImportSettings/ConflictPolicy/Name");
		if(count($node) != 1) return false;
		return true;
	}

	public function isValidInputPolicy(){
		$node = $this->tiDefinition->xpath("
			/ImportSettings/InputPolicy/terms/regex");
		if(count($node) == 0) return false;
		$node = $this->tiDefinition->xpath("
			/ImportSettings/InputPolicy/terms/term");
		if(count($node) == 0) return false;
		$node = $this->tiDefinition->xpath("
			/ImportSettings/InputPolicy/properties/property[./text() = 'articleName']");
		if(count($node) != 1) return false;
		return true;
	}
	
	public function isValidImportSet(){
		$node = $this->tiDefinition->xpath("
			/ImportSettings/ImportSets");
		if(count($node) == 0) return false;
		return true;
	}
	
	public function isValidUpdatePolicy(){
		$node = $this->tiDefinition->xpath("
			/ImportSettings/UpdatePolicy[./once or ./maxAge/@value]");
		if(count($node) != 1) return false;
		return true;
	}
}