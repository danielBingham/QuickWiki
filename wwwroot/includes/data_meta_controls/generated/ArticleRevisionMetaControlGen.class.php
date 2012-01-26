<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ArticleRevision class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ArticleRevision object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ArticleRevisionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ArticleRevision $ArticleRevision the actual ArticleRevision data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ArticleIdControl
	 * property-read QLabel $ArticleIdLabel
	 * property QListBox $VisitorIdControl
	 * property-read QLabel $VisitorIdLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QTextBox $MessageControl
	 * property-read QLabel $MessageLabel
	 * property QDateTimePicker $CreatedControl
	 * property-read QLabel $CreatedLabel
	 * property QListBox $ArticleContentControl
	 * property-read QLabel $ArticleContentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ArticleRevisionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objArticleRevision;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of ArticleRevision's individual data fields
		protected $lblId;
		protected $lstArticle;
		protected $lstVisitor;
		protected $txtTitle;
		protected $txtMessage;
		protected $calCreated;

		// Controls that allow the viewing of ArticleRevision's individual data fields
		protected $lblArticleId;
		protected $lblVisitorId;
		protected $lblTitle;
		protected $lblMessage;
		protected $lblCreated;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstArticleContent;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblArticleContent;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ArticleRevisionMetaControl to edit a single ArticleRevision object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ArticleRevision object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionMetaControl
		 * @param ArticleRevision $objArticleRevision new or existing ArticleRevision object
		 */
		 public function __construct($objParentObject, ArticleRevision $objArticleRevision) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ArticleRevisionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ArticleRevision object
			$this->objArticleRevision = $objArticleRevision;

			// Figure out if we're Editing or Creating New
			if ($this->objArticleRevision->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleRevision object creation - defaults to CreateOrEdit
 		 * @return ArticleRevisionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objArticleRevision = ArticleRevision::Load($intId);

				// ArticleRevision was found -- return it!
				if ($objArticleRevision)
					return new ArticleRevisionMetaControl($objParentObject, $objArticleRevision);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ArticleRevision object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ArticleRevisionMetaControl($objParentObject, new ArticleRevision());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleRevision object creation - defaults to CreateOrEdit
		 * @return ArticleRevisionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ArticleRevisionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleRevisionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ArticleRevision object creation - defaults to CreateOrEdit
		 * @return ArticleRevisionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ArticleRevisionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objArticleRevision->Id;
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
			$objArticleArray = Article::LoadAll();
			if ($objArticleArray) foreach ($objArticleArray as $objArticle) {
				$objListItem = new QListItem($objArticle->__toString(), $objArticle->Id);
				if (($this->objArticleRevision->Article) && ($this->objArticleRevision->Article->Id == $objArticle->Id))
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
			$this->lblArticleId->Text = ($this->objArticleRevision->Article) ? $this->objArticleRevision->Article->__toString() : null;
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
			$objVisitorArray = Visitor::LoadAll();
			if ($objVisitorArray) foreach ($objVisitorArray as $objVisitor) {
				$objListItem = new QListItem($objVisitor->__toString(), $objVisitor->Id);
				if (($this->objArticleRevision->Visitor) && ($this->objArticleRevision->Visitor->Id == $objVisitor->Id))
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
			$this->lblVisitorId->Text = ($this->objArticleRevision->Visitor) ? $this->objArticleRevision->Visitor->__toString() : null;
			$this->lblVisitorId->Required = true;
			return $this->lblVisitorId;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objArticleRevision->Title;
			$this->txtTitle->MaxLength = ArticleRevision::TitleMaxLength;
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
			$this->lblTitle->Text = $this->objArticleRevision->Title;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QTextBox txtMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMessage_Create($strControlId = null) {
			$this->txtMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMessage->Name = QApplication::Translate('Message');
			$this->txtMessage->Text = $this->objArticleRevision->Message;
			$this->txtMessage->MaxLength = ArticleRevision::MessageMaxLength;
			return $this->txtMessage;
		}

		/**
		 * Create and setup QLabel lblMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMessage_Create($strControlId = null) {
			$this->lblMessage = new QLabel($this->objParentObject, $strControlId);
			$this->lblMessage->Name = QApplication::Translate('Message');
			$this->lblMessage->Text = $this->objArticleRevision->Message;
			return $this->lblMessage;
		}

		/**
		 * Create and setup QDateTimePicker calCreated
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreated_Create($strControlId = null) {
			$this->calCreated = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreated->Name = QApplication::Translate('Created');
			$this->calCreated->DateTime = $this->objArticleRevision->Created;
			$this->calCreated->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calCreated;
		}

		/**
		 * Create and setup QLabel lblCreated
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreated_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreated = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreated->Name = QApplication::Translate('Created');
			$this->strCreatedDateTimeFormat = $strDateTimeFormat;
			$this->lblCreated->Text = sprintf($this->objArticleRevision->Created) ? $this->objArticleRevision->Created->qFormat($this->strCreatedDateTimeFormat) : null;
			return $this->lblCreated;
		}

		protected $strCreatedDateTimeFormat;


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
				if ($objArticleContent->ArticleRevisionId == $this->objArticleRevision->Id)
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
			$this->lblArticleContent->Text = ($this->objArticleRevision->ArticleContent) ? $this->objArticleRevision->ArticleContent->__toString() : null;
			return $this->lblArticleContent;
		}



		/**
		 * Refresh this MetaControl with Data from the local ArticleRevision object.
		 * @param boolean $blnReload reload ArticleRevision from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objArticleRevision->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objArticleRevision->Id;

			if ($this->lstArticle) {
					$this->lstArticle->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstArticle->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleArray = Article::LoadAll();
				if ($objArticleArray) foreach ($objArticleArray as $objArticle) {
					$objListItem = new QListItem($objArticle->__toString(), $objArticle->Id);
					if (($this->objArticleRevision->Article) && ($this->objArticleRevision->Article->Id == $objArticle->Id))
						$objListItem->Selected = true;
					$this->lstArticle->AddItem($objListItem);
				}
			}
			if ($this->lblArticleId) $this->lblArticleId->Text = ($this->objArticleRevision->Article) ? $this->objArticleRevision->Article->__toString() : null;

			if ($this->lstVisitor) {
					$this->lstVisitor->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstVisitor->AddItem(QApplication::Translate('- Select One -'), null);
				$objVisitorArray = Visitor::LoadAll();
				if ($objVisitorArray) foreach ($objVisitorArray as $objVisitor) {
					$objListItem = new QListItem($objVisitor->__toString(), $objVisitor->Id);
					if (($this->objArticleRevision->Visitor) && ($this->objArticleRevision->Visitor->Id == $objVisitor->Id))
						$objListItem->Selected = true;
					$this->lstVisitor->AddItem($objListItem);
				}
			}
			if ($this->lblVisitorId) $this->lblVisitorId->Text = ($this->objArticleRevision->Visitor) ? $this->objArticleRevision->Visitor->__toString() : null;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objArticleRevision->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objArticleRevision->Title;

			if ($this->txtMessage) $this->txtMessage->Text = $this->objArticleRevision->Message;
			if ($this->lblMessage) $this->lblMessage->Text = $this->objArticleRevision->Message;

			if ($this->calCreated) $this->calCreated->DateTime = $this->objArticleRevision->Created;
			if ($this->lblCreated) $this->lblCreated->Text = sprintf($this->objArticleRevision->Created) ? $this->objArticleRevision->Created->qFormat($this->strCreatedDateTimeFormat) : null;

			if ($this->lstArticleContent) {
				$this->lstArticleContent->RemoveAllItems();
				$this->lstArticleContent->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleContentArray = ArticleContent::LoadAll();
				if ($objArticleContentArray) foreach ($objArticleContentArray as $objArticleContent) {
					$objListItem = new QListItem($objArticleContent->__toString(), $objArticleContent->ArticleRevisionId);
					if ($objArticleContent->ArticleRevisionId == $this->objArticleRevision->Id)
						$objListItem->Selected = true;
					$this->lstArticleContent->AddItem($objListItem);
				}
				// Because ArticleContent's ArticleContent is not null, if a value is already selected, it cannot be changed.
				if ($this->lstArticleContent->SelectedValue)
					$this->lstArticleContent->Enabled = false;
				else
					$this->lstArticleContent->Enabled = true;
			}
			if ($this->lblArticleContent) $this->lblArticleContent->Text = ($this->objArticleRevision->ArticleContent) ? $this->objArticleRevision->ArticleContent->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ARTICLEREVISION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ArticleRevision instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveArticleRevision() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstArticle) $this->objArticleRevision->ArticleId = $this->lstArticle->SelectedValue;
				if ($this->lstVisitor) $this->objArticleRevision->VisitorId = $this->lstVisitor->SelectedValue;
				if ($this->txtTitle) $this->objArticleRevision->Title = $this->txtTitle->Text;
				if ($this->txtMessage) $this->objArticleRevision->Message = $this->txtMessage->Text;
				if ($this->calCreated) $this->objArticleRevision->Created = $this->calCreated->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstArticleContent) $this->objArticleRevision->ArticleContent = ArticleContent::Load($this->lstArticleContent->SelectedValue);

				// Save the ArticleRevision object
				$this->objArticleRevision->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ArticleRevision instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteArticleRevision() {
			$this->objArticleRevision->Delete();
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
				case 'ArticleRevision': return $this->objArticleRevision;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ArticleRevision fields -- will be created dynamically if not yet created
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
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'MessageControl':
					if (!$this->txtMessage) return $this->txtMessage_Create();
					return $this->txtMessage;
				case 'MessageLabel':
					if (!$this->lblMessage) return $this->lblMessage_Create();
					return $this->lblMessage;
				case 'CreatedControl':
					if (!$this->calCreated) return $this->calCreated_Create();
					return $this->calCreated;
				case 'CreatedLabel':
					if (!$this->lblCreated) return $this->lblCreated_Create();
					return $this->lblCreated;
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
					// Controls that point to ArticleRevision fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ArticleIdControl':
						return ($this->lstArticle = QType::Cast($mixValue, 'QControl'));
					case 'VisitorIdControl':
						return ($this->lstVisitor = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'MessageControl':
						return ($this->txtMessage = QType::Cast($mixValue, 'QControl'));
					case 'CreatedControl':
						return ($this->calCreated = QType::Cast($mixValue, 'QControl'));
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