/**
 * @class  ObsoleteUserAgentModal
 * 
 * @description Clase que crea un objeto que detecta el navegador y su versión y si es una versión obsoleta para MediaMarkt 
 * abre una modal.
 */
function ObsoleteUserAgentModal ()
{
	/**
	 * atributos
	 */
	this.userAgent = "";
	this.version = "";

	/**
	 * Lanzamiento de métodos
	 */
	this.detectNavigator();
	this.detectVersion();
	this.isObsolete(this.userAgent, this.version);
	

	// console.log(this.version);
	// console.log(this.userAgent);	
};


/**
 * @method isObsolete
 * @param  {string} ua      	Nombre del navegador
 * @param  {string} version 	Vesrión del navegador
 */
ObsoleteUserAgentModal.prototype.isObsolete = function (ua, version) {
	
	//ignorar los otros navegadores. De momento solo importa el IE
	//explorer 8 para abajo
	if (ua == "MISE" && version <= 8 )
	{
		alert('obsoleto!!!!!');
	}
	else
	{
		alert('No obsoleto!!!');
	}
};


/**
 * @method detectVersion
 * @description Detecta la versión del navegador
 */
ObsoleteUserAgentModal.prototype.detectVersion = function () {	
	var ua = navigator.userAgent; 
	var M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
	this.version = M[2];						
};


/**
 * @method detectNavigator
 * @description Detecta en qué navegador se está ejecutando
 */
ObsoleteUserAgentModal.prototype.detectNavigator = function () {
	var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
	if (isOpera) this.userAgent = "Opera";
	    // Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';
	if (isFirefox) this.userAgent = "Firefox";
	    // At least Safari 3+: "[object HTMLElementConstructor]"
	var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
	if (isSafari) this.userAgent = "Safari";
	    // Internet Explorer 6-11
	var isIE = false || !!document.documentMode;
	if (isIE) this.userAgent = "MISE";
	    // Edge 20+
	var isEdge = !isIE && !!window.StyleMedia;
	if (isEdge) this.userAgent = "MISEedge";
	    // Chrome 1+
	var isChrome = !!window.chrome && !!window.chrome.webstore;
	if (isChrome) this.userAgent = "Chrome";
	    // Blink engine detection
	// var isBlink = (isChrome || isOpera) && !!window.CSS;
	// if (isBlink) this.userAgent = "Blink";	
};







var ua = new ObsoleteUserAgentModal();