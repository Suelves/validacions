function log(text,num){
		switch(num){
			case 0:
				console.log("%c" + text , "color:white; background:green;padding-top:6px;padding-bottom:5px;padding-left:10px;padding-right:10px;font-family:courier;");
			break;
			case 1:
				console.log("%c" + text , "color:white; background:red;padding-top:6px;padding-bottom:5px;padding-left:10px;padding-right:10px;font-family:courier;");
			break;
			default: 
			console.log(text);
		}
}
