<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['escritorio']==1 or $_SESSION['cliente_ofg']==1 )
{
  require_once "../modelos/Consultas.php";

  //Total Sran
  //Total Wom
  // $consulta = new Consultas();
  // $rsptac = $consulta->sumsran();
  // $regc=$rsptac->fetch_object();
  // $totals=$regc->total;




  // $consulta = new Consultas();
  // $rsptac = $consulta->suma700aprobados($_SESSION["nombre"]);
  // $regc=$rsptac->fetch_object();
  // $totalap=$regc->total;

  // $consulta = new Consultas();
  // $rsptac = $consulta->suma700procceso($_SESSION["nombre"]);
  // $regc=$rsptac->fetch_object();
  // $totalpr=$regc->total;



?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <?php require 'navegador2600.php'; ?>
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
              
                    <!-- <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="box box-primary">
                              <div class="box-header with-border">
                              Estado de Estaciones Base
                              </div>
                              <div class="box-body">
                                <canvas id="compras" width="400" height="300"></canvas>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="box box-primary">
                              <div class="box-header with-border">
                                Proceso de Estaciones Base
                              </div>
                              <div class="box-body">
                                <canvas id="ventas" width="400" height="300"></canvas>
                              </div>
                          </div>
                        </div>
                    </div> -->

                    <div id="MyI0" class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
                              <h2 class="text-primary">CRONOGRAMA DE ACTIVIDADES DIARIAS</h2>
                          </div>


                    <div class="panel panel-default" id="listadoregistros">
                        <table id="tbllistado" class="row-border" cellspacing="2" width="98%">
                          <thead>
                            <th>Fecha</th>
                            <th>Site</th>
                            <th>Banda</th>
                            <th>Actividad</th>
                            <th>CHG</th>
                            <th>Lider</th>
                            <th>Telefono</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Fecha</th>
                            <th>Site</th>
                            <th>Banda</th>
                            <th>Actividad</th>
                            <th>CHG</th>
                            <th>Lider</th>
                            <th>Telefono</th>
                          </tfoot>
                        </table>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>


<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script>
<script type="text/javascript" src="scripts/inicio2600.js"></script>
<script type="text/javascript" src="scripts/cronograma.js"></script>
<script type="text/javascript">
// var ctx = document.getElementById("compras").getContext('2d');
// var compras = new Chart(ctx, {
//   type: 'bar',
//     data: {
//         labels: [<?php echo $fechasc?>],
      
//         datasets: [{

          
//             label: 'Sitios de los últimos 10 días',
//             data: [<?php echo $totalesc?>] ,
//             backgroundColor: [
//               'rgb(66, 134,244)',
//               'rgb(74,135,72)',
//               'rgb(222, 101, 45)',
//               'rgb(218, 149, 49)',
//               'rgb(45, 208, 222)',
//               'rgb(133, 45, 222)',
//             ],
//             borderColor: [
//               'rgb(66, 134,244)',
//               'rgb(74,135,72)',
//               'rgb(222, 101, 45)',
//               'rgb(218, 149, 49)',
//               'rgb(45, 208, 222)',
//               'rgb(133, 45, 222)',
//             ],
//             borderWidth: 1
//         }]
//     },
    
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }],
//             "xAxes":[]
//         }
//     },
     

// }); 

// var ctx = document.getElementById("ventas").getContext('2d');
// var ventas = new Chart(ctx, {
//   type: 'pie',
//     data: {
//        position:'right',
//        display: true,
//         labels: [5,5,5,5,5],
//         datasets: [{
//             label: 'Actividades de los últimos 10 días',
//             data: [5,5,5,5,5] ,
//             backgroundColor: [
//               'rgb(66, 134,244)',
//               'rgb(74,135,72)',
//               'rgb(222, 101, 45)',
//               'rgb(218, 149, 49)',
//               'rgb(45, 208, 222)',
//               'rgb(133, 45, 222)',
//               'rgb(66, 134,244)',
//               'rgb(74,135,72)',
//               'rgb(222, 101, 45)',
//             ],
//             borderColor: [
//               'rgb(66, 134,244)',
//               'rgb(74,135,72)',
//               'rgb(222, 101, 45)',
//               'rgb(218, 149, 49)',
//               'rgb(45, 208, 222)',
//               'rgb(133, 45, 222)',
//               'rgb(66, 134,244)',
//               'rgb(74,135,72)',
//               'rgb(222, 101, 45)',
//             ],
//             borderWidth: 1,
//             borderColor:'#777',
//             hoverBorderWidth:3,
//             hoverBorderColor:'#000'
//         }]
//     },
    
//       options: {

        
//         // scales: {
//         //     yAxes: [{
//         //         ticks: {
//         //             beginAtZero:true
//         //         }
//         //     }],
//         //     "xAxes":[]
//         animation:{
//             animeteScale:true 
//         },

//         title:{
//           display:true,
//           text:'Trabajos Realizados',
//           fontcolor:"#333",
//           fontSize:20,
//           padding:20,

//         },

//         legend: {
//          display:true,
//          position:'right',
//          labels:{
//             fontColor:'#000'
//          }
//        }
//     },
//         layout:{
//           padding:{
//             left:50,
//             right:0,
//             bottom:0,
//             top:0
//           }
//       },
//       tooltips:{
//         enabled:true
//       }

   
// }); 


</script>


</script>


<?php 
}
ob_end_flush();
?>


