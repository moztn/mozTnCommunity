<?php
session_start();
include("../../scripts/identifiants.php");
$requete2 = mysql_query('SELECT * FROM event')
				or die (mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel='stylesheet' type='text/css' href='cupertino/theme.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='../jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='../fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {
				
		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [						
			
			<?php 		
			if (mysql_num_rows($requete2) > 0)
			{
			while ($data2 = mysql_fetch_assoc($requete2))
			{
				?>
				{
					title: '<?php echo $data2['nomeve']?>',
					start: new Date(parseInt("<?php echo date('Y',$data2['datedeb']) ?>"), parseInt("<?php echo date('n',$data2['datedeb']) ?>")-1, parseInt("<?php echo date('j',$data2['datedeb']) ?>")),
					end: new Date(parseInt("<?php echo date('Y',$data2['datefin']) ?>"), parseInt("<?php echo date('n',$data2['datefin']) ?>")-1, parseInt("<?php echo date('j',$data2['datefin']) ?>")),
					url: '../../events/detailsevent.php?e=<?php echo $data2['id']?>',
				},
				<?php 
			}
			}
			?>
			
			]
		});
		
	});

</script>
<style type='text/css'>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 13px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>
<div id='calendar'></div>
</body>
</html>
