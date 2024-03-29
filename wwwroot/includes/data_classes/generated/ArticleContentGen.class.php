<?php
	/**
	 * The abstract ArticleContentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ArticleContent subclass which
	 * extends this ArticleContentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ArticleContent class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ArticleRevisionId the value for intArticleRevisionId (PK)
	 * @property string $Content the value for strContent 
	 * @property ArticleRevision $ArticleRevision the value for the ArticleRevision object referenced by intArticleRevisionId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ArticleContentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column article_content.article_revision_id
		 * @var integer intArticleRevisionId
		 */
		protected $intArticleRevisionId;
		const ArticleRevisionIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intArticleRevisionId;
		 */
		protected $__intArticleRevisionId;

		/**
		 * Protected member variable that maps to the database column article_content.content
		 * @var string strContent
		 */
		protected $strContent;
		const ContentDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column article_content.article_revision_id.
		 *
		 * NOTE: Always use the ArticleRevision property getter to correctly retrieve this ArticleRevision object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ArticleRevision objArticleRevision
		 */
		protected $objArticleRevision;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a ArticleContent from PK Info
		 * @param integer $intArticleRevisionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleContent
		 */
		public static function Load($intArticleRevisionId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return ArticleContent::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ArticleContent()->ArticleRevisionId, $intArticleRevisionId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all ArticleContents
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleContent[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ArticleContent::QueryArray to perform the LoadAll query
			try {
				return ArticleContent::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ArticleContents
		 * @return int
		 */
		public static function CountAll() {
			// Call ArticleContent::QueryCount to perform the CountAll query
			return ArticleContent::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase();

			// Create/Build out the QueryBuilder object with ArticleContent-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'article_content');
			ArticleContent::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('article_content');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single ArticleContent object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ArticleContent the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleContent::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new ArticleContent object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ArticleContent::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem)
						$objToReturn[] = $objItem;					
				}
				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if(null === $objDbRow)
					return null;
				return ArticleContent::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ArticleContent objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ArticleContent[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleContent::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ArticleContent::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of ArticleContent objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleContent::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase();

			$strQuery = ArticleContent::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/articlecontent', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ArticleContent::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ArticleContent
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'article_content';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'article_revision_id', $strAliasPrefix . 'article_revision_id');
			$objBuilder->AddSelectItem($strTableName, 'content', $strAliasPrefix . 'content');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ArticleContent from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ArticleContent::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ArticleContent
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the ArticleContent object
			$objToReturn = new ArticleContent();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'article_revision_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'article_revision_id'] : $strAliasPrefix . 'article_revision_id';
			$objToReturn->intArticleRevisionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intArticleRevisionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'content', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'content'] : $strAliasPrefix . 'content';
			$objToReturn->strContent = $objDbRow->GetColumn($strAliasName, 'Blob');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->ArticleRevisionId != $objPreviousItem->ArticleRevisionId) {
						continue;
					}

					// complete match - all primary key columns are the same
					return null;
				}
			}

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'article_content__';

			// Check for ArticleRevision Early Binding
			$strAlias = $strAliasPrefix . 'article_revision_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objArticleRevision = ArticleRevision::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article_revision_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ArticleContents from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ArticleContent[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ArticleContent::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ArticleContent::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ArticleContent object,
		 * by ArticleRevisionId Index(es)
		 * @param integer $intArticleRevisionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleContent
		*/
		public static function LoadByArticleRevisionId($intArticleRevisionId, $objOptionalClauses = null) {
			return ArticleContent::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ArticleContent()->ArticleRevisionId, $intArticleRevisionId)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ArticleContent
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `article_content` (
							`article_revision_id`,
							`content`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intArticleRevisionId) . ',
							' . $objDatabase->SqlVariable($this->strContent) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`article_content`
						SET
							`article_revision_id` = ' . $objDatabase->SqlVariable($this->intArticleRevisionId) . ',
							`content` = ' . $objDatabase->SqlVariable($this->strContent) . '
						WHERE
							`article_revision_id` = ' . $objDatabase->SqlVariable($this->__intArticleRevisionId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intArticleRevisionId = $this->intArticleRevisionId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ArticleContent
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intArticleRevisionId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ArticleContent with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_content`
				WHERE
					`article_revision_id` = ' . $objDatabase->SqlVariable($this->intArticleRevisionId) . '');
		}

		/**
		 * Delete all ArticleContents
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_content`');
		}

		/**
		 * Truncate article_content table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article_content`');
		}

		/**
		 * Reload this ArticleContent from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ArticleContent object.');

			// Reload the Object
			$objReloaded = ArticleContent::Load($this->intArticleRevisionId);

			// Update $this's local variables to match
			$this->ArticleRevisionId = $objReloaded->ArticleRevisionId;
			$this->__intArticleRevisionId = $this->intArticleRevisionId;
			$this->strContent = $objReloaded->strContent;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'ArticleRevisionId':
					/**
					 * Gets the value for intArticleRevisionId (PK)
					 * @return integer
					 */
					return $this->intArticleRevisionId;

				case 'Content':
					/**
					 * Gets the value for strContent 
					 * @return string
					 */
					return $this->strContent;


				///////////////////
				// Member Objects
				///////////////////
				case 'ArticleRevision':
					/**
					 * Gets the value for the ArticleRevision object referenced by intArticleRevisionId (PK)
					 * @return ArticleRevision
					 */
					try {
						if ((!$this->objArticleRevision) && (!is_null($this->intArticleRevisionId)))
							$this->objArticleRevision = ArticleRevision::Load($this->intArticleRevisionId);
						return $this->objArticleRevision;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'ArticleRevisionId':
					/**
					 * Sets the value for intArticleRevisionId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objArticleRevision = null;
						return ($this->intArticleRevisionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Content':
					/**
					 * Sets the value for strContent 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ArticleRevision':
					/**
					 * Sets the value for the ArticleRevision object referenced by intArticleRevisionId (PK)
					 * @param ArticleRevision $mixValue
					 * @return ArticleRevision
					 */
					if (is_null($mixValue)) {
						$this->intArticleRevisionId = null;
						$this->objArticleRevision = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ArticleRevision object
						try {
							$mixValue = QType::Cast($mixValue, 'ArticleRevision');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ArticleRevision object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ArticleRevision for this ArticleContent');

						// Update Local Member Variables
						$this->objArticleRevision = $mixValue;
						$this->intArticleRevisionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ArticleContent"><sequence>';
			$strToReturn .= '<element name="ArticleRevision" type="xsd1:ArticleRevision"/>';
			$strToReturn .= '<element name="Content" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ArticleContent', $strComplexTypeArray)) {
				$strComplexTypeArray['ArticleContent'] = ArticleContent::GetSoapComplexTypeXml();
				ArticleRevision::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ArticleContent::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ArticleContent();
			if ((property_exists($objSoapObject, 'ArticleRevision')) &&
				($objSoapObject->ArticleRevision))
				$objToReturn->ArticleRevision = ArticleRevision::GetObjectFromSoapObject($objSoapObject->ArticleRevision);
			if (property_exists($objSoapObject, 'Content'))
				$objToReturn->strContent = $objSoapObject->Content;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ArticleContent::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objArticleRevision)
				$objObject->objArticleRevision = ArticleRevision::GetSoapObjectFromObject($objObject->objArticleRevision, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intArticleRevisionId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

	class QQNodeArticleContent extends QQNode {
		protected $strTableName = 'article_content';
		protected $strPrimaryKey = 'article_revision_id';
		protected $strClassName = 'ArticleContent';
		public function __get($strName) {
			switch ($strName) {
				case 'ArticleRevisionId':
					return new QQNode('article_revision_id', 'ArticleRevisionId', 'integer', $this);
				case 'ArticleRevision':
					return new QQNodeArticleRevision('article_revision_id', 'ArticleRevision', 'integer', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeArticleRevision('article_revision_id', 'ArticleRevisionId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQReverseReferenceNodeArticleContent extends QQReverseReferenceNode {
		protected $strTableName = 'article_content';
		protected $strPrimaryKey = 'article_revision_id';
		protected $strClassName = 'ArticleContent';
		public function __get($strName) {
			switch ($strName) {
				case 'ArticleRevisionId':
					return new QQNode('article_revision_id', 'ArticleRevisionId', 'integer', $this);
				case 'ArticleRevision':
					return new QQNodeArticleRevision('article_revision_id', 'ArticleRevision', 'integer', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeArticleRevision('article_revision_id', 'ArticleRevisionId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>