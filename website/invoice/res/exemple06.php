<link href="./res/style.css" type="script/css" rel="stylesheet">
<style type="text/css">
/** Reset to default **/
	body,div,dl,dt,dd,ul,ol,li,h3,h4,h5,h6,pre,form,fieldset,input,p,blockquote,th,td,header { margin: 0; padding: 0; }

	a {
	color: #FAC846;
	}

	table {	border-collapse: collapse; border-spacing: 0; }

	fieldset,img { border: 0; }

	address,caption,cite,code,dfn,em,strong,th,var { font-style: normal; font-weight: normal; }

	ol,ul { list-style: none; text-decoration: none; }

	li a { text-decoration: none; }

	caption,th { text-align: left; }

	h1,h2,h3,h4,h5,h6 { padding: 0px; }
//* General stuff, and containers *//
.highlight, .button, .button.secondary:hover, #logo h1 span, .top-bar ul > li.has-dropdown .dropdown li a:hover, .footer_social li a, .tp-bullets.simplebullets .bullet.selected, .button.dropdown.split > span, .button.dropdown.split:hover, .button.primary, div.alert-box, .label, .panel.callout, .user-control .notification, .login-modal .close-reveal-modal, .tp-leftarrow:hover, .tp-rightarrow:hover, a.prev:hover, a.next:hover, .content_top, .service-icon img, .service:hover .service-sub, .hover-links a.view-item, .hover-links a.view-image, .content_bottom, div.progress .meter, .accordion-title.active, .ol-type1 > li:before, ul.pagination li.current a, .scrollup:hover, .toggle-view li:hover span, .service-block-icon, .left_pagination:hover, .all_pagination:hover, .right_pagination:hover, .post-date-type1 .post-date-day, .recent-post .post-date-type1 .post-date-day, .option-set li a.selected, .tabs dd.active a, .tabs li.active a, .tabs.vertical dd.active a, .tabs.vertical li.active a, .top-bar ul li.has-dropdown.moved .dropdown li a:hover, .jta-tweet-user-full-name-link, ul.side-nav li.active a{ background-color: #55bb11}

/* -- Background Color with !importratant -- */

.arrow a:hover, .pricing_plan1:hover .plan_price, .pricing_plan2:hover .plan_price, .pricing_plan3:hover .plan_price, .pricing_plan4:hover .plan_price, .pricing-active .plan_price, .camera_wrap .camera_pag .camera_pag_ul li.cameracurrent > span { background-color: #55bb11 !important;}

/* ======================== Text Color ===================== */

.color, h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, a, a:focus, .top_header a:hover, .top-bar ul > li a.active, .caption.big_color, .service:hover .service-main, .work-item-content h5, .footer a:hover, .footer_bottom a:hover, .type1 a:hover, .type1 li:hover:before, .type2 a:hover, .type2 li:hover:before, .type3 a:hover, .type3 li:hover:before, .type4 a:hover, .type4 li:hover:before, .toggle-view li:hover h2, .article_meta a:hover, .article_meta_type1 a:hover, .article_meta_type2 a:hover, .sidebar-widget a:hover, dl.tabs dd a:hover, dl.tabs dd a:focus, ul.breadcrumbs li.current a, .member-social a:hover, blockquote cite {color : #FAC846}

/* ======================== Border Color ===================== */

.maincontent h3, .top-bar ul > li a.active, .top-bar ul > li:hover a,.work-item:hover, .post-item:hover, .footer h4, ul.tabs-content, .portfolio-item:hover, blockquote{border-color:#FAC846}

*::selection      {background-color: #55bb11 ;}
*::-moz-selection {background-color: #55bb11 ;}
body{
background-color: #E5E5E5;
}
h3{
font-size: 20px;
color: #FAC846;
}

p{
font-size: 10px;
color: #A9A9A9;
}
#default_container{
background-color: #E5E5E5;
margin-left: -20px;
margin-right: -20px;
margin-top: -19px;
}
#container_left{
float: left;
width: 560px;
background-color: #E5E5E5;
padding-left: 40px;
}
#container_right{
float: right;
width: 400px;
background-color: #E5E5E5;
}
#greenpart{
margin-top: 30px;
height: 100px;
width: 200px;
padding-top: 40px;
padding-bottom: 40px;
padding-right: 40px;
margin-left: -60px;
padding-left: 20px;
background-color: #FAC846;
color: white;
font-size: 15px;
}
#table table{
	margin-left:40px;
	margin-top: 60px;
	width: 92%;
	padding-left: 40px;
}

#table th {
  padding-bottom: 10px;
 	padding-left: 3px;
}
tr:nth-child(even) {
	border-top: 3px solid #D8D8D8;
	border-bottom: 3px solid #D8D8D8;
	background-color: #DDDDDD;

}
#table td{
	padding-left: 3px;
	padding-top: 5px;
	padding-right: 3px;
	padding-bottom: 40px;
}
tr:nth-last-child(1) {
	background-color: #CBC9CA;
	padding-bottom: 2px;
}
#thanksdiv{
	width: 318px;
	margin: 80px auto 0;
}

</style>

<?php

$inv = new Invoice($invoiceid);
$row = $inv->GetItemsForInvoice();
$user = new UserData($inv->getUserId());
?>

