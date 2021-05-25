<?php include "../koneksi.php"; ?>

<!DOCTYPE html>
<!--
Template Name: Shicso
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Shicso</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
<!-- 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="one_quarter first">
      <h1 class="logoname clear"><a href=""><i class="fas fa-handshake"></i> <span>Shicso</span></a></h1>
      <p>Potenti sagittis aliquam iaculis</p>
    </div>
    <!-- <div style="float: right">
        <span class="fa fa-cog"></span>



        =========
    </div> -->
    <div class="three_quarter">

      <ul class="nospace clear">
        <li class="one_third first">
          <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> support@domain.com</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat.:</strong> 08.00am - 18.00pm</span></div>
        </li>
      </ul>
    </div>
    <!-- <div style="float: right">umar</div> -->
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <div class="hoc clear"> 
    <!-- ################################################################################################ -->
    <nav id="mainav">
      <ul class="clear">
        <li class="active"><a href="">Home</a></li>
        <!-- <li><a class="drop" href="#">Dropdown</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
            <li><a href="#">Level 2</a></li>
          </ul>
        </li> -->

        <li><a class="drop" href="#">Pendidikan</a>
          <ul>
                <!-- ============TK========= -->
            <li><a class="drop" href="void:0">TK</a>
              <ul>
              <?php
                $sql_daftar_biaya_tk = mysqli_query($koneksi, "SELECT id_daftar_biaya, gel_ke FROM `tb_daftar_biaya_tk_kb` WHERE pendidikan = 'tk' GROUP BY gel_ke");
                while($row_daftar_biaya_tk = mysqli_fetch_array($sql_daftar_biaya_tk)):
              ?>
                <li><a href="void:0" onclick="modalTk(<?= $row_daftar_biaya_tk['gel_ke'] ?>)">Gelombang Ke <?= $row_daftar_biaya_tk["gel_ke"] ?></a></li>
              <?php endwhile ?>
              </ul>
            </li>
                  <!-- =================KB=========== -->
            <li><a class="drop" href="#">KB</a>
              <ul>
              <?php
                $sql_daftar_biaya_kb = mysqli_query($koneksi, "SELECT gel_ke FROM `tb_daftar_biaya_tk_kb` WHERE pendidikan = 'kb' GROUP BY gel_ke");
                while($row_daftar_biaya_kb = mysqli_fetch_array($sql_daftar_biaya_kb)):
              ?>
                <li><a href="void:0" data-toggle="modal" data-target="#modalKbLong">Gelombang Ke <?= $row_daftar_biaya_kb["gel_ke"] ?></a></li>
                <?php endwhile ?>
              </ul>
            </li>
            <!-- ==============tpa========= -->
            <li><a class="drop" href="#">TPA</a>
              <ul>
              <?php
                $sql_daftar_biaya_tpa = mysqli_query($koneksi, "SELECT gel_ke FROM `tb_daftar_biaya_tk_kb` WHERE pendidikan = 'tpa' GROUP BY gel_ke");
                while($row_daftar_biaya_tpa = mysqli_fetch_array($sql_daftar_biaya_tpa)):
              ?>
                <li><a href="pages/gallery.html">Gelombang Ke <?= $row_daftar_biaya_tpa["gel_ke"] ?></a></li>
                <?php endwhile ?>
                <li>umar</li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- <li><a href="#">Link Text</a></li>
        <li><a href="#">Link Text</a></li>
        <li><a href="#">Link Text</a></li>
        <li><a href="#">Long Link Text</a></li> -->
        <li><a class="fa fa-cog" href="#"></a>
          <ul>
            <li><a href="../login.php">Login</a></li>
            <li><a href="../register.php">Register</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <h3 class="heading">Odio non erat<br>
        orci bibendum aliquam</h3>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="#">Dignissim vitae</a></li>
          <li><a class="btn inverse" href="#">Malesuada mollis</a></li>
        </ul>
      </footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <article class="group">
      <div class="one_half first">
        <h6 class="heading underline font-x2">Dignissim ipsum nisl sit amet metus nam metus augue mattis</h6>
        <p>Nec vel purus in leo elit mattis non imperdiet sed pulvinar.</p>
        <p class="btmspace-30">At sapien phasellus euismod augue sit amet nibh sed egestas convallis leo etiam sed nulla morbi lacus sapien venenatis id cursus in bibendum eget ligula sed vel nisi nec augue sagittis volutpat&hellip;</p>
        <footer><a class="btn" href="#">Read More</a></footer>
      </div>
      <div class="one_half"><a class="imgover" href="#"><img class="borderedbox inspace-10" src="images/demo/480x300.png" alt=""></a></div>
    </article>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay dark" style="background-image:url('images/demo/backgrounds/01.png');">
  <div id="shout" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <article>
      <h3 class="heading font-x2">Ut augue libero suscipit sagittis</h3>
      <p>Adipiscing dignissim non lectus pellentesque tellus nisi imperdiet at pretium ut iaculis tempor ligula nulla facilisi aliquam venenatis leo et orci sed mauris fusce aliquam suspendisse potenti sed tempus tempor.</p>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section id="services" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Orci mauris pede erat</h6>
    </div>
    <ul class="nospace group">
      <li class="one_third">
        <article><a href="#"><i class="fab fa-fort-awesome"></i></a>
          <h6 class="heading">Fringilla</h6>
          <p>Tempus eget mattis et risus nulla ligula in quam sed lobortis rutrum purus pellentesque dictum augue in quam.</p>
          <footer><a href="#"><i class="fas fa-arrow-right"></i></a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fab fa-deviantart"></i></a>
          <h6 class="heading">Tristique</h6>
          <p>Nunc rhoncus nisi eu est nulla dolor donec ut dolor aliquam eget nunc etiam consequat enim vel nisl donec.</p>
          <footer><a href="#"><i class="fas fa-arrow-right"></i></a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fab fa-sticker-mule"></i></a>
          <h6 class="heading">Bibendum</h6>
          <p>Hendrerit velit ac augue cras pharetra donec ligula mauris euismod sed lobortis quis ultricies lacus aenean.</p>
          <footer><a href="#"><i class="fas fa-arrow-right"></i></a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fas fa-user-secret"></i></a>
          <h6 class="heading">Phasellus</h6>
          <p>Auctor lorem a felis aliquam quam mi rutrum malesuada consequat vitae accumsan ut lacus aliquam ante tortor.</p>
          <footer><a href="#"><i class="fas fa-arrow-right"></i></a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fas fa-quidditch"></i></a>
          <h6 class="heading">Vestibulum</h6>
          <p>Suscipit sed semper ac nulla quisque eget lectus a quam ullamcorper consectetuer aliquam molestie tempor mauris.</p>
          <footer><a href="#"><i class="fas fa-arrow-right"></i></a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fas fa-wheelchair"></i></a>
          <h6 class="heading">Pellentesque</h6>
          <p>Nunc accumsan metus quis metus vestibulum ut neque proin commodo semper magna aenean id eros vitae.</p>
          <footer><a href="#"><i class="fas fa-arrow-right"></i></a></footer>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay light" style="background-image:url('images/demo/backgrounds/01.png');">
  <section id="cta" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h6 class="three_quarter first">Pellentesque tincidunt et natoque penatibus</h6>
    <footer class="one_quarter"><a class="btn" href="#">Parturient nascetur</a></footer>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section id="team" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Ridiculus mus duis sed</h6>
    </div>
    <ul class="nospace group">
      <li class="one_quarter first">
        <article>
          <figure><a class="imgover" href="#"><img src="images/demo/300x300.png" alt=""></a>
            <figcaption class="heading">Jane Doe</figcaption>
          </figure>
          <em>Job Type Here</em>
          <p>Nulla etiam eget lacus sit amet eros tempus elementum vivamus ligula mauris blandit eu [<a href="#">&hellip;</a>]</p>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
            </ul>
          </footer>
        </article>
      </li>
      <li class="one_quarter">
        <article>
          <figure><a class="imgover" href="#"><img src="images/demo/300x300.png" alt=""></a>
            <figcaption class="heading">John Doe</figcaption>
          </figure>
          <em>Job Type Here</em>
          <p>Phasellus congue dictum tortor maecenas eget erat eget nulla venenatis vehicula duis posuere [<a href="#">&hellip;</a>]</p>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
            </ul>
          </footer>
        </article>
      </li>
      <li class="one_quarter">
        <article>
          <figure><a class="imgover" href="#"><img src="images/demo/300x300.png" alt=""></a>
            <figcaption class="heading">Janet Doe</figcaption>
          </figure>
          <em>Job Type Here</em>
          <p>Tellus vel fringilla auctor nisi arcu semper urna at congue lectus nisi ac neque in hac [<a href="#">&hellip;</a>]</p>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
            </ul>
          </footer>
        </article>
      </li>
      <li class="one_quarter">
        <article>
          <figure><a class="imgover" href="#"><img src="images/demo/300x300.png" alt=""></a>
            <figcaption class="heading">Jamie Doe</figcaption>
          </figure>
          <em>Job Type Here</em>
          <p>Habitasse platea dictumst nulla facilisi nulla facilisi phasellus tincidunt est a tortor [<a href="#">&hellip;</a>]</p>
          <footer>
            <ul class="faico clear">
              <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
            </ul>
          </footer>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Quisque sodales morbi</h6>
    </div>
    <ul class="nospace group btmspace-80">
      <li class="one_third first">
        <blockquote>Magna arcu pharetra eu interdum quis blandit ac orci phasellus sit amet leo lobortis orci imperdiet tempus sed tincidunt arcu in consequat pretium quam lacus rhoncus orci lobortis sagittis</blockquote>
        <figure class="clear"><img class="circle" src="images/demo/60x60.png" alt="">
          <figcaption>
            <h6 class="heading">A. Doe</h6>
            <em>CEO / Company Name</em></figcaption>
        </figure>
      </li>
      <li class="one_third">
        <blockquote>Lorem leo vel ligula vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; quisque urna velit accumsan bibendum scelerisque sed suscipit a velit duis nec ipsum</blockquote>
        <figure class="clear"><img class="circle" src="images/demo/60x60.png" alt="">
          <figcaption>
            <h6 class="heading">B. Doe</h6>
            <em>Director / Company Name</em></figcaption>
        </figure>
      </li>
      <li class="one_third">
        <blockquote>Sed urna egestas consectetuer suspendisse lorem ut tortor est lobortis eu venenatis vitae pretium eu felis cras erat est cursus sed dignissim sed euismod in turpis praesent vestibulum hendrerit</blockquote>
        <figure class="clear"><img class="circle" src="images/demo/60x60.png" alt="">
          <figcaption>
            <h6 class="heading">C. Doe</h6>
            <em>Marketing / Company Name</em></figcaption>
        </figure>
      </li>
    </ul>
    <footer><a class="btn" href="#">View More &raquo;</a></footer>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h6 class="heading underline font-x2">Ante duis eu dui semper</h6>
    </div>
    <ul class="nospace group latest">
      <li class="one_third first">
        <article>
          <time datetime="2045-04-06T08:15+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> 06<sup>th</sup> April 2045 @ 15:00pm</time>
          <div class="excerpt">
            <h6 class="heading"><a href="#">Ante euismod viverra integer sagittis mauris facilisis</a></h6>
            <p>Dolor semper massa fusce condimentum elit sit amet est aenean dui suspendisse mattis aenean est massa vulputate eget eleifend ac consequat non velit vestibulum ante ipsum [<a href="#">&hellip;</a>]</p>
            <ul class="meta">
              <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li>
              <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
            </ul>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article>
          <time datetime="2045-04-05T08:14+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> 05<sup>th</sup> April 2045 @ 14:00pm</time>
          <div class="excerpt">
            <h6 class="heading"><a href="#">Primis in faucibus orci luctus et ultrices posuere</a></h6>
            <p>Cubilia curae vivamus feugiat ultrices ligula cras nec risus in a nulla nam tempus odio in erat suspendisse potenti fusce eleifend maecenas tempus gravida lorem pellentesque [<a href="#">&hellip;</a>]</p>
            <ul class="meta">
              <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li>
              <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
            </ul>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article>
          <time datetime="2045-04-04T08:13+00:00"><i class="far fa-calendar-alt rgtspace-5"></i> 04<sup>th</sup> April 2045 @ 13:00pm</time>
          <div class="excerpt">
            <h6 class="heading"><a href="#">Justo maecenas sit amet mi nulla at erat adipiscing</a></h6>
            <p>Enim condimentum varius cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus suspendisse aliquam lacus vitae mauris blandit semper donec [<a href="#">&hellip;</a>]</p>
            <ul class="meta">
              <li><i class="fas fa-user rgtspace-5"></i> <a href="#">Admin</a></li>
              <li><i class="fas fa-tags rgtspace-5"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
            </ul>
          </div>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h1 class="logoname clear"><a href=""><i class="fas fa-handshake"></i> <span>Shicso</span></a></h1>
      <p class="btmspace-30">Leo scelerisque at imperdiet in volutpat quis turpis praesent sit amet ante sed erat tempor consequat sed ut nibh nullam sagittis nunc a turpis nec [<a href="#">&hellip;</a>]</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Felis lobortis pulvinar</h6>
      <ul class="nospace linklist contact">
        <li><i class="fas fa-map-marker-alt"></i>
          <address>
          Street Name &amp; Number, Town, Postcode/Zip
          </address>
        </li>
        <li><i class="fas fa-phone"></i> +00 (123) 456 7890</li>
        <li><i class="fas fa-fax"></i> +00 (123) 456 7890</li>
        <li><i class="far fa-envelope"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">In cursus placerat velit</h6>
      <ul class="nospace linklist">
        <li><a href="#">Maecenas sem fusce quis</a></li>
        <li><a href="#">Vel leo semper rhoncus ut</a></li>
        <li><a href="#">Suscipit pede eu diam class</a></li>
        <li><a href="#">Aptent taciti sociosqu ad</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Litora torquent conubia</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <p class="nospace btmspace-10"><a href="#">Nostra per inceptos himenaeos cras augue est dictum quis&hellip;</a></p>
            <time class="block font-xs" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
          </article>
        </li>
        <li>
          <article>
            <p class="nospace btmspace-10"><a href="#">Suscipit vel est in pulvinar aliquam vulputate purus in tincidunt&hellip;</a></p>
            <time class="block font-xs" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2045</time>
          </article>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTk">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalTk" tabindex="-1" role="dialog" aria-labelledby="modalTkLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTkLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="biayaTk" class="modal-body">
        ...
      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Print</button> -->
      </div>
    </div>
  </div>
