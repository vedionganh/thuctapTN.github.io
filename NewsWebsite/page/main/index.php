<?php
$sql_tin = "SELECT * FROM tin WHERE tin.id_tin ORDER BY RAND ()";
$query_tin = mysqli_query($conn, $sql_tin);
$sql_tin1 = "SELECT * FROM tin,loai_tin,nhom_tin WHERE tin.id_loaitin=loai_tin.id_loaitin and loai_tin.id_nhomtin=nhom_tin.id_nhomtin";
$query_tin1 = mysqli_query($conn, $sql_tin1);
?>

<section id="bricks">

	<div class="row masonry">

		<!-- brick-wrapper -->
		<div class="bricks-wrapper">

			<div class="grid-sizer"></div>

			<div class="brick entry featured-grid animate-this">
				<div class="entry-content">
					<div id="featured-post-slider" class="flexslider">
						<ul class="slides">
							<?php
							while ($row_tin = mysqli_fetch_array($query_tin)) {
							?>
								<li>

									<div class="featured-post-slide">

										<!-- <div class="post-background" style="background-image:url('images/tin/<?php echo $row_tin['hinhdaidien'] ?>');"></div> -->

										<div class="overlay"></div>

										<div class="post-content">
											<ul class="entry-meta">
												<li><?php echo $row_tin['ngaydangtin'] ?></li>
												<li><a href="#"><?php echo $row_tin['tacgia'] ?></a></li>
											</ul>

											<h1 class="slide-title"><a href="index.php?manage=news&id=<?php echo $row_tin['id_tin'] ?>" title=""><?php echo $row_tin['tieude'] ?></a></h1>
										</div>

									</div>

								</li> <!-- /slide -->
							<?php
							}
							?>

						</ul> <!-- end slides -->
					</div> <!-- end featured-post-slider -->
				</div> <!-- end entry content -->
			</div>
			<!-- <?php
			while ($row_tin1 = mysqli_fetch_array($query_tin1)) {
			?> -->
			<article class="brick entry format-standard animate-this">
				
				<!-- <div class="entry-thumb">
					<a href="index.php?manage=news&id=<?php echo $row_tin1['id_tin'] ?>" class="thumb-link">
						<img src="images/tin/<?php echo $row_tin1['hinhdaidien'] ?>" alt="building">
					</a>
				</div> -->

				<div class="entry-text">
					<div class="entry-header">

						<div class="entry-meta">
							<span class="cat-links">
								<a href="#"><?php echo $row_tin1['ten_nhomtin'] ?></a>
								<a href="#"><?php echo $row_tin1['ten_loaitin'] ?></a>
							</span>
						</div>

						<h1 class="entry-title"><a href="index.php?manage=news&id=<?php echo $row_tin1['id_tin'] ?>"><?php echo $row_tin1['tieude'] ?></a></h1>

					</div>
					<div class="entry-excerpt">
					<?php echo $row_tin1['mota'] ?>
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

</section> <!-- end bricks -->
</body>

</html>