<page backcolor="#E5E5E5">
<nobreak  >
<div id="default_container">
	<div id="top_container">
	<table>
    <tr>
	<th width="40%">
		<div id="container_left">

		<br />
		<br />
		<br />

		<br />
		<h3 style="margin-top: 30px;" color=""> FACTUUR </h3>
		<br />
		<br />
		<b style="margin-top: 4px;"> CLIENT: </b><i style="color: #B9B9B9;"><?php echo $user->getFirstName() . " " . $user->getLastName(); ?></i> <br />
		<b style="margin-top: 4px;"> ADRES: </b><i style="color: #B9B9B9;"><?php echo $user->getStreet() . " " .$user->getNumber() . ", " . $user->getZip(); ?></i> <br />
		<b style="margin-top: 4px;"> FACTUUR #: </b><i style="color: #B9B9B9;"><?php echo $invoiceid ; ?></i> <br />
		<b style="margin-top: 4px;"> AANMAAK DATUM: </b><i style="color: #B9B9B9;"><?php echo date("d-m-Y", $inv->getStartDate()); ?></i> <br />
		<b style="margin-top: 4px;"> VERVAL DATUM: </b><i style="color: #B9B9B9;"><?php echo date("d-m-Y", $inv->getEndDate()); ?></i>
		</div>
	</th>
	<th width="200px" style="margin-left:-20px;">
		<div id="container_right">
		<br />
		<h1><b>Vlam<span>beer</span></b></h1>
		<div style="margin-right: 10px; margin-top: 5px;" align="right" id="greenpart">
	<i style="color: #000000;">
		Vlambeer<br />
		Sluisakker 24<br />
		Raamsdonk, 4944BW<br />
		Nederland<br />
		Contact@Vlambeer.nl<br /><br />
		BTW-nummer: NL226260471B01<br />
	</i>
		</div>
		</div>
	</th>
	</tr>
	</table>
	</div>


	<div id="table" >
	<table style="margin-left: 0px; ">
<tr>
   <th width="100px;"><B>Afbeelding</B></th>
  <th width="120px;"><B>SERVICE</B></th>
  <th width="260px;"><B>OMSCHRIJVING</B></th>
  <th width="75px;"><B>PRIJS</B></th>
 <th width="50px;"><B>x</B></th>
  <th width="75px;"><B>TOTAAL</B></th>
</tr>
<?php
$count = count($row);
$i= 0;
$bedrag = 0;

//while loop om het bedrag te bepalen
while($i < $count)
{

?>

<tr style="	border-top: 3px solid #D8D8D8;
	border-bottom: 3px solid #D8D8D8;
	<?php if ($i % 2 == 0){ echo"
	background-color: #DDDDDD; ";}?>">

  <td><b  style="color: #FAC846;"><?php echo "<img style='height:100px; width:70px;' src='".$row[$i]['item_image']."'>"; ?></b></td>

  <td><b  style="color: #FAC846;"><?php echo $row[$i]['item_name']; ?></b></td>

  <td>
	<i style=" font-size: 12px; color: #A7A7A7">
	<?php echo $row[$i]['item_description']; ?>
	</i>
	</td>

	<td><?php echo "&#8364; " . number_format($row[$i]['item_price'], 2, ',', ' '); ?></td>

	<td><?php echo  "x" . $row[$i]['count']; ?></td>
  <td>
	<?php
	$price = $row[$i]['item_price'] * $row[$i]['count'];
	echo "&#8364; " . number_format($price, 2, ',', ' ');
	?>
	</td>

</tr>
<?php
$bedrag += $row[$i]['item_price'] * $row[$i]['count'];
$i++;
}
$btw = $bedrag / 100 * 21;
$btwinc = $bedrag * 1.21;
?>


<tr style="padding-bottom: 2px;">
<td></td>
<td></td>
<td></td>

<td>
	<a style="color: #808080; margin-top: 3px; text-decoration: none;">SUBTOTAL<br /></a>
</td>

<td></td>
<td>
	<b style=" margin-top: 3px; text-decoration: none;">€ <?php echo number_format($bedrag, 2, ',', ' '); ?></b>
</td>
</tr>

<tr style="padding-bottom: 2px;">
<td></td>
<td></td>
<td></td>

<td>
	<a style="color: #808080; margin-top: -40px; text-decoration: none;">BTW (21%)<br /></a>
</td>

<td></td>
<td>
	<b style=" margin-top: -40px; text-decoration: none;">€ <?php echo number_format($btw, 2, ',', ' '); ?></b>
</td>
</tr>



<tr style="padding-bottom: 2px;">
<td></td>
<td></td>
<td></td>

<td>
	<a style="color: #808080; margin-top: -40px; text-decoration: none;">Totaal inc. BTW<br /></a>
</td>

<td></td>
<td>
	<b style=" margin-top: -40px; text-decoration: none;">€ <?php echo number_format($btwinc, 2, ',', ' '); ?></b>
</td>
</tr>


</table>
</div>
	<div style="	margin-left: 230px;">
			<h3 style="text-align: centre; margin-top: 40px;"> Thank you for your business </h3>
	</div>

</div>
</nobreak>
</page>
