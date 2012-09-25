(function() {
	
	
	var base_url = 'local.redecore.me';
	var popupUrl = base_url + 'add_pin';
	
	
	function isIE() {
        return /msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent);
    }
    function isChrome() {
        return /Chrome/.test(navigator.userAgent);
    }
    function isSafari() {
        return /Safari/.test(navigator.userAgent) && !isChrome();
    }
    function isIOS() {
        return navigator.userAgent.match(/iPad/i) != null || navigator.userAgent.match(/iPhone/i) != null || navigator.userAgent.match(/iPod/i) != null || navigator.userAgent.match(/iPod/i) != null
    }
	function in_array (needle, haystack, argStrict)
	{
		var key = '', strict = !!argStrict;

		if(strict)
			for(key in haystack)
				if(haystack[key] === needle)
					return true;
		else
			for(key in haystack)
				if(haystack[key] == needle)
					return true;
		
		return false;
	}
    if (window.location.href.match(/^(http|https):\/\/(local\.redecore\.me)/))
	{
        alert('The PinMe Button has been successfully installed. You can now pin images from your favorite websites.');
        return false;
    }
	if(!document.scriptolutionRunning)
	{
		document.scriptolutionRunning = true;
		var imgs = [];
		var srcs = [];
		var close = function(){}
		var hidden = [];
		
		for (var i = 0; i < document.images.length; i++)
		{
			var img = document.images[i];

			if ((img.width >= 150 || img.height >= 150) && (typeof img.src != 'undefined') && !in_array(img.src, srcs, true))
			{				
				imgs.push(img);
				srcs.push(img.src);
			}
		}		
		var youtubeVideoId = null;
		var youtubeThumbnail = null;
		if ((youtubeVideoId = /^https?:\/\/(www\.)?youtube\.com\/watch.+v=([a-zA-Z0-9\-_]+)/.exec(window.location.href))
			&& (youtubeVideoId=youtubeVideoId[2]) && !in_array('youtube:'+youtubeVideoId, srcs))
		{
			youtubeThumbnail = new Image();
			youtubeThumbnail.src = 'http://img.youtube.com/vi/'+youtubeVideoId+'/0.jpg#youtube#'+youtubeVideoId;
			imgs.push(youtubeThumbnail);
			srcs.push('youtube:'+youtubeVideoId);
		}		
		var embeds = document.getElementsByTagName('embed');
		for (var i = 0; i < embeds.length; i++) {
			if ((youtubeVideoId = /^https?:\/\/(www\.)?youtube\.com\/(embed|v)\/([a-zA-Z0-9\-_]+)/.exec(embeds[i].src)) 
				&& (youtubeVideoId=youtubeVideoId[3]) && !in_array('youtube:'+youtubeVideoId, srcs))
			{
				youtubeThumbnail = new Image();
				youtubeThumbnail.src = 'http://img.youtube.com/vi/'+youtubeVideoId+'/0.jpg#youtube#'+youtubeVideoId;
				imgs.push(youtubeThumbnail);
				srcs.push('youtube:'+youtubeVideoId);
			}
		}
		var iframes = document.getElementsByTagName('iframe');
		for (var i = 0; i < iframes.length; i++) {
			if ((youtubeVideoId = /^https?:\/\/(www\.)?youtube\.com\/(embed|v)\/([a-zA-Z0-9\-_]+)/.exec(iframes[i].src))
				&& (youtubeVideoId=youtubeVideoId[3]) && !in_array('youtube:'+youtubeVideoId, srcs))
			{
				youtubeThumbnail = new Image();
				youtubeThumbnail.src = 'http://img.youtube.com/vi/'+youtubeVideoId+'/0.jpg#youtube#'+youtubeVideoId;
				imgs.push(youtubeThumbnail);
				srcs.push('youtube:'+youtubeVideoId);
			}
		}
		if(imgs.length == 0)
		{
			alert('Unfortunately we were unable to locate any images big enough to be pinned.');
			document.scriptolutionRunning = false;
			return false;
		}
		hide = function(tag)
		{
			var items = document.getElementsByTagName(tag);

			for (var i = 0; i < items.length; i++) {
				if (items[i].style.display != 'none') {
					hidden.push([items[i], items[i].style.display]);
					items[i].style.display = 'none';
				}
			}
		}
		unhide = function()
		{
			for (var i = 0; i < hidden.length; i++)
				hidden[i][0].style.display = hidden[i][1];

			hidden = [];
		}
		close = function(){
			overlay.parentNode.removeChild(overlay);
			container.parentNode.removeChild(container);
			unhide();
			document.scriptolutionRunning = false;
			return false;
		}
		hide('embed');
		hide('iframe');
		hide('object');
		var s = '#scriptolutionOverlay {position: fixed; z-index: 9999; top: 0; right: 0; bottom: 0; left: 0; background-color: #ffffff; opacity: .95;}';
		s+= '#scriptolutionLogo {padding: 10px; text-align: center; background-color: #ffffff;}';
		s+= '#scriptolutionBorder {height: 1px; background-color: #d7d7d7;}';
		s+= '#scriptolutionContainer {position: absolute; z-index: 9999; top: 0; left: 0; right: 0;}';
		s+= '#scriptolutionCancelButton {display: block; line-height: 35px; background-color: #f2f2f2; color: #666; text-align: center; font-weight: bold; text-decoration: none;}';
		s+= '#scriptolutionCancelButton:hover {background-color: #e5e5e5;}';
		s+= '#scriptolutionImagesContainer {margin-top: 15px;}';
		s+= '.scriptolutionSpot {float: left; width: 190px; height: 190px; padding: 5px; border: 1px solid #d7d7d7; background-color: #fff; margin: 3px; position: relative; text-align: center;}';
		s+= '.scriptolutionSpot a {display: block; width: 190px; height: 190px;}'
		s+= '.scriptolutionSpot img {max-width: 190px; max-height: 190px;}';
		s+= '.scriptolutionSpot .scriptolutionPostButton {line-height: 24px; display: none; position: absolute; z-index: 99999; top: 40%; left: 50%; margin: -12px 0 0 -40px; width: 80px; height: 24px; border: none; background-color: #f2f2f2; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; color: #333; text-align: center; box-shadow: 0 0 2px #333;}';
		s+= '.scriptolutionSpot .scriptolutionImageDims {position: absolute; z-index: 99999; bottom:0; left: 65px; text-align: center; width: 60px; background-color: #fff; padding: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px;}';
		s+= ".scriptolutionIndicator {border: none; left: 50%;top: 70px;margin: -25px 0 0 -25px;position: absolute;z-index: 99998;}";s+= ".scriptolutionVideo .scriptolutionImageDims {display: none;}";
		var e=document.createElement("style");
		if(isIE()){
			e.type="text/css";
			e.media="screen";
			e.styleSheet.cssText=s;
			document.getElementsByTagName("head")[0].appendChild(e)
		}else{
			if(isSafari())
				e.innerText=s;
			else
				e.innerHTML=s;
			document.body.appendChild(e)
		}
		var overlay = document.createElement("div");
		overlay.setAttribute("id","scriptolutionOverlay");
		document.body.appendChild(overlay);
		var container=document.createElement("div");
		container.setAttribute("id","scriptolutionContainer");
		var html = '';
		html+= '<a id="scriptolutionCancelButton" href="#">Cancel</a>';
		html+= '<div id="scriptolutionBorder"></div>';
		html+= '<div id="scriptolutionLogo"><a target="_blank" href="' + base_url +'"><img src="' + base_url +'/img/logo.png" alt="" /></a></div>';
		html+= '<div id="scriptolutionBorder"></div>';
		html+= '<div id="scriptolutionImagesContainer"></div>';
		container.innerHTML = html;
		document.body.appendChild(container);
		document.getElementById("scriptolutionCancelButton").onclick=close;
		var imagesContainer = document.getElementById("scriptolutionImagesContainer");
		for(var j=0;j<imgs.length;j++)
		{
			(function(img){
				var spot = document.createElement("div");
				spot.setAttribute("class","scriptolutionSpot");
				spot.innerHTML = '<div class=\"scriptolutionImageDims\">'+img.width+' x '+img.height+'</div>';
				var link = document.createElement("a");
				link.setAttribute("href","#");
				link.innerHTML = '<img src="'+img.src+'">';
				var button = document.createElement("div");
				button.setAttribute("class","scriptolutionPostButton");
				button.innerHTML = 'Pin';
				if(isIE()){
					spot.attachEvent("onmouseover",function(){
						button.style.display="block";
					});
					spot.attachEvent("onmouseout",function(){
						button.style.display="none";
					})
				}else{
					spot.addEventListener("mouseover",function(){
						button.style.display="block";
					},false);
					spot.addEventListener("mouseout",function(){
						button.style.display="none";
					},false)
				}
				link.onclick=function()
				{
					window.open(popupUrl+'?url='+escape(img.src)+'&sourceurl='+escape(location.href)+'&title='+document.title,"scriptolution_"+(new Date).getTime(),"status=no,resizable=no,scrollbars=yes,personalbar=no,directories=no,location=no,toolbar=no,menubar=no,width=632,height=270,left=0,top=0");
					close();
					return false;
				}
				link.appendChild(button);
				spot.appendChild(link);
				if(img.src.indexOf("#youtube#")>=0){spot.className += " scriptolutionVideo"; var indicator = new Image(); indicator.src = base_url + "/img/video_icon.png"; indicator.className = "scriptolutionIndicator"; spot.appendChild(indicator);}
				imagesContainer.appendChild(spot);
			})(imgs[j]);
		}
	}	
})();