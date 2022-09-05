<?php
include "aside_structure.php";
?>
<style>
   
   
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
.accordians{
padding-top: 100px;
}
</style>
</head>
<body>


<section class="accordians">
<button class="accordion">If you want to contact</button>
<div class="panel">
  <p>Call us @ 987654321 </p>
</div>

<button class="accordion">Visit our website</button>
<div class="panel">
  <p>https://healthsamadhan.com</p>
</div>


</section>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<?php include 'footer.php' ?>
</body>
</html>
