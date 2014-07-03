<?php
$enlace =  mysql_connect('localhost', 'guiles', 'guiles');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
//echo 'Conectado satisfactoriamente';
//mysql_close($enlace);
//select a database to work with
$selected = mysql_select_db("organization",$enlace)
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT * FROM persona");
//fetch tha data from the database
/*echo "<pre>";
while ($row = mysql_fetch_array($result)) {
   print_r($row);
}  */
?>
<html>
<head>
<script>
function handle(x){
	console.debug(x.id);
	var id = x.id;
	console.debug(x.childNodes);
	//Creo el Ajax Request
	xmlhttp = new XMLHttpRequest();


	 xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 ) {
           if(xmlhttp.status == 200){
               //document.getElementById(id).innerHTML = xmlhttp.responseText;
               var el = document.getElementById(id);
               console.debug(el);
               var texto = xmlhttp.responseText;
               var el_text = document.createTextNode(texto);

               el.appendChild(el_text);
               console.debug(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
              alert('There was an error 400')
           }
           else {
               alert('something else other than 200 was returned')
           }
        }
    }

    xmlhttp.open("GET", "get_contacts.php", true);
    xmlhttp.send();
}
</script>
</head>

<table>
<tr><td></td><td>Nombre</td><td>Org.</td></tr>
<?while ($row = mysql_fetch_array($result)):?>
<tr onClick="handle(this)" id=<?=$row['persona_id']?>>
	<td><?=$row['persona_id']?></td>
	<td><?=$row['nombre']?></td>
	<td><?=$row['contacto']?></td>
</tr>
<div id=<?=$row['persona_id']?>></div>
<?endwhile;?> 
</table>

</html>