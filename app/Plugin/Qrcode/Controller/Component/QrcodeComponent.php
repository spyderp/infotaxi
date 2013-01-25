<?php
App::import('Vendor', 'Qrcode.qrlib');
class QrcodeComponent extends Component {

	const CALIDAD='L';
	const TAMANO=4;
	protected $Controller;
    protected $_error = '';
    
    public function startup(&$controller) {
        $this->Controller = $controller;
    }

    public function setQRimage($texto, $imageName,$option=array()){
    	$image=WWW_ROOT.'files'.DS.$imageName.'.png';
    	$calidad=(isset($option['calidad']))?$option['calidad']:self::CALIDAD;
    	$size=(isset($option['tamano']))?$option['tamano']:self::TAMANO;
		if(QRcode::png($texto, $image, $calidad, $size)):
			return true;
		else:
			return false;
		endif;
    } 
}