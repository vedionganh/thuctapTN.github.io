<?php

$sql_nhomtin = "SELECT * FROM nhom_tin WHERE nhom_tin.id_nhomtin='$_GET[id]' LIMIT 1";
$sql_loaitin = "SELECT * FROM nhom_tin,loai_tin where loai_tin.id_nhomtin=nhom_tin.id_nhomtin and nhom_tin.id_nhomtin='$_GET[id]'";

$query_nhomtin = mysqli_query($conn, $sql_nhomtin);
$query_loaitin = mysqli_query($conn, $sql_loaitin);

$row_nhomtin = mysqli_fetch_array($query_nhomtin);


$sql_tin = "SELECT * FROM tin,loai_tin,nhom_tin WHERE tin.id_loaitin=loai_tin.id_loaitin and loai_tin.id_nhomtin=nhom_tin.id_nhomtin and loai_tin.id_loaitin='$_GET[id_loaitin]'";
$query_tin = mysqli_query($conn, $sql_tin);
?>
<!-- page header
   ================================================== -->
<section id="page-header">
	<div class="row current-cat">
		<div class="col-full">
			<h1>Danh mục: <?php echo $row_nhomtin['ten_nhomtin']?></h1>
			<?php
			while ($row_loaitin = mysqli_fetch_array($query_loaitin)) {
			?>
				<div class="entry-text">
					<div class="entry-meta">
						<span class="cat-links">
							<a href="index.php?manage=categories&id=<?php echo $row_loaitin['id_nhomtin'] ?>&id_loaitin=<?php echo $row_loaitin['id_loaitin'] ?>"><?php echo $row_loaitin['ten_loaitin'] ?></a>
						</span>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>


<!-- masonry
   ================================================== -->
<section id="bricks" class="with-top-sep">

	<div class="row masonry">

		<!-- brick-wrapper -->
		<div class="bricks-wrapper">

			<div class="grid-sizer"></div>

			<?php
			while ($row_tin = mysqli_fetch_array($query_tin)) {
			?>
				<article class="brick entry format-standard animate-this">
					<!-- <div class="entry-thumb">
						<a href="index.php?manage=news&id=<?php echo $row_tin['id_tin'] ?>" class="thumb-link">
							<img src="images/tin/<?php echo $row_tin['hinhdaidien'] ?>" alt="building">
						</a>
					</div> -->
					<div class="entry-text">
						<div class="entry-header">
							<div class="entry-meta">
								<span class="cat-links">
									<a href="index.php?manage=categories&id=<?php echo $row_loaitin['id_nhomtin'] ?>"><?php echo $row_nhomtin['ten_nhomtin'] ?></a>
									<a href="#"><?php echo $row_tin['ten_loaitin'] ?></a>
								</span>
							</div>
							<h1 class="entry-title"><a href="index.php?manage=news&id=<?php echo $row_tin['id_tin'] ?>"><?php echo $row_tin['tieude'] ?></a></h1>
						</div>
						<div class="entry-excerpt">
							<?php echo $row_tin['mota'] ?>
						</div>
					</div>
				</article> <!-- end article -->
			<?php
			}
			?>



		</div> <!-- end brick-wrapper -->

	</div> <!-- end row -->

	<div class="row">

		<nav class="pagination">
			<span class="page-numbers prev inactive">Prev</span>
			<span class="page-numbers current">1</span>
			<a href="#" class="page-numbers">2</a>
			<a href="#" class="page-numbers">3</a>
			<a href="#" class="page-numbers">4</a>
			<a href="#" class="page-numbers">5</a>
			<a href="#" class="page-numbers">6</a>
			<a href="#" class="page-numbers">7</a>
			<a href="#" class="page-numbers">8</a>
			<a href="#" class="page-numbers">9</a>
			<a href="#" class="page-numbers next">Next</a>
		</nav>

	</div>

</section> <!-- bricks -->