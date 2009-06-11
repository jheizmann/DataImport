<?php
/*  Copyright 2007, ontoprise GmbH
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
 * @author Markus Krötzsch
 */

global $smwgDIIP;
include_once($smwgDIIP . '/languages/SMW_DILanguage.php');

class SMW_DILanguageEn extends SMW_DILanguage {
	
	protected $smwUserMessages = array(
	'specialpages-group-di_group' => 'Data Import',
	
	/* Messages of the Thesaurus Import */
	'smw_ti_welcome' => 'Please select a transport layer module (TLM) and then an data access module (DAM):',
	'smw_ti_selectDAM' => 'Please select a DAM',
	'smw_ti_firstselectTLM' => 'first select TLM',
	'smw_ti_selectImport' => 'Please choose one of the available import sets:&nbsp;&nbsp;',
	'smw_ti_inputpolicy' => 'With the input policy, you can define which information should be imported, using regular expressions (<a href="http://www.opengroup.org/onlinepubs/007908799/xbd/re.html" target="_blank">help</a>). 
							For example, use "^Em.*" in order to import only data sets that start with "Em". 
							If no input policy is chosen, all data will be imported.',
	'smw_ti_define_inputpolicy' => 'Please define an input policy:',
	'smw_ti_mappingPage' => 'Please enter the name of the article that does contain the mapping policies:',
	'smw_ti_viewMappingPage' => 'View',
	'smw_ti_editMappingPage' => 'Edit',
	'smw_ti_conflictpolicy' => 'Please define a conflict policy. The conflict policy defines what happens if articles are imported that already exist in this wiki:',
	'smw_ti_nomappingpage' => 'The entered article that should contain the mapping policies does not exist',

	'smw_ti_succ_connected' => 'Successfully connected to "$1".',
	'smw_ti_class_not_found' => 'Class "$1" not found.',
	'smw_ti_no_tl_module_spec' => 'Could not find specification for TL module with ID "$1".',
	'smw_ti_xml_error' => 'XML error: $1 at line $2',
	'smw_ti_filename'  => 'Filename:',
	'smw_ti_articlename'  => 'Articlename:',
	'smw_ti_articleerror' => 'The article "$1" does not exist or is empty.',
	'smw_ti_fileerror' => 'The file "$1" does not exist or is empty.',
	'smw_ti_no_article_names' => 'There are no article names in the specified data source.',
	'smw_ti_termimport' => 'Import Vocabulary',
	'termimport' => 'Import Vocabulary',
	'smw_ti_botstarted' => 'The bot for the import of vocabulary was successfully started.',
	'smw_ti_botnotstarted' => 'The bot for the import of vocabulary could not be started.',
	'smw_ti_couldnotwritesettings' => 'Could not write the settings for the vocabulary import bot.',
	'smw_ti_missing_articlename' => 'An article can not be created as the "articleName" is missing in the term\'s description.',
	'smw_ti_invalid_articlename' => 'The article name "$1" is invalid.',
	'smw_ti_articleNotUpdated' => 'The existing article "$1" was not overwritten with a new version.',
	'smw_ti_creationComment' => 'This article was created/updated by the vocabulary import framework.',
	'smw_ti_creationFailed' => 'The article "$1" could not be created or updated.',
	'smw_ti_missing_mp' => 'The mapping policy is missing.',
	'smw_ti_import_error' => 'Import error',
	'smw_ti_added_article' => '$1 was added to the wiki.',
	'smw_ti_updated_article' => '$1 was updated.',
	'smw_ti_import_errors' => 'Some terms were not properly imported. Please see the Gardening Log!',
	'smw_ti_import_successful' => 'All terms were successfully imported.',

	'smw_gardissue_ti_class_added_article' => 'Imported articles',
	'smw_gardissue_ti_class_updated_article' => 'Updated articles',
	'smw_gardissue_ti_class_system_error' => 'Import system errors',
	'smw_gardissue_ti_class_update_skipped' => 'Skipped updates',
	
	/* Messages for the wiki web services */
	'smw_wws_articles_header' => 'Pages using the web service "$1"',
	'smw_wws_properties_header' => 'Properties that are set by "$1"',
	'smw_wws_articlecount' => '<p>Showing $1 pages using this web service.</p>',
	'smw_wws_propertyarticlecount' => '<p>Showing $1 properties that get their value from this web service.</p>',
	'smw_wws_edit_in_gui' => 'Please click here to edit the WWSD in the graphical user interface.',
	'smw_wws_invalid_wwsd' => 'The Wiki Web Service Definition is invalid or does not exist.',
	'smw_wws_wwsd_element_missing' => 'The element "$1" is missing in the Wiki Web Service Definition.',
	'smw_wws_wwsd_attribute_missing' => 'The attribute "$1" is missing in element "$2" of the Wiki Web Service Definition.',
	'smw_wws_too_many_wwsd_elements' => 'The element "$1" appears several times in the Wiki Web Service Definition.',
	'smw_wws_wwsd_needs_namespace' => 'Please note: Wiki web service definitions are only considered in articles with namespace "Web Service"!',
	'smw_wws_wwsd_errors' => 'The Wiki Web Service Definition is erroneous:',
	'smw_wws_invalid_protocol' => 'The protocol specified in the Wiki Web Service Definition is not supported.',
	'smw_wws_invalid_operation' => 'The operation "$1" is not provided by the web service.',
	'smw_wws_parameter_without_name' => 'A parameter of the Wiki Web Service Definition has no name.',
	'smw_wws_parameter_without_path' => 'The attribute "path" of the parameter "$1" is missing.',
	'smw_wws_duplicate_parameter' => 'The parameter "$1" appears several times.',
	'smw_wwsd_undefined_param' => 'The operation needs the parameter "$1". Please define an alias.',
	'smw_wwsd_obsolete_param' => 'The parameter "$1" is defined but not used by the operation. You can remove it.',
	'smw_wwsd_overflow' => 'The structure "$1" may be continued endlessly. Parameters of this type are not supported by the Wiki Web Service Extension.',
	'smw_wws_result_without_name' => 'A result of the Wiki Web Service Definition has no name.',
	'smw_wws_result_part_without_name' => 'The result "$1" contains a part without name.',
	'smw_wws_result_part_without_path' => 'The attribute "path" of the part "$1" of the result "$2" is missing.',
	'smw_wws_duplicate_result_part' => 'The part "$1" appears several times in the result "$2".',
	'smw_wws_duplicate_result' => 'The result "$1" appears several times.',
	'smw_wwsd_undefined_result' => 'The path of the result "$1" can not be found in the result of the service.',
	'smw_wwsd_array_index_missing' => 'An array index is missing in the path: "$1"',
	'smw_wwsd_array_index_incorrect' => 'An array index is incorrect in the path: "$1"',
	'smw_wsuse_wrong_parameter' => 'The parameter "$1" does not exist in the Wiki Web Service Definition.',
	'smw_wsuse_parameter_missing' => 'The parameter "$1" is not optional and no default value was provided by the Wiki Web Service Definition.',
	'smw_wsuse_wrong_resultpart' => 'The result-part "$1" does not exist in the Wiki Web Service Definition.',
	'smw_wsuse_wwsd_not_existing' => 'A Wiki Web Service Definition with the name "$1" does not exist.',
	'smw_wsuse_wwsd_error' => 'The usage of the Web Service was erroneous:',
	'smw_wsuse_getresult_error' => 'An error occured while calling the Web Service.',
	'smw_wsuse_old_cacheentry' => ' Therefore an outdated cache entry is used instead of a current Web Service result.',
	'smw_wsuse_prop_error' => 'It is not allowed to use more than one result part as a value for a property',
	'smw_wsuse_type_mismatch' => 'The Web Service did not return the expected type for this result part. Please change the corresponding WWSD. A variable dump is printed.',
	'webservicerepository' => 'Web Service Repository',
	'smw_wws_select_without_object' => 'The attribute "object" of the select "$1" of the result "$2" is missing.',
	'smw_wws_select_without_value' => 'The attribute "value" of the select "$1" of the result "$2" is missing.',
	'smw_wws_duplicate_select' => 'The select "$1" appears several times in the result "$2".',
	'smw_wws_need_confirmation' => 'The WWSD for this Web Service has to be confirmed by an administrator before it can be used again',
	'definewebservice' => 'Define Web Service',
	'smw_wws_s1-help' => '<h4>Help</h4><p>Choose one of the protocols <b>SOAP</b> or <b>REST</b>, depending on the web service you like to use. Enter the <b>URI of the web service</b>, if you use a SOAP web service, the address (URI) has to direct to a WSDL file (e. g. http://domain.de/soap_webservice.wsdl). You can optionally define <b>authentication credentials</b>, currently only the basic HTTP authentication is supported.</p>',
	'smw_wws_s2-help' => '<h4>Help</h4><p>Each web service provides different <b>methods</b>, which deliver different types of data. If you like to use several methods of one web service, then you have to define for <b>each method a new WWSD</b>.</p>',
	'smw_wws_s3-help' => '<h4>Help</h4><p>Each parameter is identified by a <b>path</b>, which addresses it in the parameter type hierarchy and an <b>alias</b>, which displaces the path of the parameter. Alias are necessary to use parameters later in an easy way. Browse the parameters by expanding and collapsing the type hierarchy in the tree view. Web services with a plain hierarchy don’t have a tree view. </p><p>In some cases it is not necessary to pass a value for each parameter when calling a web service. If you do not need a parameter, leave it empty or mark it as optional. Activate the <b>‘Use’-Checkboxes</b>, to include the parameters into the WWSD. Thus users are later able to provide values for parameters when calling the web service. </p><p>You can use the <b>“Auto generate alias”</b> function <img src="$1"/> to generate an alias based on the selected parameter.If a parameter is not required for the web service, you can mark this parameter as optional. Mark a parameter as <b>optional</b>, if users call the web service without passing a value for this parameter. Otherwise users will get an error message. </p><p>Define a <b>default value</b> for a parameter, this value will be used if a parameter is not optional and if no value for that parameter was passed to the web service call. Define <b>subparameters</b> if necessary, e. g. if you like to import data from a specific author.</p>',
	'smw_wws_s4-help' => '<h4>Help</h4><p>Define the result parts to display in Wiki articles. Activate the <b>‘Use’-Checkboxes</b>, if users later should be able to use the selected result part it in a Wiki article. Each result part is identified by a <b>path</b>, which addresses it in the result type hierarchy and an <b>alias</b>, which displaces the path of the parameter. </p><p>If the result parts contain information encoded in XML or JSON, add <b>subpaths</b> to extract the relevant information. Subpaths can have the <b>JSON</b> or <b>XPath</b> format. (Currently only the XPath format is supported.) Enter the path to the information you like to extract. Add an alias to each subpath. Manually defined result parts will be displayed below a grey line in editing mode.</p>',
	'smw_wws_s5-help' => '<h4>Help</h4><p>The <b>update policies</b> define the time period for updating the results delivered by a web service. Choose the <b>display policy</b> for displaying results in an article. E. g. if the display policy is set to a <b>max age of 2 days</b> the results of the web service call will be display the cached web service results for 2 days. After that period the web service will be called again and the cached results will be replaced with the new ones. Otherwise the web service will be called again and the cached result will be replaced. The <b>display policy once</b> means that the web service result will never be updated. Choose the <b>query policy</b> for semantic queries, this updates the gardening bots in your Wiki. </p><p>The <b>delay value</b> (in seconds) is applied between two subsequent calls of a web service. So you can prevent, calling a web service too often in a short time, which may violate the terms of use of the web service provider. The <b>span of life</b> defines how long a result of a web service call will be kept in the cache. Providing no value, web service results will be kept in the cache for an unlimited time span. Depending on defined span of life, you can appoint the expiry of the cached results. If the cached results should <b>expire after their last update</b>, choose ‘No’. If they <b>should expire after their last access</b> (e. g. by viewing an article), choose ‘Yes’. </p>',
	'smw_wws_s6-help' => '<h4>Help</h4><p>Enter name of the web service.<p>',
	'smw_wws_s1-menue' => '1. Define credentials',
	'smw_wws_s2-menue' => '2. Select method',
	'smw_wws_s3-menue' => '3. Define parameters',
	'smw_wws_s4-menue' => '4. Define result parts',
	'smw_wws_s5-menue' => '5. Define update policy',
	'smw_wws_s6-menue' => '6. Save WWSD',
	'smw_wws_s1-intro' => '1. Define credentials',
	'smw_wws_s1-uri' => 'Enter URI: ',
	'smw_wws_s2-intro' => '2. Select method',
	'smw_wws_s2-method' => 'Select method: ',
	'smw_wws_s3-intro' => '3. Define parameters',
	'smw_wws_duplicate' => '<table><tr><td style="vertical-align: top"><b>Note:</b><td><td><b>Some</b> of the <b>type-definitions</b> used in this WSDL are <b>ambiguous</b>.<br/>Those type definitions are highlighted in <b style="color: darkred">darkred</b>.<br/>It is strongly recommended that you <b>review</b> and edit them <b>later</b> in the <b>textual representation</b> of the WWSD.</td></tr></table><br/>',
	'smw_wws_s4-intro' => '4. Choose result parts',
	'smw_wws_s5-intro' => '5. Define update policy',
	'smw_wws_s6-intro' => '6. Save WWSD',
	'smw_wws_s6-name' => 'Enter name: ',
	'smw_wws_s7-intro-pt1' => 'Your Web Service <b>',
	'smw_wws_s7-intro-pt2' => '</b> has been successfully created.<br/><br/> In order to include this Web Service into a page, please use the following syntax:',
	'smw_wws_s7-intro-pt3' => 'Your Web Service will from now on be available in the list of available Web Services.',
	'smw_wws_s1-error' => 'It was not possible to connect to the specified URI. Please change the URI or try again.',
	'smw_wws_s2a-error' => 'It was not possible to connect to the specified URI. Please change the URI or try again.',
	'smw_wws_s2b-error' => 'The parameter definition of this method contains a recursive definition. Please choose another Web Service or another method',
	'smw_wws_s3-error' => 'It was not possible to connect to the specified URI. Please change the URI or try again.',
	'smw_wws_s4-error' => 'todo: write error message',
	'smw_wws_s5-error' => 'todo: write error message',
	'smw_wws_s6-error' => 'You have to specify a name for the WWSD before it is possible to proceed.',
	'smw_wws_s6-error2' => 'An article with the given name allready exists. Please choose another name and try again.',
	'smw_wws_s6-error3' => 'An error occurred when saving the WWSD. Please try again!',
	'smw_wscachebot' => 'Clean the Web Service-Cache',
	'smw_ws_cachebothelp' => 'This bot removes cached Web Service results, that are outdated.',
	'smw_ws_cachbot_log' => 'Outdated cache entries for this Web Service were removed.',
	'smw_wsupdatebot' => 'Update the Web Service-cache',
	'smw_ws_updatebothelp' => 'This bot updates the Web Service-cache.',
	'smw_ws_updatebot_log' => 'Cache entries for this Web Service were updated.',
	'smw_ws_updatebot_callerror' => 'An error occured while updating the cache entries of this Web Service',
	'smw_ws_updatebot_confirmation' => 'It was not possible to update results of this Web Service due to a missing confirmation of the WWSD',
	'smw_wsgui_nextbutton' => 'Next',
	'smw_wsgui_savebutton' => 'Save',
	
	'usewebservice' => 'Use Web Service',
	
	'smw_wws_client_connect_failure' => 'It was not possible to connect to ',
	'smw_wws_client_connect_failure_display_cache' => 'The last cached web service result is displayed',
	'smw_wws_client_connect_failure_display_cache' => 'The last cached web service result is displayed.',
	'smw_wws_client_connect_failure_display_default' => 'Default values are displayed instead of a web service result.',
	
	'smw_wws_s2-REST-help' => '<h4>Help</h4>Choose one of the methods <b>HTTP-get</b> or <b>HTTP-post</b>for calling the web service. In most cases HTTP-get is appropriate. </p>',
	'smw_wws_s3-REST-help' => '<h4>Help</h4><p>Click on the <b>Add parameters</b>-button and the table for defining parameters will be displayed. Enter the <b>path</b> of the parameter. If you do not enter a path for a parameter, then this parameter will not be included into the WWSD. Enter an <b>alias</b> for the parameter, otherwise the parameter path will be used as alias. </p><p>If a parameter is not required for the web service, you can mark this parameter as optional. Mark a parameter as <b>optional</b>, if users call the web service without passing a value for this parameter. Otherwise users will get an error message. </p><p>Define a <b>default value</b> for a parameter, this value will be used if a parameter is not optional and if no value for that parameter was passed to the web service call. <p>',
	'smw_wws_s4-REST-help' => '<h4>Help</h4><p>RESTful web services return a string as their result. This string can be a simple text or it can contain information encoded in a format like JSON or XML. If you like to import the complete result of the web service, activate the <b>“Use complete result as result part”-checkbox</b>. If you like to define further result parts, click on the <b>Add result parts</b>-button, so that the table for defining them will be displayed. Define in the table which further parts of this result users should be able to display in Wiki articles. Enter an <b>alias</b> for each result part. This alias will later be used to address the result part when the web service is used in an article. If you do not specify an alias, then a random one will be created. </p><p>Choose the <b>JSON</b> or the <b>XPath format </b> depending on the path you like to use for extracting result parts. Enter the path which will be used to extract the result part from the complete result.</p>',
	'smw_wws_help-button-tooltip' => 'Display or hide help.',
	'smw_wws_selectall-tooltip' => 'Select or deselect all.',
	'smw_wws_autogenerate-alias-tooltip-parameter' => 'Autogenerate aliases. This works only if you already have selected to use some parameters.',
	'smw_wws_autogenerate-alias-tooltip-resultpart' => 'Autogenerate aliases. This works only if you already have selected some result parts or added subpaths for which aliases can be created.',
	
	'smw_wsuse_s1-help' => '<h4>Help</h4><p>With this special page you are able to create the #ws-syntax for calling a web service from a Wiki article. Choose one of the <b>available web services</b> in the dropdown-menu above. </p>',
	'smw_wsuse_s2-help' => '<h4>Help</h4><p>The table displays the included parameters of the web service. Required parameters are activated by default. If you like to use a parameter when calling the web service, activate the <b>’Use’</b>-Checkbox and provide a <b>value</b> for that parameter. Some parameters provide <b>default values</b>. If you like to use a default value instead of providing your own value, then activate the <b>’ Use default value’</b>-checkbox. If this fields are greyed out, there are no values available.</p>',
	'smw_wsuse_s3-help' => '<h4>Help</h4><p>Activate the <b>’Use’</b>-Checkboxes of each result part you like to display in your Wiki article.</p>',
	'smw_wsuse_s4-help' => '<h4>Help</h4><p>Choose in the dropdown-list which <b>format</b> you like to use for displaying the web service result in your Wiki article. Some formats need also to specify a <b>template</b> which will be used for formatting the rows of the result. You will find an overview of all templates at the page [[Special:Templates]].</p>',
	'smw_wsuse_s5-help' => '<h4>Help</h4><p>In the last step you have three possibilities. The <b>Display preview</b>-button shows a preview of the web service results. The <b>Display #ws-syntax</b>-button displays the #ws-syntax which was created by the GUI. The <b>Copy to clipboard</b>-button copies the #ws-syntax to local clipboard. If you navigated to this GUI from the semantic toolbar while you were editing an article, then you can directly go back and the #ws-syntax will be automatically <b>added into the editor</b>.</p>',
	
	'smw_wws_spec_protocol' => 'Specify protocol:',
	'smw_wws_spec_auth' => 'Authentication required? ',
	'smw_wws_yes' => 'Yes',
	'smw_wws_no' => 'No',
	'smw_wws_username' => 'Username: ',
	'smw_wws_password' => 'Password: ',
	'smw_wws_error_headline' => 'Error',
	'smw_wws_path' => 'Path:',
	'smw_wws_alias' => 'Alias: ',
	'smw_wws_optional' => 'Optional:',
	'smw_wws_defaultvalue' => 'Default value:',
	'smw_wws_use' => 'Use: ',
	'smw_wws_format' => 'Format: ',
	'smw_wws_days' => ' days ',
	'smw_wws_hours' => ' hours ',
	'smw_wws_minutes' => ' minutes ',
	'smw_wws_inseconds' => 'in seconds',
	'smw_wws_indays' => 'in days',
	'smw_wws_yourws' => 'Your web service <b>',
	'smw_wws_succ_created' => '</b> has been successfully created.<br/><br/>Now you can use that web service in an article. You can do that manually by using the #ws parser function or via the GUI for using a web service. This GUI is available via the semantic toolbar.<br/><br/>Your web service will from now on be available in',
	'smw_wws_succ_created-3' => ' the list of available WebServices.<br/><br/>', 
	'smw_wws_succ_created-4' => 'You can now go on and define another WWSD.',
	'smw_wws_new' => 'Create new web service',
	
	'smw_wwsr_intro' => 'Available Wiki Web Service Definitions',
	'smw_wwsr_name' => 'Name',
	'smw_wwsr_lastupdate' => 'Last update',
	'smw_wwsr_update_manual' => 'Manual update',
	'smw_wwsr_update' => 'Update',
	'smw_wwsr_rep_edit' => 'Edit',
	'smw_wwsr_confirm' => 'Confirm',
	'smw_wwsr_rep_intro' => 'The web service repository lists all valid Wiki Web Service Definitionions (WWSD) that have been declared in the Wiki. You can confirm a WWSD, edit it in the graphical user interface and manually update its results here. (You must be logged in with administrative user rights in order to update or confirm a WWSD.)',
	'smw_wwsr_noconfirm' => 'If you do not see the buttons for updating and confirming WebServices, you might not be logged in or you do not have any rights to use these functions.',
	'smw_wwsr_confirmed' => 'confirmed',
	'smw_wwsr_updating' => 'updating',
	
	'smw_wwsu_menue-s1' => '1. Choose web service',
	'smw_wwsu_menue-s2' => '2. Define parameters',
	'smw_wwsu_menue-s3' => '3. Choose result parts',
	'smw_wwsu_menue-s4' => '4. Choose output format',
	'smw_wwsu_menue-s5' => '5. Result',
	
	'smw_wwsu_availablews' => 'Available web services: ',
	'smw_wwsu_noparameters' => 'This web service does not require any parameters.',
	'smw_wwsu_alias' => 'Alias:',
	'smw_wwsu_use' => 'Use: ',
	'smw_wwsu_value' => 'Value:',
	'smw_wwsu_defaultvalue' => 'Use default value:',
	'smw_wwsu_availableformats' => 'Available formats: ',
	'smw_wwsu_displaypreview' => 'Display preview',
	'smw_wwsu_displaywssyntax' => 'Display #ws-syntax',
	'smw_wwsu_addcall' => 'Add call to <articlename>',
	'smw_wwsu_noresults' => 'This web service does not provide any result parts.',
	'smw_wwsu_copytoclipboard' => 'Copy to clipboard',
	
	'smw_wwsm_update_msg' => 'The source has changed sinse the last materialization.',
	
	
	
	);

	protected $smwDINamespaces = array(
		SMW_NS_WEB_SERVICE       => 'WebService',
		SMW_NS_WEB_SERVICE_TALK  => 'WebService_talk'
	);

	protected $smwDINamespaceAliases = array(
		'WebService'       => SMW_NS_WEB_SERVICE,
		'WebService_talk'  => SMW_NS_WEB_SERVICE_TALK 
	);
}


