<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Visitors class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Visitors object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a VisitorsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Visitors $Visitors the actual Visitors data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $IpControl
	 * property-read QLabel $IpLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class VisitorsMetaControlGen extends QBaseClass {
		// General Variables
		protected $objVisitors;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Visitors's individual data fields
		protected $lblId;
		protected $txtIp;

		// Controls that allow the viewing of Visitors's individual data fields
		protected $lblIp;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * VisitorsMetaControl to edit a single Visitors object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Visitors object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this VisitorsMetaControl
		 * @param Visitors $objVisitors new or existing Visitors object
		 */
		 public function __construct($objParentObject, Visitors $objVisitors) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this VisitorsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Visitors object
			$this->objVisitors = $objVisitors;

			// Figure out if we're Editing or Creating New
			if ($this->objVisitors->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this VisitorsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Visitors object creation - defaults to CreateOrEdit
 		 * @return VisitorsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objVisitors = Visitors::Load($intId);

				// Visitors was found -- return it!
				if ($objVisitors)
					return new VisitorsMetaControl($objParentObject, $objVisitors);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Visitors object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new VisitorsMetaControl($objParentObject, new Visitors());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this VisitorsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Visitors object creation - defaults to CreateOrEdit
		 * @return VisitorsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return VisitorsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this VisitorsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Visitors object creation - defaults to CreateOrEdit
		 * @return VisitorsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return VisitorsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objVisitors->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtIp
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtIp_Create($strControlId = null) {
			$this->txtIp = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtIp->Name = QApplication::Translate('Ip');
			$this->txtIp->Text = $this->objVisitors->Ip;
			return $this->txtIp;
		}

		/**
		 * Create and setup QLabel lblIp
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblIp_Create($strControlId = null, $strFormat = null) {
			$this->lblIp = new QLabel($this->objParentObject, $strControlId);
			$this->lblIp->Name = QApplication::Translate('Ip');
			$this->lblIp->Text = $this->objVisitors->Ip;
			$this->lblIp->Format = $strFormat;
			return $this->lblIp;
		}



		/**
		 * Refresh this MetaControl with Data from the local Visitors object.
		 * @param boolean $blnReload reload Visitors from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objVisitors->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objVisitors->Id;

			if ($this->txtIp) $this->txtIp->Text = $this->objVisitors->Ip;
			if ($this->lblIp) $this->lblIp->Text = $this->objVisitors->Ip;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC VISITORS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Visitors instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveVisitors() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtIp) $this->objVisitors->Ip = $this->txtIp->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Visitors object
				$this->objVisitors->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Visitors instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteVisitors() {
			$this->objVisitors->Delete();
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
				case 'Visitors': return $this->objVisitors;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Visitors fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IpControl':
					if (!$this->txtIp) return $this->txtIp_Create();
					return $this->txtIp;
				case 'IpLabel':
					if (!$this->lblIp) return $this->lblIp_Create();
					return $this->lblIp;
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
					// Controls that point to Visitors fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IpControl':
						return ($this->txtIp = QType::Cast($mixValue, 'QControl'));
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