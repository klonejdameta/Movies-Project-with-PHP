<?php include "../includes/session.php"; ?>
<?php
   include 'config.php';
       if (!$connect) {
           echo "Error".mysqli_connect_errno($connect);
       } 
   $query_afisho = "SELECT * FROM movies WHERE image LIKE '%gomorra%' ORDER BY id DESC";
   $query_afisho_result = mysqli_query($connect,$query_afisho);
       if (!$query_afisho_result) {
           echo "Error";
       }
   $check_num_rows = mysqli_num_rows($query_afisho_result);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Index</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
      <script type="text/javascript" src="../js/scripts.js"></script>
      <script type="text/javascript" src="../js/fontawesome.js"></script>
      <link rel="stylesheet" href="../css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="../css/YouTubePopUp.css">
      <script type="text/javascript" src="../js/YouTubePopUp.jquery.js"></script>
      <script>
         var header = document.getElementById("myDIV");
         var btns = header.getElementsByClassName("btnnn");
         for (var i = 0; i < btns.length; i++) {
         btns[i].addEventListener("click", function() {
         var current = document.getElementsByClassName("active");
         current[0].className = current[0].className.replace(" active", "");
         this.className += " active";
         });
      </script>
      <script type="text/javascript">
         jQuery(function(){
         jQuery("a.bla-1").YouTubePopUp();
         jQuery("a.bla-2").YouTubePopUp( { autoplay: 0 } );
         });
      </script>
      <style>
         table {
         border-collapse: collapse;
         box-shadow: 0 0 10px 1px mediumseagreen;
         float: left;
         } 
         table.a {
         table-layout: auto;
         width: 160px; 
         }
         .over_image {
         position: relative;
         width: 50%;
         }
         .over_image:hover .imbd {
         opacity: 1;
         }
         .imbd {
         position: absolute;
         top: -6%;
         bottom:0;
         left: 0;
         right: 0;
         height: 10%;
         width: 200%;
         opacity: 0;
         transition: .5s ease;
         background-color: darkslategray;
         }
         .imbd_transform {
         color: #F3C313;
         font-size: 26px;
         font-weight: bolder;
         position: absolute;
         top: 55%;
         left: 50%;
         -webkit-transform: translate(-50%, -50%);
         -ms-transform: translate(-50%, -50%);
         transform: translate(-50%, -50%);
         text-align: center;
         }
      </style>
   </head>
   <body>
      <?php include "../includes/navbar.php"; ?>
      <br>
      <div class="content">
         <div>
            <?php
               while ($row = mysqli_fetch_array($query_afisho_result)) {  
               ?>
            <table class="a gfg">
               <tr>
                  <td class="geeks">
                     <div class="over_image">
                        <video class="zoom" width="214" height="270" poster="<?php echo '../poster/'.$row['image']; ?>" onclick="window.open('<?php echo 'Filma/'.$row['video']; ?>')"></video>
                        <div class="imbd">
                           <div class="imbd_transform">
                              <p><img src="IMDB_Logo_2016.svg" width="45" height="20"> <?php echo $row["IMBd"]; ?></p>
                           </div>
                        </div>
                     </div>
                  </td>
               </tr>
               <td class="geeks">
                  <table class="a">
                     <tr><b style="font-size:17px"><?php echo $row["image_text"]; ?></b><br><b>Gomorra</b> (<?php echo $row['year'];?>)
                  </table>
                  <table>
                     <tr>
                        <td class="geeks">
                           <div class="dropdown">
                              <button class="dropbtn"><a href="<?php echo 'Filma/'.$row['video']; ?>" target="_blank"><i class="far fa-eye"></i> Watch</a></button>
                           </div>
                        </td>
                        <td>
                           <div class="dropdown">
                              <button class="dropbtn"><a class="bla-1" href="<?php echo $row['link'];?>"><i style="color: red" class="fab fa-youtube"></i>Trailer</a>
                              </button>
                           </div>
                        </td>
                        <td>
                           <div class="dropdown">
                              <button class="dropbtn" onClick='<?php echo $row['info'];?>'><i style="color: green" class="fas fa-info-circle"></i><a>Info</a>
                              </button>
                           </div>
                        </td>
                     </tr>
                  </table>
               </td>
            </table>
            <?php } ?>
         </div>
      </div>
      <br>
      <table>
         <tr>
            <td>
               <p style="text-align: center; font-weight: bolder">Sezoni <button class="page btnnn active"><a href="gomorra.php">1</a></button>
                  <button class="page btnnn"><a href="la_serie2.php">2</a></button>
                  <button class="page btnnn"><a href="la_serie3.php">3</a></button>
                  <button class="page btnnn"><a href="la_serie4.php">4</a></button>
               </p>
            </td>
         </tr>
         <tr>
            <td>
               <b>&copy 
               <?php
                  $copyYear = 2019; 
                  $curYear = date('d/m/Y');
                    echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
                      ?> Copyright, Made with <i style="color:red" class="fas fa-heart"></i> from <a style="text-decoration: none; color: blue" href="index.php">Movies Online</a></b>
            </td>
         </tr>
      </table>
   </body>
</html>