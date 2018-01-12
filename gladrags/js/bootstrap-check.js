//hämtar Bootstrap från servern ifall MaxCDNs server är nere
(function(cssText,success,fail){
    var style = document.createElement('style');
    style.type='text/css';
    style.async='';
    if(fail != undefined){
        style.onload = function(){
            success();
        };
        style.onerror = function(){
            fail();
        };
    }else return fail;
})("@import url('css/bootstrap-v3.3.7.min.css');",
	function(){
		console.log("yaay css loaded, now i can access css defs"),
	function(){
    	document.head.appendChild(style);
    	style.innerHTML = cssText;
	};
})