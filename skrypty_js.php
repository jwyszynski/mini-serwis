<?php require_once('fun.php'); ?>

<?php open(); ?>
<?php nav(); ?>
<br />

<div class="oddzielony">
<script type="text/javascript">
  function przelicz() {
  x = document.getElementById("opcja").value;
  y = document.getElementById('wartosc').value;
  //document.write(x);

  switch (x) {
    case "GB":
        y=y*8589934592;
        break;
    case "MB":
        y=y*8388608;
        break;
    case "kB":
        y=y*8192;
        break;
    case "B":
        y=y*8;
        break;
}
document.getElementById("odp").innerHTML="bajtów: "+y;
}
</script>
<h2>Przeliczanie Bajtów na bity</h2><br />
Wprowadź wartość:<br />
<input type="text" name="" id="wartosc" value="" /><br />
<br />
Wybierz jednostkę:<br />
<select id="opcja">
  <option value="GB">GB</option>
  <option value="MB">MB</option>
  <option value="kB">kB</option>
  <option value="B">B</option>
</select>
<br />
<button onclick="przelicz()">Przelicz</button>

<div id="odp"></div>
</div>





	<br /><br />
  <br /><br />
  <br /><br />
			<div id="w1">
<script type="text/javascript">
  for (var x = 1 - 1 ; x < 6; x++) {
    for (y=x ; y > 0; y--) {
    document.write("#");
  }document.write("<br />");
  }
</script>
</div> 


<div id="w2">

<script type="text/javascript">
  document.write("<br />-----<br />");

  document.write("JavaScript<br />");
  document.write("\"Życie jest piękne\"<br />");
  document.write(15+"<br />");
  document.write(100.4+"<br />");
  document.write(-26+"<br />");
  document.write(0.1e2+"<br />");
  document.write(0xAA+"<br />");
  document.write(-0xCD   );

  document.write("<br />-----<br />");

  var bitowa1 = 8;
  var bitowa2 = 10;
  document.write("bitowa_1 = "+bitowa1+" - <b>1000</b><br />");
  document.write("bitowa_2 = "+bitowa2+" - <b>1010</b><br />");
  document.write("Suma bitowa = "+(bitowa1|bitowa2)+" - <b>1010</b><br />");
  document.write("Iloczyn bitowy = "+(bitowa1&bitowa2)+" - <b>1000</b><br />");
  document.write("Różnica bitowa = "+(bitowa1^bitowa2)+" - <b>0010</b><br />");
</script>
<script type="text/javascript">
  document.write("-----<br />");

  var liczba1 = 10;
  var liczba2 = 5;
  document.write("Liczba_1 = "+liczba1+"<br />");
  document.write("Liczba_2 = "+liczba2+"<br />");
  document.write("Suma = ");
  document.write(liczba1+liczba2);
  document.write("<br />");
  document.write("Różnica = "+(liczba1-liczba2)+"<br />");
  document.write("Iloczyn = "+liczba1*liczba2+"<br />");
  document.write("Iloraz = "+liczba1/liczba2+"<br />");
  document.write("Reszta z dzielenia = "+liczba1%liczba2+"<br />");
</script>

<script type="text/javascript">
  for (var i = 80; i > 0; i--) {
    document.write(i+", ")
  }
</script>
<br />
  <br />
<script type="text/javascript">
  var x = 100;
  while (x>0) {
    if (x%2==0) 
      document.write(x+", ")
      x--;
    
  }
</script>

</div>

<div id="w3">
  <h2>Zabawa z oknami w JavaScript</h2>
  <h3 style="color: red;"></h3>
  <INPUT TYPE="button" VALUE="Kliknij mnie!" onClick="oknad()">
  <script type="text/javascript">
    function oknad() {
      alert("To Jest Ostrzeżenie");
      confirm("Czy jesteś pewien swoich życiowych decyzji?");
      prompt("Zostaw jakiś Feedback :)","Pisz tutaj"); }
  </script>

</div>

