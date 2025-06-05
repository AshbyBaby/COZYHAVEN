<?php
include("header.php");
include("../dboperation.php");
$obj=new dboperation();
  
 $query = " SELECT count(*) as bookingcount,c.city_name FROM tbl_homeowner h inner join tbl_city c on h.city_id=c.city_id   group by c.city_id";
$result = $obj->executequery($query);

 ?>  
   
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['home', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          { 
					echo "['".$row["city_name"]."', ".$row["bookingcount"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage ',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
     <div class="main-panel">
   
   <div class="container">
   <div class="row">
   <div class="col-lg-12 "> 
      <div>  
           <div class="logo">
              <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
                 </div> 
           <div style="width:900px; margin-top:6%">  
                <h3><align="center">Pie Chart showing the Home details Verification</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
          </div>
          </div>
          </div>
          </div>


          </div>
<?php
include("footer.php");
?>