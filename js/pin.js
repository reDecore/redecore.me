Pin =
{
	likes: {},
    cmnt_likes: {},
	afterLike: null,
	atferUnLike: null,
    afterCmntLike: null,
    atferCmntUnLike: null,

	proceed: false,
	_proceedStart: function() {
		if (Pin.proceed) return false;
		Pin.proceed = true;
		return true;
	},
	_proceedEnd: function() {
		Pin.proceed = false;
	},
	
    init: function()
    {
		$('.sysPinItemContainer[inited!="inited"] .sysPinCommentButton').click(Pin.comment);
    	
    	$('.sysPinItemContainer[inited!="inited"]').attr("inited", "inited").hover(function(){
    		$(this).find(".sysPinActionButtonsContainer").eq(0).show();
    	}, function(){
    		$(this).find(".sysPinActionButtonsContainer").eq(0).hide();
    	});

        $(document).click(function(){
            $(".pincmnt_likes_popup_wrapper").hide();
        });

        Nav.addHandler("pin", Pin.navHandlers.pin);
	
    },
	
	comment: function() {
    	var pinId = $(this).closest(".sysPinItemContainer").attr("pin_id");

    	$('.sysPinItemContainer[pin_id="'+pinId+'"] .sysPinCmntContainer TEXTAREA').focus();
    },

    



    rePin: function() {
        if (!App.currentUser.id) {
            location.href = "/login";
            return false;
        }
        var container = $(this).closest(".sysPinItemContainer");
        var pinId = container.attr("pin_id");
        var pinImg = container.find("IMG.sysPinImg").eq(0);
        var pinDescr = container.find(".sysPinDescr").eq(0);
        var src = pinImg.attr("src").toString();
        src += src.indexOf("?") == -1 ? "?rnd=" : "&rnd=";
        PinCreate.open('repin', {"data": {"images": [src + parseInt(Math.random() * (99999999 - 11111111) + 11111111)]}, "form": {"descr": pinDescr.text(), "pin_id": pinId}});
    },

    navHandlers: {
        pin: function(elm, url, oldUrl) {
            $(".pincmnt_likes_popup_wrapper").hide();
            App.scrollPopup.close();
            $(document).unbind("keypress", Pin.navHandlers.keyPress);
            if (url) {
                $(document).bind("keypress", Pin.navHandlers.keyPress);
                App.scrollPopup.open({"width": 660});
                $("#spopup DIV.obj").load(url.toString()+'?s=1', null,  function (responseText, textStatus, req) {
                    if (textStatus == "error") document.location.href = url.toString();
                });
            }
        },

        keyPress: function(e) {
            if (e.keyCode == 27) {
                Nav.toFirst();
                return false;
            }
        }
    }
};

$(document).ready(Pin.init);
