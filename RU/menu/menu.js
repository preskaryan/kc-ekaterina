				var objNavMenu = null;
				var objDropMenu = null;
				var numDropMenu = 12;
				var numDropOption = 7;

				var bgLinkColor = '#E2EEFE';
				var bgLinkHover = '#3399FF';
				var bgLinkActive = '#E2EEFE';

				var optLinkColor = '#EFF6FF';
				var optLinkHover = '#3399FF';
				var optLinkActive = '#EFF6FF';

				var linkActive = '#FFFFFF';
				var linkHover = '#FFFFFF';
				var linkColor = '#3399FF';
		function initPage()
		{
			for (i=0;i<=numDropMenu;i++)
			{
				menuName = 'menu' + i;
				navName = 'menu' + i;
				objDropMenu = document.getElementById(menuName);
				objNavMenu = document.getElementById(navName);
				if (objNavMenu) objNavMenu.onmouseover = menuHover;
				if (objNavMenu) objNavMenu.onmouseout = menuOut;
			}
			objNavMenu = null;
			for (i=1;i<=numDropOption;i++)
			{
				menuName = 'option' + i;
				navName = 'option' + i;
				objDropMenu = document.getElementById(menuName);
				objNavMenu = document.getElementById(navName);
				if (objNavMenu) objNavMenu.onmouseover = optionHover;
				if (objNavMenu) objNavMenu.onmouseout = optionOut;
			}
			objNavMenu = null;
 			return;
		}

		function menuHover (e) {
			hoverObjNavMenu = document.getElementById(this.id);
			hoverObjNavMenu.style.color = linkHover;
			hoverObjNavMenu.style.backgroundColor = bgLinkHover;
		}

		function menuOut (e) {
			outObjNavMenu = document.getElementById(this.id);
			outObjNavMenu.style.color = linkColor;
			outObjNavMenu.style.backgroundColor = bgLinkColor;
		}
		function optionHover (e) {
			hoverObjNavMenu = document.getElementById(this.id);
			hoverObjNavMenu.style.color = linkHover;
			hoverObjNavMenu.style.backgroundColor = optLinkHover;
		}

		function optionOut (e) {
			outObjNavMenu = document.getElementById(this.id);
			outObjNavMenu.style.color = linkColor;
			outObjNavMenu.style.backgroundColor = optLinkColor;
		}



		function toggleClamShellMenu(objectID)
		{
			var object = document.getElementById(objectID);
			if (object.style.display == 'block')
				object.style.display = 'none';
			else
				object.style.display = 'block';
			return;
		}		
		