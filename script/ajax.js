function HideContent()
{
	header  = document.getElementById("prompt-container");
	
	if (classie.has(header,"fade-visible")) {
        classie.remove(header,"fade-visible");
    }
	
	setTimeout( function() { document.getElementById("prompt-container").style.display = "none"; }, 500);
}

function DisplayContent(strAddress)
{
	document.getElementById("prompt-container").style.display = "block";
	
	/** Object to handle XML Requests. */
	var ajax_http;
	
	try
	{
		/** Opera 8.0+, Firefox, Safari **/
		ajax_http = new XMLHttpRequest();
		
	} catch (e){
	
		/** Internet Explorer **/
		try{
			ajax_http = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
		
			try{
				ajax_http = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				return false;
			}
			
		}
	}
	
	/** Asynchronous event on AJAX Completion. */
	ajax_http.onreadystatechange = function()
	{
		if(ajax_http.readyState != 4)
			return;
				
		if (ajax_http.status == 200)
		{
			header  = document.getElementById("prompt-container");
			classie.add(header,"fade-visible");
			
			document.getElementById('prompt-body').innerHTML = ajax_http.responseText;
			document.getElementById('prompt-body').scrollTop = 0;
			
			
			//document.getElementById('text_header').innerHTML = "Disclaimers";

		}
	};
	
	ajax_http.open("GET", strAddress, true);
	ajax_http.send();
}

function SubmitPage(pageName)
{
	var nID = "";

	setTimeout(function() { }, 250);
	ga('send', 'pageview', pageName);
}

function StartApplication()
{
	UpdateDiv("content/downloads.php", "main-frame-2");
	UpdateDiv("content/platform.php", "main-frame-4");
	UpdateDiv("content/irc.php", "main-frame-5");
	//UpdateDiv("content/forums.php", "main-frame-6");
	UpdateDiv("client/hash.php", "explorer-body", true);
	
	UpdateConsole();
}

function UpdateConsole()
{
	UpdateDiv("client/mining.php", "frame-1");
	UpdateDiv("client/trades.php?count=50", "frame-2");
	UpdateDiv("client/supply.php", "frame-3");
	
	ga('send', 'event', 'Category', 'Action', 'Console Refresh');
}

function RequestTx(nHash)
{
	document.getElementById('error_dialogue').innerHTML = "Getting Transaction " + nHash.substr(0, 32) + "...";
	UpdateDiv('client/tx.php?hash='+nHash, 'explorer-body', true);
}

function RequestBlock(nHash)
{
	document.getElementById('error_dialogue').innerHTML = "Getting Block " + nHash.substr(0, 32) + "...";
	UpdateDiv('client/block.php?hash='+nHash, 'explorer-body', true);
}

function ValidateSearch(nSearch)
{
	var nSearch = document.getElementById('search').value;
	
	nSearch = nSearch.replace(/\s+/g, '');
	if(nSearch.length == 0)
	{
		document.getElementById('error_dialogue').innerHTML = "Empty Search. Try Again...";
		
		return true;
	}
	
	if(nSearch.length < 128 && !isNaN(nSearch))
	{
		document.getElementById('error_dialogue').innerHTML = "Getting Block " + nSearch + "...";
		UpdateDiv('client/hash.php?height='+nSearch, 'explorer-body', true);
		
		return true;
	}
	
	if(nSearch.length == 128)
	{
		RequestTx(nSearch);
		
		return true;
	}	
	
	if(nSearch.length == 256)
	{
		RequestBlock(nSearch);
		
		return true;
	}
		
	document.getElementById('error_dialogue').innerHTML = "Invalid Input. Try Again...";
	
}

function UpdateDiv(strAddress, strDiv, fError)
{
	if(fError === undefined)
		fError = false;
		
	/** Object to handle XML Requests. */
	var ajax_http;
	
	try
	{
		/** Opera 8.0+, Firefox, Safari **/
		ajax_http = new XMLHttpRequest();
		
	} catch (e){
	
		/** Internet Explorer **/
		try{
			ajax_http = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
		
			try{
				ajax_http = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				return false;
			}
			
		}
	}
	
	/** Asynchronous event on AJAX Completion. */
	ajax_http.onreadystatechange = function()
	{
		if(ajax_http.readyState != 4)
			return;
				
		if (ajax_http.status == 200)
		{
			if(fError)
				try { document.getElementById('error_dialogue').innerHTML = "Search Query Complete."; } catch(e) { }
				
			document.getElementById(strDiv).innerHTML = ajax_http.responseText;
		}
	};
	
	ajax_http.open("GET", strAddress, true);
	ajax_http.send();
}