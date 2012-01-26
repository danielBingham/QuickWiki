<?php
	/**
	 * The abstract ArticleRevisionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ArticleRevision subclass which
	 * extends this ArticleRevisionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ArticleRevision class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ArticleId the value for intArticleId (Not Null)
	 * @property integer $VisitorId the value for intVisitorId (Not Null)
	 * @property string $Title the value for strTitle 
	 * @property string $Message the value for strMessage 
	 * @property QDateTime $Created the value for dttCreated 
	 * @property Article $Article the value for the Article object referenced by intArticleId (Not Null)
	 * @property Visitor $Visitor the value for the Visitor object referenced by intVisitorId (Not Null)
	 * @property ArticleContent $ArticleContent the value for the ArticleContent object that uniquely references this ArticleRevision
	 * @property-read Article $_Article the value for the private _objArticle (Read-Only) if set due to an expansion on the article.article_revision_id reverse relationship
	 * @property-read Article[] $_ArticleArray the value for the private _objArticleArray (Read-Only) if set due to an ExpandAsArray on the article.article_revision_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ArticleRevisionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column article_revision.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revision.article_id
		 * @var integer intArticleId
		 */
		protected $intArticleId;
		const ArticleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revision.visitor_id
		 * @var integer intVisitorId
		 */
		protected $intVisitorId;
		const VisitorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revision.title
		 * @var string strTitle
		 */
		protected $strTitle;
		const TitleMaxLength = 128;
		const TitleDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revision.message
		 * @var string strMessage
		 */
		protected $strMessage;
		const MessageMaxLength = 1024;
		const MessageDefault = null;


		/**
		 * Protected member variable that maps to the database column article_revision.created
		 * @var QDateTime dttCreated
		 */
		protected $dttCreated;
		const CreatedDefault = null;


		/**
		 * Private member variable that stores a reference to a single Article object
		 * (of type Article), if this ArticleRevision object was restored with
		 * an expansion on the article association table.
		 * @var Article _objArticle;
		 */
		private $_objArticle;

		/**
		 * Private member variable that stores a reference to an array of Article objects
		 * (of type Article[]), if this ArticleRevision object was restored with
		 * an ExpandAsArray on the article association table.
		 * @var Article[] _objArticleArray;
		 */
		private $_objArticleArray = array();

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
		 * in the database column article_revision.article_id.
		 *
		 * NOTE: Always use the Article property getter to correctly retrieve this Article object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Article objArticle
		 */
		protected $objArticle;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column article_revision.visitor_id.
		 *
		 * NOTE: Always use the Visitor property getter to correctly retrieve this Visitor object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Visitor objVisitor
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
		 * Load a ArticleRevision from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevision
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			// Use QuerySingle to Perform the Query
			return ArticleRevision::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ArticleRevision()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load all ArticleRevisions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevision[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ArticleRevision::QueryArray to perform the LoadAll query
			try {
				return ArticleRevision::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ArticleRevisions
		 * @return int
		 */
		public static function CountAll() {
			// Call ArticleRevision::QueryCount to perform the CountAll query
			return ArticleRevision::QueryCount(QQ::All());
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
			$objDatabase = ArticleRevision::GetDatabase();

			// Create/Build out the QueryBuilder object with ArticleRevision-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'article_revision');
			ArticleRevision::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('article_revision');

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
		 * Static Qcubed Query method to query for a single ArticleRevision object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ArticleRevision the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleRevision::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			// Perform the Query, Get the First Row, and Instantiate a new ArticleRevision object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			
			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ArticleRevision::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ArticleRevision::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ArticleRevision objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ArticleRevision[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleRevision::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ArticleRevision::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcubed Query method to query for a count of ArticleRevision objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ArticleRevision::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ArticleRevision::GetDatabase();

			$strQuery = ArticleRevision::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			
			$objCache = new QCache('qquery/articlerevision', $strQuery);
			$cacheData = $objCache->GetData();
			
			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ArticleRevision::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}
			
			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ArticleRevision
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'article_revision';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'article_id', $strAliasPrefix . 'article_id');
			$objBuilder->AddSelectItem($strTableName, 'visitor_id', $strAliasPrefix . 'visitor_id');
			$objBuilder->AddSelectItem($strTableName, 'title', $strAliasPrefix . 'title');
			$objBuilder->AddSelectItem($strTableName, 'message', $strAliasPrefix . 'message');
			$objBuilder->AddSelectItem($strTableName, 'created', $strAliasPrefix . 'created');
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ArticleRevision from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ArticleRevision::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ArticleRevision
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
							$strAliasPrefix = 'article_revision__';


						// Expanding reverse references: Article
						$strAlias = $strAliasPrefix . 'article__id';
						$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
						if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
							(!is_null($objDbRow->GetColumn($strAliasName)))) {
							if ($intPreviousChildItemCount = count($objPreviousItem->_objArticleArray)) {
								$objPreviousChildItems = $objPreviousItem->_objArticleArray;
								$objChildItem = Article::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article__', $strExpandAsArrayNodes, $objPreviousChildItems, $strColumnAliasArray);
								if ($objChildItem) {
									$objPreviousItem->_objArticleArray[] = $objChildItem;
								}
							} else {
								$objPreviousItem->_objArticleArray[] = Article::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
							}
							$blnExpandedViaArray = true;
						}

						// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
						if ($blnExpandedViaArray) {
							return false;
						} else if ($strAliasPrefix == 'article_revision__') {
							$strAliasPrefix = null;
						}
					}
				}
			}

			// Create a new instance of the ArticleRevision object
			$objToReturn = new ArticleRevision();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'article_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'article_id'] : $strAliasPrefix . 'article_id';
			$objToReturn->intArticleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'visitor_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'visitor_id'] : $strAliasPrefix . 'visitor_id';
			$objToReturn->intVisitorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title'] : $strAliasPrefix . 'title';
			$objToReturn->strTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'message'] : $strAliasPrefix . 'message';
			$objToReturn->strMessage = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'created', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created'] : $strAliasPrefix . 'created';
			$objToReturn->dttCreated = $objDbRow->GetColumn($strAliasName, 'DateTime');

			if (isset($arrPreviousItems) && is_array($arrPreviousItems)) {
				foreach ($arrPreviousItems as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					if (array_diff($objPreviousItem->_objArticleArray, $objToReturn->_objArticleArray) != null) {
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
				$strAliasPrefix = 'article_revision__';

			// Check for Article Early Binding
			$strAlias = $strAliasPrefix . 'article_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objArticle = Article::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Visitor Early Binding
			$strAlias = $strAliasPrefix . 'visitor_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objVisitor = Visitor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'visitor_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


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



			// Check for Article Virtual Binding
			$strAlias = $strAliasPrefix . 'article__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objArticleArray[] = Article::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objArticle = Article::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ArticleRevisions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ArticleRevision[]
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
					$objItem = ArticleRevision::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objToReturn, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ArticleRevision::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}



		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ArticleRevision object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevision
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ArticleRevision::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ArticleRevision()->Id, $intId)
				),
				$objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ArticleRevision objects,
		 * by ArticleId Index(es)
		 * @param integer $intArticleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevision[]
		*/
		public static function LoadArrayByArticleId($intArticleId, $objOptionalClauses = null) {
			// Call ArticleRevision::QueryArray to perform the LoadArrayByArticleId query
			try {
				return ArticleRevision::QueryArray(
					QQ::Equal(QQN::ArticleRevision()->ArticleId, $intArticleId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ArticleRevisions
		 * by ArticleId Index(es)
		 * @param integer $intArticleId
		 * @return int
		*/
		public static function CountByArticleId($intArticleId) {
			// Call ArticleRevision::QueryCount to perform the CountByArticleId query
			return ArticleRevision::QueryCount(
				QQ::Equal(QQN::ArticleRevision()->ArticleId, $intArticleId)
			);
		}
			
		/**
		 * Load an array of ArticleRevision objects,
		 * by VisitorId Index(es)
		 * @param integer $intVisitorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ArticleRevision[]
		*/
		public static function LoadArrayByVisitorId($intVisitorId, $objOptionalClauses = null) {
			// Call ArticleRevision::QueryArray to perform the LoadArrayByVisitorId query
			try {
				return ArticleRevision::QueryArray(
					QQ::Equal(QQN::ArticleRevision()->VisitorId, $intVisitorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ArticleRevisions
		 * by VisitorId Index(es)
		 * @param integer $intVisitorId
		 * @return int
		*/
		public static function CountByVisitorId($intVisitorId) {
			// Call ArticleRevision::QueryCount to perform the CountByVisitorId query
			return ArticleRevision::QueryCount(
				QQ::Equal(QQN::ArticleRevision()->VisitorId, $intVisitorId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ArticleRevision
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `article_revision` (
							`article_id`,
							`visitor_id`,
							`title`,
							`message`,
							`created`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intArticleId) . ',
							' . $objDatabase->SqlVariable($this->intVisitorId) . ',
							' . $objDatabase->SqlVariable($this->strTitle) . ',
							' . $objDatabase->SqlVariable($this->strMessage) . ',
							' . $objDatabase->SqlVariable($this->dttCreated) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('article_revision', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`article_revision`
						SET
							`article_id` = ' . $objDatabase->SqlVariable($this->intArticleId) . ',
							`visitor_id` = ' . $objDatabase->SqlVariable($this->intVisitorId) . ',
							`title` = ' . $objDatabase->SqlVariable($this->strTitle) . ',
							`message` = ' . $objDatabase->SqlVariable($this->strMessage) . ',
							`created` = ' . $objDatabase->SqlVariable($this->dttCreated) . '
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
		 * Delete this ArticleRevision
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ArticleRevision with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			
			
			// Update the adjoined ArticleContent object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = ArticleContent::LoadByArticleRevisionId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_revision`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all ArticleRevisions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article_revision`');
		}

		/**
		 * Truncate article_revision table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article_revision`');
		}

		/**
		 * Reload this ArticleRevision from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ArticleRevision object.');

			// Reload the Object
			$objReloaded = ArticleRevision::Load($this->intId);

			// Update $this's local variables to match
			$this->ArticleId = $objReloaded->ArticleId;
			$this->VisitorId = $objReloaded->VisitorId;
			$this->strTitle = $objReloaded->strTitle;
			$this->strMessage = $objReloaded->strMessage;
			$this->dttCreated = $objReloaded->dttCreated;
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

				case 'Title':
					/**
					 * Gets the value for strTitle 
					 * @return string
					 */
					return $this->strTitle;

				case 'Message':
					/**
					 * Gets the value for strMessage 
					 * @return string
					 */
					return $this->strMessage;

				case 'Created':
					/**
					 * Gets the value for dttCreated 
					 * @return QDateTime
					 */
					return $this->dttCreated;


				///////////////////
				// Member Objects
				///////////////////
				case 'Article':
					/**
					 * Gets the value for the Article object referenced by intArticleId (Not Null)
					 * @return Article
					 */
					try {
						if ((!$this->objArticle) && (!is_null($this->intArticleId)))
							$this->objArticle = Article::Load($this->intArticleId);
						return $this->objArticle;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Visitor':
					/**
					 * Gets the value for the Visitor object referenced by intVisitorId (Not Null)
					 * @return Visitor
					 */
					try {
						if ((!$this->objVisitor) && (!is_null($this->intVisitorId)))
							$this->objVisitor = Visitor::Load($this->intVisitorId);
						return $this->objVisitor;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'ArticleContent':
					/**
					 * Gets the value for the ArticleContent object that uniquely references this ArticleRevision
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

				case '_Article':
					/**
					 * Gets the value for the private _objArticle (Read-Only)
					 * if set due to an expansion on the article.article_revision_id reverse relationship
					 * @return Article
					 */
					return $this->_objArticle;

				case '_ArticleArray':
					/**
					 * Gets the value for the private _objArticleArray (Read-Only)
					 * if set due to an ExpandAsArray on the article.article_revision_id reverse relationship
					 * @return Article[]
					 */
					return (array) $this->_objArticleArray;


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

				case 'Title':
					/**
					 * Sets the value for strTitle 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTitle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Message':
					/**
					 * Sets the value for strMessage 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMessage = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Created':
					/**
					 * Sets the value for dttCreated 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreated = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Article':
					/**
					 * Sets the value for the Article object referenced by intArticleId (Not Null)
					 * @param Article $mixValue
					 * @return Article
					 */
					if (is_null($mixValue)) {
						$this->intArticleId = null;
						$this->objArticle = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Article object
						try {
							$mixValue = QType::Cast($mixValue, 'Article');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Article object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Article for this ArticleRevision');

						// Update Local Member Variables
						$this->objArticle = $mixValue;
						$this->intArticleId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Visitor':
					/**
					 * Sets the value for the Visitor object referenced by intVisitorId (Not Null)
					 * @param Visitor $mixValue
					 * @return Visitor
					 */
					if (is_null($mixValue)) {
						$this->intVisitorId = null;
						$this->objVisitor = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Visitor object
						try {
							$mixValue = QType::Cast($mixValue, 'Visitor');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Visitor object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Visitor for this ArticleRevision');

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

			
		
		// Related Objects' Methods for Article
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Articles as an array of Article objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article[]
		*/ 
		public function GetArticleArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Article::LoadArrayByArticleRevisionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Articles
		 * @return int
		*/ 
		public function CountArticles() {
			if ((is_null($this->intId)))
				return 0;

			return Article::CountByArticleRevisionId($this->intId);
		}

		/**
		 * Associates a Article
		 * @param Article $objArticle
		 * @return void
		*/ 
		public function AssociateArticle(Article $objArticle) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateArticle on this unsaved ArticleRevision.');
			if ((is_null($objArticle->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateArticle on this ArticleRevision with an unsaved Article.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`article`
				SET
					`article_revision_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objArticle->Id) . '
			');
		}

		/**
		 * Unassociates a Article
		 * @param Article $objArticle
		 * @return void
		*/ 
		public function UnassociateArticle(Article $objArticle) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticle on this unsaved ArticleRevision.');
			if ((is_null($objArticle->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticle on this ArticleRevision with an unsaved Article.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`article`
				SET
					`article_revision_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objArticle->Id) . ' AND
					`article_revision_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Articles
		 * @return void
		*/ 
		public function UnassociateAllArticles() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticle on this unsaved ArticleRevision.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`article`
				SET
					`article_revision_id` = null
				WHERE
					`article_revision_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Article
		 * @param Article $objArticle
		 * @return void
		*/ 
		public function DeleteAssociatedArticle(Article $objArticle) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticle on this unsaved ArticleRevision.');
			if ((is_null($objArticle->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticle on this ArticleRevision with an unsaved Article.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objArticle->Id) . ' AND
					`article_revision_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Articles
		 * @return void
		*/ 
		public function DeleteAllArticles() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateArticle on this unsaved ArticleRevision.');

			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`
				WHERE
					`article_revision_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ArticleRevision"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Article" type="xsd1:Article"/>';
			$strToReturn .= '<element name="Visitor" type="xsd1:Visitor"/>';
			$strToReturn .= '<element name="Title" type="xsd:string"/>';
			$strToReturn .= '<element name="Message" type="xsd:string"/>';
			$strToReturn .= '<element name="Created" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ArticleRevision', $strComplexTypeArray)) {
				$strComplexTypeArray['ArticleRevision'] = ArticleRevision::GetSoapComplexTypeXml();
				Article::AlterSoapComplexTypeArray($strComplexTypeArray);
				Visitor::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ArticleRevision::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ArticleRevision();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Article')) &&
				($objSoapObject->Article))
				$objToReturn->Article = Article::GetObjectFromSoapObject($objSoapObject->Article);
			if ((property_exists($objSoapObject, 'Visitor')) &&
				($objSoapObject->Visitor))
				$objToReturn->Visitor = Visitor::GetObjectFromSoapObject($objSoapObject->Visitor);
			if (property_exists($objSoapObject, 'Title'))
				$objToReturn->strTitle = $objSoapObject->Title;
			if (property_exists($objSoapObject, 'Message'))
				$objToReturn->strMessage = $objSoapObject->Message;
			if (property_exists($objSoapObject, 'Created'))
				$objToReturn->dttCreated = new QDateTime($objSoapObject->Created);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ArticleRevision::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objArticle)
				$objObject->objArticle = Article::GetSoapObjectFromObject($objObject->objArticle, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intArticleId = null;
			if ($objObject->objVisitor)
				$objObject->objVisitor = Visitor::GetSoapObjectFromObject($objObject->objVisitor, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intVisitorId = null;
			if ($objObject->dttCreated)
				$objObject->dttCreated = $objObject->dttCreated->qFormat(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

	class QQNodeArticleRevision extends QQNode {
		protected $strTableName = 'article_revision';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ArticleRevision';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleId':
					return new QQNode('article_id', 'ArticleId', 'integer', $this);
				case 'Article':
					return new QQNodeArticle('article_id', 'Article', 'integer', $this);
				case 'VisitorId':
					return new QQNode('visitor_id', 'VisitorId', 'integer', $this);
				case 'Visitor':
					return new QQNodeVisitor('visitor_id', 'Visitor', 'integer', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Message':
					return new QQNode('message', 'Message', 'string', $this);
				case 'Created':
					return new QQNode('created', 'Created', 'QDateTime', $this);
				case 'Article':
					return new QQReverseReferenceNodeArticle($this, 'article', 'reverse_reference', 'article_revision_id');
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

	class QQReverseReferenceNodeArticleRevision extends QQReverseReferenceNode {
		protected $strTableName = 'article_revision';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ArticleRevision';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleId':
					return new QQNode('article_id', 'ArticleId', 'integer', $this);
				case 'Article':
					return new QQNodeArticle('article_id', 'Article', 'integer', $this);
				case 'VisitorId':
					return new QQNode('visitor_id', 'VisitorId', 'integer', $this);
				case 'Visitor':
					return new QQNodeVisitor('visitor_id', 'Visitor', 'integer', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Message':
					return new QQNode('message', 'Message', 'string', $this);
				case 'Created':
					return new QQNode('created', 'Created', 'QDateTime', $this);
				case 'Article':
					return new QQReverseReferenceNodeArticle($this, 'article', 'reverse_reference', 'article_revision_id');
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
