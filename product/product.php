<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../ibuy.css" />
	</head>

	<body>
		
		<header>
			<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

			<form>
				<input type="text" name="search" placeholder="Search for anything" />
				<input type="submit" value="Search" />
			</form>
		</header>
			<form method="GET" action="/login/">
				<input name="Logout" type="submit" value="Login/Logout">
			</form>
		<nav>
			<ul>
				<?php
					$cateNum = 0;

					foreach($get as $value){
						$cateNum++;
						if($cateNum > 8)continue;
							echo "
								<li>
									<a href=/product?searchCate=".$value['category_id'].">".$value['category_name']."</a>
								</li>
							";
						/*<li><a href="#">Home </a></li>
						<li><a href="#">Garden</a></li>
						<li><a href="#">Electronics</a></li>
						<li><a href="#">Fashion</a></li>
						<li><a href="#">Sport</a></li>
						<li><a href="#">Health</a></li>
						<li><a href="#">Toys</a></li>
						<li><a href="#">Motors</a></li>*/
					}
				?>
				
			</ul>
		</nav>
		<img src="images/randombanner.php" alt="Banner" />

		<main>

			<h1 ><a href="/product">Latest Listings</a> / <a href="/Search">Search Results</a> / <a href="/product?listCate=true">Category listing</a></h1>
			<?php 

				if (isset($_GET['product'])){
					echo "<h1>Latest Listings</h1>";
				}
				
				if (isset($_GET['searchCate'])){
					echo "<h1>Category listing</h1>";
				}
					if (isset($_GET['search'])){
					echo "<h1>Search Results</h1>";
				}				

			?>

			<ul class="productList">
				<?php 
					if(isset($_GET['listCate'])){ // Category listing
						foreach($get as $value){
							echo "
								<a href=/product?searchCate=".$value['category_id'].">".$value['category_name']."</a><br>
							";
						}
					}

					if (!empty($getProduct) && !isset($_GET['listCate'])){ // Product listing
						foreach($getProduct as $value){
							echo "
								<li>
									<img src=/../image/".$value['product_image']." alt=product name>
									<article>
										<h2>".$value['product_name']."</h2>
										<h3>".$value['category_name']."</h3>
										<p>".$value['product_description']."</p>
										<p class=price>Current bid: £".$value['product_bid']."</p>
										<a href=/product-detail?detailId=".$value['product_id']." class=more>More &gt;&gt;</a>
									</article>
								</li>
							";
						}
					} else { // HOla 
						echo "<h1>No product found!</h1>";
					}


				
				?>
				
			</ul>

			<hr />
			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>