<div id="w4">
  <h1>---</h1>
  
  <!--<div style="margin-right: auto; margin-left: auto; width: 300px;"><iframe src="http://ponyvillelive.com/index/tunein/skin/dark/embed/true/autoplay/false/showonlystation/true/id/2" frameborder="0" allowtransparency="true" style="margin-left: auto; margin-right: auto; height: 420px; border: 0;"></iframe></div>-->
</div>

<div id="w5"><!-- ###################################### -->

<span class="h">Skrypt porządkujący wprowadzone liczby rosnąco</span>
tu <a href="index8.html">malejąco</a><br />
wyk. Jakub Wyszyński<br /><br />

<INPUT TYPE="button" VALUE="Kliknij mnie!" onClick="rosnaco()">
  <script type="text/javascript">
    function rosnaco() {
          //Wykonał Jakub Wyszyński klasa 4BT
var tmp = prompt("Podaj ile liczb chcesz posortować rosnąco:");
var ile_liczb = Number(tmp);
if (ile_liczb>0){
document.write("tyle liczb: "+ile_liczb+"<br />"); //pomocnicze

var ar = new Array(ile_liczb); //tworzę pustą tablicę o długości ile_liczb

for (var i = 0; i < ile_liczb; i++) {
  kom = i+1;
  tmp = prompt("Podaj Liczbę "+kom);
  ar[i] = Number(tmp);
  document.write("liczba "+kom+" to "+ar[i]+"<br />"); //pomocnicze
}
var dlugosc = ar.length;
//document.write("Tablica ma "+dlugosc+" wyrazów<br />");
document.write("<br />");

for (var i = 1; i < ar.length; i++) {
  var key = ar[i]; //klucz to komórka którą aktualnie wciskam w odpowiednie miejsce
  var j = i - 1;
  while (ar[j]>key) {
    ar[j+1] = ar[j];
    j = j - 1;
    ar[j + 1] = key;
  }
}
document.write("Posortowany Ciąg to: ");
for (var i = 0; i < ile_liczb; i++) {
  
  document.write(ar[i]+", ");
}} else {document.write("Ilość liczb musi być większa od zera, i oczywiście musi to być liczba a nie jakiś inny znak czy litera");}
      }
</script>

</div><!-- ###################################### -->

<div id="w6"><!-- ###################################### -->

<span class="h">Skrypt porządkujący wprowadzone liczby malejąco</span>
tu <a href="index7.html">rosnąco</a><br />
wyk. Jakub Wyszyński<br /><br />

<INPUT TYPE="button" VALUE="Kliknij mnie!" onClick="malejaco()">
  <script type="text/javascript">
    function malejaco() {
  //Wykonał Jakub Wyszyński klasa 4BT
var tmp = prompt("Podaj ile liczb chcesz posortować malejąco:");
var ile_liczb = Number(tmp);
if (ile_liczb>0){
document.write("tyle liczb: "+ile_liczb+"<br />"); //pomocnicze

var ar = new Array(ile_liczb); //tworzę pustą tablicę o długości ile_liczb

for (var i = 0; i < ile_liczb; i++) {
  kom = i+1;
  tmp = prompt("Podaj Liczbę "+kom);
  ar[i] = Number(tmp);
  document.write("liczba "+kom+" to "+ar[i]+"<br />"); //pomocnicze
}
var dlugosc = ar.length;
//document.write("Tablica ma "+dlugosc+" wyrazów<br />");
document.write("<br />");

for (var i = 1; i < ar.length; i++) {
  var key = ar[i]; //klucz to komórka którą aktualnie wciskam w odpowiednie miejsce
  var j = i - 1;
  while (ar[j]>key) {
    ar[j+1] = ar[j];
    j = j - 1;
    ar[j + 1] = key;
  }
}
//wypisuję ciąg od końca
document.write("Posortowany Ciąg to: ");
for (var i = ile_liczb - 1; i >= 0; i--) {
  
  document.write(ar[i]+", ");
}} else {document.write("Ilość liczb musi być większa od zera, i oczywiście musi to być liczba a nie jakiś inny znak czy litera");}
      }
  </script>

</div><!-- ###################################### -->
		




<?php footer(); ?>