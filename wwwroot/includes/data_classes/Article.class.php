<?php
	require(__DATAGEN_CLASSES__ . '/ArticleGen.class.php');

	/**
	 * The Article class defined here contains any
	 * customized code for the Article class in the
	 * Object Relational Model.  It represents the "article" table 
	 * in the database, and extends from the code generated abstract ArticleGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Article extends ArticleGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objArticle->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Article Object %s',  $this->intId);
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
				QQ::Clause(
                    QQ::Expand(QQN::Article()->ArticleRevision), 
                    $objOptionalClauses
                )
			);
		}

		/**
		 * Save this Article.  Override to force use of the
         * write database.
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase('write');

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
		 * Delete this Article. Override to force use of the write database.
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Article with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase('write');


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Articles. Override to force use of the write database.
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase('write');

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`');
		}

		/**
		 * Truncate article table. Override to force use of the write database.
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase('write');

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article`');
		}


	}
?>
