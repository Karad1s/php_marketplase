<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Комбинированный Макет</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="header">
        <div class="logo">Kaspi.kz</div>
        <nav class="main-nav">
            <a href="#">Клиентам</a>
            <a href="#">Бизнесу</a>
            <a href="#">Kaspi Гид</a>
        </nav>
        <div class="user-info">
            <input type="text" placeholder="Поиск товара">
            <button>Искать</button>
            <span>Мой город: Караганда</span>
        </div>
    </header>
    
    <div class="main-content-wrapper">
        
        <aside class="sidebar">
            <div class="category-block">
                <h3>Все категории (110330)</h3>
                <ul>
                    <li><a href="#">Телефоны и гаджеты (110330)</a></li>
                    <li><a href="#">Аксессуары для телефонов (197/347)</a></li>
                    <li><a href="#">Смартфоны (790)</a></li>
                    </ul>
            </div>
            
            <div class="price-filter">
                <h3>Цена</h3>
                <ul>
                    <li><input type="checkbox"> до 10 000 ₸</li>
                    <li><input type="checkbox"> 10 000 - 49 999 ₸</li>
                    <li><input type="checkbox"> 50 000 - 99 999 ₸</li>
                    </ul>
            </div>
        </aside>

        <main class="product-grid-container">
            <h1 class="promotion-title">Акция</h1>
            
            <div class="product-grid">
                <div class="product-card">
                    <div class="image-placeholder">
                        </div>
                    <div class="details">
                        <div class="badge-discount">0-0-12</div>
                        <div class="badge-interest">3%</div>
                        <p class="description">Текст описание товара</p>
                        <p class="price">Цена: 1 948 ₸</p>
                        <div class="rating">★★★★★ (9652 отзыва)</div>
                    </div>
                </div>
                
                <div class="product-card">...</div>
                <div class="product-card">...</div>
                <div class="product-card">...</div>
                <div class="product-card">...</div>
                <div class="product-card">...</div>
            </div>
        </main>
    </div>

</body>
</html>