<?php
	require(__DATAGEN_CLASSES__ . '/VisitorGen.class.php');

	/**
	 * The Visitor class defined here contains any
	 * customized code for the Visitor class in the
	 * Object Relational Model.  It represents the "visitor" table 
	 * in the database, and extends from the code generated abstract VisitorGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Visitor extends VisitorGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objVisitor->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Visitor Object %s',  $this->intId);
		}

        /**
        *  Override the basic getDatabase function in the Gen to
        * always return the read database.  We'll override the
        * save method elsewhere to always get the write database.
        */ 
        public static function GetDatabase($purpose='read') {
            return QApplication::getDatabase($purpose);
        }


        /**
		 * Load a single Visitor object,
		 * by Ip Index(es)
		 * @param integer $intIp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Visitor
		*/
		public static function LoadByIp($mixIp, $objOptionalClauses = null) {
	        $objDatabase = QApplication::$Database[1];   
            $objPrepareStatementService = new PrepareStatementService(); 
     
            $strQuery = 'SELECT *  FROM visitor WHERE ip = ?';
            $sqlQuery = $objPrepareStatementService->PrepareStatement($strQuery, array(sprintf('%u', ip2long($mixIp))));

 
            $objDbResult = $objDatabase->Query($sqlQuery);	
            $arrResult = Visitor::InstantiateDbResult($objDbResult);

            // InstantiateDbResult is going to return an array, but we're only
            // ever going to have a single result.  Ip address has a unique constraint.
            if(empty($arrResult)) {
                return null;
            } else {
                return $arrResult[0];
            } 
        }


        public function __get($strName) {
            switch($strName) {
                case 'Ip':
                    return long2ip($this->intIp);
                default:
                    return parent::__get($strName);
            }
        }

        public function __set($strName, $mixValue) {
            switch($strName) {
                case 'Ip':
                    $this->intIp = sprintf('%u', ip2long($mixValue));
                    break;
                default:
                    parent::__set($strName, $mixValue);
                    break;

            } 
        }
        
        /**
		 * Save this Visitor
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Visitor::GetDatabase('write');

			$mixToReturn = null;

			try {
                
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
				
                	// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `visitor` (
							`ip`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIp) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('visitor', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`visitor`
						SET
							`ip` = ' . $objDatabase->SqlVariable($this->intIp) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Visitor
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Visitor with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Visitor::GetDatabase('write');


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`visitor`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Visitors
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Visitor::GetDatabase('write');

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`visitor`');
		}

		/**
		 * Truncate visitor table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Visitor::GetDatabase('write');

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `visitor`');
		}


	}
?>
