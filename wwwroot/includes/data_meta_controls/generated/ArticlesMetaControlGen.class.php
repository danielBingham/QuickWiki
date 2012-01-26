<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Articles class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Articles object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ArticlesMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Articles $Articles the actual Articles data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QIntegerTextBox $ArticleRevisionIdControl
	 * property-read QLabel $ArticleRevisionIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ArticlesMetaControlGen extends QBaseClass {
		// General Variables
		protected $objArticles;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Articles's individual data fields
		protected $lblId;
		protected $txtTitle;
		protected $txtArticleRevisionId;

		// Controls that allow the viewing of Articles's individual data fields
		protected $lblTitle;
		protected $lblArticleRevisionId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ArticlesMetaControl to edit a single Articles object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Articles object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticlesMetaControl
		 * @param Articles $objArticles new or existing Articles object
		 */
		 public function __construct($objParentObject, Articles $objArticles) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ArticlesMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Articles object
			$this->objArticles = $objArticles;

			// Figure out if we're Editing or Creating New
			if ($this->objArticles->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticlesMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Articles object creation - defaults to CreateOrEdit
 		 * @return ArticlesMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objArticles = Articles::Load($intId);

				// Articles was found -- return it!
				if ($objArticles)
					return new ArticlesMetaControl($objParentObject, $objArticles);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Articles object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ArticlesMetaControl($objParentObject, new Articles());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticlesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Articles object creation - defaults to CreateOrEdit
		 * @return ArticlesMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ArticlesMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticlesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Articles object creation - defaults to CreateOrEdit
		 * @return ArticlesMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ArticlesMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objArticles->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objArticles->Title;
			$this->txtTitle->MaxLength = Articles::TitleMaxLength;
			return $this->txtTitle;
		}

		/**
		 * Create and setup QLabel lblTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitle_Create($strControlId = null) {
			$this->lblTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitle->Name = QApplication::Translate('Title');
			$this->lblTitle->Text = $this->objArticles->Title;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QIntegerTextBox txtArticleRevisionId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtArticleRevisionId_Create($strControlId = null) {
			$this->txtArticleRevisionId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtArticleRevisionId->Name = QApplication::Translate('Article Revision Id');
			$this->txtArticleRevisionId->Text = $this->objArticles->ArticleRevisionId;
			$this->txtArticleRevisionId->Required = true;
			return $this->txtArticleRevisionId;
		}

		/**
		 * Create and setup QLabel lblArticleRevisionId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblArticleRevisionId_Create($strControlId = null, $strFormat = null) {
			$this->lblArticleRevisionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblArticleRevisionId->Name = QApplication::Translate('Article Revision Id');
			$this->lblArticleRevisionId->Text = $this->objArticles->ArticleRevisionId;
			$this->lblArticleRevisionId->Required = true;
			$this->lblArticleRevisionId->Format = $strFormat;
			return $this->lblArticleRevisionId;
		}



		/**
		 * Refresh this MetaControl with Data from the local Articles object.
		 * @param boolean $blnReload reload Articles from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objArticles->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objArticles->Id;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objArticles->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objArticles->Title;

			if ($this->txtArticleRevisionId) $this->txtArticleRevisionId->Text = $this->objArticles->ArticleRevisionId;
			if ($this->lblArticleRevisionId) $this->lblArticleRevisionId->Text = $this->objArticles->ArticleRevisionId;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ARTICLES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Articles instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveArticles() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtTitle) $this->objArticles->Title = $this->txtTitle->Text;
				if ($this->txtArticleRevisionId) $this->objArticles->ArticleRevisionId = $this->txtArticleRevisionId->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Articles object
				$this->objArticles->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Articles instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteArticles() {
			$this->objArticles->Delete();
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
				case 'Articles': return $this->objArticles;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Articles fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'ArticleRevisionIdControl':
					if (!$this->txtArticleRevisionId) return $this->txtArticleRevisionId_Create();
					return $this->txtArticleRevisionId;
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
					// Controls that point to Articles fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'ArticleRevisionIdControl':
						return ($this->txtArticleRevisionId = QType::Cast($mixValue, 'QControl'));
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