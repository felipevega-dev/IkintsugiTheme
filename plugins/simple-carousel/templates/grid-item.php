<?php
if (!isset($items)) $items = [];
$total_items = isset($total_items) ? $total_items : count($items);
?>
<div class="carousel-filters">
    <div class="carousel-search">
        <input type="text" id="carousel-search" placeholder="Buscar noticias...">
    </div>
    <div class="carousel-select">
        <select id="carousel-year">
            <option value="">Todos los años</option>
            <?php 
            $current_year = date('Y');
            for ($i = 0; $i <= 4; $i++) {
                $year = $current_year - $i;
                echo '<option value="' . $year . '">' . $year . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="carousel-select">
        <select id="carousel-sort">
            <option value="date-desc">Más recientes</option>
            <option value="date-asc">Más antiguos</option>
            <option value="title-asc">A-Z</option>
            <option value="title-desc">Z-A</option>
        </select>
    </div>
</div>

<div class="carousel-grid">
    <?php foreach ($items as $item):
        echo simple_carousel_get_grid_item_html($item);
    endforeach; ?>
</div>

<?php if ($total_items > count($items)): ?>
<div class="carousel-load-more">
    <button id="carousel-load-more">Cargar más</button>
</div>
<?php endif; ?>
