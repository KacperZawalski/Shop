<html>
	<title>
	</title>
	<head>
		<link rel="stylesheet" href="main.css">
		<link rel="stylesheet" href="cart.css">
	</head>
	<body onload="cart.createList()">
		<div class="wrap">
			<div class="page">
            <?php require("navBar.php") ?>
                <div id="cartList" class="cartList">
                    <script src="cart.js"></script>    
                </div>
				<div class="footerWrap">
					<div class="footer">
						Footer
					</div>
				</div>
			</div>
		</div>
	</body>
</html>