<?php 
	require('../includes/prepend.inc.php');

    /**
    * Index.php: This file acts as a front controller to direct
    * our search engine friendly urls to the proper QForm .php
    * file, which acts as our controller.  It utilizes QApplication::PathInfo()
    * to accomplish this, along with a standard rewrite rule that sends all paths
    * to index.php/ 
    *
    * It sends the request to the proper QForm by including that QForm. 
    */
    
    if(SERVER_INSTANCE === 'dev') {
        QApplication::$Database[1]->EnableProfiling();
        QApplication::$Database[2]->EnableProfiling();
    }


    // The header and layout are also included in this
    // file, since they are common across the whole site. 
    require_once('header.inc.php');

    $controller = QApplication::PathInfo(0);
    $action = QApplication::PathInfo(1);

    if(empty($controller)) {
        $controller = 'welcome';
        $action = 'welcome'; 
    } 
   
    // Load the action's file. 
    require_once("../controllers/$controller/$action.php");

    // Generate the class name and then run the action
    $actionClassName = ucfirst($action) . 'Action';
    $actionClassName::Run($actionClassName, "../views/$controller/$action.tpl.php");

    require_once('footer.inc.php');
    

?>
