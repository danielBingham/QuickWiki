<?php
	/**
	 * The abstract ArticleGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Article subclass which
	 * extends this ArticleGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Article class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ArticleRevisionId the value for intArticleRevisionId (Not Null)
	 * @property ArticleRevision $ArticleRevision the value for the ArticleRevision object referenced by intArticleRevisionId (Not Null)
	 * @property-read ArticleRevision $_ArticleRevision the value for the private _objArticleRevision (Read-Only) if set due to an expansion on the article_revision.article_id reverse relationship
	 * @property-read ArticleRevision[] $_ArticleRevisionArray the value for the private _objArticleRevisionArray (Read-Only) if set due to an ExpandAsArray on the article_revision.article_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ArticleGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column article.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column article.article_revision_id
		 * @var integer intArticleRevisionId
		 */
		protected $intArticleRevisionId;
		const ArticleRevisionIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single ArticleRevision object
		 * (of type ArticleRevision), if this Article object was restored with
		 * an expansion on the article_revision association table.
		 * @var ArticleRevision _objArticleRevision;
		 */
		private $_objArticleRevision;

		/**
		 * Private member variable that stores a reference to an array of ArticleRevision objects
		 * (of type ArticleRevision[]), if this Article object was restored with
		 * an ExpandAsArray on the article_revision association table.
		 * @var ArticleRevision[] _objArticleRevisionArray;
		 */
		private $_objArticleRevisionArray = array();

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
		 * in the database column article.article_revision_id.
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
		 * Load a Article from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return Article::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Article()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all Articles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Article::QueryArray to perform the LoadAll query
			try {
				return Article::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Articles
		 * @return int
		 */
		public static function CountAll() {
			// Call Article::QueryCount to perform the CountAll query
			return Article::QueryCount(QQ::All());
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
			$objDatabase = Article::GetDatabase();

			// Create/Build out the QueryBuilder object with Article-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'article');
			Article::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('article');

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
		 * Static Qcubed Query method to query for a single Article object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Article the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new Article object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Article::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Article::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Article objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Article[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Article::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of Article objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Article::GetDatabase();

			$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/article', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Article::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Article
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'article';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'article_revision_id', $strAliasPrefix . 'article_revision_id');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Article from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Article::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Article
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && is_array($arrPreviousItems) && count($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {            
					if ($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer')) {        
						// We are.  Now, prepare to check for ExpandAsArray clauses
						$blnExpandedViaArray = false;
						if (!$strAliasPrefix)
							$strAliasPrefix = 'article__';


						// Expanding reverse references: ArticleRevision
						$strAlias = $strAliasPrefix . 'articlerevision__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->_objArticleRevisionArray)) {
								$objPreviousChildItems = $objPreviousItem->_objArticleRevisionArray;
								$objChildItem = ArticleRevision::InstantiateDbRow($objDbRow, $strAliasPrefix . 'articlerevision__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objArticleRevisionArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objArticleRevisionArray[] = ArticleRevision::InstantiateDbRow($objDbRow, $strAliasPrefix . 'articlerevision__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'article__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the Article object
			$objToReturn = new Article();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'article_revision_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'article_revision_id'] : $strAliasPrefix . 'article_revision_id';
			$objToReturn->intArticleRevisionId = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->_objArticleRevisionArray, $objToReturn->_objArticleRevisionArray) != null) {
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
				$strAliasPrefix = 'article__';

			// Check for ArticleRevision Early Binding
			$strAlias = $strAliasPrefix . 'article_revision_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objArticleRevision = ArticleRevision::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article_revision_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ArticleRevision Virtual Binding
			$strAlias = $strAliasPrefix . 'articlerevision__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objArticleRevisionArray[] = ArticleRevision::InstantiateDbRow($objDbRow, $strAliasPrefix . 'articlerevision__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objArticleRevision = ArticleRevision::InstantiateDbRow($objDbRow, $strAliasPrefix . 'articlerevision__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Articles from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Article[]
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
					$objItem = Article::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Article::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Article object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Article::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Article()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Article objects,
		 * by ArticleRevisionId Index(es)
		 * @param integer $intArticleRevisionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article[]
		*/
		public static function LoadArrayByArticleRevisionId($intArticleRevisionId, $objOptionalClauses = null) {
			// Call Article::QueryArray to perform the LoadArrayByArticleRevisionId query
			try {
				return Article::QueryArray(
					QQ::Equal(QQN::Article()->ArticleRevisionId, $intArticleRevisionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Articles
		 * by ArticleRevisionId Index(es)
		 * @param integer $intArticleRevisionId
		 * @return int
		*/
		public static function CountByArticleRevisionId($intArticleRevisionId) {
			// Call Article::QueryCount to perform the CountByArticleRevisionId query
			return Article::QueryCount(
				QQ::Equal(QQN::Article()->ArticleRevisionId, $intArticleRevisionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Article
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `article` (
							`article_revision_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intArticleRevisionId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('article', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`article`
						SET
							`article_revision_id` = ' . $objDatabase->SqlVariable($this->intArticleRevisionId) . '
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
		 * Delete this Article
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Article with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Articles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`');
		}

		/**
		 * Truncate article table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article`');
		}

		/**
		 * Reload this Article from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Article object.');

			// Reload the Object
			$objReloaded = Article::Load($this->intId);

			// Update $this's local variables to match
			$this->ArticleRevisionId = $objReloaded->ArticleRevisionId;
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
				case 'Id':
					/**
					 * Gets the value for intId (Read-Only PK)
					 * @return integer
					 */
					return $this->intId;

				case 'ArticleRevisionId':
					/**
					 * Gets the value for intArticleRevisionId (Not Null)
					 * @return integer
					 */
					return $this->intArticleRevisionId;


				///////////////////
				// Member Objects
				///////////////////
				case 'ArticleRevision':
					/**
					 * Gets the value for the ArticleRevision object referenced by intArticleRevisionId (Not Null)
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

				case '_ArticleRevision':
					/**
					 * Gets the value for the private _objArticleRevision (Read-Only)
					 * if set due to an expansion on the article_revision.article_id reverse relationship
					 * @return ArticleRevision
					 */
					return $this->_objArticleRevision;

				case '_ArticleRevisionArray':
					/**
					 * Gets the value for the private _objArticleRevisionArray (Read-Only)
					 * if set due to an ExpandAsArray on the article_revision.article_id reverse relationship
					 * @return ArticleRevision[]
					 */
					return (array) $this->_objArticleRevisionArray;


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
					 * Sets the value for intArticleRevisionId (Not Null)
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


				///////////////////
				// Member Objects
				///////////////////
				case 'ArticleRevision':
					/**
					 * Sets the value for the ArticleRevision object referenced by intArticleRevisionId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved ArticleRevision for this Article');

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

			
		
		// Related Objects' Methods for ArticleRevision
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ArticleRevisions as an array of ArticleRevision objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevision[]
		*/ 
		public function GetArticleRevisionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ArticleRevision::LoadArrayByArticleId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ArticleRevisions
		 * @return int
		*/ 
		public function CountArticleRevisions() {
			if ((is_null($this->intId)))
				return 0;

			return ArticleRevision::CountByArticleId($this->intId);
		}

		/**
		 * Associates a ArticleRevision
		 * @param ArticleRevision $objArticleRevision
		 * @return void
		*/ 
		public function AssociateArticleRevision(ArticleRevision $objArticleRevision) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateArticleRevision on this unsaved Article.');
			if ((is_null($objArticleRevision->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateArticleRevision on this Article with an unsaved ArticleRevision.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`article_revision`
				SET
					`article_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objArticleRevision->Id) . '
			');
		}

		/**
		 * Unassociates a ArticleRevision
		 * @param ArticleRevision $objArticleRevision
		 * @return void
		*/ 
		public function UnassociateArticleRevision(ArticleRevision $objArticleRevision) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticleRevision on this unsaved Article.');
			if ((is_null($objArticleRevision->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticleRevision on this Article with an unsaved ArticleRevision.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`article_revision`
				SET
					`article_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objArticleRevision->Id) . ' AND
					`article_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ArticleRevisions
		 * @return void
		*/ 
		public function UnassociateAllArticleRevisions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticleRevision on this unsaved Article.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`article_revision`
				SET
					`article_id` = null
				WHERE
					`article_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ArticleRevision
		 * @param ArticleRevision $objArticleRevision
		 * @return void
		*/ 
		public function DeleteAssociatedArticleRevision(ArticleRevision $objArticleRevision) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticleRevision on this unsaved Article.');
			if ((is_null($objArticleRevision->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticleRevision on this Article with an unsaved ArticleRevision.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_revision`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objArticleRevision->Id) . ' AND
					`article_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ArticleRevisions
		 * @return void
		*/ 
		public function DeleteAllArticleRevisions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticleRevision on this unsaved Article.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_revision`
				WHERE
					`article_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Article"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ArticleRevision" type="xsd1:ArticleRevision"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Article', $strComplexTypeArray)) {
				$strComplexTypeArray['Article'] = Article::GetSoapComplexTypeXml();
				ArticleRevision::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Article::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Article();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ArticleRevision')) &&
				($objSoapObject->ArticleRevision))
				$objToReturn->ArticleRevision = ArticleRevision::GetObjectFromSoapObject($objSoapObject->ArticleRevision);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Article::GetSoapObjectFromObject($objObject, true));

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

	class QQNodeArticle extends QQNode {
		protected $strTableName = 'article';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Article';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleRevisionId':
					return new QQNode('article_revision_id', 'ArticleRevisionId', 'integer', $this);
				case 'ArticleRevision':
					return new QQNodeArticleRevision('article_revision_id', 'ArticleRevision', 'integer', $this);
				case 'ArticleRevision':
					return new QQReverseReferenceNodeArticleRevision($this, 'articlerevision', 'reverse_reference', 'article_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
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

	class QQReverseReferenceNodeArticle extends QQReverseReferenceNode {
		protected $strTableName = 'article';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Article';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleRevisionId':
					return new QQNode('article_revision_id', 'ArticleRevisionId', 'integer', $this);
				case 'ArticleRevision':
					return new QQNodeArticleRevision('article_revision_id', 'ArticleRevision', 'integer', $this);
				case 'ArticleRevision':
					return new QQReverseReferenceNodeArticleRevision($this, 'articlerevision', 'reverse_reference', 'article_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
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
