<?php
/*
 * @version $Id: HEADER 15930 2011-10-30 15:47:55Z tsmr $
 -------------------------------------------------------------------------
 Manageentities plugin for GLPI
 Copyright (C) 2003-2011 by the Manageentities Development Team.

 https://forge.indepnet.net/projects/manageentities
 -------------------------------------------------------------------------

 LICENSE
		
 This file is part of Manageentities.

 Manageentities is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Manageentities is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Manageentities. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
// */

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT."/inc/includes.php");
header("Content-Type: text/html; charset=UTF-8");
Html::header_nocache();

$common = new PluginMreportingCommon();

if (!isset($_POST['plugin_mreporting_tab'])) {
   $_POST['plugin_mreporting_tab']=$_SESSION['glpi_plugin_mreporting_tab'];
}

switch ($_POST['plugin_mreporting_tab']) {
	default :
      $common->showCentral($_REQUEST);
		break;
}

Html::ajaxFooter();

?>