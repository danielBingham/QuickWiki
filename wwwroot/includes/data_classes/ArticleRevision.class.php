<?php
	require(__DATAGEN_CLASSES__ . '/ArticleRevisionGen.class.php');

	/**
	 * The ArticleRevision class defined here contains any
	 * customized code for the ArticleRevision class in the
	 * Object Relational Model.  It represents the "article_revision" table 
	 * in the database, and extends from the code generated abstract ArticleRevisionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class ArticleRevision extends ArticleRevisionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objArticleRevision->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ArticleRevision Object %s',  $this->intId);
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
		 * Save this ArticleRevision
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ArticleRevision::GetDatabase('write');

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
			$objDatabase = ArticleRevision::GetDatabase('write');

			
			
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
			$objDatabase = ArticleRevision::GetDatabase('write');

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
			$objDatabase = ArticleRevision::GetDatabase('write');

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article_revision`');
		}


	}
?>
