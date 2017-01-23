				var objNavMenu = null;
				var objDropMenu = null;
				var numDropMenu = 10;

				var bgLinkColor = '#B7D6F8';
				var bgLinkHover = '#3399FF';
				var bgLinkActive = '#B7D6F8';
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

				

		function toggleClamShellMenu(objectID)
		{
			var object = document.getElementById(objectID);
			if (object.style.display == 'block')
				object.style.display = 'none';
			else
				object.style.display = 'block';
			return;
		}