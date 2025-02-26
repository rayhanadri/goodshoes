INSERT INTO `products` (`id`, `type`, `merk`, `nama`, `kode_produk`, `price`, `image`) VALUES
(1, 'Sepatu Bola', 'Nike', 'Nike Zoom Vapor', 'NSB1', 1000000, './img/products/bola_nike_zoom_vapor.png'),
(2, 'Sepatu Futsal', 'Nike', 'Nike Tiempo Legend', 'NSF1', 1000000, './img/products/futsal_nike_tiempo.jpg'),
(3, 'Running', 'Nike', 'Nike Downshifter 13', 'NR1', 800000, './img/products/running_nike_downshifter_13.jpg'),
(4, 'Running', 'Ortuseight', 'Ortuseight Hyperblast 2.0', 'OR1', 650000, './img/products/running_ortuseight_hyperblast_2_0.jpg'),
(5, 'Running', 'Adidas', 'Adidas Runfalcon', 'AR1', 750000, './img/products/running_adidas_runfalcon.jpg'),
(6, 'Sneakers', 'Nike', 'Nike Court Vision', 'NS1', 700000, './img/products/sneakers_nike_court_vision.jpg'),
(7, 'Sneakers', 'Adidas', 'Adidas Galaxy', 'AS1', 300000, './img/products/sneakers_adidas_galaxy.jpg'),
(8, 'Sneakers', 'Ortuseight', 'Ortuseight Omega', 'OS1', 300000, './img/products/sneakers_ortuseight_omega.jpg');

INSERT INTO users (id, username, email, type, password) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '$2y$10$D4.wAqTKE1BcWnD/I9CA2eHBhZUOBgZmBBJ.Aw27SLmtOQkyFmT.y'),
(2, 'admin2', 'admin2@gmail.com', 'admin', '$2y$10$nGbU02xNcIGZ1G2yhr8Iiekt2wJdGNtQ1ZiRr3FuLv6FnHZQsaSHG'),
(3, 'admin3', 'admin3@gmail.com', 'admin', '$2y$10$uiiEgEfCm15sU0adE7YG6eEBHsVyWxP7X3Mk381W.WQPthbeJ9sM6'),
(4, 'admin4', 'admin4@gmail.com', 'admin', '$2y$10$n7SDakOR2Ok6ivBydtAwnu9lXlJmeB0dofXK4EP93TqBt2qtryIde');