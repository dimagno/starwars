<?php include "layout/header.php";
$nameEp = '/starwars/public/imgs/films/ep'.$filteredData['episode_id'].'.jpg';
?>
<div class="filmDetail bg-dark">
  <p class="text-white">  Detalhes do filme <?php echo  $filteredData['title'] ?></p>
  <div class="container">
          <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 module come-in">
             <div class="img3">
                <img src="<?php echo $nameEp ?>" lass='<?php echo $filteredData['episode_id'];?>' alt="img1">
             </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 module come-in">
             <div class="con1">
                <span>DESCRIPTION</span>
                <p class=""><?php echo $filteredData['description'] ?></p>
             
                <div class="con1">
                  <span> DIRECTOR:</span>
                  <p><?php echo $filteredData['director']?></p>
                </div>
                
                <div class="con1">
                  <span> PRODUCER:</span>
                  <p><?php echo $filteredData['producer']?></p>
                </div>
                
                <div class="con1">
                  <span> CHARACTERES:</span>
                  <p><?php echo $filteredData['characters']?></p>
                </div>
                <div class="con1">
                  <span> RELEASE DATE:</span>
                  <p><?php echo $filteredData['release_date'] .' ('. $filteredData['filmAge'] . '.)' ?></p>
                </div>



             </div>
          </div>          
        </div>
      </div>
</div>

<?php include "layout/footer.php" ?>
<style>

.con1 span{
	font-weight:400;
	color:white;
	font-size:12px;
	text-transform:uppercase;
	padding-bottom:5px;
	display:block;
  font-family: sans-serif;
  color:rgb(172, 175, 37);
}

.con1 h2{
	font-weight:400;
	color:#1a1a1a;
	font-size:37px;
	line-height:38px;
	margin:0;
	background:url(../images/line.png) no-repeat left bottom;
	padding-bottom:10px;
	margin-bottom:25px;
}
.con1{
	padding-top:0px;
}

.con1  p{
	font-weight:400;
	color:#8a8a8a;
	font-size:18px;
  font-family: sans-serif;
	line-height:26px;
}

.tgimg {
  float: left;
  min-width: 55px;
  padding-top: 8px;
  width: 10%;
}
.tgcon{
	float:left;
	width:85%;
}
.tgcon span{
	display:block;
	font-weight:400;
	color:yellow;
	font-size:18px;
}
.tgcon p{
	font-weight:400;
	color:#8a8a8a;
	font-size:13px;
	line-height:26px;
}
.tags{
	padding-top:60px;
}
.tg{
	padding-bottom:45px;
}
.img3 img{
	width:90%;
	    height: 89vh;
	border-radius:6px;
	border:#e2e7ec solid 1px;
	-webkit-box-shadow: 7px 6px 34px -9px rgba(144,155,165,0.48);
-moz-box-shadow: 7px 6px 34px -9px rgba(144,155,165,0.48);
box-shadow: 7px 6px 34px -9px rgba(144,155,165,0.48);
}
/* End Grap chart */
</style>
