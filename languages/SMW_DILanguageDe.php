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

class SMW_DILanguageDe extends SMW_DILanguage {

	protected $smwUserMessages = array(
    'specialpages-group-di_group' => 'Data Import',

	/* Messages of the Term Import */
	'smw_ti_selectDAM' => 'Bitte w&auml;hlen Sie eine Datenquelle aus.',
	'smw_ti_firstselectTLM' => 'W&auml;hle zuerst das TLM aus.',
	'smw_ti_selectImport-heading' => 'Import Sets',
	'smw_ti_selectImport-label' => 'Auswählen:&nbsp&nbsp',
	'smw_ti_help' => 'Hilfe:&nbsp&nbsp',
	'smw_ti_selectImport-help' => 'Wenn Sie nur Terme aus einem der verfügbaren Import Sets auswählen möchten, dann können Sie dieses hier auswählen.',
	'smw_ti_inputpolicy-heading' => 'Input Policy',
	'smw_ti_inputpolicy-help' => 'Mit der Input Policy kann definiert werden, welche Informationen importiert werden sollen. Dabei k&ouml;nnen (<a href="http://www.opengroup.org/onlinepubs/007908799/xbd/re.html" target="_blank">regul&auml;re Ausdr&uuml;cke</a>) verwendet werden.<br/>Beispiel: Benutze "^Em.*" um nur Terme zu importieren, die mit "Em" beginnen.<br/>Alle daten werden importiert, wenn keine Import Policy angegeben wird.',
	'smw_ti_inputpolicy-label' => 'Filter hinzufügen:',
		'smw_ti_inputpolicy-defined' => 'Definierte Filter:&nbsp;&nbsp;',
	'smw_ti_conflictpolicy-heading' => 'Conflict Policy',
	'smw_ti_conflictpolicy-label' => 'Auswählen:&nbsp;&nbsp;',
	'smw_ti_conflictpolicy-help' => 'Bitte definiere eine Conflict Policy. Diese definiert, was passiert wenn ein Artikel importiert werden soll, der bereits existiert:',
	'smw_ti_ti_name-heading' => 'Term Import Name',
	'smw_ti_ti_name-label' => 'Namen eingeben:&nbsp;&nbsp;',
	'smw_ti_ti_name-help' => 'Bitte geben Sie einen Namen für diesen Term Import an. Ein Artikel mit diesem Namen wird im Namensraum TermImport erstellt. Dieser wird alle Informationen, die Sie hier angeben enthalten.',
	'smw_ti_update_policy-heading' => 'Update Policy',
	'smw_ti_update_policy-help' => 'Wählen Sie die Update Policy "once" wenn die Ergebnisse dieses Term Imports nicht durch den Term Import Update bot aktualisiert werden sollen. Geben Sie ansonsten einen "max age" Wert in Minuten an.',
	'smw_ti_nomappingpage' => 'Der angegebene Artikel, der die Mapping Policy enthalten soll, existiert nicht.',
	'smw_ti_properties-heading' => 'Verfügbare Attribute',
	'smw_ti_properties-label' => 'Gewünschte Attribute auswählen:',
	'smw_ti_properties-help' => 'Wählen sie Attribute in der Tabelle unten aus, die bei diesem Term Import berücksichtigt werden sollen.',
	'smw_ti_articles-heading' => 'Zu importierende Artikel',
	'smw_ti_articles-label1' => 'Die folgenden ',
	'smw_ti_articles-label2' =>  ' Artikel werden importiert:',
	'smw_ti_articles-help' =>  'Die Tabelle unten zeigt, welche Artikel bei diesem Term Import importiert werden.',
	
	'smw_ti_creation-pattern-heading' => 'Erzeugungsmuster:',
	'smw_ti_creation-pattern-label-1' => 'Annotationen',
	'smw_ti_creation-pattern-label-2' => 'Template',
	'smw_ti_creation-pattern-help' => 'Sie k&ouml;nnen sich entweder dazu entscheiden neue Artikel einfach mit versteckten Annotationen oder mit Templates zu erstellen. Wenn Sie sich f&uuml;r Annotationen entscheiden, dann wird der Wikitext jedes neu erstellten Artikels nur eine Reihe versteckter Annotationen enthalten. Die namen der Termattribute werden als Propertynamen verwendet.<br>Entscheiden Sie sich dazu Templates zu verwenden, dann wird jedem neue erstellten Artikel ein Template-Aufruf hinzugefügt. Die Termattribute werden als Templateparameter verwendet.<br>Entscheiden Sie sich für Templates, dann sollten Sie zus&auml;tzlich ein Trennzeichen angeben, dass dann dazu verwendet wird die einzelnen Templateparameter-Werte zu separieren, falls ein Termattribut mehrere Werte besitzt. Entscheiden Sie sich für Annotationen, dann wird das Trennzeichen automatisch auf Basis der Wikiontologie, bzw. dem Min und Max cardinality und dem Delimiter Property berechnet.',
	'smw_ti_delimiter-heading' => 'Trennzeichen',
	'smw_ti_delimitery-label' => 'Zeichenkette: ',
	'smw_ti_delimiter-help' => 'Das angegebene Trennzeichen wird dazu verwendet, um mehrere Templateparameterwerte zu separieren, falls ein Termattribut mehrere werte besitzt.', 
	'smw_ti_category-heading' => 'Zus&auml;tzliche Kategorie Annotationen',
	'smw_ti_category-label' => 'Namen:',
	'smw_ti_category-help' => 'Hier k&ouml;nnen Sie eine Kommaseparierte Liste mit Kategorieannotationen angeben. Diese werden dann den neuen Artikeln hinzugefügt. Eventuell f&uuml;r diese Kategorien vorhandene Display Templates werden auch angewendet.',

	'smw_ti_succ_connected' => 'Erfolgreich mit "$1" verbunden.',
	'smw_ti_class_not_found' => 'Klasse "$1" nicht gefunden.',
	'smw_ti_xml_error' => 'XML Fehler: $1 in Zeile $2',
	'smw_ti_filename'  => 'Dateiname:',
	'smw_ti_articlename'  => 'Artikel Name:',
	'smw_ti_articleerror' => 'Der Artikel "$1" existiert nicht.',
	'smw_ti_fileerror' => 'Die Datei "$1" existiert nicht oder ist leer.',
	'smw_ti_pop3error' => 'Es war nicht möglich, eine Verbindung zum Server aufzubauen.',
	'smw_ti_no_article_names' => 'In der angegebenen Datenquelle gibt es keine Artikelnamen.',
	'smw_ti_termimport' => 'Daten importieren',
	'termimport' => 'Daten importieren',
	
	'smw_ti_definition_saved_successfully' => 'Die Term Import Definition $1 wurde erfolgreich gespeichert.',
	'smw_ti_started_successfully' => 'Der Term Import Bot wurde erfolgreich gestartet. Den Verlauf k&ouml;nnen Sie hier verfolgen: $1',
	
	'smw_ti_feed_category' => 'Kategorie der Feedd Definitionen:',
	'smw_ti_feed_urlprop' => 'URL Property:',
	'smw_ti_feed_prefixprop' => 'Präfix Property:',
	'smw_ti_feed_wrong_datasource' => 'Sowohl der Name der Kategorie, die die Feed Definitionen enth&auml;lt als auch der Name des URL Properties m&uuml;ssen angegeben werden.',

	'smw_ti_sparql_wrong_variable_name' => 'Eine der Variablen in der Anfrage muss "articlename" heissen.',	
		
	'smw_ti_missing_articlename' => 'Ein Artikel konnte nicht erzeugt werden, da der "articleName" in der Beschreibung des Begriffs fehlt.',
	'smw_ti_invalid_articlename' => 'Der Artikelname "$1" ist ung&uuml;ltig.',
	'smw_ti_articleNotUpdated' => 'Der existierende Artikel "$1" wurde nicht durch eine neue Version ersetzt.',
	'smw_ti_mappingpolicy_missing' => 'Die Mapping Policy "$1" existiert nicht.',
	'smw_ti_creationComment' => 'Dieser Artikel wurde vom Vokalbelimport-Framework erzeugt bzw. aktualisiert.',
	'smw_ti_creationFailed'  => 'Der Artikel "$1" konnte nicht erzeugt bzw. aktualisiert werden.',
	'smw_ti_import_error' => 'Importfehler',
	'smw_ti_added_article' => '$1 wurde zum Wiki hinzugef&uuml;gt.',
	'smw_ti_updated_article' => '$1 wurde aktualisiert.',
	'smw_ti_import_errors' => 'Einige Begriffe wurden nicht korrekt importiert. Bitte schauen Sie sich das Gardening Log an!',
	'smw_ti_import_successful' => 'Alle Begriffe wurden erfolgreich importiert.',

	'smw_gardissue_ti_class_added_article' => 'Importierte Artikel',
	'smw_gardissue_ti_class_updated_article' => 'Aktualisierte Artikel',
	'smw_gardissue_ti_class_system_error' => 'Importsystemfehler',
	'smw_gardissue_ti_class_update_skipped' => '&Uuml;bersprungene Aktualisierungen',
	
	'smw_termimportbot' => 'Daten importieren',
	'smw_gard_termimportbothelp' => 'Startet den Bot zum Importieren von Daten.',
	'smw_termimportupdatebot' => 'Update Definierte Term Imports aktualisieren.',
	'smw_gard_termimportupdatebothelp' => 'Startet den Bot zum aktualisieren von definierten Term Imports',
	'smw_ti_def_allready_exists' => 'Eine Term Import Definition mit diesem Namen existiert bereits.',
	'smw_ti_def_not_creatable' => 'Es war nicht möglich eine Term Import Definition mit diesem Namen zu erstellen.',
	'smw_ti_update_not_necessary' => 'Eine Aktualisierung dieses Term Imports war nicht nötig.',
	'smw_ti_updated_successfully' => 'Dieser Term Import wurde erfolgreich aktualisiert.',
	'smw_ti_update_failure' => 'Beim Aktualisieren dieses Term Imports ist ein Fehler aufgetreten.',
	'smw_gardissue_ti_class_ignored' => 'Ignorierte Term Imports',
	'smw_gardissue_ti_class_success' => 'Aktualisierte Term Imports',
	'smw_gardissue_ti_class_failure' => 'Fehlerhafte Term Imports',
	
	'smw_ti_menuestep1' => '1. Datenquelle w&auml;hlen und konfigurieren',
	'smw_ti_menuestep2' => '2. Term Import konfigurieren und ausführen',
	'smw_ti_dam-heading' => 'Datenquelle wählen:',
	'smw_ti_module-data-heading' => 'Konfiguration der Datenquelle:',
	
	'smw_ti_damdesc_csv' => 'Importiert Terme aus einer CSV-Datei. Sie müssen entweder den Pfad zu einer CSV-Datei auf dem Server oder eine valide URL zu einer solchen Datei angeben. Eine der Spalten in der CSV-Datei muss \'articleName\' heissen.',
	'smw_ti_damdesc_feed' => 'Importiert Terme aus RSS- oder Atom-Feeds. Sie müssen den Namen einer Kategorie angeben, in der das Data Access Modul die Feed Definitions Artikel finden kann. Zudem müssen Sie den Namen des Properties angeben, dass zum Speichern der Feed URLs verwendet wird. Das Data Access Modul wird dann nach allen Artikeln in der angebenen Kategorie suchen und die Feeds mit der in jedem Artikel jeweils angegebenen URL in das Wiki importieren. Optional kann ein Property zur Angabe von Artikelnamen-Präfixen angegeben werden. Das Data Access Modul wird die in jeder Feed-Definition angegebenen Präfixe dann bei der Erstellung neuer Artikel berücksichtigen.',
	'smw_ti_damdesc_pop3' => 'Importiert E.mails von einem POP3-Server. Besitzen Sie zum Beispiel einen Account bei Google Mail, dann müssen Sie pop.googlemail.com als Servername und Ihre E-mail Adresse als Benutzername angeben. Zudem müssen Sie die SSL Checkbox aktivieren. (Zuvor müssen Sie allerdings auf der Google Mail Webseite die Verwendung eines POP3-Servers aktivieren.)',
	'smw_ti_damdesc_tixml' => 'Importiert die Ergebnisse einer Web Service Anfrage im TIXML format. Sie müssen den Namen eines Artikels im Wiki angeben. Der Artikel muss dann das Web Service Ergebnis im TIDXML Format mithilfe der #ws Parser Function enthalten.',
	'smw_ti_damdesc_sparql' => 'Importiert die Ergebnisse einer SPARQL-Select Anfrage. Sie müssen die URL des SPARQL-Endpoints und die Anfrage angeben. Eine der Ergebnisvariablen in der Anfrage muss \'articleName\' heissen.',
	
	'smw_ti_page_editlink' => 'Klicken Sie bitte hier um die Term Import Definition in der GUI zu editierenn',
	
	/* Messages for the wiki web services */
	'smw_wws_articles_header' => 'Seiten, die den Web-Service "$1" benutzen',
	'smw_wws_properties_header' => 'Eigenschaften, die von "$1" gesetzt werden',
	'smw_wws_articlecount' => '<p>Zeige $1 Seiten, die diesen Web-Service benutzen.</p>',
	'smw_wws_propertyarticlecount' => '<p>Zeige $1 Eigenschaften, die ihren Wert von diesem Web-Service erhalten.</p>',
	'smw_wws_invalid_wwsd' => 'Die Wiki Web Service Definition ist ungültig oder existiert nicht.',
	'smw_wws_wwsd_element_missing' => 'Das Element "$1" fehlt in der Wiki Web Service Definition.',
	'smw_wws_wwsd_attribute_missing' => 'Das Attribut "$1" fehlt im Element "$2" der Wiki Web Service Definition.',
	'smw_wws_too_many_wwsd_elements' => 'Das Element "$1" erscheint mehrmals in der Wiki Web Service Definition.',
	'smw_wws_wwsd_needs_namespace' => 'Bitte beachten Sie: Wiki Web-Service Definitionen werden nur in Artikeln mit dem Namensraum "WebService" berücksichtigt!',
	'smw_wws_wwsd_errors' => 'Die Wiki Web Service Definition ist fehlerhaft:',
	'smw_wws_invalid_protocol' => 'Das in der Wiki Web Service Definition benutzte Protokoll wird nicht unterstützt.',
	'smw_wws_invalid_operation' => 'Die Operation "$1" wird vom Web Service nicht unterstützt.',
	'smw_wws_parameter_without_name' => 'Ein Parameter der Wiki Web Service Definition hat keinen Namen.',
	'smw_wws_parameter_without_path' => 'Das Attribut "path" des Parameters "$1" fehlt.',
	'smw_wws_duplicate_parameter' => 'Der Parameter "$1" erscheint mehrmals.',
	'smw_wwsd_undefined_param' => 'Die Operation braucht den Parameter "$1". Bitte definieren Sie ein Kürzel.',
	'smw_wwsd_obsolete_param' => 'Die Operation benutzt den definierten Parameter "$1" nicht. Sie können ihn entfernen.',
	'smw_wwsd_overflow' => 'Die Struktur "$1" kann endlos fortgeführt werden. Parameter dieses Typs werden von der Wiki-Web-Service-Erweiterung nicht unterstützt.',
	'smw_wws_result_without_name' => 'Ein Resultat in der  Wiki Web Service Definition hat keinen Namen.',
	'smw_wws_result_part_without_name' => 'Das Resultat "$1" beinhaltet ein &lt;part&gt; ohne Namen.',
	'smw_wws_result_part_without_path' => 'Das Attribut "path" des &lt;part&gt;s "$1" des Resultats "$2" fehlt.',
	'smw_wws_duplicate_result_part' => 'Das &lt;part&gt; "$1" erscheint mehrmals im Resultat "$2".',
	'smw_wws_duplicate_result' => 'Das Resultat "$1" erscheint mehrmals.',
	'smw_wwsd_undefined_result' => 'Der Pfad des Resultats "$1" kann nicht im Resultat des Services gefunden werden.',
	'smw_wws_edit_in_gui' => 'Bitte hier klicken um die WWSD in der GUI zu editieren.',
	'smw_wwsd_array_index_missing' => 'Ein Array Index fehlt im Pfad: "$1"',
	'smw_wwsd_array_index_incorrect' => 'Ein Array Index ist fehlerhaft im Pfad: "$1"',
	'smw_wsuse_wrong_parameter' => 'Der Parameter "$1" existiert nicht in der Wiki Web Service Definition.',
	'smw_wsuse_parameter_missing' => 'Der Parameter "$1" ist nicht optional und kein Default wurde in der Wiki Web Service Definition definiert.',
	'smw_wsuse_wrong_resultpart' => 'Der Result Part "$1" existiert nicht in der Wiki Web Service Definition.',
	'smw_wsuse_wwsd_not_existing' => 'Eine Wiki Web Service Definition mit dem Namen "$1" existiert nicht.',
	'smw_wsuse_wwsd_error' => 'Die Benutzung des Web Services war fehlerhaft:',
	'smw_wsuse_getresult_error' => 'Ein Fehler ist beim Aufruf des Web Services aufgetreten.',
	'smw_wsuse_old_cacheentry' => ' Deshalb wurde ein veraltetes Ergebnis aus dem Cache anstatt eines neuen verwendet.',
	'smw_wsuse_prop_error' => 'Es ist nicht erlaubt, mehr als ein Result Part als Wert f&uuml;r ein semantisches Property zu verwenden',
	'smw_wsuse_type_mismatch' => 'Der Web Service hat nicht den erwarteten Typ f&uuml;r diesen Result Part zur&uuml;ckgeliefert. Bitte &auml;ndern Sie die zugeh&ouml;rige WWSD. Ein Variablen Dump wird dargestellt.',
	'webservicerepository' => 'Data Import Repository',
	'smw_wws_ns_without_prefix' => 'Das Attribut "prefix" einer Namespace Definition fehlt.',
	'smw_wws_triplification_without_subject' => 'Das Attribut "subject" des Triplification Tags fehlt.',
	'smw_wws_triplification_instruction_twice' => 'Mehr als ein Triplification Tag wurde angegeben.',
	//'smw_wws_wrong_triplification_subject' => 'Das Triplification Subjekt ist falsch, da kein Result Part mit diesem Alias existiert.',
	'smw_wws_ns_without_uri' => 'Das Attribut "uri" einer Namespace Definition fehlt.',
	'smw_wws_duplicate_select' => 'Die Auswahl "$1" kommt mehrmals im Ergebnis "$2" vor.',
	'smw_wws_need_confirmation' => 'Die WWSD f&uuml;r diesen Web Service muss von einem Administrator freigegeben werden, bevor sie erneut verwendet werden kann.',
	'definewebservice' => 'Definiere Web Service',
	'smw_wws_s1-help' => '<h4>Hilfe</h4><p>Diese Spezialseite hilft Ihnen bei der Definition eines externen Web Services (WWSD), den Sie in Wiki-Artikel einbinden k&ouml;nnen. W&auml;hlen Sie als erstes, ob Sie einen <b>SOAP</b>, einen <b>LinkedData</b> oder einen <b>RESTful</b> Web Service verwenden m&ouml;chten. Geben Sie als n&auml;chstes eine Adresse (<b>URL</b>) an. Bei der Verwendung eines SOAP Web Services, muss diese Adresse direkt zu einer WSDL-Datei f&uuml;hren (z.B. http://domain.de/soap_webservice.wsdl). Bei RESTful Web Services und Linked Data Quellen, ist die Angabe einer Adresse optional. Geben Sie Ihre Zugangsdaten an, wenn die angegebene Adresse eine Authentifizierung erfordert. Bisher wird nur eine HTTP-Authentifizierung unterst&uuml;tzt. </p>',
	'smw_wws_s2-help' => '<h4>Hilfe</h4><br/>Jeder Web Service kann unterschiedliche <b>Methoden</b> bereitstellen, die unterschiedliche Ergebnisse liefern. Eine WWSD unterst&uuml;tzt nur eine Methode. Wenn mehrere Methoden eines Web Services verwendet werden sollen, dann muss f&uuml;r jede eine eigene WWSD bereitgestellt werden.',
	'smw_wws_s3-help' => '<h4>Hilfe</h4><p>Definieren Sie nun die Parameter f&uuml;r den Web Service Aufruf. Jeder Parameter wird durch einen <b>Pfad</b> eindeutig in der Hierarchie identifiziert. Sie k&ouml;nnen die m&ouml;glichen Parameter des Web Services durchst&ouml;bern, indem Sie Teile der Parameter Typ Hierarchie in der Baumansicht oben ein- und ausklappen. Manchmal ist es nicht n&ouml;tig, dass beim Aufruf des Web Services alle Parameter verwendet werden. Aktivieren Sie die Auswahlbox eines Parameters in der <b>Benutze</b>-Spalte, wenn Benutzer sp&auml;ter beim Aufruf des Web Services einen Wert f&uuml;r den Parameter angeben k&ouml;nnen sollen. (Meistens m&uuml;ssen alle Parameter eines Web Services verwendet werden.) F&uuml;r jeden Parameter der verwendet werden soll muss ein <b>Alias</b> angegeben werden. Dieser wird sp&auml;ter anstelle des Pfades dazu verwendet, um den Parameter zu addressieren. Sie k&ouml;nnen ebenfalls angeben, ob ein Parameter <b>optional</b> ist, wenn Benutzer sp&auml;ter den Web Service verwenden. Wenn ein Parameter nicht optional ist und Benutzer sp&auml;ter keinen Wert f&uuml;r ihn angeben, dann erhalten sie eine Fehlermeldung. Als letztes k&ouml;nnen Sie noch einen <b>Standardwert</b> f&uuml;r einen Parameter angeben. Dieser wird verwendet, wenn ein Parameter nicht optional ist und Anwender keinen Wert f&uuml;r ihn angeben. <p><b>Subparameter</b> sind Kindknoten von Parametern, sie k&ouml;nnen bei Parametern mit komplexen Inhalten hilfreich sein. Im Normalfall werden sie jedoch nicht ben&ouml;tigt. Klicken Sie auf das <b>Plus</b>-Symbol um Subparameter hinzuzuf&uuml;gen. Besuchen Sie die <a href="http://smwforum.ontoprise.com/smwforum/index.php/Help:Defining_a_web_service_using_the_WWSD_syntax#Subparameters_to_reduce_complexity_of_web_services">Online-Hilfe</a> f&uuml;r weitere Informationen.</p>',
	'smw_wws_s4-help' => '<h4>Hilfe</h4><br/>Jetzt m&uuml;ssen Sie definieren, welche Teile des Ergebnisses (<b>Result Parts</b>), das vom Web Service zur&uuml;ckgeliefert wird, Benutzer sp&auml;ter in Wiki Artikeln anzeigen k&ouml;nnen. Jeder Result Part wird durch einen <b>Pfad</b> identifiziert, der ihn in der Ergebnis Typ Hierarchie eindeutig addressiert. Sie k&ouml;nnen die m&ouml;glichen Result Parts durchst&ouml;bern, indem Sie Teile der Ergebnis Typ Hierarchie in der Baumansicht oben ein- und ausklappen. Sie m&uuml;ssen die Auswahlbox in der <b>Benutze</b>-Spalte bei allen Result Parts aktivieren, die sp&auml;ter von Benutzern angezeigt werden k&ouml;nnen sollen. F&uuml;r jeden verwendeten Result Part muss ein <b>Alias</b> angegeben werden. Manchmal beinhalten Result Parts strukturierte Information, die in einem Format wie JSON oder XPath kodiert sind. Oftmals macht es keinen Sinn diese kodierten Informationen in Wiki Artikeln darzustellen. Daher k&ouml;nnen Sie <b>Subpfade</b> zu Result Parts hinzuf&uuml;gen. Diese helfen Ihnen dabei, relevante Informationen aus dem Result Part zu extrahieren. Ein Subpfad kann das <b>JSON</b> oder das <b>XPath</b> format haben. (Die aktuelle Version der Data Import Extension unterst&uuml;tzt nur XPath). In der <b>Pfad</b>-Spalte m&uuml;ssen Sie den Pfad angeben, der verwendet werden soll, um die Informationen zu extrahieren. Sie m&uuml;ssen auch f&uuml;r jeden Subpfad einen Alias angeben. Wenn Sie in der GUI eine existierende WWSD editieren, dann kann es sein, dass einige Result Parts, die Sie manuell definiert haben, nicht in der Baumansicht dargestellt werden k&ouml;nnen. Diese werden dann unterhalb der <b>grauen Linie</b> separat dargestellt. Der Grund daf&uuml;r ist, dass nicht alle XPath-Ausdr&uuml;cke in einer Baumansicht dargestellt werden k&ouml;nnen.',
	'smw_wws_s5-help' => '<h4>Hilfe</h4><br/>Die <b>Update Policy</b> definiert nach welcher Zeitperiode das Ergebnis eines Web Service Aufrufs beraltet ist und aktualisiert werden muss. Die <b>Display Policy</b> ist immer dann relevant, wenn das Ergebnis eines Web Service Aufrufs in einem Artikel dargestellt wird. Die <b>Query Policy</b> hingegen kommt nur bei Zuweisung von Web Service Ergebnissen an semantische Properties zum Tragen. Der <b>Delay Value</b> (in Sekunden) wird zwischen zwei direkt aufeinanderfolgenden Web Service Aufrufen verwendet. Dadurch kann verhindert werden, dass ein Web Service zu oft in einem kurzen Zeitintervall aufgerufen wird. Der <b>Span Of Life</b> gibt an, wie lange das Ergebnis eines Web Service Aufrufs im Cache behalten werden soll. Wird kein Span Of Life angegeben, dann werden Web Service Ergebnisse unbegrenzt lange im Cache aufgehoben. Zuletzt kann noch angegeben werden, ob das Alter eines Cache-Eintrags auf Null zurueckgesetzt wird, wenn der Cache-Eintrag verwendet wird , oder wenn er aktualisiert wird (<b>expires after update</b>).',
	'smw_wws_s6-help' => '<h4>Hilfe</h4><br/>Um den We Service benutzen zu k&ouml;nnen, m&uuml;ssen Sie ihm jetzt noch einen <b>Namen</b> geben.',
	'smw_wws_s1-menue' => '1. Definiere Zugangsdaten',
	'smw_wws_s2-menue' => '2. W&auml;hle Methode',
	'smw_wws_s3-menue' => '3. Definiere Parameter',
	'smw_wws_s4-menue' => '4. W&auml;hle Result Parts',
	'smw_wws_s5-menue' => '5. Definiere Update Policy',
	'smw_wws_s6-menue' => '6. Speichere WWSD',
	'smw_wws_s1-intro' => '1. Definiere Zugangsdaten: ',
	'smw_wws_s1-uri' => 'Definiere URI: ',
	'smw_wws_s2-intro' => '2. W&auml;hle Methode',
	'smw_wws_s2-method' => 'W&auml;hle Methode',
	'smw_wws_s3-intro' => '3. Definiere Parameter',
	'smw_wws_duplicate' => '<table><tr><td style="vertical-align: top"><b>Note:</b><td><td><b>Einige Typ-Definitionen</b> in dieser WSDL sind <b>mehrdeutig</b>.<br/> Diese werden <b style="color: darkred">dunkelrot</b> hervorgehoben.<br/> Es wird empfohlen diese Typ-Definitionen sp&auml;ter in der <b>textuellen Repr&auml;sentation</b> der WWSD zu <b>bearbeiten</b>.</td></tr></table><br/>',
	'smw_wws_s4-intro' => '4. W&auml;hle Result Parts',
	'smw_wws_s5-intro' => '5. Definiere Update Policy',
	'smw_wws_s6-intro' => '6. Speichere Wiki Web Service Definition',
	'smw_wws_s6-name' => 'W&auml;hle einen Namen',
	'smw_wws_s7-intro-pt1' => 'Der Web Service ',
	'smw_wws_s7-intro-pt2' => ' wurde erfolgreich erstellt. Um den Web Service in einem Artikel zu verwenden, muss die folgende Syntax angegeben werden:',
	'smw_wws_s7-intro-pt3' => 'Die erstellte WWSD wird von jetzt ab im Web Service Repository angezeigt.',
	'smw_wws_s1-error' => 'Es war nicht m&ouml;glich eine Verbindung zu der angegebenen URI aufzubauen. Bitte &auml;ndern Sie diese oder versuchen es erneut.',
	'smw_wws_s2a-error' => 'Es war nicht m&ouml;glich eine Verbindung zu der angegebenen URI aufzubauen. Bitte &auml;ndern Sie diese oder versuchen es erneut.',
	'smw_wws_s2b-error' => 'Die Parameter Definition dieser Methode ist rekursiv definiert. Bitte w&auml;hlen Sie einen anderen Web Service oder eine andere Methode',
	'smw_wws_s3-error' => 'Es war nicht m&ouml;glich eine Verbindung zu der angegebenen URI aufzubauen. Bitte &auml;ndern Sie diese oder versuche es erneut.',
	'smw_wws_s4-error' => 'Es war nicht m&ouml;glich eine Verbindung zu der angegebenen URI aufzubauen. Bitte &auml;ndern Sie diese oder versuchen es erneut.',
	'smw_wws_s5-error' => 'Es war nicht m&ouml;glich eine Verbindung zu der angegebenen URI aufzubauen. Bitte &auml;ndern Sie diese oder versuche es erneut.',
	'smw_wws_s6-error' => 'Bevor fortgefahren werden kann muss ein Name f&uuml;r den Web Service angegeben werden',
	'smw_wws_s6-error2' => 'Ein Artikel mit diesem Namen existiert bereits. Bitte w&auml;hlen Sie einen anderen.',
	'smw_wws_s6-error3' => 'Ein Fehler ist beim Speichern der WWSD aufgetreten. Bitte versuchen Sie es erneut!',
	'smw_wscachebot' => 'Leere den Web Service Cache',
	'smw_ws_cachebothelp' => 'Dieser Bot entfernt veralltete Eintr&auml;ge aus dem Cache.',
	'smw_ws_cachbot_log' => 'Veraltete Cache Eintr&auml;ge f&uuml;r diesen Web Service wurden gel&ouml;scht.',
	'smw_wsupdatebot' => 'Aktualisiere den Web Service-Cache',
	'smw_ws_updatebothelp' => 'Dieser Bot aktualisiert den Web Service Cache.',
	'smw_ws_updatebot_log' => 'Cache Eintr&auml;ge f&uuml;r diesen Web Service wurden aktualisiert.',
	'smw_ws_updatebot_callerror' => 'Beim Updaten der Cache Eintr&auml;ge f&uuml;r diesen Web Service ist ein Fehler aufgetreten',
	'smw_ws_updatebot_confirmation' => 'Es war nicht m&ouml;glich die Cache Eintr&auml;ge f&uuml;r diesen Web Service zu aktualisieren, da dieser zuvor aktiviert werden muss.',
	'smw_wsgui_nextbutton' => 'Weiter',
	'smw_wsgui_savebutton' => 'Speichern',

	'usewebservice' => 'Benutze Web Service',

'smw_wws_client_connect_failure' => 'Es war nicht m&ouml;glich, eine Verbindung herzustellen zu: ',
'smw_wws_client_connect_failure_display_cache' => 'Das letzte gecachte Web Service Ergebnis wird dargestellt.',
	'smw_wws_client_connect_failure_display_default' => 'Default Werte werden anstatt eines Web Service Ergebnisses angezeigt.',	

'smw_wws_s2-REST-help' => '<h4>Hilfe</h4><br/>Jetzt m&uuml;ssen Sie angeben, ob Sie die HTTP-<b>get</b> oder die HTTP-<b>post</b> Methode f&uuml;r den Web Service Aufruf verwenden m&ouml;chten. (In den meisten F&auml;llen k&ouml;nnen Sie sich f&uuml;r HTTP-get entscheiden.) ',
	'smw_wws_s3-REST-help' => '<h4>Hilfe</h4><p>Definieren Sie die Parameter, die f&uuml;r den Web Service Aufruf verwendet werden sollen. Klicken Sie auf <b>Weiteren Parameter hinzuf&uuml;gen</b>, so dass die Tabelle zum Definieren von Parametern angezeigt wird. Jetzt m&uuml;ssen Sie den <b>Pfad</b> des Parameters angeben. Wenn Sie keinen Pfad f&uuml;r einen Parameter angeben, dann wird der Parameter nicht in die WWSD mit aufgenommen. Zus&auml;tzlich k&ouml;nnen Sie noch einen <b>Alias</b> f&uuml;r den Parameter angeben. Wenn Sie keinen angeben, dann wird der Pfad als Alias verwendet. Sie k&ouml;nnen auch angeben, ob ein Parameter <b>optional</b> ist, wenn Benutzer sp&auml;ter den Web Service aufrufen. Wenn ein Parameter nicht optional ist, dann erhalten Benutzer sp&auml;ter eine Fehlermeldung, falls Sie keinen Wert f&uuml;r den Parameter &uuml;bergeben. Als letztes k&ouml;nnen Sie noch einen <b>Standartwert</b> angeben. Dieser wird verwendet, falls der Parameter nicht optional ist und Anwender keinen Wert f&uuml;r den Parameter beim Web Service aufruf &uuml;bergeben.<p><b>Subparameter</b> sind Kindknoten von Parametern, sie k&ouml;nnen bei Parametern mit komplexen Inhalten hilfreich sein. Im Normalfall werden sie jedoch nicht ben&ouml;tigt. Klicken Sie auf das <b>Plus</b> Symbol um einen Subparameter hinzuzuf&uuml;gen. Besuchen Sie die <a href="http://smwforum.ontoprise.com/smwforum/index.php/Help:Defining_a_web_service_using_the_WWSD_syntax#Subparameters_to_reduce_complexity_of_web_services">Online-Hilfe</a> f&uuml;r weitere Informationen.</p>',
	'smw_wws_s4-REST-help' => '<h4>Hilfe</h4><p>Definieren Sie, welche Teile der angefragten Web Service Ergebnisse (<b>Result Parts</b>) die Benutzer sp&auml;ter im Wiki-Artikel darstellen k&ouml;nnen. RESTful Web Services geben als Ergebnis einen String zur&uuml;ck. Dieser String kann ein einfacher Text sein oder er kann strukturierte Informationen, kodiert in JSON oder XML, enthalten. Aktivieren Sie das Kontrollk&auml;stchen <b>Benutze komplettes Ergebnis als Result Part</b>, um die Verwendung von allen Ergebnissen der Web Service Anfrage zu erm&ouml;glichen. Um weitere Result Parts zu definieren, klicken Sie auf den <b>F&uuml;ge Result Parts hinzu</b> Button. Anschließend vergeben Sie einen b&gt;Alias f&uuml;r den neuen Result Part. Dieser Alias wird sp&auml;ter verwendet, um den Result Part zu adressieren, wenn der Web Service in einem Artikel verwendet wird. Wenn Sie keinen Alias angeben, dann wird dieser automatisch generiert. </p><p>Geben Sie nun an, ob der Pfad zum Extrahieren des Result Parts das <b>JSON</b>, das <b>XPath</b> oder das <b>Property</b> Format besitzt. Geben Sie nun den <b>Pfad</b> selbst an. Das Property Format wird genutzt, wenn die Web Service Ergebnisse in einer der RDF-Serialisierungen, wie RDF/XML oder RDFa kodiert sind. In diesem Fall muss der Pfad eine URI von einem Tripelproperty sein. </p><p> Verwenden Sie bei Linked Data statt den kompletten URIs (z.B. http://dbpedia.org/.../) einen Namensraum-Pr&auml;fix (z.B. dbpedia). Sie k&ouml;nnen f&uuml;r alle URIs Namensraum-Pr&auml;fixes definieren, um die &amp;UUML;bersichtlichkeit zu verbessern.</p>',
	'smw_wws_s4-LD-help' => '<h4>Hilfe</h4><p>Linked Data Quellen sind in einer der RDF-Serialisierungen, wie RDF/XML oder RDFa kodiert. Spezielle Result Parts, wie z.B. zum Extrahieren von allen Subjekten, Properties und Objekten, welche in einem der Tripel vorkommen, werden vom System per default generiert. Diese Result Parts k&ouml;nnen Sie sp&auml;ter in einem Artikel &uuml;ber den Web Service Aufruf mit Hilfe der allSubjects, allProperties or allObjects Aliase nutzen. </p><p>Klicken Sie auf <b>Result Parts hinzuf&uuml;gen</b> , um weitere Result Parts zu definieren. Definieren Sie, welche Teile der angefragten Web Service Ergebnisse die Benutzer sp&auml;ter im Wiki-Artikel darstellen k&ouml;nnen. Vergeben Sie einen <b>Alias</b> f&uuml;r jeden Result Part. Dieses Alias wird sp&auml;ter vom Web Service-Aufruf im Artikel verwendet um die Result Parts anzusprechen. Geben Sie keinen Alias an, wird ein beliebiger erstellt. </p><p>Geben Sie die URI des Properties, das entnommen werden soll, an. Klicken Sie <b>Namensraum-Pr&auml;fix hinzuf&uuml;gen</b> Button um Namensraum-Pr&auml;fixe zu definieren. Geben Sie in der Tabelle die Namensraum-Pr&auml;fixe an, welche Sie sp&auml;ter beim Definieren der Result Parts nutzen m&ouml;chten. </p>',
	'smw_wws_help-button-tooltip' => 'Hilfe ein- oder ausblenden.',
	'smw_wws_selectall-tooltip' => 'Alle aktivieren oder deaktivieren.',
	'smw_wws_autogenerate-alias-tooltip-parameter' => 'Aliase automatisch generieren. Das geht nur, wenn bereits Parameter für die Verwendung ausgewählt wurden.',
	'smw_wws_autogenerate-alias-tooltip-resultpart' => 'Aliase automatisch generieren. Das geht nur, wenn bereits Result Parts oder Subpfade ausgewählt wurden, für die Aliase erzeugt werden können.',

	'smw_wsuse_s1-help' => '<h4>Hilfe</h4><br/>Diese Spezialseite erlaubt Ihnen die #ws-Syntax f&uuml;r das Aufrufen eines Web Services aus einem Wiki Artikel heraus, zu erstellen. Als erstes m&uuml;ssen Sie einen der <b>verf&uuml;gbaren Web Services</b> im Drop-down Menue oben ausw&auml;hlen.',
	'smw_wsuse_s2-help' => '<h4>Hilfe</h4><p>In der oberen Tabelle sind die Parameter gelistet, die Sie f&uuml;r den Web Service Aufruf verwenden k&ouml;nnen. Aktivieren Sie die Kontrollk&auml;stchen vor den Parametern in der <b>Benutze</b>-Spalte, die Sie verwenden m&ouml;chten. Obligatorische Parameter sind vorausgew&auml;hlt. Geben Sie einen <b>Wert</b> f&uuml;r den Parameter an, den Sie verwenden m&ouml;chten. Manche Parameter stellen einen <b>Standardwert</b> bereit. Wenn Sie anstatt eines eigenen Wertes den Standardwert verwenden m&ouml;chten, aktivieren Sie das zugeh&ouml;rige Kontrollk&auml;stchen.</p><span id="step2-ld-help"><p>Verwenden Sie das <b>URL-Suffix</b> um die URL der Linked Data Quelle zu spezifizieren. Der Wert dieses Parameters wird an die URL, die Sie in der Wiki Web Service Definition angegeben haben, angef&uuml;gt. Wenn Sie keine URL in der WWSD angegeben haben, geben Sie die <b>vollst&auml;ndige</b> URL an. </p><p>Eine Linked Data Quelle kann Tripel f&uuml;r verschiedene Subjekte enthalten. Geben Sie das gew&uuml;nschte Subjekt &uuml;ber den <b>Subjekt</b>-Parameter an. Beachten Sie, dass Sie nur Namensraum-Pr&auml;fixes verwenden k&ouml;nnen, die Sie in der WWSD definiert haben. Vergeben Sie keinen Wert f&uuml;r diesen Parameter, werden alle Subjekte ber&uuml;cksichtigt. </p><p><span style="display: none"><p>In der oberen Tabelle sind die Parameter gelistet, die Sie f&uuml;r den Web Service Aufruf verwenden k&ouml;nnen. Aktivieren Sie die Kontrollk&auml;stchen vor den Parametern in der <b>Benutze</b>-Spalte, die Sie verwenden m&ouml;chten. Obligatorische Parameter sind vorausgew&auml;hlt. Geben Sie einen <b>Wert</b> f&uuml;r den Parameter an, den Sie verwenden m&ouml;chten.</p><span id="step2-ld-help"><p>Verwenden Sie das <b>URL-Suffix</b> um die URL der Linked Data Quelle zu spezifizieren. Der Wert dieses Parameters wird an die URL, die Sie in der Wiki Web Service Definition angegeben haben, angef&uuml;gt. Wenn Sie keine URL in der WWSD angegeben haben, geben Sie die <b>vollst&auml;ndige</b> URL an. </p><p>Eine Linked Data Quelle kann Tripel f&uuml;r verschiedene Subjekte enthalten. Geben Sie das gew&uuml;nschte Subjekt &uuml;ber den <b>Subjekt</b>-Parameter an. Beachten Sie, dass Sie nur Namensraum-Pr&auml;fixes verwenden k&ouml;nnen, die Sie in der WWSD definiert haben. Vergeben Sie keinen Wert f&uuml;r diesen Parameter, werden alle Subjekte ber&uuml;cksichtigt. </p><p><span style="display: none;">Geben Sie im Parameter <b>Properties</b> die Properties an, die Sie ausgegeben haben m&ouml;chten, f&uuml;r diese Sie aber noch keine Result Parts in der WWSD definiert haben. Verwenden Sie daf&uuml;r ein einmaliges Alias und die URI, z.B. <i>Hersteller=http://example.org/hersteller; Alias2=PropertyURI2;...</i>. Beachten Sie, dass Sie nur Namensraum-Pr&auml;fixes verwenden k&ouml;nnen, die Sie auch in der WWSD definiert haben.</span> Verwenden Sie den <b>Language</b>-Parameter, wenn Sie nur Ergebnisse einer bestimmten Sprache erhalten m&ouml;chten, z.B. <i>en</i> f&uuml;r Englisch.</p></span>',
	'smw_wsuse_s3-help' => '<h4>Hilfe</h4><p/>W&auml;hlen Sie, welche Teile des Web Service Ergebnisses (<b>Result Parts</b>) Sie in Ihrem Artikel anzeigen m&ouml;chten. Aktivieren Sie dazu das Kontrollk&auml;stchen in der <b>Benutze</b>-Spalte jedes Result Parts, den Sie verwenden m&ouml;chten.</p><span id="step3-ld-help"><span style="display: none"><p>Es werden automatisch spezielle Result Parts f&uuml;r Linked Data erstellt: <b>allSubjects</b>, <b>allProperties</b> and <b>allObjects</b>. Der <b>allSubjects</b> Result Part gibt alle Subjekte aus, f&uuml;r die es Triple in der Linked Data Quelle gibt. <b>allProperties</b> gibt alle Properties und <b>allObjects</b> alle Objekte aus.</p></span></span>',
	'smw_wsuse_s4-help' => '<h4>Hilfe</h4><br/>Hier k&ouml;nnen Sie ausw&auml;hlen, welches <b>Format</b> Sie zur Darstellung des Anfrageergebnisses verwenden m&ouml;chten. Einige Formate erlauben die Verwendung von <b>Templates</b>, die dazu verwendet werden, jede Zeile Ihres Anfrageergebnisses darzustellen.',
	'smw_wsuse_s5-help' => '<h4>Hilfe</h4><br/>Im letzten Schritt haben Sie drei M&ouml;glichkeiten. Sie k&ouml;nnen sich eine <b>Vorschau</b> auf das Web Service Ergebnis anzeigen lassen. Sie k&ouml;nnen sich die erzeugte <b>#ws-Syntax</b>, die zum Aufrufen des Web Services verwendet wird, anzeigen lassen. Wenn Sie zu dieser GUI aus der Semantischen Toolbar heraus navigiert sind, dann k&ouml;nnen Sie den Web Service Aufruf direkt zu dem eben editierten Wiki Artikel <b>hinzuf&uuml;gen</b>.',
	
	'smw_wws_spec_protocol' => 'W&auml;hle Protokoll:',
	'smw_wws_spec_auth' => 'Authentifizierung n&ouml;tig? ',
	'smw_wws_yes' => 'Ja',
	'smw_wws_no' => 'Nein',
	'smw_wws_username' => 'Benutzername: ',
	'smw_wws_password' => 'Passwort: ',
	'smw_wws_error_headline' => 'Fehler',
	'smw_wws_path' => 'Pfad:',
	'smw_wws_alias' => 'Alias: ',
	'smw_wws_optional' => 'Optional:',
	'smw_wws_defaultvalue' => 'Standardwert:',
	'smw_wws_use' => 'Benutze: ',
	'smw_wws_format' => 'Format: ',
	'smw_wws_days' => ' Tage ',
	'smw_wws_hours' => ' Stunden ',
	'smw_wws_minutes' => ' Minuten ',
	'smw_wws_inseconds' => 'in Sekunden',
	'smw_wws_indays' => 'in Tagen',
	'smw_wws_yourws' => 'Ihr Web Service <b>',
	'smw_wws_succ_created' => '</b> wurde erfolgreich erstellt.<br/><br/> Jetzt können Sie den Web Service in einem Artikel verwenden. Das ist möglich, indem Sie entweder manuell die #ws Parser Funktion oder die GUI zur Verwendung eines Web Services verwenden. Die GUI ist im Editier Modus über die Semantische Toolbar erreichbar.<br/><br/>Ihr Web Service wird von jetzt an in der ',
	'smw_wws_succ_created-3' => ' Liste der verf&uuml;gbaren Web Services', 
	'smw_wws_succ_created-4' => ' verf&uuml;gbar sein.<br/><br/> Sie k&ouml;nnen jetzt fortfahren und eine neue WWSD f&uuml;r einen anderen Web Service erstellen.',
	'smw_wws_new' => 'Neuen Web Service erstellen',
	
	'smw_wwsr_intro' => 'Verf&uuml;gbare Wiki Web Service Definitionen',
	'smw_tir_intro' => 'Verfügbare Term Import Definitionen',
	'smw_wwsr_name' => 'Name',
	'smw_wwsr_lastupdate' => 'Letzte Aktualisierung',
	'smw_wwsr_update_manual' => 'Manuell aktualisieren',
	'smw_wwsr_update' => 'Aktualisieren',
	'smw_wwsr_rep_edit' => 'Editieren',
	'smw_wwsr_confirm' => 'Best&auml;tigen',
	'smw_wwsr_rep_intro' => 'Das Web Service Repository listet alle korrekt im Wiki definierten Wiki Web Service Definitionen (WWSD) auf. Sie können diese hier best&auml;tigen, in der graphischen Benutzeroberfläche editieren und manuell die Ergebnisse eines Web Services aktualisieren. (Zum aktualisieren und bestätigen einer WWSD benötigen Sie administrative Benutzerrechte.)',
	'smw_tir_rep_intro' => 'Das Term Import Repository listet alle korrekt im Wiki definierten Term Import Definitionen auf. Sie können Term Imports hier in der graphischen Benutzeroberfläche editieren oder manuell die Ergebnisse eines Term Imports aktualisieren. (Zum aktualisieren und editieren eines Term Imports benötigen Sie administrative Benutzerrechte.)',
	'smw_wwsr_noconfirm' => 'Wenn Sie hier keine Buttons zum Aktualisieren und Best&auml;tigen von Web Services sehen, dann sind Sie nicht eingeloggt oder Sie haben nicht die erforderlichen Berechtigungen.',
	'smw_wwsr_confirmed' => 'Best&auml;tigt',
	'smw_wwsr_updating' => 'Wird aktualisiert',
	
	'smw_wwsu_menue-s1' => '1. W&auml;hle Web Service',
	'smw_wwsu_menue-s2' => '2. Definiere Parameter',
	'smw_wwsu_menue-s3' => '3. W&auml;hle Result Parts',
	'smw_wwsu_menue-s4' => '4. Wähle Format',
	'smw_wwsu_menue-s5' => '6. Ergebnis',
	
	'smw_wwsu_availablews' => 'Verf&uuml;gbare Web Services: ',
	'smw_wwsu_noparameters' => 'Dieser Web Service ben&ouml;tigt keine Parameter.',
	'smw_wwsu_alias' => 'Alias:',
	'smw_wwsu_use' => 'Benutze: ',
	'smw_wwsu_value' => 'Wert:',
	'smw_wwsu_defaultvalue' => 'Benutze Standardwert:',
	'smw_wwsu_availableformats' => 'Format: ',
	'smw_wwsu_displaypreview' => 'Zeige Vorschau',
	'smw_wwsu_displaywssyntax' => 'Zeige #ws-syntax',
	'smw_wwsu_addcall' => 'F&uuml;ge Aufruf zu <articlename> hinzu',
	'smw_wwsu_noresults' => 'Dieser Web Service stellt keine Result Parts zur Verf&uuml;gung',
	'smw_wwsu_copytoclipboard' => 'In Zwischenablage kopieren',
	
	'smw_wwsr_update_tooltip' => 'Update Bot für diese WWSD starten.',
	'smw_wwsr_rep_edit_tooltip' => 'Diese WWSD in der GUI editieren.',
	'smw_wwsr_confirm_tooltip' => 'Die Benutzung dieser WWSD erlauben.',
	'smw_wwsr_update_tooltip_ti' => 'Update Bot für diesen Term Import starten.',
	'smw_wwsr_rep_edit_tooltip_ti' => 'Diesen Term Import in der GUI editieren.',
	
	'smw_wws_add_prefixes' => 'Namensraum Präfixe:',
	'smw_wws_nss_prefix' => 'Pr&auml;fix:',
	'smw_wws_nss_url' => 'URL:',
	
	'smw_wsuse_missing_triplification_subject' => 'Das Triplifizieren des Web Service Ergebnisses war nicht m&ouml;glich. Sie haben kein Pattern f&uuml; das Erzeugen der Subjekte angegeben und die WWSD definiert auch keines.',
	'smw_wsuse_missing_ld_extension' => 'Das Triplifizierungs-Feature ist nur verfügbar, wenn die LinkedData Extension aktiviert ist..',
	
	'smw_wws_enable_triplification' => 'Triplifizierung erm&oum;glichen',
	'smw_wws_enable_triplification-intro' => 'Pattern zur Subjekt-Erzeugung: ',
	
	'smw_wwsu_menue-s6' => '5. Triplifizierungs-Optionen',
	'smw_wwsu_triplify' => 'Triplifizieren: ',
	'smw_wwsu_triplify_subject_display' => 'Tripl Subjekte anzeigen:',
	'smw_wwsu_triplify_subject_alias' => 'Result Part Alias:',
	'smw_wwsu_triplify_subject_alias_value' => 'Tripl Subjekte',
	'smw_wwsu_triplify_impossible' => 'Eine Triplifizierung der ergebnisse dieses Web Services ist nicht möglich. Bitte definieren sie zu erst ein <i>Subject Creation Pattern</i> in der zugehörigen Wiki Web Service Definition.',
	
	'smw_wsuse_s6-help' => '<h4>Help</h4><p>Aktivieren Sie das <b>Triplifizieren</b> Kontrollk&auml;stchen um die Webservice-Ergebnisse in den Triplestore zu speichern.</p>Wenn Sie die Tripel-Subjekte, die f&uuml;r jede Zeile der Webservice-Ergebnisse mittels des <b>Pattern zur Subjekt-Erzeugung</b> erstellt werden, in den Webservice-Ergebnissen angezeigt haben m&ouml;chten, aktivieren Sie das <br>Tripel Subjekte anzeigen</b> Kontrollk&auml;stchen. Des Weiteren k&ouml;nnen Sie einen Alias f&uuml;r die Tripel-Subjekte angeben, dann erscheint eine zus&auml;tzliche Spalte mit diesem Alias in den Ergebnissen. Das Anzeigen der Tripel-Subjekte in den Ergebnissen kann hilfreich f&uuml;r das Debuggen des Patterns sein. </p>',
	'smw_wws_s4-help-triplification' => '<p>Klicken Sie <b>Triplifizierung erm&ouml;glichen</b> und geben Sie einen <b>Subject creation pattern</b> an, um Nutzern die Triplifizierung der Webservice-Ergebnisse zu erm&ouml;glichen. <br>Triplifizierung bedeutet, dass Webservice-Ergebnisse in mehrere Tripel transformiert und im Triplestore gespeichert werden. Ein Webservice-Ergebnis besteht aus einer Tabelle mit Zeilen und Spalten. Der Wert des <b>Pattern zur Subjekt-Erzeugung</b> wird als Subjekt des Tripels f&uuml;r jede Zeile verwendet. Der Result Part Alias der entsprechenden Tabellenzelle wird als Pr&auml;dikat und der Zellenwert als Objekt verwendet. <br>Es ist empfohlen f&uuml;r einen Result Part Alias einen bereits in der Wiki-Ontologie existierenden Property-Namen zu verwenden. Dr&uuml;cken Sie Alt&#43;Strg&#43;Leertaste um die Auto-Vervollst&auml;ndigung zu aktivieren. Diese Methode hat zwei Vorteile: Zum Einen werden die Result Part Aliase als Pr&auml;dikat benutzt. Zum Anderen pr&uuml;ft das Wiki bei jedem Result Part Alias, ob ein Property mit dem selben Namen existiert und ob dieses Property Typinformationen besitzt. Ist dies der Fall, wird diese Typinformation bei der Erstellung der Tripel verwendet.<br>Sie k&ouml;nnen beliebige Wiki-Syntax im <b>Pattern zur Subjekt-Erzeugung</b> verwenden. Wenn Sie Werte aus Tabellenzellen im Subjekt verwenden m&ouml;chten, benutzen Sie die Syntax: <i>?Ergebnis.Alias-Name?</i>. Dieses Konstrukt wird dann bei der Subjekterstellung mit dem entsprechenden Zellenwert ersetzt. Anstatt die Syntax in das Feld <b>Pattern zur Subjekt-Erzeugung</b> per Hand einzugeben, klicken Sie auf ein Alias-Eingabefeld, um dieses hinzuzuf&uuml;gen. </p>',
	
	'smw_wws_too_many_results' => 'Ihre WWSD enthaelt mehr als eine Result Definition, bzw. Benutzungen des Result Tags. Einige der neuen Feaures der Data Import extension unterstützen dieses Konstrukt nicht mehr. Bitte beschränken Sie sich daher auf eine Result Definition.',
	
	'smw_wws_enable_triplification-scp-add' => 'Result Parts zum Subject Creation Pattern hinzufügen',
	'smw_wws_enable_triplification-scp-stop-add' => 'Das Hinzufügen von Result Parts beenden.',
	'smw_wws_enable_triplification-scp-add-note' => 'Bitte klicken Sie auf ein Alias Eingabefeld um den zugehörigen Result Part zum Subject Creation Pattern hinzuzuf&uuml;gen.',
	
	'smw_wws_s4_add_rest_result_part' => 'Weiteren Result Part hinzuf%uuml;gen',
	
	'smw_wws_s4_add_ns_prefix' => 'Weiteres Namespace Pr&auml:fix hinzuf&uuml;gen',
	
	'smw_wws_s3_add_another_parameter' => 'Weiteren Parameter hinzuf&uuml;gen',
	
	'smw_wwsr_rep_create_link' => 'Klicken Sie hier, um eine neue Wiki Web Service Definition zu erstellen.',
	'smw_tir_rep_create_link' => 'Bitte klicken Sie hier, um einen neuen Term Import zu konfigurieren.',
	
	'smw_wwsr_delete' => 'L&ouml;schen',
	'smw_wwsr_delete_tooltip' => 'Diese WWSD l&ouml;schen.',
	'smw_wwsr_rep_delete_tooltip_ti' => 'Diese Term Import Definition l&ouml;schen.',
	
	'smw_wwsu_sort' => 'Sortieren: ',
	'smw_wwsu_sort_by' => 'Nach: ',
	'smw_wwsu_sort_order' => 'Reihenfolge: ',
	'smw_wwsu_sort_order_asc' => 'aufsteigend',
	'smw_wwsu_sort_order_desc' => 'absteigend',
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


