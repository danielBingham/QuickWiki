<?php
	if (!defined('__PREPEND_INCLUDED__')) {
		// Ensure prepend.inc is only executed once
		define('__PREPEND_INCLUDED__', 1);


		///////////////////////////////////
		// Define Server-specific constants
		///////////////////////////////////	
		/*
		 * This assumes that the configuration include file is in the same directory
		 * as this prepend include file.  For security reasons, you can feel free
		 * to move the configuration file anywhere you want.  But be sure to provide
		 * a relative or absolute path to the file.
		 */
		require(dirname(__FILE__) . '/configuration.inc.php');


		//////////////////////////////
		// Include the QCubed Framework
		//////////////////////////////
		require(__QCODO_CORE__ . '/qcodo.inc.php');


		///////////////////////////////
		// Define the Application Class
		///////////////////////////////
		/**
		 * The Application class is an abstract class that statically provides
		 * information and global utilities for the entire web application.
		 *
		 * Custom constants for this webapp, as well as global variables and global
		 * methods should be declared in this abstract class (declared statically).
		 *
		 * This Application class should extend from the ApplicationBase class in
		 * the framework.
		 */
		abstract class QApplication extends QApplicationBase {
        	/**
			 * This is called by the PHP5 Autoloader.  This method overrides the
			 * one in ApplicationBase.
			 *
			 * @return void
			 */
			public static function Autoload($strClassName) {
				// First use the QCubed Autoloader
				if (!parent::Autoload($strClassName)) {
                   
                    // Handle service classes 
                    $posService = strpos($strClassName, 'Service');
			        if($posService !== false && $posService !== 0) {
                        $filename = strtolower(substr($strClassName, 0, $posService));
                        require_once(sprintf(__DOCROOT__ . '/services/%s.php', $filename)); 
                    }	

                }
			}

			////////////////////////////
			// QApplication Customizations (e.g. EncodingType, etc.)
			////////////////////////////
			public static $EncodingType = 'UTF-8';
            
            ////////////////////////////
			// Additional Static Methods
			////////////////////////////

            // Fixme: Fix me, this is a hack to fix a bug that was
            // wiping out text coming out of the database.  When
            // explicitly encoded with UTF-8 encoding it would
            // wipe out any entries that had been copied from
            // wikipedia.  I don't have time to puzzle out
            // charset issues right now.  So I'm hacking around it
            // for now.
            public static function HtmlEntities($strText) {
                return htmlentities($strText);
            }

            public static function getDatabase($purpose='read') {
                switch($purpose) {
                    case 'write':
                        return QApplication::$Database[1];
                    case 'read':
                        return QApplication::$Database[2];
                }
            }
		}


		//////////////////////////
		// Custom Global Functions
		//////////////////////////	
		// TODO: Define any custom global functions (if any) here...


		////////////////
		// Include Files
		////////////////
		// TODO: Include any other include files (if any) here...


		///////////////////////
		// Setup Error Handling
		///////////////////////
		/*
		 * Set Error/Exception Handling to the default
		 * QCubed HandleError and HandlException functions
		 * (Only in non CLI mode)
		 *
		 * Feel free to change, if needed, to your own
		 * custom error handling script(s).
		 */
		if (array_key_exists('SERVER_PROTOCOL', $_SERVER)) {
			set_error_handler('QcodoHandleError', error_reporting());
			set_exception_handler('QcodoHandleException');
		}


		////////////////////////////////////////////////
		// Initialize the Application and DB Connections
		////////////////////////////////////////////////
		QApplication::Initialize();
		QApplication::InitializeDatabaseConnections();


		/////////////////////////////
		// Start Session Handler (if required)
		/////////////////////////////
		session_start();


		//////////////////////////////////////////////
		// Setup Internationalization and Localization (if applicable)
		// Note, this is where you would implement code to do Language Setting discovery, as well, for example:
		// * Checking against $_GET['language_code']
		// * checking against session (example provided below)
		// * Checking the URL
		// * etc.
		// TODO: options to do this are left to the developer
		//////////////////////////////////////////////
		if (isset($_SESSION)) {
			if (array_key_exists('country_code', $_SESSION))
				QApplication::$CountryCode = $_SESSION['country_code'];
			if (array_key_exists('language_code', $_SESSION))
				QApplication::$LanguageCode = $_SESSION['language_code'];
		}

		// Initialize I18n if QApplication::$LanguageCode is set
		if (QApplication::$LanguageCode)
			QI18n::Initialize();
		else {
			// QApplication::$CountryCode = 'us';
			// QApplication::$LanguageCode = 'en';
			// QI18n::Initialize();
		}
	}
?>
