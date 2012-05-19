<?php
/*
 * @version $Id: HEADER 15930 2011-10-30 15:47:55Z tsmr $
 -------------------------------------------------------------------------
 Manufacturersimports plugin for GLPI
 Copyright (C) 2003-2011 by the Manufacturersimports Development Team.

 https://forge.indepnet.net/projects/manufacturersimports
 -------------------------------------------------------------------------

 LICENSE
		
 This file is part of Manufacturersimports.

 Manufacturersimports is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Manufacturersimports is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Manufacturersimports. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT."/inc/includes.php");

if (!isset($_GET["id"])) $_GET["id"] = 0;
if (!isset($_GET["preconfig"])) $_GET["preconfig"] = -1;

$config= new PluginMreportingConfig();

if (isset($_POST["add"])) {

	Session::checkRight("config","w");
	$newID=$config->add($_POST);
	Html::back();
	
} else if (isset($_POST["update"])) {

	Session::checkRight("config","w");
	$config->update($_POST);
	Html::back();

} else if (isset($_POST["delete"])) {

	Session::checkRight("config","w");
	$config->delete($_POST,1);
	Html::redirect("./config.form.php");
   
} else {

	Html::header($LANG['common'][12],'',"plugins","mreporting","config");
   
   if (isset($_GET["rand"])) {
       $self = new PluginMreportingConfig();
      if ($config->getFromDBByRand($_GET["rand"])) {
         $_GET["id"] = $config->fields['id'];
      }
   }
	$config->showForm($_GET["id"]);
	
	Html::footer();

}

?>