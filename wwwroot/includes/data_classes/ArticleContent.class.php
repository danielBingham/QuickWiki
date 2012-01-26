<?php
	require(__DATAGEN_CLASSES__ . '/ArticleContentGen.class.php');

	/**
	 * The ArticleContent class defined here contains any
	 * customized code for the ArticleContent class in the
	 * Object Relational Model.  It represents the "article_content" table 
	 * in the database, and extends from the code generated abstract ArticleContentGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class ArticleContent extends ArticleContentGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objArticleContent->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ArticleContent Object %s',  $this->intArticleRevisionId);
		}


        /**
        *  Override the basic GetDatabase function in the Gen to
        * always return the read database.  We'll override the
        * save method elsewhere to always get the write database.
        */ 
        public static function GetDatabase($purpose='read') {
            return QApplication::getDatabase($purpose);
        }



        /**
		 * Save this ArticleContent
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ArticleContent::GetDatabase('write');

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
			$objDatabase = ArticleContent::GetDatabase('write');


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
			$objDatabase = ArticleContent::GetDatabase('write');

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
			$objDatabase = ArticleContent::GetDatabase('write');

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article_content`');
		}

	}
?>