</div>



              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTkLong">
  Launch demo modal
</button>


<!-- ========modaltk===== -->
<div class="modal fade" id="modalTkLong" tabindex="-1" role="dialog" aria-labelledby="modalTkLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTkLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- ========/modaltk===== -->

<!-- ========modalKb===== -->
<div class="modal fade" id="modalKbLong" tabindex="-1" role="dialog" aria-labelledby="modalKbLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalKbLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- ========/modalKb===== -->

                <div class="col-md-6">
<table class="table table-bordered"><tr><td><strong>Formulir</strong></td><td>" + data.biaya_formulir +"</td></tr><tr><td><strong>DPP</strong></td><td>"+data.dpp+"</td></tr><tr><td><strong>Uang Kegiatan</strong></td><td>"+data.uang_kegiatan+"</td></tr><tr><td><strong>Uang Buku Dan Peralatan 1 Tahun</strong></td><td>"+data.uang_buku_pertahun+"</td></tr><tr><td><strong>Uang Seragam 3 Setel</strong></td><td>"+data.uang_seragam+"</td></tr><tr><td><strong>SPP 1 Bulan</strong></td><td>"+ data.spp +"</td></tr></table>

<ul><li><b>Pada saat pendaftaran minimun telah membayar DPP 50% (,-) & formulir pendaftaran Rp. </b></li><li><b>Selanjutnya sisa pembayaran dapat di angsur dan harus LUNAS pada akhir Bulan</b></li><li><b>Selama ,emjadi siswa/siswi Kartika Pradana, biaya DPP hanya di lakukan sekali saja</b></li><li><b>Uang yang telah masuk / terdaftar tidak dapat ditarik kembali</b></li></ul>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  function modalTk(gel_ke)
  {
    $.ajax({
      url: "proses/biayaTk.php",
      type: "POST",
      data: {"gel_ke": gel_ke},
      dataType: "JSON",
      success: function(data) {
        console.log(data)
        var html = "<b><center><span>Daftar Biaya TK KARTIKA PRADANA</span></center><center><span>Gelombang Inden ("+data.tgl_gel1+" - "+data.tgl_gel2+")</span></center><center>Tahun Anjaran "+data.tahun_ajaran_biaya+"</center></b><table class='table table-striped'><tr><td><strong>Formulir</strong></td><td>Rp. " + data.biaya_formulir +"</td></tr><tr><td><strong>DPP</strong></td><td>Rp. "+data.dpp+"</td></tr><tr><td><strong>Uang Kegiatan</strong></td><td>Rp. "+data.uang_kegiatan+" /semester</td></tr><tr><td><strong>Uang Buku Dan Peralatan 1 Tahun</strong></td><td>Rp. "+data.uang_buku_pertahun+"</td></tr><tr><td><strong>Uang Seragam 3 Setel</strong></td><td>Rp. "+data.uang_seragam+"</td></tr><tr><td><strong>SPP 1 Bulan</strong></td><td>Rp. "+ data.spp +"</td></tr><tr><td><span style='float: right'>Total</span></td><td>Rp. "+data.total_biaya+"</td></tr></table><li style='margin-left : 15px'><b>Pada saat pendaftaran minimun telah membayar DPP 50% (Rp."+data.dpp50+",-) & formulir pendaftaran Rp. "+data.biaya_formulir+"</b></li><li style='margin-left : 15px'><b>Selanjutnya sisa pembayaran dapat di angsur dan harus LUNAS pada akhir Bulan "+data.akhir_gel+"</b></li><li style='margin-left : 15px'><b>Selama ,emjadi siswa/siswi Kartika Pradana, biaya DPP hanya di lakukan sekali saja</b></li><li style='margin-left : 15px'><b>Uang yang telah masuk / terdaftar tidak dapat ditarik kembali</b></li></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button onclick='printTk("+data.gel_ke+")' type='button' class='btn btn-primary'>Print</button>"
        $("#modalTk").modal()
        $('#biayaTk').html(html)
      }
    })
  }

  function printTk(gel_ke){
    alert(gel_ke)
  }
</script>



