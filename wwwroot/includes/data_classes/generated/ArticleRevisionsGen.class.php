<?php
	/**
	 * The abstract ArticleRevisionsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ArticleRevisions subclass which
	 * extends this ArticleRevisionsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ArticleRevisions class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ArticleId the value for intArticleId (Not Null)
	 * @property integer $VisitorId the value for intVisitorId (Not Null)
	 * @property Articles $Article the value for the Articles object referenced by intArticleId (Not Null)
	 * @property Visitors $Visitor the value for the Visitors object referenced by intVisitorId (Not Null)
	 * @property ArticleContent $ArticleContent the value for the ArticleContent object that uniquely references this ArticleRevisions
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ArticleRevisionsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column article_revisions.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revisions.article_id
		 * @var integer intArticleId
		 */
		protected $intArticleId;
		const ArticleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revisions.visitor_id
		 * @var integer intVisitorId
		 */
		protected $intVisitorId;
		const VisitorIdDefault = null;


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
		 * in the database column article_revisions.article_id.
		 *
		 * NOTE: Always use the Article property getter to correctly retrieve this Articles object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Articles objArticle
		 */
		protected $objArticle;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column article_revisions.visitor_id.
		 *
		 * NOTE: Always use the Visitor property getter to correctly retrieve this Visitors object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Visitors objVisitor
		 */
		protected $objVisitor;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column article_content.article_revision_id.
		 *
		 * NOTE: Always use the ArticleContent property getter to correctly retrieve this ArticleContent object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ArticleContent objArticleContent
		 */
		protected $objArticleContent;
		
		/**
		 * Used internally to manage whether the adjoined ArticleContent object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyArticleContent;





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
		 * Load a ArticleRevisions from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevisions
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return ArticleRevisions::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ArticleRevisions()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all ArticleRevisionses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevisions[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ArticleRevisions::QueryArray to perform the LoadAll query
			try {
				return ArticleRevisions::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ArticleRevisionses
		 * @return int
		 */
		public static function CountAll() {
			// Call ArticleRevisions::QueryCount to perform the CountAll query
			return ArticleRevisions::QueryCount(QQ::All());
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
			$objDatabase = ArticleRevisions::GetDatabase();

			// Create/Build out the QueryBuilder object with ArticleRevisions-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'article_revisions');
			ArticleRevisions::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('article_revisions');

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
		 * Static Qcubed Query method to query for a single ArticleRevisions object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ArticleRevisions the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleRevisions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new ArticleRevisions object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ArticleRevisions::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ArticleRevisions::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ArticleRevisions objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ArticleRevisions[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleRevisions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ArticleRevisions::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of ArticleRevisions objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleRevisions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ArticleRevisions::GetDatabase();

			$strQuery = ArticleRevisions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/articlerevisions', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ArticleRevisions::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ArticleRevisions
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'article_revisions';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'article_id', $strAliasPrefix . 'article_id');
			$objBuilder->AddSelectItem($strTableName, 'visitor_id', $strAliasPrefix . 'visitor_id');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ArticleRevisions from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ArticleRevisions::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ArticleRevisions
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $arrPreviousItems = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}

			// Create a new instance of the ArticleRevisions object
			$objToReturn = new ArticleRevisions();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'article_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'article_id'] : $strAliasPrefix . 'article_id';
			$objToReturn->intArticleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'visitor_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'visitor_id'] : $strAliasPrefix . 'visitor_id';
			$objToReturn->intVisitorId = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
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
				$strAliasPrefix = 'article_revisions__';

			// Check for Article Early Binding
			$strAlias = $strAliasPrefix . 'article_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objArticle = Articles::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Visitor Early Binding
			$strAlias = $strAliasPrefix . 'visitor_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objVisitor = Visitors::InstantiateDbRow($objDbRow, $strAliasPrefix . 'visitor_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for ArticleContent Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'articlecontent__article_revision_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objArticleContent = ArticleContent::InstantiateDbRow($objDbRow, $strAliasPrefix . 'articlecontent__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objArticleContent = false;
			}



			return $objToReturn;
		}

		/**
		 * Instantiate an array of ArticleRevisionses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ArticleRevisions[]
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
					$objItem = ArticleRevisions::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ArticleRevisions::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ArticleRevisions object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevisions
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ArticleRevisions::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ArticleRevisions()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ArticleRevisions objects,
		 * by ArticleId Index(es)
		 * @param integer $intArticleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevisions[]
		*/
		public static function LoadArrayByArticleId($intArticleId, $objOptionalClauses = null) {
			// Call ArticleRevisions::QueryArray to perform the LoadArrayByArticleId query
			try {
				return ArticleRevisions::QueryArray(
					QQ::Equal(QQN::ArticleRevisions()->ArticleId, $intArticleId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ArticleRevisionses
		 * by ArticleId Index(es)
		 * @param integer $intArticleId
		 * @return int
		*/
		public static function CountByArticleId($intArticleId) {
			// Call ArticleRevisions::QueryCount to perform the CountByArticleId query
			return ArticleRevisions::QueryCount(
				QQ::Equal(QQN::ArticleRevisions()->ArticleId, $intArticleId)
			);
		}
			
		/**
		 * Load an array of ArticleRevisions objects,
		 * by VisitorId Index(es)
		 * @param integer $intVisitorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevisions[]
		*/
		public static function LoadArrayByVisitorId($intVisitorId, $objOptionalClauses = null) {
			// Call ArticleRevisions::QueryArray to perform the LoadArrayByVisitorId query
			try {
				return ArticleRevisions::QueryArray(
					QQ::Equal(QQN::ArticleRevisions()->VisitorId, $intVisitorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ArticleRevisionses
		 * by VisitorId Index(es)
		 * @param integer $intVisitorId
		 * @return int
		*/
		public static function CountByVisitorId($intVisitorId) {
			// Call ArticleRevisions::QueryCount to perform the CountByVisitorId query
			return ArticleRevisions::QueryCount(
				QQ::Equal(QQN::ArticleRevisions()->VisitorId, $intVisitorId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ArticleRevisions
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevisions::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `article_revisions` (
							`article_id`,
							`visitor_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intArticleId) . ',
							' . $objDatabase->SqlVariable($this->intVisitorId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('article_revisions', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`article_revisions`
						SET
							`article_id` = ' . $objDatabase->SqlVariable($this->intArticleId) . ',
							`visitor_id` = ' . $objDatabase->SqlVariable($this->intVisitorId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

		
		
				// Update the adjoined ArticleContent object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyArticleContent) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = ArticleContent::LoadByArticleRevisionId($this->intId)) {
						$objAssociated->ArticleRevisionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objArticleContent) {
						$this->objArticleContent->ArticleRevisionId = $this->intId;
						$this->objArticleContent->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyArticleContent = false;
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
		 * Delete this ArticleRevisions
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ArticleRevisions with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevisions::GetDatabase();

			
			
			// Update the adjoined ArticleContent object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = ArticleContent::LoadByArticleRevisionId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_revisions`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all ArticleRevisionses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevisions::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_revisions`');
		}

		/**
		 * Truncate article_revisions table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevisions::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article_revisions`');
		}

		/**
		 * Reload this ArticleRevisions from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ArticleRevisions object.');

			// Reload the Object
			$objReloaded = ArticleRevisions::Load($this->intId);

			// Update $this's local variables to match
			$this->ArticleId = $objReloaded->ArticleId;
			$this->VisitorId = $objReloaded->VisitorId;
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

				case 'ArticleId':
					/**
					 * Gets the value for intArticleId (Not Null)
					 * @return integer
					 */
					return $this->intArticleId;

				case 'VisitorId':
					/**
					 * Gets the value for intVisitorId (Not Null)
					 * @return integer
					 */
					return $this->intVisitorId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Article':
					/**
					 * Gets the value for the Articles object referenced by intArticleId (Not Null)
					 * @return Articles
					 */
					try {
						if ((!$this->objArticle) && (!is_null($this->intArticleId)))
							$this->objArticle = Articles::Load($this->intArticleId);
						return $this->objArticle;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Visitor':
					/**
					 * Gets the value for the Visitors object referenced by intVisitorId (Not Null)
					 * @return Visitors
					 */
					try {
						if ((!$this->objVisitor) && (!is_null($this->intVisitorId)))
							$this->objVisitor = Visitors::Load($this->intVisitorId);
						return $this->objVisitor;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'ArticleContent':
					/**
					 * Gets the value for the ArticleContent object that uniquely references this ArticleRevisions
					 * by objArticleContent (Unique)
					 * @return ArticleContent
					 */
					try {
						if ($this->objArticleContent === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objArticleContent)
							$this->objArticleContent = ArticleContent::LoadByArticleRevisionId($this->intId);
						return $this->objArticleContent;
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
				case 'ArticleId':
					/**
					 * Sets the value for intArticleId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objArticle = null;
						return ($this->intArticleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VisitorId':
					/**
					 * Sets the value for intVisitorId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objVisitor = null;
						return ($this->intVisitorId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Article':
					/**
					 * Sets the value for the Articles object referenced by intArticleId (Not Null)
					 * @param Articles $mixValue
					 * @return Articles
					 */
					if (is_null($mixValue)) {
						$this->intArticleId = null;
						$this->objArticle = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Articles object
						try {
							$mixValue = QType::Cast($mixValue, 'Articles');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Articles object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Article for this ArticleRevisions');

						// Update Local Member Variables
						$this->objArticle = $mixValue;
						$this->intArticleId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Visitor':
					/**
					 * Sets the value for the Visitors object referenced by intVisitorId (Not Null)
					 * @param Visitors $mixValue
					 * @return Visitors
					 */
					if (is_null($mixValue)) {
						$this->intVisitorId = null;
						$this->objVisitor = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Visitors object
						try {
							$mixValue = QType::Cast($mixValue, 'Visitors');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Visitors object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Visitor for this ArticleRevisions');

						// Update Local Member Variables
						$this->objVisitor = $mixValue;
						$this->intVisitorId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ArticleContent':
					/**
					 * Sets the value for the ArticleContent object referenced by objArticleContent (Unique)
					 * @param ArticleContent $mixValue
					 * @return ArticleContent
					 */
					if (is_null($mixValue)) {
						$this->objArticleContent = null;

						// Make sure we update the adjoined ArticleContent object the next time we call Save()
						$this->blnDirtyArticleContent = true;

						return null;
					} else {
						// Make sure $mixValue actually is a ArticleContent object
						try {
							$mixValue = QType::Cast($mixValue, 'ArticleContent');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objArticleContent to a DIFFERENT $mixValue?
						if ((!$this->ArticleContent) || ($this->ArticleContent->ArticleRevisionId != $mixValue->ArticleRevisionId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined ArticleContent object the next time we call Save()
							$this->blnDirtyArticleContent = true;

							// Update Local Member Variable
							$this->objArticleContent = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
			$strToReturn = '<complexType name="ArticleRevisions"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Article" type="xsd1:Articles"/>';
			$strToReturn .= '<element name="Visitor" type="xsd1:Visitors"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ArticleRevisions', $strComplexTypeArray)) {
				$strComplexTypeArray['ArticleRevisions'] = ArticleRevisions::GetSoapComplexTypeXml();
				Articles::AlterSoapComplexTypeArray($strComplexTypeArray);
				Visitors::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ArticleRevisions::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ArticleRevisions();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Article')) &&
				($objSoapObject->Article))
				$objToReturn->Article = Articles::GetObjectFromSoapObject($objSoapObject->Article);
			if ((property_exists($objSoapObject, 'Visitor')) &&
				($objSoapObject->Visitor))
				$objToReturn->Visitor = Visitors::GetObjectFromSoapObject($objSoapObject->Visitor);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ArticleRevisions::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objArticle)
				$objObject->objArticle = Articles::GetSoapObjectFromObject($objObject->objArticle, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intArticleId = null;
			if ($objObject->objVisitor)
				$objObject->objVisitor = Visitors::GetSoapObjectFromObject($objObject->objVisitor, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intVisitorId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

	class QQNodeArticleRevisions extends QQNode {
		protected $strTableName = 'article_revisions';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ArticleRevisions';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleId':
					return new QQNode('article_id', 'ArticleId', 'integer', $this);
				case 'Article':
					return new QQNodeArticles('article_id', 'Article', 'integer', $this);
				case 'VisitorId':
					return new QQNode('visitor_id', 'VisitorId', 'integer', $this);
				case 'Visitor':
					return new QQNodeVisitors('visitor_id', 'Visitor', 'integer', $this);
				case 'ArticleContent':
					return new QQReverseReferenceNodeArticleContent($this, 'articlecontent', 'reverse_reference', 'article_revision_id', 'ArticleContent');

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

	class QQReverseReferenceNodeArticleRevisions extends QQReverseReferenceNode {
		protected $strTableName = 'article_revisions';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ArticleRevisions';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleId':
					return new QQNode('article_id', 'ArticleId', 'integer', $this);
				case 'Article':
					return new QQNodeArticles('article_id', 'Article', 'integer', $this);
				case 'VisitorId':
					return new QQNode('visitor_id', 'VisitorId', 'integer', $this);
				case 'Visitor':
					return new QQNodeVisitors('visitor_id', 'Visitor', 'integer', $this);
				case 'ArticleContent':
					return new QQReverseReferenceNodeArticleContent($this, 'articlecontent', 'reverse_reference', 'article_revision_id', 'ArticleContent');

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