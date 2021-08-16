// Set the date we're counting down to
// var countDownDate = new Date("AUG 29, 2021 15:37:25").getTime();
//Bulan -1
var bulan=10;
var tahun=2021;
var tanggal=12;

const d = new Date();
d.setFullYear(tahun, bulan-1, tanggal);
d.setHours(22);
d.setMinutes(00);
d.setSeconds(00);
var countDownDate = d.getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("timer").innerHTML = days + "." + hours + "."
  + minutes+"."+ seconds;
  var base_url=document.getElementById("base_url").value;  
  // document.getElementById("timer").innerHTML=url;
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    const body= document.getElementsByTagName("body");
    body[0].innerHTML='';

    $.ajax({
      // type:"POST",
      // data:'id_penjualan='+id,
      url:base_url,
      // url:'http://localhost/raport/page/style',
      // dataType :"json",
      success: function(hasil){
        console.log(hasil);
        $('body').html("<center><h1 style='margin-top:200px'>EXPIRED</h1></center>");
      }
    });
   
  }
}, 1000);
