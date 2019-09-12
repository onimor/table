
<html lang="ru">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script></script>
<style>

 table{
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
    /* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 1000px),
(min-device-width: 768px) and (max-device-width: 1000px)  {
    
    
th{
    content: "";
}
	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		height: 3%;
	    font-size: 20px;
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 40%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	
	td:nth-of-type(1):before { content: "Номер"; }
	td:nth-of-type(2):before { content: "Дата создания"; }
	td:nth-of-type(3):before { content: "Тара"; }
	td:nth-of-type(4):before { content: "Брутто"; }
	td:nth-of-type(5):before { content: "Нетто"; }
	td:nth-of-type(6):before { content: "ТС"; }
	td:nth-of-type(7):before { content: "Прицеп"; }
	td:nth-of-type(8):before { content: "Товар"; }

}
    </style>
</head>
<body>

    <table role="table">
  <thead role="rowgroup">
    <tr role="row">
      <th role="columnheader">Номер</th>
      <th role="columnheader">Дата создания</th>
      <th role="columnheader">Тара</th>
      <th role="columnheader">Брутто</th>
      <th role="columnheader">Нетто</th>
      <th role="columnheader">ТС</th>
      <th role="columnheader">Прицеп</th>
      <th role="columnheader">Товар</th>
    </tr>
    
    
  </thead>
      <tr>
      	 <?php
  	  $conn = pg_connect("host=postgresql.automat97.myjino.ru port=5432 dbname=automat97_test user=automat97_test password=1234");
	  $sql = "SELECT \"Номер\", \"Дата создания\", \"Тара\", \"Брутто\", \"Нетто\", \"ТС\", \"Прицеп\", \"Товар\" FROM \"glav\"";
	  $result = pg_query($conn,$sql);

	  $num_rows = pg_num_rows($result); 

	  while ($row = pg_fetch_array($result)) {  ?>
			<td><?=$row[0]?></td>
			<td><?=$row[1]?></td>
		    <td><?=$row[2]?></td>
			<td><?=$row[3]?></td>
		    <td><?=$row[4]?></td>
		    <td><?=$row[5]?></td>
			<td><?=$row[6]?></td>
		    <td><?=$row[7]?></td>
      </tr>

      <?php } ?>

</table>
    
</body>
</html>




