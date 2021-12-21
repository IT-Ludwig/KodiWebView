<style type='text/css'> 
@font-face {
    font-family: 'coolvetica';
    src: url('./gfx/css/fonts/coolvetica_rg-webfont.eot');
    src: url('./gfx/css/fonts/coolvetica_rg-webfont.eot?#iefix') format('embedded-opentype'),
         url('./gfx/css/fonts/coolvetica_rg-webfont.woff') format('woff'),
         url('./gfx/css/fonts/coolvetica_rg-webfont.ttf') format('truetype'),
         url('./gfx/css/fonts/coolvetica_rg-webfont.svg#coolvetica_rgregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

* { margin: 0; padding: 0; outline: 0; }

body, html { height: 100%; }

body {
    font-size: 12px;
    line-height: 22px;
    font-family: arial, sans-serif;
    color: #fff;
    background: url(./gfx/css/images/body.png) repeat 0 0;

    min-width: 980px;
}

a { color:<?=$HighlightColor?>; text-decoration: none; cursor: pointer; }
a:hover { color:<?=$HighlightColor?>; text-decoration: underline; }
a img { border: 0; }

article, aside, details, footer, header, menu, nav, section { display: block; }
input[type=text], input[type=password] { color:#FFFFFF; font-family: arial, sans-serif; background-color: transparent; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #4f4f4f;}
select { font-size: 12px; color:#FFFFFF; font-family: arial, sans-serif; background-color: #171717; border-style: solid; border-width: 1px 0px 1px 1px; border-color: #4f4f4f;}
textarea{ font-size: 12px; color:#FFFFFF; font-family: arial, sans-serif; background-color: transparent; border-style: solid; border-width: 1px 1px 1px 1px; border-color: #4f4f4f;}
/*input[type=submit]{ font-size: 12px; color:#FFFFFF; font-family: arial, sans-serif; background-color: #151515; border-style: solid; border-width: 1px 1px 1px 1px; border-color: <?=$HighlightColor?>; padding:2px; margin:5px;}*/
textarea { overflow: auto; }

.cl { display: block; height: 0; font-size: 0; line-height: 0; text-indent: -4000px; clear: both; }
.notext { font-size: 0; line-height: 0; text-indent: -4000px; }
.left, .alignleft { float: left; display: inline; }
.right, .alignright { float: right; display: inline; }

.shell { width: 1300px; margin: 0 auto; }
.light-bg { background: url(./gfx/css/images/light.png) no-repeat center 0; }

#wrapper { background: url(./gfx/css/images/background_main.jpg) no-repeat center center fixed;  }
.header { padding-top: 17px; position: relative; }
.socials { position: absolute; top: 0; right: -10px; width: 85px; }
.socials a { background: url(./gfx/css/images/socials.png) no-repeat 0 0; width: 19px; height: 19px; float: left; font-size: 0; line-height: 0; text-indent: -4000px; margin: -6px 7px 0 0; position: relative;  
	transition: margin 0.2s;
	-moz-transition: margin 0.2s;
	-webkit-transition: margin 0.2s;
	-o-transition: margin 0.2s;
}
.socials a.facebook-ico { background-position: 0px 0; }
.socials a.twitter-ico { background-position: -20px 0; }
.socials a.you-tube-ico { background-position: -60px 0; }
.socials a:hover { margin-top: 0; }

#logo { width: 272px; font-size: 0; line-height: 0; float: left; }
#logo a { height: 75px; background: url(./gfx/css/images/logo.png) no-repeat 0 0; text-indent: -4000px; display: block; }

#navigation { height: 66px; padding: 6px 0px 0 8px; margin-top: 10px; position: relative; margin-right: -5px;  background: url(./gfx/css/images/navigation.png) no-repeat 0 0; font-family: 'coolvetica', arial, helvetica, serif; letter-spacing:1px; font-size: 18px; color: <?=$HighlightColor?>; float: right; }
#navigation ul { list-style: none; list-style-position: outside; line-height: 49px; }
#navigation ul li { float: left; background: url(./gfx/css/images/navigation-border.png) no-repeat right 0; padding-right: 2px;  }
#navigation ul li a { display: block; color: <?=$HighlightColor?>; text-shadow: rgba(0,0,0,0.5) 0px 2px 2px; padding: 0 36px; position: relative; }
#navigation ul li a:hover,
#navigation ul li.last a:hover { background: url(./gfx/css/images/navigation-hover.png) repeat-x 0 0; text-decoration: none; }
#navigation ul li.last { background: transparent; padding-right: 0;  }
#navigation ul li.last a { padding-right: 33px; padding-left: 33px; border-right: 0; background: transparent; }
#navigation ul li a span { background: url(./gfx/css/images/lates-ico.png) no-repeat 0 0; opacity: 0;
-moz-opacity: 0;
filter:alpha(opacity=0); text-shadow: rgba(255,255,255,0.9) 0px 1px 0px; width: 39px; height: 39px; position: absolute; top: -17px; right: 0; text-align: center; line-height: 37px; font-size: 11px; color: #383838; 
    transition: opacity 0.4s;
    -moz-transition: opacity 0.4s;
    -webkit-transition: opacity 0.4s;
    -o-transition: opacity 0.4s;
}
#navigation ul li a:hover span { display: block; opacity: 1;
-moz-opacity: 1;
filter:alpha(opacity=100);}

.main { padding-top: 20px; padding-bottom: 50px;  background: url(./gfx/css/images/main-shadow.png) no-repeat center bottom; }
.main h3 { color: <?=$HighlightColor?>; font-size: 20px; font-family: 'coolvetica', arial, helvetica, serif; font-weight: normal; text-shadow: rgba(0,0,0,0.9) 0px 0px 2px; }
.main h2 { color: <?=$HighlightColor?>; font-size: 22px; font-family: 'coolvetica', arial, helvetica, serif; font-weight: normal; text-shadow: rgba(0,0,0,0.9) 0px 0px 2px; }
.main h2 a { color: <?=$HighlightColor?>; }
.main h2 a:hover { text-decoration: none; color: <?=$HighlightColor?>;  }
.content { width: 1050px; float: right; }

.post { background: url(./gfx/css/images/widget-bg.png) repeat 0 0; margin-bottom: 30px;  padding: 2px; box-shadow: 0px 0px 15px rgba(0,0,0,0.4); -moz-box-shadow: 0px 0px 15px rgba(0,0,0,0.4); -webkit-box-shadow: 0px 0px 15px rgba(0,0,0,0.4); -o-box-shadow: 0px 0px 15px rgba(0,0,0,0.4);   }
.post-inner { background: url(./gfx/css/images/patern.png) repeat 0 0; padding: 18px 15px 20px 17px;  
    text-shadow: rgba(0,0,0,0.5) 0px 0px 3px; box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset; -moz-box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset; -webkit-box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset; -o-box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset;  
}
.post-inner header { padding-bottom: 16px;  }

.post-inner .img-holder { background: url(./gfx/css/images/widget-bg.png) repeat 0 0; padding: 2px; position: relative; display: block; margin-bottom: 14px;  }
.post-inner .img-holder img { display: block; }
.post-inner .img-holder a.btn-full-image { display: block; position: absolute; bottom: 11px; right: 5px;  width: 89px; height: 25px; color: <?=$HighlightColor?>; font-size: 10px; line-height: 25px; padding: 0 0px 0 13px; background: url(./gfx/css/images/btn-full-image.png) no-repeat 0 0; }
.post-inner .img-holder a.btn-full-image span { padding-right: 22px; background: url(./gfx/css/images/full-ico.png) no-repeat right 0; }
.post-inner .img-holder a.btn-full-image:hover { color: <?=$HighlightColor?>; text-decoration: none; }

.post-inner h2 { float: left; }
.post-inner p.tags { float: right; font-size: 13px; color: #e5e5e5; text-shadow: rgba(0,0,0,0.9) 0px 1px 0px;}
.post-inner p.tags a { color: #e5e5e5; background: url(./gfx/css/images/list-arr.png) no-repeat 0 4px; padding-left: 9px; margin-left: 15px; }
.post-inner p.tags a:hover { color: #fff; text-decoration: none; }

.post .meta { font-size: 9px; color: #bdbdbd; text-transform: uppercase; padding-bottom: 13px; }
.post .meta .right { width: 225px; }
.post .meta p.date { color: #838383; float: left; }
.post .meta p.date a { text-decoration: underline; color: #dbdbdb; }
.post .meta p.date a:hover { text-decoration: none; }
.post .meta a.comments { float: right; color: #bdbdbd; background: url(./gfx/css/images/comments-ico.png) no-repeat 0 8px; padding-left: 16px; }
.post .meta .rating-holder { float: left; }
.post .meta .rating-holder p { float: left; }
.post .meta .rating { float: left; background: url(./gfx/css/images/rating.png) no-repeat 0 0; width: 85px; height: 15px; margin-top: 4px; margin-left: 4px; position: relative;  }
.post .meta .rating span { background: url(./gfx/css/images/rating.png) no-repeat 0 bottom; height: 15px; display: block; position: absolute; top: 0; left: 0; }

.post .post-cnt p { padding-bottom: 10px;  }
.post a.more { color: <?=$HighlightColor?>; background: url(./gfx/css/images/list-arr.png) no-repeat 0 4px; padding-left: 9px; }
.post a.more:hover { color: <?=$HighlightColor?>; text-decoration: none; }

.sidebar { width: 222px; }
.sidebar .widget { background: url(./gfx/css/images/widget-bg.png) repeat 0 0; margin-bottom: 30px;  padding: 2px; box-shadow: 0px 0px 15px rgba(0,0,0,0.4); -moz-box-shadow: 0px 0px 15px rgba(0,0,0,0.4); -webkit-box-shadow: 0px 0px 15px rgba(0,0,0,0.4); -o-box-shadow: 0px 0px 15px rgba(0,0,0,0.4);  }
.sidebar .widget h3.widgettitle { background: url(./gfx/css/images/widget-title.png) no-repeat 0 0; height: 53px; line-height: 53px; padding-left: 27px; letter-spacing:1px; }
.sidebar .widget ul { list-style: none; list-style-position: outside; background: #171717; font-size: 14px; color: <?=$HighlightColor?>; text-shadow: rgba(0,0,0,0.5) 0px 0px 3px; box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset; -moz-box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset; -webkit-box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset; -o-box-shadow: 0px 0px 14px rgba(0,0,0,0.6) inset;  }
.sidebar .widget li { background: url(./gfx/css/images/border-list.png) repeat-x 0 0; }
.sidebar .widget p { background: url(./gfx/css/images/border-list.png) repeat-x 0 0; }
.sidebar .widget li.first { background: transparent }
.sidebar .widget li a { display: block; padding: 8px 65px 8px 43px; color: #fff; position: relative; text-shadow: rgba(0,0,0,0.9) 0px 0px 2px; background: url(./gfx/css/images/list-arr.png) no-repeat 30px 16px;}
.sidebar .widget li a strong { color: #b9b9b9; font-weight: normal; position: absolute; right: 0; top: 10px; width: 55px; font-size: 12px;  }
.sidebar .widget li a:hover { background-color: #2f2f2f; text-decoration: none; box-shadow: 0px 0px 14px rgba(0,0,0,0.4) inset; -moz-box-shadow: 0px 0px 14px rgba(0,0,0,0.4) inset; -webkit-box-shadow: 0px 0px 14px rgba(0,0,0,0.4) inset; -o-box-shadow: 0px 0px 14px rgba(0,0,0,0.4) inset;  }

.sidebar .socials-widget ul li a { margin-top: 0; position: relative; background: transparent; padding: 8px 65px 8px 57px; }
.sidebar .socials-widget ul li a span { background: url(./gfx/css/images/socials.png) no-repeat 0 0; width: 19px; height: 19px; position: absolute; top: 10px; left: 29px;  }
.sidebar .socials-widget a.facebook-ico span  { background-position: 0px 0; }
.sidebar .socials-widget a.twitter-ico span { background-position: -20px 0; }
.sidebar .socials-widget a.linkedin-ico span  { background-position: -39px 0; }
.sidebar .socials-widget a.you-tube-ico span { background-position: -60px 0; }
.sidebar .socials-widget a.rss-ico  span { background-position: -79px 0; }

.pagination ul { list-style: none; 
				 list-style-position: outside; 
				 line-height: 12px;  }
.pagination ul li { float: left;
					font-weight: bold; 
					font-size: 12px;
					background: url(./gfx/css/images/widget-bg.png) repeat 0 0;
					padding: 1px;
					margin-right: 5px; 
					border-radius: 6px; 
					-moz-border-radius: 6px; 
					-webkit-border-radius: 6px; 
					-o-border-radius: 6px; 
					box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-o-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
}
.pagination ul li a { color: #fff; 
					  padding: 9px 12px 8px 11px;
					  text-shadow: rgba(0,0,0,0.9) 1px 1px 0px; 
					  background: url(./gfx/css/images/patern.png) repeat 0 0; 
					  display: block; 
					  border-radius: 6px; 
					  -moz-border-radius: 6px; 
					  -webkit-border-radius: 6px; 
					  -o-border-radius: 6px; 
					  box-shadow: 0px 0px 8px rgba(0,0,0,0.6) inset; 
					  -moz-box-shadow: 0px 0px 8px rgba(0,0,0,0.6) inset; 
					  -webkit-box-shadow: 0px 0px 8px rgba(0,0,0,0.6) inset; 
					  -o-box-shadow: 0px 0px 8px rgba(0,0,0,0.6) inset; 
}
input[type=submit], button { background: url(./gfx/css/images/patern.png) repeat 0 0;
					text-shadow: rgba(0,0,0,0.9) 1px 1px 0px; 
					font-size: 12px;
					color:#FFFFFF; 
					font-family: arial, sans-serif; 
					border-radius: 6px; 
					-moz-border-radius: 6px; 
					-webkit-border-radius: 6px; 
					-o-border-radius: 6px; 
					box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-o-box-shadow: 0px 0px 4px rgba(0,0,0,0.4);
					 padding: 5px 6px 5px 5px;
					border-style: solid;
					border-width: 2px 2px 2px 2px;
					border-color: #4f4f4f;
					margin-top: 5px; 
					margin-bottom: 5px; 

}

input[type=submit]:hover, button:hover { background: url(./gfx/css/images/pagination-active.png) repeat 0 0;
					text-shadow: rgba(0,0,0,0.9) 1px 1px 0px; 
					font-size: 12px;
					color:<?=$HighlightColor?>; 
					font-family: arial, sans-serif; 
					border-radius: 6px; 
					-moz-border-radius: 6px; 
					-webkit-border-radius: 6px; 
					-o-border-radius: 6px; 
					box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.4); 
					-o-box-shadow: 0px 0px 4px rgba(0,0,0,0.4);
					 padding: 5px 6px 5px 5px;
					border-style: solid;
					border-width: 2px 2px 2px 2px;
					border-color: #4f4f4f;
					margin-top: 5px; 
					margin-bottom: 5px; 

}

.pagination ul li a:hover, 
.pagination ul li.active a {text-decoration: none; background: url(./gfx/css/images/pagination-active.png) repeat 0 0; color: <?=$HighlightColor?>;  }
.pagination ul li.laquo a ,
.pagination ul li.raquo a { padding: 12px 10px 9px 10px;  }
.pagination ul li.laquo a span { background: url(./gfx/css/images/laquo.png) no-repeat 0 0; width: 11px; height: 8px; display: block; }
.pagination ul li.raquo a span { background: url(./gfx/css/images/raquo.png) no-repeat 0 0; width: 11px; height: 8px; display: block; }
.pagination ul li.dots { background: transparent; padding-top: 18px; box-shadow: 0px 0px 0px ; -moz-box-shadow: 0px 0px 0px ; -webkit-box-shadow: 0px 0px 0px ; -o-box-shadow: 0px 0px 0px ; border-radius: 0px; -moz-border-radius: 0px; -webkit-border-radius: 0px; -o-border-radius: 0px; }

.footer { padding-bottom: 125px; }
.footer:after { content:''; display: block; width: 100%; clear: both; font-size: 0; line-height: 0; text-indent: -4000px; }

.footer-nav { float: left; }
.footer-nav ul { list-style: none; list-style-position: outside;  }
.footer-nav ul li { float: left; line-height: 11px;  border-left: 1px solid #616161; padding: 0 10px; }
.footer-nav ul li a { color: #989898; }
.footer-nav ul li a:hover { color: #fff; text-decoration: none; }
.footer-nav ul li.first { padding-left: 0; border: 0; }

.footer p.copy { float: right; color: #989898; font-size: 11px;  line-height: 11px; }
.footer p.copy span { padding: 0 10px; color: #616161; }
.footer p.copy a { color: #e0e0e0; text-decoration: underline; }
.footer p.copy a:hover { color: #fff; text-decoration: none; }
#tabellegh{

         border-width: 1px;
         border-spacing: 10px;
         border-style: solid;
         border-color: darkred;
         background: #171717;


         -webkit-border-radius: 10px;
         -khtml-border-radius: 10px;
         -moz-border-radius: 10px;

         border-radius: 10px;
         
}
.row_0 { border-left: 2px solid #858585; line-height: 2; }
.row_1 { border-left: 1px solid #858585; background: #1C1C1C; line-height: 2; }
   </style> 