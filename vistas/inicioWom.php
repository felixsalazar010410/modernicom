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

if ($_SESSION['escritorio']==1 or $_SESSION['cliente_wom']==1 )
{
  require_once "../modelos/Consultas.php";

  //Total Sran
  //Total Wom
  $consulta = new Consultas();
  $rsptac = $consulta->sumsran();
  $regc=$rsptac->fetch_object();
  $totals=$regc->total;

   //En procceso Wom
   $consulta = new Consultas();
   $rsptac = $consulta->sumsranp();
   $regp=$rsptac->fetch_object();
   $totalp=$regp->total;

  //Total Pabis

  // $consulta = new Consultas();
  // $rsptac = $consulta->sumpabis();
  // $regc=$rsptac->fetch_object();
  // $totalp=$regc->total;


  //Total 5G
  $consulta = new Consultas();
  $rsptac = $consulta->sum5g();
  $regc=$rsptac->fetch_object();
  $total5=$regc->total;

  //Total 700 LTE

  $consulta = new Consultas();
  $rsptac = $consulta->sum700();
  $regc=$rsptac->fetch_object();
  $total7=$regc->total;



  // $rsptav = $consulta->totalventahoy();
  // $regv=$rsptav->fetch_object();
  // $totalv=$regv->site;

  //Datos para mostrar el gráfico de barras de las compras
  // $sites10 = $consulta->sitesultimos_10dias();
  // $fechasc='';
  // $totalesc='';
  // while ($regfechac= $sites10->fetch_object()) {
  //   $fechasc=$fechasc.'"'.$regfechac->fecha .'",';
  //   $totalesc=$totalesc.$regfechac->total .','; 
  // }

  // //Quitamos la última coma
  // $fechasc=substr($fechasc, 0, -1);
  // $totalesc=substr($totalesc, 0, -1);

   //Datos para mostrar el gráfico de barras de las ventas
  $ventas12 = $consulta->ventasultimos_12meses();
  $fechasv='';
  $totalesv='';
  while ($regfechav= $ventas12->fetch_object()) {
    $fechasv=$fechasv.'"'.$regfechav->fecha .'",';
    $totalesv=$totalesv.$regfechav->total .','; 
  }

  //Quitamos la última coma
  $fechasv=substr($fechasv, 0, -1);
  $totalesv=substr($totalesv, 0, -1);

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <?php require 'navegadorcat.php'; ?>
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">


                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="small-box bg-green">
                              <div class="inner">
                                <h style="font-size:17px;">
                                <H3>APROBADOS</H3></br>
                                <div class="icon">
                             <i class="fa fa-check"></i>
                           </div>

                           <h4 style="font-size:50px;">
                                  <strong>Total:  <?php echo $totals; ?></strong>
                                </h4>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="siteswom.php" class="small-box-footer">Info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="small-box bg-yellow">
                          <div class="inner">
                                <h4 style="font-size:17px;">
                                <H3>EN PROCESO</H3></br>
                                <div class="icon">
                             <i class="fa fa-spinner"></i>
                           </div>
                           <h4 style="font-size:50px;">
                           <strong>Total:  <?php echo $totalp; ?></strong>
                                </h4>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="siteswom.php" class="small-box-footer">Info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
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
<script type="text/javascript" src="scripts/inicioCat.js"></script> 
<script type="text/javascript">
var ctx = document.getElementById("compras").getContext('2d');
var compras = new Chart(ctx, {
  type: 'bar',
    data: {
        labels: [<?php echo $fechasc?>],
      
        datasets: [{

          
            label: 'Sitios de los últimos 10 días',
            data: [<?php echo $totalesc?>] ,
            backgroundColor: [
              'rgb(66, 134,244)',
              'rgb(74,135,72)',
              'rgb(222, 101, 45)',
              'rgb(218, 149, 49)',
              'rgb(45, 208, 222)',
              'rgb(133, 45, 222)',
            ],
            borderColor: [
              'rgb(66, 134,244)',
              'rgb(74,135,72)',
              'rgb(222, 101, 45)',
              'rgb(218, 149, 49)',
              'rgb(45, 208, 222)',
              'rgb(133, 45, 222)',
            ],
            borderWidth: 1
        }]
    },
    
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            "xAxes":[]
        }
    },
     

}); 

var ctx = document.getElementById("ventas").getContext('2d');
var ventas = new Chart(ctx, {
  type: 'pie',
    data: {
       position:'right',
       display: true,
        labels: [5,5,5,5,5],
        datasets: [{
            label: 'Actividades de los últimos 10 días',
            data: [5,5,5,5,5] ,
            backgroundColor: [
              'rgb(66, 134,244)',
              'rgb(74,135,72)',
              'rgb(222, 101, 45)',
              'rgb(218, 149, 49)',
              'rgb(45, 208, 222)',
              'rgb(133, 45, 222)',
              'rgb(66, 134,244)',
              'rgb(74,135,72)',
              'rgb(222, 101, 45)',
            ],
            borderColor: [
              'rgb(66, 134,244)',
              'rgb(74,135,72)',
              'rgb(222, 101, 45)',
              'rgb(218, 149, 49)',
              'rgb(45, 208, 222)',
              'rgb(133, 45, 222)',
              'rgb(66, 134,244)',
              'rgb(74,135,72)',
              'rgb(222, 101, 45)',
            ],
            borderWidth: 1,
            borderColor:'#777',
            hoverBorderWidth:3,
            hoverBorderColor:'#000'
        }]
    },
    
      options: {

        
        // scales: {
        //     yAxes: [{
        //         ticks: {
        //             beginAtZero:true
        //         }
        //     }],
        //     "xAxes":[]
        animation:{
            animeteScale:true 
        },

        title:{
          display:true,
          text:'Trabajos Realizados',
          fontcolor:"#333",
          fontSize:20,
          padding:20,

        },

        legend: {
         display:true,
         position:'right',
         labels:{
            fontColor:'#000'
         }
       }
    },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
      },
      tooltips:{
        enabled:true
      }

   
}); 


</script>


</script>


<?php 
}
ob_end_flush();
?>


