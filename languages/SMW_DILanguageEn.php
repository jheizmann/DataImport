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
 * @author Markus Krötzsch
 */

global $smwgDIIP;
include_once($smwgDIIP . '/languages/SMW_DILanguage.php');

class SMW_DILanguageEn extends SMW_DILanguage {
	
	protected $smwUserMessages = array(
	'specialpages-group-di_group' => 'Data Import',
	
	/* Messages of the Term Import */
	'smw_ti_selectDAM' => 'Choose a data source.',
	'smw_ti_selectImport-heading' => 'Import sets',
	'smw_ti_selectImport-label' => 'Choose:&nbsp&nbsp',
	'smw_ti_selectImport-help' => 'If you like to only import terms that belong to a certain import set, then please choose it here.',
	'smw_ti_inputpolicy-heading' => 'Input policy', 
	'smw_ti_inputpolicy-help' => 'With the input policy, you can define which information should be imported, using regular expressions (<a href="http://www.opengroup.org/onlinepubs/007908799/xbd/re.html" target="_blank">help</a>).<br/>For example, use "^Em.*" in order to import only data sets that start with "Em".<br/>If no input policy is chosen, all data will be imported.',
	'smw_ti_inputpolicy-label' => 'Enter filter:',
	'smw_ti_inputpolicy-defined' => 'Defined filters:&nbsp;&nbsp;',
	'smw_ti_conflictpolicy-heading' => 'Conflict policy',
	'smw_ti_conflictpolicy-label' => 'Choose:&nbsp;&nbsp;',
	'smw_ti_conflictpolicy-help' => 'Please define a conflict policy. The conflict policy defines what happens if articles are imported that already exist in this wiki:',
	'smw_ti_ti_name-heading' => 'Term Import name',
	'smw_ti_ti_name-label' => 'Enter a name:&nbsp;&nbsp;',
	'smw_ti_ti_name-help' => 'Please enter a name for this term import. An article with that name will be created in the namespace TermImport. It will contain all information you define here.',
	'smw_ti_update_policy-heading' => 'Update policy',
	'smw_ti_update_policy-label' => '',
	'smw_ti_update_policy-help' => 'Choose the update policy "once" if the results of this Term Import should never be updated by the Term Import Update bot. Enter a "max age" value otherwise.',
	'smw_ti_help' => 'Help:&nbsp&nbsp',
	'smw_ti_properties-heading' => 'Available attributes',
	'smw_ti_properties-label' => 'Select desired attributes:',
	'smw_ti_properties-help' => 'Select the attributes in the table below, which should be included in this Term Import.',
	'smw_ti_articles-heading' => 'Articles to be imported',
	'smw_ti_articles-label1' => 'The following ',
	'smw_ti_articles-label2' =>  ' articles will be generated:',
	'smw_ti_articles-help' =>  'The table below shows the articles that will be included in this Term Import.',
	
	'smw_ti_creation-pattern-heading' => 'Creation Pattern:',
	'smw_ti_creation-pattern-label-1' => 'Annotations',
	'smw_ti_creation-pattern-label-2' => 'Template',
	'smw_ti_creation-pattern-help' => 'You can either decide to simply create articles with silent annotations or you can decide to use a template to create the new articles. If you decide to create only annotations, then the Wiki text of the new articles will only consist of a number of hidden annotations. For each attribute of the imported term, an annotation will be created. The attribute name will be used as Property name.<br/> If you choose to use a template, then a template call will be added to each new article. The attributes of the imported terms will be used as template parameters.<br/>If you choose to use templates, then you also will be able to enter a delimiter that will be used to separate template parameter values if the corresponding attribute of the term has several values. If you choose to create annotations, then the delimiter will be computed based on the Wiki ontology, respectively on the values of the corresponding Min and Max cardinality and the Delimiter annotations.',
	'smw_ti_delimiter-heading' => 'Delimiter',
	'smw_ti_delimitery-label' => 'Choose: ',
	'smw_ti_delimiter-help' => 'The given delimiter will be used to separate several template parameter values if a term attribute has more than one value.', 
	'smw_ti_category-heading' => 'Additional Category Annotations',
	'smw_ti_category-label' => 'Names:',
	'smw_ti_category-help' => 'Here you can enter a comaseparated list of category names. Those categories then will be added as category annotations to each new article. Display Templates that have been defined for those categories will also be applied.',

	'smw_ti_succ_connected' => 'Successfully connected to "$1".',
	'smw_ti_class_not_found' => 'Class "$1" not found.',
	'smw_ti_xml_error' => 'XML error: $1 at line $2',
	
	'smw_ti_filename'  => 'Filename:',
	'smw_ti_articlename'  => 'Articlename:',
	'smw_ti_articleerror' => 'The article $1 does not exist or is empty.',
	'smw_ti_fileerror' => 'The file "$1" does not exist or is empty.',
	'smw_ti_pop3error' => 'It was not possible to connect to the server.',
	'smw_ti_no_article_names' => 'There are no article names in the specified data source.',
	'smw_ti_termimport' => 'Import Data',
	'termimport' => 'Import Data',
	
	'smw_ti_definition_saved_successfully' => 'The Term Import Definition $1 was saved successfully.',
	'smw_ti_started_successfully' => 'The Term Import Bot has been started successfully. See $1 for details.',
	
	'smw_ti_feed_category' => 'Feed definition category:',
	'smw_ti_feed_urlprop' => 'URL property:',
	'smw_ti_feed_prefixprop' => 'Prefix property:',
	'smw_ti_feed_wrong_datasource' => 'Both, the name of the category, that contains the feed definition articles, and the name of the URL property must be specified.',
	
	'smw_ti_sparql_wrong_variable_name' => 'One of the variables in the query must be called "articlename"',
	
	'smw_ti_missing_articlename' => 'An article can not be created as the "articleName" is missing in the term\'s description.',
	'smw_ti_invalid_articlename' => 'The article name "$1" is invalid.',
	'smw_ti_articleNotUpdated' => 'The existing article "$1" was not overwritten with a new version.',
	'smw_ti_mappingpolicy_missing' => 'The mapping policy "$1" does not exist.',
	'smw_ti_creationComment' => 'This article was created/updated by the term import framework.',
	'smw_ti_creationFailed' => 'The article "$1" could not be created or updated.',
	'smw_ti_import_error' => 'Import error',
	'smw_ti_added_article' => '$1 was added to the wiki.',
	'smw_ti_updated_article' => '$1 was updated.',
	'smw_ti_import_errors' => 'Some terms were not properly imported. Please see the Gardening Log!',
	'smw_ti_import_successful' => 'All terms were successfully imported.',

	'smw_gardissue_ti_class_added_article' => 'Imported articles',
	'smw_gardissue_ti_class_updated_article' => 'Updated articles',
	'smw_gardissue_ti_class_system_error' => 'Import system errors',
	'smw_gardissue_ti_class_update_skipped' => 'Skipped updates',
	
	'smw_termimportbot' => 'Import data',
	'smw_gard_termimportbothelp' => 'Start the bot for importing data.',
	'smw_termimportupdatebot' => 'Update defined Term Imports',
	'smw_gard_termimportupdatebothelp' => 'Start the bot for updating defined Term Imports.',
	'smw_ti_def_allready_exists' => 'A Term Import definition with that name allready exists.',
	'smw_ti_def_not_creatable' => 'It was not possible to create a Term Import definition with the given name.',
	'smw_ti_update_not_necessary' => 'It was not necessary to update that Term Import.',
	'smw_ti_updated_successfully' => 'This Term Import was updated successfully.',
	'smw_ti_update_failure' => 'An error occured while updating this Term Import.',
	'smw_gardissue_ti_class_ignored' => 'Ignored Term Imports',
	'smw_gardissue_ti_class_success' => 'Updated Term Imports',
	'smw_gardissue_ti_class_failure' => 'Term Imports with failures',
	
	'smw_ti_menuestep1' => '1. Choose and configure data source ',
	'smw_ti_menuestep2' => '2. Configure and execute Term Import',
	'smw_ti_dam-heading' => 'Choose data source:',
	'smw_ti_module-data-heading' => 'Configure data source:',
	
	'smw_ti_damdesc_csv' => 'Imports articles from a CSV file. You either have to pass the path to a file which is located on the server or a valid URL. One of the colums in the source must be named \'articleName\'',
	'smw_ti_damdesc_feed' => 'Imports articles from feeds in the RSS or Atom format.You have to enter the name of a category in which the system can find Feed Definition articles. You also have to enter the name of the property which is used to store the Feed URLs. The system then will search for all instances in that category and their URL property value and then will import the Feeds with those URLs. Optionally, you can enter the name of a property that stores prefixes for feeds. The system will then use those prefixes for the names of the created articles.',
	'smw_ti_damdesc_pop3' => 'Imports mails from a POP3 server. For example if you have a mail account at Google Mail, then the server name is pop.googlemail.com, the username is your email adress and you have to select the SSL checkbox. Please note, that you first have to enable POP3 access on the Google Mail website.',
	'smw_ti_damdesc_tixml' => 'Imports the results of a web service call in the TIXML result format. You have to enter the name of the article, that contains the web service result in the TIXML format. You can add such a web service result to an article by using the #ws parser function and the format \'tixml\'. One of the result parts in the web service result must be named \'articleName\'.',
	'smw_ti_damdesc_sparql' => 'Imports results of a SELECT query to a SPARQL endpoint. You have to enter the URL of a SPARQL endpoint and a select query in the SPARQL syntax. One of the result variables must be named \'articleName\'.',
	
	'smw_ti_page_editlink' => 'Click here to edit the Term Import definition in the GUI',
	
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
	'dataimportrepository' => 'Data Import Repository',
	'smw_wws_ns_without_prefix' => 'The attribute "prefix" of one of the namespace definitions is missing.',
	'smw_wws_triplification_without_subject' => 'The attribute "subject" of one of the triplification tag is missing.',
	'smw_wws_triplification_instruction_twice' => 'More than one triplification instructions were defined.',
	//'smw_wws_wrong_triplification_subject' => 'The triplification subject is erronious because no result part with that alias exists',
	'smw_wws_ns_without_uri' => 'The attribute "uri" of one of the namespace definitions is missing.',
	'smw_wws_duplicate_select' => 'The select "$1" appears several times in the result "$2".',
	'smw_wws_need_confirmation' => 'The WWSD for this Web Service has to be confirmed by an administrator before it can be used again',
	'definewebservice' => 'Define Web Service',
	'smw_wws_s1-help' => '<h4>Help</h4><p>First choose one of the protocols <b>REST</b>, <b>Linked Data</b> or <b>SOAP</b> depending on the web service you like to use. Enter the <b>URL of the web service</b>. If you use a SOAP web service, the address (URL) has to direct to a WSDL file (e. g. http://domain.de/soap_webservice.wsdl). If you use a RESTful web service or a Linked Data source, the value for the URL parameter is optional. You can pass the URL later when you call the web service. Define optionally <b>authentication credentials</b>, when the defined URL requires authentication. Note that currently only the basic HTTP authentication is supported.</p>',
	'smw_wws_s2-help' => '<h4>Help</h4><p>Each web service provides different <b>methods</b>, which deliver different types of data. If you like to use several methods of one web service, then you have to define for <b>each method a new WWSD</b>.</p>',
	'smw_wws_s3-help' => '<h4>Help</h4><p>Each parameter is identified by a <b>path</b>, which addresses it in the parameter type hierarchy and an <b>alias</b>, which displaces the path of the parameter. Alias are necessary to use parameters later in an easy way. Browse the parameters by expanding and collapsing the type hierarchy in the tree view. Web services with a plain hierarchy don’t have a tree view. </p><p>In some cases it is not necessary to pass a value for each parameter when calling a web service. If you do not need a parameter, leave it empty or mark it as optional. Activate the <b>‘Use’-Checkboxes</b>, to include the parameters into the WWSD. Thus users are later able to provide values for parameters when calling the web service. </p><p>You can use the <b>“Auto generate alias”</b> function <img src="/testwiki/extensions/DataImport/skins/webservices/Pencil_go.png"> to generate an alias based on the selected parameter. If a parameter is not required for the web service, you can mark this parameter as optional. Mark a parameter as <b>optional</b>, if users call the web service without passing a value for this parameter. Otherwise users will get an error message. </p><p>Define a <b>default value</b> for a parameter, this value will be used if a parameter is not optional and if no value for that parameter was passed to the web service call.</p> <p><b>Subparameters</b> are child nodes of parameters, they may be useful for handling complex parameters. Normally, subparameters are not needed. Click the <b>Plus</b> sign to add a subparameter. Visit the <a href="http://smwforum.ontoprise.com/smwforum/index.php/Help:Defining_a_web_service_using_the_WWSD_syntax#Subparameters_to_reduce_complexity_of_web_services">online help</a> for more information.</p>',
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
	'smw_wws_s6-intro' => '6. Save Wiki Web Service Definition',
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
	'smw_wscachebot' => 'Clean up the Web Service cache',
	'smw_ws_cachebothelp' => 'This bot removes cached Web Service results, that are outdated.',
	'smw_ws_cachbot_log' => 'Outdated cache entries for this Web Service were removed.',
	'smw_wsupdatebot' => 'Update cached Web Service results',
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
	'smw_wws_s3-REST-help' => '<h4>Help</h4><p>Click on <b>Add parameter</b> and the table for defining parameters will be displayed. Enter the <b>path</b> of the parameter. If you do not enter a path for a parameter, then this parameter will not be included into the WWSD. Enter an <b>alias</b> for the parameter; otherwise the parameter path will be used as alias. </p><p>If a parameter is not required for the web service, you can mark this parameter as optional. Mark a parameter as <b>optional</b>, if users call the web service without passing a value for this parameter. Otherwise users will get an error message. </p><p>Define a <b>default value</b> for a parameter; this value will be used if a parameter is not optional and if no value for that parameter was passed to the web service call. </p><b>Subparameters</b> are child nodes of parameters; they may be useful for handling complex parameters. Normally, subparameters are not needed. Click on the <b>Plus</b> icon to add a subparameter. Visit the <a href="http://smwforum.ontoprise.com/smwforum/index.php/Help:Defining_a_web_service_using_the_WWSD_syntax#Subparameters_to_reduce_complexity_of_web_services">online help</a> for more information.</p>',
	'smw_wws_s4-REST-help' => '<h4>Help</h4><p>Define which <b>result parts</b> of the web service the user should be able to use later in wiki articles. RESTful web services return a string as their result. This string can be a simple text or it can contain information encoded in a format like JSON or XML for example. Activate the <b>Use complete result as result part</b> checkbox, if you like to import the complete results of the web service. To define further result parts, click on <b>Add result parts</b>. Define which further parts of this result users should be able to display in Wiki articles. Enter an <b>alias</b> for each result part. This alias will later be used to address the result part when the web service is called within an article. If you do not specify an alias, then a random one will be created. </p><p>Choose the <b>JSON</b>, the <b>XPath</b> or the <b>property</b> format depending on the path you like to use for extracting result parts. Enter the path which will be used to extract the result part from the complete result. The <b>property</b> format can be used, if the web service result is encoded in one of the RDF serializations, e.g. RDF/XML or RDFa. Then the value of the path has to be a URI of a triple property.</p><p>If you use the property format for one of your result parts, the <b>Add namespace prefixes</b> button will be displayed. Click the button to define namespace prefixes in a table, which you then can use when defining result parts. Define a namespace prefix for Linked Data instead of using the complete URI. Use e.g. the prefix dbpedia for the URI <i>http://dbpedia.org/.../</i></p> ',
	'smw_wws_s4-LD-help' => '<h4>Help</h4><p>Linked Data sources are encoded in one of the RDF serializations, e.g. RDF/XML or RDFa. Special result parts, e.g. for extracting all subjects, properties and objects, which occur in one of the triples, are generated by the system by default. You can use these later, when calling the web service in an article via the allSubjects, allProperties or allObjects aliases.</p><p>Click the <b>Add result parts</b> link, to define further result parts for certain properties. Define in the table which further parts of this result users should be able to display in Wiki articles. Enter an <b>alias</b> for each result part. This alias will later be used to address the result part when the web service is used in an article. If you do not specify an alias, then a random one will be created.</p><p>Enter the URI of the property which should be extracted. Press the <b>Add namespace prefixes</b> button if you want to define namespace prefixes. A table will be shown where you can define namespace prefixe, which you then can use when defining result parts.</p>',
	'smw_wws_help-button-tooltip' => 'Display or hide help.',
	'smw_wws_selectall-tooltip' => 'Select or deselect all.',
	'smw_wws_autogenerate-alias-tooltip-parameter' => 'Autogenerate aliases. This works only if you already have selected to use some parameters.',
	'smw_wws_autogenerate-alias-tooltip-resultpart' => 'Autogenerate aliases. This works only if you already have selected some result parts or added subpaths for which aliases can be created.',	
	'smw_wsuse_s1-help' => '<h4>Help</h4><p>With this special page you are able to create the #ws-syntax for calling a web service from a Wiki article. Choose one of the <b>available web services</b> in the dropdown-menu above. </p>',
	'smw_wsuse_s2-help' => '<h4>Help</h4><p>The table displays the included parameters of the web service. Required parameters are activated by default. If you like to use a parameter when calling the web service, activate the <b>Use</b> checkbox and provide a <b>value</b> for that parameter. Some parameters provide <b>default values</b>. If you like to use a default value instead of providing your own value, then activate the <b>Use default value</b> checkbox. If this fields are greyed out, there are no values available.</p><span id="step2-ld-help"><p>The system creates automatically some special parameters for Linked Data sources, which you can use when calling such a web service. The use of those parameters is optional. The <b>url-suffix</b> can be used to specify the URL of the Linked Data source. The value of that parameter will be appended to the URL, which you have defined in the Wiki Web Service Definition.</p><p>A Linked Data source can contain triples for several subjects. Specify the subject, in which you are interested, via the <b>subject</b> parameter. Note that you can use namespace prefixes, which you have defined in the WWSD. If you don’t provide a value for this parameter, all subjects will be considered.</p></span>',
	'smw_wsuse_s3-help' => '<h4>Help</h4><p>Activate the <b>Use</b> checkboxes of each result part you like to display in your Wiki article.</p><span id="step3-ld-help"><span style="display: none"><p>The system automatically creates special purpose result parts for Linked Data: <b>allSubjects</b>, <b>allProperties</b> and <b>allObjects</b>. The <b>allSubjects</b> result part will display all subjects, for which triples are returned by the Linked Data source. The <b>allProperties</b> will display all properties and <b>allObjects</b> all objects.</span></span>',
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
	'smw_tir_intro' => 'Available Term Import definitions',
	'smw_wwsr_name' => 'Name',
	'smw_wwsr_lastupdate' => 'Last update',
	'smw_wwsr_update_manual' => 'Manual update',
	'smw_wwsr_update' => 'Update',
	'smw_wwsr_rep_edit' => 'Edit',
	'smw_wwsr_confirm' => 'Confirm',
	'smw_wwsr_rep_intro' => 'The Web Service Repository lists all valid Wiki Web Service Definitions (WWSD) that have been declared in the Wiki. You can confirm a WWSD, edit it in the graphical user interface and manually update its results here. (You must be logged in with administrative user rights in order to update or confirm a WWSD.)',
	'smw_tir_rep_intro' => 'The Term Import Repository lists all valid Term Import definitions that have been declared in the Wiki. You can edit a Term Import definition in the graphical user interface and manually update its results here. (You must be logged in with administrative user rights in order to edit or update a Term Import.)',
	'smw_wwsr_noconfirm' => 'If you do not see the buttons for updating and confirming WebServices, you might not be logged in or you do not have any rights to use these functions.',
	'smw_wwsr_confirmed' => 'confirmed',
	'smw_wwsr_updating' => 'updating',
	
	'smw_wwsu_menue-s1' => '1. Choose web service',
	'smw_wwsu_menue-s2' => '2. Define parameters',
	'smw_wwsu_menue-s3' => '3. Choose result parts',
	'smw_wwsu_menue-s4' => '4. Choose output format',
	'smw_wwsu_menue-s5' => '6. Result',
	
	'smw_wwsu_availablews' => 'Available web services: ',
	'smw_wwsu_noparameters' => 'This web service does not require any parameters.',
	'smw_wwsu_alias' => 'Alias:',
	'smw_wwsu_use' => 'Use: ',
	'smw_wwsu_value' => 'Value:',
	'smw_wwsu_defaultvalue' => 'Use default value:',
	'smw_wwsu_availableformats' => 'Format: ',
	'smw_wwsu_displaypreview' => 'Display preview',
	'smw_wwsu_displaywssyntax' => 'Display #ws-syntax',
	'smw_wwsu_addcall' => 'Add call to <articlename>',
	'smw_wwsu_noresults' => 'This web service does not provide any result parts.',
	'smw_wwsu_copytoclipboard' => 'Copy to clipboard',
	
	'smw_wwsr_update_tooltip' => 'Start the update bot for this WWSD.',
	'smw_wwsr_rep_edit_tooltip' => 'Edit this WWSD in the graphical user interface.',
	'smw_wwsr_confirm_tooltip' => 'Commit this WWSD so that it can be used in the Wiki.',
	'smw_wwsr_update_tooltip_ti' => 'Start the update bot for this Term Import.',
	'smw_wwsr_rep_edit_tooltip_ti' => 'Edit this Term Import in the graphical user interface.',
	
	'smw_wws_add_prefixes' => 'Namespace prefixes:',
	'smw_wws_nss_prefix' => 'Prefix:',
	'smw_wws_nss_url' => 'URL:',
	
	'smw_wsuse_missing_triplification_subject' => 'Triplifying the web service result is not possible. You did not pass a triplification subject pattern and the WWSD does not provide a default one.',
	'smw_wsuse_missing_ld_extension' => 'The triplification feature is only available if you have activated the LinkedData Extension.',
	
	'smw_wws_enable_triplification' => 'Enable triplification',
	'smw_wws_enable_triplification-intro' => 'Subject creation pattern: ',
	
	'smw_wwsu_menue-s6' => '5. Triplification options',
	'smw_wwsu_triplify' => 'Triplify: ',
	'smw_wwsu_triplify_subject_display' => 'Display triple subjects:',
	'smw_wwsu_triplify_subject_alias' => 'Result part alias:',
	'smw_wwsu_triplify_subject_alias_value' => 'Triple subjects',
	'smw_wwsu_triplify_impossible' => 'Triplifying the results of this web service is not possible. Please define a Triplification Subject Pattern in the Wiki Web Service Definition first.',
	
	'smw_wsuse_s6-help' => '<h4>Help</h4><p>Activate the <b>Triplify</b> checkbox to store the result of this web service call into the Triple store.</p><p>Activate the <b>Display triple subjects</b> checkbox to get the triple subjects, which will be created for each row of the web service results by the Subject Creation Pattern, in the web service result. Furthermore, you can define an alias for the triple subjects, then an additional column with this alias will be created in the web service result. Displaying triple subjects in the results can be useful for debugging your Subject creation pattern</p>',
	
	'smw_wws_s4-help-triplification' => '<p>Click <b>Enable triplification</b> and enter a <b>Subject creation pattern</b> if you want to enable users to triplify the results of this web service. <br> Triplification means, that web service results will be transformed in several triples and stored in the Triple store. A web service result consists of a table with rows and columns. The value in the <b>Subject creation pattern</b> will be the triple subject for each row. The result part alias that corresponds to the table cell will be used as property and the cell value will be used as object. <br>Use property names which are already defined in the wiki ontology for result part aliases. Press Alt+Ctrl+Space to activate the auto-completion. This approach has two advantages: First, the result part aliases will be used as properties. Second, the wiki will check for each result part alias, if there is a property with the same name and if that property has type information annotations; then it will use this type information when creating triples. <br>The <b>Subject creation pattern</b> can contain arbitrary wiki markup language. If you want to include cell values into the subject creation, use the syntax: <i>?result.alias-name?</i>. This construct will then be replaced by the corresponding cell value when subjects are created. Instead of typing this syntax on your own into the Subject creation pattern field, you can also click on an alias input field, this will be automatically added to the subject creation pattern.</p>',
	
	'smw_wws_too_many_results' => 'Your WWSD contains more than one result definitions, i.e. usages of the <i>result-tag</i>. This is not supported by some of the new features of the Data Import extension, e.g. triplifying web service results. Please use therefore only one result definition.',
	
	'smw_wws_enable_triplification-scp-add' => 'Add result parts to subject creation pattern',
	'smw_wws_enable_triplification-scp-stop-add' => 'Finish adding result parts',
	'smw_wws_enable_triplification-scp-add-note' => 'Click on an alias input field to add the corresponding result part to the subject creation pattern.',
	
	'smw_wws_s4_add_rest_result_part' => 'Add another result part',
	
	'smw_wws_s4_add_ns_prefix' => 'Add another namespace prefix',
	
	'smw_wws_s3_add_another_parameter' => 'Add another parameter',
	
	'smw_wwsr_rep_create_link' => 'Click here to create a new Wiki Web Service Definition.',
	'smw_tir_rep_create_link' => 'Click here to configure and start a new Term Import.',
	
	'smw_wwsr_delete' => 'Delete',
	'smw_wwsr_delete_tooltip' => 'Delete this WWSD.',
	'smw_wwsr_rep_delete_tooltip_ti' => 'Delete this Term Import definition.',
	
	'smw_wwsu_sort' => 'Sort: ',
	'smw_wwsu_sort_by' => 'By: ',
	'smw_wwsu_sort_order' => 'Order: ',
	'smw_wwsu_sort_order_asc' => 'ascending',
	'smw_wwsu_sort_order_desc' => 'descending',
	'smw_wwsu_limit' => 'Limit: ',
	'smw_wwsu_offset' => 'Offset: ',
	
	'smw_wwsu_label' => 'Label',
	);

	protected $smwDINamespaces = array(
		SMW_NS_WEB_SERVICE       => 'WebService',
		SMW_NS_WEB_SERVICE_TALK  => 'WebService_talk',
		SMW_NS_TERM_IMPORT => 'TermImport',
		SMW_NS_TERM_IMPORT_TALK => 'TermImport_talk',
		NS_TI_EMAIL => 'E-mail',
	    NS_TI_EMAIL_TALK => 'E-mail_talk'
	);

	protected $smwDINamespaceAliases = array(
		'WebService'       => SMW_NS_WEB_SERVICE,
		'WebService_talk'  => SMW_NS_WEB_SERVICE_TALK,
		'TermImport'       => SMW_NS_TERM_IMPORT,
		'TermImport_talk'  => SMW_NS_TERM_IMPORT_TALK,
		'E-mail' => NS_TI_EMAIL,
		'E-mail_talk' => NS_TI_EMAIL_TALK 
	);
}


