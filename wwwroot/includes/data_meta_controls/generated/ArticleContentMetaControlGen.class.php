<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ArticleContent class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ArticleContent object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ArticleContentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ArticleContent $ArticleContent the actual ArticleContent data class being edited
	 * property QListBox $ArticleRevisionIdControl
	 * property-read QLabel $ArticleRevisionIdLabel
	 * property QTextBox $ContentControl
	 * property-read QLabel $ContentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ArticleContentMetaControlGen extends QBaseClass {
		// General Variables
		protected $objArticleContent;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of ArticleContent's individual data fields
		protected $lstArticleRevision;
		protected $txtContent;

		// Controls that allow the viewing of ArticleContent's individual data fields
		protected $lblArticleRevisionId;
		protected $lblContent;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ArticleContentMetaControl to edit a single ArticleContent object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ArticleContent object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleContentMetaControl
		 * @param ArticleContent $objArticleContent new or existing ArticleContent object
		 */
		 public function __construct($objParentObject, ArticleContent $objArticleContent) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ArticleContentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ArticleContent object
			$this->objArticleContent = $objArticleContent;

			// Figure out if we're Editing or Creating New
			if ($this->objArticleContent->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleContentMetaControl
		 * @param integer $intArticleRevisionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleContent object creation - defaults to CreateOrEdit
 		 * @return ArticleContentMetaControl
		 */
		public static function Create($objParentObject, $intArticleRevisionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intArticleRevisionId)) {
				$objArticleContent = ArticleContent::Load($intArticleRevisionId);

				// ArticleContent was found -- return it!
				if ($objArticleContent)
					return new ArticleContentMetaControl($objParentObject, $objArticleContent);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ArticleContent object with PK arguments: ' . $intArticleRevisionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ArticleContentMetaControl($objParentObject, new ArticleContent());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleContentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleContent object creation - defaults to CreateOrEdit
		 * @return ArticleContentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intArticleRevisionId = QApplication::PathInfo(0);
			return ArticleContentMetaControl::Create($objParentObject, $intArticleRevisionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleContentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleContent object creation - defaults to CreateOrEdit
		 * @return ArticleContentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intArticleRevisionId = QApplication::QueryString('intArticleRevisionId');
			return ArticleContentMetaControl::Create($objParentObject, $intArticleRevisionId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

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
				if (($this->objArticleContent->ArticleRevision) && ($this->objArticleContent->ArticleRevision->Id == $objArticleRevision->Id))
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
			$this->lblArticleRevisionId->Text = ($this->objArticleContent->ArticleRevision) ? $this->objArticleContent->ArticleRevision->__toString() : null;
			$this->lblArticleRevisionId->Required = true;
			return $this->lblArticleRevisionId;
		}

		/**
		 * Create and setup QTextBox txtContent
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtContent_Create($strControlId = null) {
			$this->txtContent = new QTextBox($this->objParentObject, $strControlId);
			$this->txtContent->Name = QApplication::Translate('Content');
			$this->txtContent->Text = $this->objArticleContent->Content;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			return $this->txtContent;
		}

		/**
		 * Create and setup QLabel lblContent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContent_Create($strControlId = null) {
			$this->lblContent = new QLabel($this->objParentObject, $strControlId);
			$this->lblContent->Name = QApplication::Translate('Content');
			$this->lblContent->Text = $this->objArticleContent->Content;
			return $this->lblContent;
		}



		/**
		 * Refresh this MetaControl with Data from the local ArticleContent object.
		 * @param boolean $blnReload reload ArticleContent from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objArticleContent->Reload();

			if ($this->lstArticleRevision) {
					$this->lstArticleRevision->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstArticleRevision->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleRevisionArray = ArticleRevision::LoadAll();
				if ($objArticleRevisionArray) foreach ($objArticleRevisionArray as $objArticleRevision) {
					$objListItem = new QListItem($objArticleRevision->__toString(), $objArticleRevision->Id);
					if (($this->objArticleContent->ArticleRevision) && ($this->objArticleContent->ArticleRevision->Id == $objArticleRevision->Id))
						$objListItem->Selected = true;
					$this->lstArticleRevision->AddItem($objListItem);
				}
			}
			if ($this->lblArticleRevisionId) $this->lblArticleRevisionId->Text = ($this->objArticleContent->ArticleRevision) ? $this->objArticleContent->ArticleRevision->__toString() : null;

			if ($this->txtContent) $this->txtContent->Text = $this->objArticleContent->Content;
			if ($this->lblContent) $this->lblContent->Text = $this->objArticleContent->Content;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ARTICLECONTENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ArticleContent instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveArticleContent() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstArticleRevision) $this->objArticleContent->ArticleRevisionId = $this->lstArticleRevision->SelectedValue;
				if ($this->txtContent) $this->objArticleContent->Content = $this->txtContent->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ArticleContent object
				$this->objArticleContent->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ArticleContent instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteArticleContent() {
			$this->objArticleContent->Delete();
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
				case 'ArticleContent': return $this->objArticleContent;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ArticleContent fields -- will be created dynamically if not yet created
				case 'ArticleRevisionIdControl':
					if (!$this->lstArticleRevision) return $this->lstArticleRevision_Create();
					return $this->lstArticleRevision;
				case 'ArticleRevisionIdLabel':
					if (!$this->lblArticleRevisionId) return $this->lblArticleRevisionId_Create();
					return $this->lblArticleRevisionId;
				case 'ContentControl':
					if (!$this->txtContent) return $this->txtContent_Create();
					return $this->txtContent;
				case 'ContentLabel':
					if (!$this->lblContent) return $this->lblContent_Create();
					return $this->lblContent;
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
					// Controls that point to ArticleContent fields
					case 'ArticleRevisionIdControl':
						return ($this->lstArticleRevision = QType::Cast($mixValue, 'QControl'));
					case 'ContentControl':
						return ($this->txtContent = QType::Cast($mixValue, 'QControl'));
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