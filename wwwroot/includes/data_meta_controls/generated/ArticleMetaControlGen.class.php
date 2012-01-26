<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Article class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Article object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ArticleMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Article $Article the actual Article data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ArticleRevisionIdControl
	 * property-read QLabel $ArticleRevisionIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ArticleMetaControlGen extends QBaseClass {
		// General Variables
		protected $objArticle;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Article's individual data fields
		protected $lblId;
		protected $lstArticleRevision;

		// Controls that allow the viewing of Article's individual data fields
		protected $lblArticleRevisionId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ArticleMetaControl to edit a single Article object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Article object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param Article $objArticle new or existing Article object
		 */
		 public function __construct($objParentObject, Article $objArticle) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ArticleMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Article object
			$this->objArticle = $objArticle;

			// Figure out if we're Editing or Creating New
			if ($this->objArticle->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Article object creation - defaults to CreateOrEdit
 		 * @return ArticleMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objArticle = Article::Load($intId);

				// Article was found -- return it!
				if ($objArticle)
					return new ArticleMetaControl($objParentObject, $objArticle);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Article object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ArticleMetaControl($objParentObject, new Article());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Article object creation - defaults to CreateOrEdit
		 * @return ArticleMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ArticleMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Article object creation - defaults to CreateOrEdit
		 * @return ArticleMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ArticleMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objArticle->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstArticleRevision
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstArticleRevision_Create($strControlId = null) {
			$this->lstArticleRevision = new QListBox($this->objParentObject, $strControlId);
			$this->lstArticleRevision->Name = QApplication::Translate('Article Revision');
			$this->lstArticleRevision->Required = true;
			if (!$this->blnEditMode)
				$this->lstArticleRevision->AddItem(QApplication::Translate('- Select One -'), null);
			$objArticleRevisionArray = ArticleRevision::LoadAll();
			if ($objArticleRevisionArray) foreach ($objArticleRevisionArray as $objArticleRevision) {
				$objListItem = new QListItem($objArticleRevision->__toString(), $objArticleRevision->Id);
				if (($this->objArticle->ArticleRevision) && ($this->objArticle->ArticleRevision->Id == $objArticleRevision->Id))
					$objListItem->Selected = true;
				$this->lstArticleRevision->AddItem($objListItem);
			}
			return $this->lstArticleRevision;
		}

		/**
		 * Create and setup QLabel lblArticleRevisionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArticleRevisionId_Create($strControlId = null) {
			$this->lblArticleRevisionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblArticleRevisionId->Name = QApplication::Translate('Article Revision');
			$this->lblArticleRevisionId->Text = ($this->objArticle->ArticleRevision) ? $this->objArticle->ArticleRevision->__toString() : null;
			$this->lblArticleRevisionId->Required = true;
			return $this->lblArticleRevisionId;
		}



		/**
		 * Refresh this MetaControl with Data from the local Article object.
		 * @param boolean $blnReload reload Article from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objArticle->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objArticle->Id;

			if ($this->lstArticleRevision) {
					$this->lstArticleRevision->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstArticleRevision->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleRevisionArray = ArticleRevision::LoadAll();
				if ($objArticleRevisionArray) foreach ($objArticleRevisionArray as $objArticleRevision) {
					$objListItem = new QListItem($objArticleRevision->__toString(), $objArticleRevision->Id);
					if (($this->objArticle->ArticleRevision) && ($this->objArticle->ArticleRevision->Id == $objArticleRevision->Id))
						$objListItem->Selected = true;
					$this->lstArticleRevision->AddItem($objListItem);
				}
			}
			if ($this->lblArticleRevisionId) $this->lblArticleRevisionId->Text = ($this->objArticle->ArticleRevision) ? $this->objArticle->ArticleRevision->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ARTICLE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Article instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveArticle() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstArticleRevision) $this->objArticle->ArticleRevisionId = $this->lstArticleRevision->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Article object
				$this->objArticle->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Article instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteArticle() {
			$this->objArticle->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'Article': return $this->objArticle;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Article fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ArticleRevisionIdControl':
					if (!$this->lstArticleRevision) return $this->lstArticleRevision_Create();
					return $this->lstArticleRevision;
				case 'ArticleRevisionIdLabel':
					if (!$this->lblArticleRevisionId) return $this->lblArticleRevisionId_Create();
					return $this->lblArticleRevisionId;
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
			try {
				switch ($strName) {
					// Controls that point to Article fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ArticleRevisionIdControl':
						return ($this->lstArticleRevision = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>