<?php
App::import('Vendor', 'Qrcode.qrlib');
App::uses('AppHelper', 'View/Helper');
class QrcodeHelper extends AppHelper {
	const CALIDAD='L';
	const TAMANO=4;
	public $helpers=array('Html');
	public function getQRimage($texto,$option=array()){
    	$imageName='qr.png';
    	$urlImage=WWW_ROOT.'img'.DS.$imageName;
    	$calidad=(isset($option['calidad']))?$option['calidad']:self::CALIDAD;
    	$size=(isset($option['tamano']))?$option['tamano']:self::TAMANO;
		QRcode::png($texto, $urlImage, $calidad, $size);
		return $this->Html->image($imageName, array('alt'=>'Código QR'));
	}
}