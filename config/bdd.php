<?php

try
{
   $bdd = new PDO('sqlsrv:Server=SERVERDB;Database=CalendarPruebas', 'sa', 'Ambae11//');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}