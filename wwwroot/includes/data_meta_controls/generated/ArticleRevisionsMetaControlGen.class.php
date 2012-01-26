<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ArticleRevisions class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ArticleRevisions object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ArticleRevisionsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ArticleRevisions $ArticleRevisions the actual ArticleRevisions data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ArticleIdControl
	 * property-read QLabel $ArticleIdLabel
	 * property QListBox $VisitorIdControl
	 * property-read QLabel $VisitorIdLabel
	 * property QListBox $ArticleContentControl
	 * property-read QLabel $ArticleContentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ArticleRevisionsMetaControlGen extends QBaseClass {
		// General Variables
		protected $objArticleRevisions;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of ArticleRevisions's individual data fields
		protected $lblId;
		protected $lstArticle;
		protected $lstVisitor;

		// Controls that allow the viewing of ArticleRevisions's individual data fields
		protected $lblArticleId;
		protected $lblVisitorId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstArticleContent;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblArticleContent;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ArticleRevisionsMetaControl to edit a single ArticleRevisions object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ArticleRevisions object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionsMetaControl
		 * @param ArticleRevisions $objArticleRevisions new or existing ArticleRevisions object
		 */
		 public function __construct($objParentObject, ArticleRevisions $objArticleRevisions) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ArticleRevisionsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ArticleRevisions object
			$this->objArticleRevisions = $objArticleRevisions;

			// Figure out if we're Editing or Creating New
			if ($this->objArticleRevisions->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleRevisions object creation - defaults to CreateOrEdit
 		 * @return ArticleRevisionsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objArticleRevisions = ArticleRevisions::Load($intId);

				// ArticleRevisions was found -- return it!
				if ($objArticleRevisions)
					return new ArticleRevisionsMetaControl($objParentObject, $objArticleRevisions);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ArticleRevisions object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ArticleRevisionsMetaControl($objParentObject, new ArticleRevisions());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleRevisions object creation - defaults to CreateOrEdit
		 * @return ArticleRevisionsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ArticleRevisionsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleRevisions object creation - defaults to CreateOrEdit
		 * @return ArticleRevisionsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ArticleRevisionsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objArticleRevisions->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstArticle
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstArticle_Create($strControlId = null) {
			$this->lstArticle = new QListBox($this->objParentObject, $strControlId);
			$this->lstArticle->Name = QApplication::Translate('Article');
			$this->lstArticle->Required = true;
			if (!$this->blnEditMode)
				$this->lstArticle->AddItem(QApplication::Translate('- Select One -'), null);
			$objArticleArray = Articles::LoadAll();
			if ($objArticleArray) foreach ($objArticleArray as $objArticle) {
				$objListItem = new QListItem($objArticle->__toString(), $objArticle->Id);
				if (($this->objArticleRevisions->Article) && ($this->objArticleRevisions->Article->Id == $objArticle->Id))
					$objListItem->Selected = true;
				$this->lstArticle->AddItem($objListItem);
			}
			return $this->lstArticle;
		}

		/**
		 * Create and setup QLabel lblArticleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArticleId_Create($strControlId = null) {
			$this->lblArticleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblArticleId->Name = QApplication::Translate('Article');
			$this->lblArticleId->Text = ($this->objArticleRevisions->Article) ? $this->objArticleRevisions->Article->__toString() : null;
			$this->lblArticleId->Required = true;
			return $this->lblArticleId;
		}

		/**
		 * Create and setup QListBox lstVisitor
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstVisitor_Create($strControlId = null) {
			$this->lstVisitor = new QListBox($this->objParentObject, $strControlId);
			$this->lstVisitor->Name = QApplication::Translate('Visitor');
			$this->lstVisitor->Required = true;
			if (!$this->blnEditMode)
				$this->lstVisitor->AddItem(QApplication::Translate('- Select One -'), null);
			$objVisitorArray = Visitors::LoadAll();
			if ($objVisitorArray) foreach ($objVisitorArray as $objVisitor) {
				$objListItem = new QListItem($objVisitor->__toString(), $objVisitor->Id);
				if (($this->objArticleRevisions->Visitor) && ($this->objArticleRevisions->Visitor->Id == $objVisitor->Id))
					$objListItem->Selected = true;
				$this->lstVisitor->AddItem($objListItem);
			}
			return $this->lstVisitor;
		}

		/**
		 * Create and setup QLabel lblVisitorId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblVisitorId_Create($strControlId = null) {
			$this->lblVisitorId = new QLabel($this->objParentObject, $strControlId);
			$this->lblVisitorId->Name = QApplication::Translate('Visitor');
			$this->lblVisitorId->Text = ($this->objArticleRevisions->Visitor) ? $this->objArticleRevisions->Visitor->__toString() : null;
			$this->lblVisitorId->Required = true;
			return $this->lblVisitorId;
		}

		/**
		 * Create and setup QListBox lstArticleContent
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstArticleContent_Create($strControlId = null) {
			$this->lstArticleContent = new QListBox($this->objParentObject, $strControlId);
			$this->lstArticleContent->Name = QApplication::Translate('Article Content');
			$this->lstArticleContent->AddItem(QApplication::Translate('- Select One -'), null);
			$objArticleContentArray = ArticleContent::LoadAll();
			if ($objArticleContentArray) foreach ($objArticleContentArray as $objArticleContent) {
				$objListItem = new QListItem($objArticleContent->__toString(), $objArticleContent->ArticleRevisionId);
				if ($objArticleContent->ArticleRevisionId == $this->objArticleRevisions->Id)
					$objListItem->Selected = true;
				$this->lstArticleContent->AddItem($objListItem);
			}
			// Because ArticleContent's ArticleContent is not null, if a value is already selected, it cannot be changed.
			if ($this->lstArticleContent->SelectedValue)
				$this->lstArticleContent->Enabled = false;
			return $this->lstArticleContent;
		}

		/**
		 * Create and setup QLabel lblArticleContent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArticleContent_Create($strControlId = null) {
			$this->lblArticleContent = new QLabel($this->objParentObject, $strControlId);
			$this->lblArticleContent->Name = QApplication::Translate('Article Content');
			$this->lblArticleContent->Text = ($this->objArticleRevisions->ArticleContent) ? $this->objArticleRevisions->ArticleContent->__toString() : null;
			return $this->lblArticleContent;
		}



		/**
		 * Refresh this MetaControl with Data from the local ArticleRevisions object.
		 * @param boolean $blnReload reload ArticleRevisions from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objArticleRevisions->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objArticleRevisions->Id;

			if ($this->lstArticle) {
					$this->lstArticle->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstArticle->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleArray = Articles::LoadAll();
				if ($objArticleArray) foreach ($objArticleArray as $objArticle) {
					$objListItem = new QListItem($objArticle->__toString(), $objArticle->Id);
					if (($this->objArticleRevisions->Article) && ($this->objArticleRevisions->Article->Id == $objArticle->Id))
						$objListItem->Selected = true;
					$this->lstArticle->AddItem($objListItem);
				}
			}
			if ($this->lblArticleId) $this->lblArticleId->Text = ($this->objArticleRevisions->Article) ? $this->objArticleRevisions->Article->__toString() : null;

			if ($this->lstVisitor) {
					$this->lstVisitor->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstVisitor->AddItem(QApplication::Translate('- Select One -'), null);
				$objVisitorArray = Visitors::LoadAll();
				if ($objVisitorArray) foreach ($objVisitorArray as $objVisitor) {
					$objListItem = new QListItem($objVisitor->__toString(), $objVisitor->Id);
					if (($this->objArticleRevisions->Visitor) && ($this->objArticleRevisions->Visitor->Id == $objVisitor->Id))
						$objListItem->Selected = true;
					$this->lstVisitor->AddItem($objListItem);
				}
			}
			if ($this->lblVisitorId) $this->lblVisitorId->Text = ($this->objArticleRevisions->Visitor) ? $this->objArticleRevisions->Visitor->__toString() : null;

			if ($this->lstArticleContent) {
				$this->lstArticleContent->RemoveAllItems();
				$this->lstArticleContent->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleContentArray = ArticleContent::LoadAll();
				if ($objArticleContentArray) foreach ($objArticleContentArray as $objArticleContent) {
					$objListItem = new QListItem($objArticleContent->__toString(), $objArticleContent->ArticleRevisionId);
					if ($objArticleContent->ArticleRevisionId == $this->objArticleRevisions->Id)
						$objListItem->Selected = true;
					$this->lstArticleContent->AddItem($objListItem);
				}
				// Because ArticleContent's ArticleContent is not null, if a value is already selected, it cannot be changed.
				if ($this->lstArticleContent->SelectedValue)
					$this->lstArticleContent->Enabled = false;
				else
					$this->lstArticleContent->Enabled = true;
			}
			if ($this->lblArticleContent) $this->lblArticleContent->Text = ($this->objArticleRevisions->ArticleContent) ? $this->objArticleRevisions->ArticleContent->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ARTICLEREVISIONS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ArticleRevisions instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveArticleRevisions() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstArticle) $this->objArticleRevisions->ArticleId = $this->lstArticle->SelectedValue;
				if ($this->lstVisitor) $this->objArticleRevisions->VisitorId = $this->lstVisitor->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstArticleContent) $this->objArticleRevisions->ArticleContent = ArticleContent::Load($this->lstArticleContent->SelectedValue);

				// Save the ArticleRevisions object
				$this->objArticleRevisions->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ArticleRevisions instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteArticleRevisions() {
			$this->objArticleRevisions->Delete();
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
				case 'ArticleRevisions': return $this->objArticleRevisions;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ArticleRevisions fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ArticleIdControl':
					if (!$this->lstArticle) return $this->lstArticle_Create();
					return $this->lstArticle;
				case 'ArticleIdLabel':
					if (!$this->lblArticleId) return $this->lblArticleId_Create();
					return $this->lblArticleId;
				case 'VisitorIdControl':
					if (!$this->lstVisitor) return $this->lstVisitor_Create();
					return $this->lstVisitor;
				case 'VisitorIdLabel':
					if (!$this->lblVisitorId) return $this->lblVisitorId_Create();
					return $this->lblVisitorId;
				case 'ArticleContentControl':
					if (!$this->lstArticleContent) return $this->lstArticleContent_Create();
					return $this->lstArticleContent;
				case 'ArticleContentLabel':
					if (!$this->lblArticleContent) return $this->lblArticleContent_Create();
					return $this->lblArticleContent;
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
					// Controls that point to ArticleRevisions fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ArticleIdControl':
						return ($this->lstArticle = QType::Cast($mixValue, 'QControl'));
					case 'VisitorIdControl':
						return ($this->lstVisitor = QType::Cast($mixValue, 'QControl'));
					case 'ArticleContentControl':
						return ($this->lstArticleContent = QType::Cast($mixValue, 'QControl'));
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