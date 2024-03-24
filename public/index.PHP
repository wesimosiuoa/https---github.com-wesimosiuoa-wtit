<div id="header" class="header">

</div>
<script>
    fetch ('../header/header.html')
        .then(response=>response.text())
        .then(data => {
            document.getElementById('header').innerHTML = data;
        })
        .catch(error=> console.error ('Error fetching header', error));
</script>
<br>
<div class="container" style="background-image: url('img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg')">
    <div class="card mb-3">
        <!-- <img style="width: 100%; height:400px;" src="img/WhatsApp Image 2024-02-13 at 15.45.22_b7bce11a.jpg" class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h5 class="card-title"> WEZI TECH INSTITUTE OF TECHNOLOGY</h5>
          <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
          </p>
          <p class="card-text"><small class="text-body-secondary"> <?PHP echo date("d-m-y h:s")?></small></p>
        </div>
      </div>
</div>
<div id="footer">
    <script>
        fetch ('footer.php')
            .then(response=>response.text())
            .then(data => {
                document.getElementById('footer').innerHTML = data;
            })
            .catch(error=> console.error ('Error fetching header', error));
    </script>
</div>